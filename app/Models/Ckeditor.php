<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ckeditor
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string = table name
     */
    protected string $table = 'ckeditor';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected string $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected array $fillable = [
        'name',
        'content'
    ];
}
