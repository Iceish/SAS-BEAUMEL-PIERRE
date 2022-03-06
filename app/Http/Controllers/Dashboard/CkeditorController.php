<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteImageRequest;
use App\Http\Requests\StoreCkeditorRequest;
use App\Http\Requests\StoreImageRequest;
use App\Models\Ckeditor;
use App\Models\Language;
use DragonCode\PrettyArray\Exceptions\FileDoesntExistsException;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class CkeditorController extends Controller
{
    const IMG_FOLDER = "images";

    public function storeImage(StoreImageRequest $request): JsonResponse
    {
        $file = $request->only('upload')['upload'];
        $path = $file->store(self::IMG_FOLDER);
        return response()->json([
           "url" => $path
        ]);
    }

    public function index(): Factory|View|Application
    {
        $langs = Language::all();
        return view('web.t',
            compact('langs')
        );
    }

    public function deleteImage(DeleteImageRequest $request): JsonResponse
    {
        $file = $request->only('file')['file'];
        try{
            $file = self::IMG_FOLDER.'/'.$file;
            if (Storage::disk()->exists($file)) {
                Storage::delete($file);
                return response()->json(["success"]);
            }else{
                throw new FileDoesntExistsException(`File ${file} doesn't exist`);
            }
        }catch (Exception){
            return response()->json(["error"]);

        }
    }

    public function storeCkeditor(StoreCkeditorRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $contents = $validated['htmls'];
        $name = $validated['name'];

        $ckEditorName = Ckeditor::where('name',$name)->first();
        foreach ($contents as $content){
            $lang = Language::where('code',$content['lang'])->first();

            $ckEditorName->language()->syncWithoutDetaching(
                [
                    $lang->id => [
                        'content' => $content['content']
                    ]
                ]
            );
        }
        return response()->json(["error"]);
    }
}
