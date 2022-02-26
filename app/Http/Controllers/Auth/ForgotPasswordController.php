<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ForgotPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    /**
     * Show the form for forgetting password.
     * @return Factory|View|Application
     */
    public function forgotPasswordView(): Factory|View|Application
    {
        return view("auth.forgot_password");
    }


    /**
     * Send an Email to user with reset password link
     * @param ForgotPasswordRequest $request
     * @return RedirectResponse
     */
    public function forgotPassword(ForgotPasswordRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $email = $validated["email"];
        $token = Str::random(64);

        $user = User::where('email',$email)->first();


        DB::table('password_resets')->updateOrInsert(
            ['user_id' => $user->id],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );


        $token = Crypt::encryptString($user->id." ".$token);

        $message = (new ForgotPassword($token,$user))->onQueue('emails');
        Mail::to($user)->queue($message);

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    /**
     * Show the form for reset the password;
     * @param string $token
     * @return Factory|View|Application
     */
    public function resetPasswordView(string $token): Factory|View|Application
    {
        return view('auth.reset_password',[
            'token' => $token,
        ]);
    }

    /**
     * Reset password with forgot password link
     * @param ResetPasswordRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function resetPassword(ResetPasswordRequest $request): Redirector|Application|RedirectResponse
    {
        $validated = $request->validated();
        $password = $validated["password"];

        $token = Crypt::decryptString($validated["token"]);
        $token_parts = explode(" ", $token);
        $user_id = $token_parts[0];
        $token = $token_parts[1];



        $updatePassword = DB::table('password_resets')->where([
            'user_id' => $user_id,
            'token' => $token
        ])->first();

        if(!$updatePassword){
            return back()->withErrors('error', 'Invalid token!');
        }
        User::find($user_id)->update([
            'password' => $password
        ]);

        DB::table('password_resets')->where(['user_id'=> $user_id])->delete();

        return redirect()->route("auth.login.view")->with('message', 'Your password has been changed!');
    }
}
