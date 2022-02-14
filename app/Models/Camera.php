<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The models are created with the command « php artisan make:model ModelName »
 */
class Camera extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string = table name
     */
    protected $table = 'cameras';
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
        'name',
        'ip',
        'user_name',
        'password',
        'place',
    ];
}

