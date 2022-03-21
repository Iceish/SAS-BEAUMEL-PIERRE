<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * The models are created with the command « php artisan make:model ModelName »
 */
class ClientInvoice extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string = table name
     */
    protected $table = 'client_invoices';
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
        'totalTTC',
        'payment_date',
        'payment_mode',
        'client_id'
    ];

    protected $with = ['client','InvoiceDetail'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function InvoiceDetail(): HasMany
    {
        return $this->hasMany(InvoiceDetail::class,'client_invoice_id');
    }
}
