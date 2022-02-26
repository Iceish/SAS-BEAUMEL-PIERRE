<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    private string $token;
    private User $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $token, User $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this
            ->view('mail.forgot_password',[
                "token" => $this->token,
                "user" =>   $this->user])
            ->subject('Reset Password');
    }
}
