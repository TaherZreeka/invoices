<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class invoices_details extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_Invoice',
        'invoice_number',
        'product',
        'Section',
        'Status',
        'Value_Status',
        'note',
        'user',
        'Payment_Date',
    ];

    protected $dates = ['deleted_at'];

        public function invoice()
    {
        return $this->belongsTo(invoices::class, 'id_Invoice');
    }


}
