<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The models are created with the command « php artisan make:model ModelName »
 */
class Partner extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string = table name
     */
    protected $table = 'partners';
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
        'postal_code',
        'city',
        'address',
        'email',
    ];
}
