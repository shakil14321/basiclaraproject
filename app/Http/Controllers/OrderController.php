<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
  


class OrderController extends Controller
{


function search_data(Request $request)
    {
        $data= $request->input('search');

           $orders = DB::table('orders')->where('name', 'like', '%' . $data . '%')->get();
                
            return view('order', compact('orders')); 

    }


    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        $data['orders'] = $orders;

        return view('order', $data);
    }

    public function downloadPDF()
    {
        
        $orders = Order::orderBy('id', 'desc')->get();
        $data['orders'] = $orders;
        $pdf = PDF::loadView('pdf.order', $data);
        return $pdf->stream();

    }

}
