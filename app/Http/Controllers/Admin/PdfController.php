<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
   
    public function generate_pdf($order_id)
    {
       $orders = Order::where('id',$order_id)->get();
       $shipping = Shipping::where('order_id',$order_id)->get();
       $orderItems = OrderItem::where('order_id',$order_id)->get();


        $pdf = Pdf::loadView('admin.invoice.billing_invoice',compact('orderItems','orders','shipping'));
        return $pdf->stream('Sells-points-invoice.pdf');
    }

    public function download_pdf()
    {
        $data = 'webjourney.dev';
        $pdf = Pdf::loadView('billing_invoice',compact('data'));
        return $pdf->download('billing-invoice.pdf');
    }
}
