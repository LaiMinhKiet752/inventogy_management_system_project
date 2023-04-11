<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;

class InvoiceController extends Controller
{
    public function InvoiceAll()
    {
        $allData = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.invoice.invoice_all', compact('allData'));
    } //End Method
    public function InvoiceAdd()
    {
        $category = Category::all();
        $invoice_data = Invoice::orderBy('id', 'desc')->first();
        if ($invoice_data == null) {
            $firstReg = '0';
            $invoice_no = $firstReg + 1;
        } else {
            $invoice_data = Invoice::orderby('id', 'desc')->first()->invoice_no;
            $invoice_no = $invoice_data + 1;
        }   
        $date = date('Y-m-d');
        return view('backend.invoice.invoice_add', compact('category', 'invoice_no', 'date'));
    } //End Method
    public function InvoiceStore(Request $request){
        
    }

}
