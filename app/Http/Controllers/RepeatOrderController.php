<?php

namespace App\Http\Controllers;

use App\Models\RepeatOrder;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use DateTime;

class RepeatOrderController extends Controller
{
    public function index(){
        $order = RepeatOrder::query()->get();
        return view('repeat.order.index',compact('order'));
    }


public function sync(){
    RepeatOrder::truncate();

    try {
        $client = new Client();
        $url = "https://script.google.com/macros/s/AKfycbxO99SIZOCKQVpaOAr0reL9oBDYjk0RwFo8KtpmbqxWX6uyqQ6x2lxE4n1qGZ_708ZI/exec";
        $response = $client->request('GET', $url, ['verify' => false]);
        $data = json_decode($response->getBody());
        $order = collect($data);
    } catch (\Throwable $th) {
        return redirect()->back()->with('delete', 'Data Repeat Order Gagal di Syncronize!');
    }

    foreach ($order as $ord) {
        // Format the date using DateTime
        $tanggal_penawaran = DateTime::createFromFormat('d-m-Y', $ord->tgl_penawaran);
        $tanggal_akhir_penjualan = DateTime::createFromFormat('d-m-Y', $ord->tgl_penjualan_akhir);
        
        // Check if both dates were successfully created
        if ($tanggal_penawaran !== false && $tanggal_akhir_penjualan !== false) {
            // Save the data with formatted dates
            RepeatOrder::create([
                'tanggal_penawaran' => $tanggal_penawaran->format('Y-m-d'),  // Convert to 'YYYY-MM-DD'
                'sales' => $ord->nama_sales,
                'customer' => $ord->nama_customer,
                'produk' => $ord->nama_produk,
                'tanggal_akhir_penjualan' => $tanggal_akhir_penjualan->format('Y-m-d'),  // Convert to 'YYYY-MM-DD'
                'qty_penjualan_akhir' => $ord->qty_penjualan_terakhir,
                'duz' => $ord->dus,
                'btl' => $ord->btl,
                'total_qty' => $ord->total_qty,
                'checklist_do' => $ord->checklist_do
            ]);
        } else {
            // Handle invalid date format (optional)
            return redirect()->back()->with('error', 'Invalid date format for order ' . $ord->nama_customer);
        }
    }

    return redirect()->back()->with('success', 'Data Repeat Order Berhasil di Syncronize!');
}


    function formatDate($tanggalISO) {
        // Ensure the date is valid
        if (!$tanggalISO) return null; // Avoid empty date values
    
        // Convert from 'DD-MM-YYYY' to 'YYYY-MM-DD'
        $tanggal = DateTime::createFromFormat('d-m-Y', $tanggalISO);
        
        // Check if the date is valid
        if ($tanggal === false) {
            return null; // Return null if the date is invalid
        }
    
        // Return the date in 'YYYY-MM-DD' format
        return $tanggal->format('Y-m-d');
    }

    
}
