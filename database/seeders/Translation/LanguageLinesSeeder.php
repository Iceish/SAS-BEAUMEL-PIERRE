<?php

namespace Database\Seeders\Translation;

use App\File\File;
use App\Models\Language;
use App\Models\LanguageLine;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class LanguageLinesSeeder extends Seeder
{
    public function run()
    {
        $langFolders = array_filter(glob('lang/*'), 'is_dir');
        foreach($langFolders as $langFolder)
        {
            $folderName =  basename($langFolder);
            try{
                $lang = Language::where('code',$folderName)->firstOrFail();
                foreach (File::filesIn('lang/'.$folderName) as $file) {
                    $filename = $file->getPathname();
                    if(!preg_match('/.*\.php$/',$filename))continue;
                    $arrFile = require_once $filename;
                    $array = Arr::dot($arrFile);
                    foreach ($array as $key=>$value) {
                        if($value === [])continue;
                        LanguageLine::firstOrCreate(array_merge(['group'=>pathinfo($filename,PATHINFO_FILENAME)],['key' => $key]))->setTranslation($lang,$value);
                    }
                }
            }catch (Exception $e){
                continue;
            }
        }
    }
}
