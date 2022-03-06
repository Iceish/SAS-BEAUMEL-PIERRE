<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ckeditor extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string = table name
     */
    protected $table = 'ckeditor';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    public function language(): BelongsToMany
    {
        return $this->belongsToMany(Language::class)->withPivot('content');
    }
}
