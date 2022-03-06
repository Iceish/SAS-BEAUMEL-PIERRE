<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Language extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string = table name
     */
    protected $table = 'languages';
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
    protected $fillable = ['code','name'];

    public function languageLine(): BelongsToMany
    {
        return $this->belongsToMany(LanguageLine::class)->withPivot('text');
    }

    public function ckeditor(): BelongsToMany
    {
        return $this->belongsToMany(Ckeditor::class)->withPivot('content');
    }
}
