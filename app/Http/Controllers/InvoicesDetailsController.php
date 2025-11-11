<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\invoice_attachments;
use App\Models\invoices_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
       $invoices = invoices::where('id',$id)->first();
        $details  = invoices_Details::where('id_Invoice',$id)->get();
        $attachments  = invoice_attachments::where('invoice_id',$id)->get();

        return view('invoices.details_invoice',compact('invoices','details','attachments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(invoices_details $invoices_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoices = invoices::where('id',$id)->first();
        $details  = invoices_Details::where('id_Invoice',$id)->get();
        $attachments  = invoice_attachments::where('invoice_id',$id)->get();

        return view('invoices.details_invoice',compact('invoices','details','attachments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
          $invoices = invoice_attachments::findOrFail($request->id_file);
        $invoices->delete();
// تحديد المسار الكامل للملف داخل مجلد public
    $file_path = public_path('Attachments/' . $request->invoice_number . '/' . $request->file_name);

    // التحقق من وجود الملف قبل حذفه
    if (File::exists($file_path)) {
        File::delete($file_path);
    }        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

  public function get_file($invoice_number, $file_name)
{
    $path = public_path('Attachments/' . $invoice_number . '/' . $file_name);
    return response()->download($path);
}

public function open_file($invoice_number, $file_name)
{
    $path = public_path('Attachments/' . $invoice_number . '/' . $file_name);
    return response()->file($path);
}

}
