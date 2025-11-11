<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class invoices extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'invoice_number',
        'invoice_Date',
        'Due_date',
        'product',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'Discount',
        'Value_VAT',
        'Rate_VAT',
        'Total',
        'Status',
        'Value_Status',
        'note',
        'Payment_Date',
    ];

    protected $dates = ['deleted_at'];

 public function section()
   {
   return $this->belongsTo('App\Models\sections');
   }
   public function details()
{
    return $this->hasMany(invoices_details::class, 'id_Invoice');
}
 protected static function boot()
    {
        parent::boot();

        static::deleting(function ($invoice) {
            // نحذف التفاصيل المرتبطة بنفس طريقة حذف الفاتورة
            $invoice->details()->delete();
        });
    }
}
