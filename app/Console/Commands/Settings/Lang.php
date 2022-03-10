<?php

namespace App\Console\Commands\Settings;

use App\File\File;
use App\Models\Language;
use App\Models\LanguageLine;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class Lang extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:lang';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reload translation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->createLang();
        $this->createLines();
        return 0;
    }

    private function createLang()
    {
        Language::firstOrCreate([
            'name' => 'english',
            'code' => 'en'
        ]);
        Language::firstOrCreate([
            'name' => 'français',
            'code' => 'fr'
        ]);
    }

    private function createLines()
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
