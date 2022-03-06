<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * The models are created with the command « php artisan make:model ModelName »
 */
class Client extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string = table name
     */
    protected $table = 'clients';
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
        'email',
        'postal_code',
        'city',
        'address',
    ];

    public function customerInvoice(): HasMany
    {
        return $this->hasMany(CustomerInvoice::class);
    }

    public function language(): BelongsToMany
    {
        return $this->belongsToMany(Language::class,'client_language')->withPivot('content');
    }
}
