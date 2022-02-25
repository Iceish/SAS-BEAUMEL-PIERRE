<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class LanguageLine extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string = table name
     */
    protected $table = 'language_lines';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string[]
     */
    public $guarded = ['id'];

    /**
     * @var string[]
     */
    protected $fillable = ['key','group'];

    public function language(): BelongsToMany
    {
        return $this->belongsToMany(Language::class)->withPivot('text');
    }

    public function setTranslation(Language $lang, string $trad)
    {
        $this->language()->attach($lang,[
            'text' => $trad
        ]);
    }

    public function getTranslation(Language $lang):string
    {
        return $this->language()->where('language_id',$lang->id)->first()->pivot->text;
    }

    public static function getTranslationsForGroup(Language $lang, string $group)
    {
        return Cache::rememberForever(static::getCacheKey($group, $lang->code), function () use ($group, $lang) {
            return $lang
                ->languageLine()
                ->where('group', $group)
                ->get()
                ->reduce(function ($lines, self $languageLine) use($lang, $group)
                {
                    $translation = $languageLine->getTranslation($lang);
                    if ($group === '*') {
                        $lines[$languageLine->key] = $translation;
                    } else{
                        Arr::set($lines, $languageLine->key, $translation);
                    }
                    return $lines;
                }) ?? [];
        });
    }

    public static function getCacheKey(string $locale, string $group): string
    {
        return "translation.{$group}.{$locale}";
    }
}
