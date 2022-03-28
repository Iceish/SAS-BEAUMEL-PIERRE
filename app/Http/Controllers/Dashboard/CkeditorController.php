<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteImageRequest;
use App\Http\Requests\StoreCkeditor1Request;
use App\Http\Requests\StoreCkeditorRequest;
use App\Http\Requests\StoreImageRequest;
use App\Models\Ckeditor;
use App\Models\Language;
use DragonCode\PrettyArray\Exceptions\FileDoesntExistsException;
use Exception;
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
           "url" => "/$path"
        ]);
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
        $id = $validated['id'];
        $model = $validated['model'];
        $model = app("App\Models\\$model");


        $modelCK = $model::find($id);
        foreach ($contents as $content){
            $lang = Language::where('code',$content['lang'])->first();

            $modelCK->language()->syncWithoutDetaching(
                [
                    $lang->id => [
                        'content' => $content['content']
                    ]
                ]
            );
        }
        return response()->json(["error"]);
    }

    public function storeCkeditor1(StoreCkeditor1Request $request): JsonResponse
    {
        $validated = $request->validated();
        $contents = $validated['htmls'];
        $name = $validated['name'];

        foreach ($contents as $content){
            $lang = Language::where('code',$content['lang'])->first();
            Ckeditor::updateOrCreate([
                'name' => $name,
                'language_id' => $lang->id
            ],[
                'content' => $content
            ]);
        }
        return response()->json(["error"]);
    }
}
