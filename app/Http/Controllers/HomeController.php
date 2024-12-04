<?php

namespace App\Http\Controllers;

use App\Models\AgusA;
use App\Models\Junaidi;
use Illuminate\Http\Request;
use App\Models\RepeatOrder;
use App\Models\Zaenal;
use App\Models\Zaenuddin;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use DateTime;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
{
    $models = [
        "1" => RepeatOrder::class,
        "2" => AgusA::class,
        "3" => Zaenal::class,
        "4" => Zaenuddin::class,
        "5" => Junaidi::class,
    ];

    // Periksa apakah role pengguna valid
    $role = Auth::user()->role;
    if (array_key_exists($role, $models)) {
        // Query sesuai role pengguna
        $order = $models[$role]::query()->get();
    } else {
        // Jika role tidak valid, tampilkan error
        abort(403, 'Unauthorized action.');
    }

    // Return data ke view
    return view('welcome', compact('order'));
}



public function sync()
{
    $role = Auth::user()->role;

    switch ($role) {
        case "1":
            $model = RepeatOrder::class;
            $url = "https://script.googleusercontent.com/a/macros/aliansyah.com/echo?user_content_key=2o2Qrh_XttLzVLDkINngQcGb4co_J3ENMX0jzXcGHx66PR-WxrTMi4XCBoxGe8OHbK6ggNjgcoCuM3x2ku3fWpTGbHU4Vl7oOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMi80zadyHLKAn2qniJOD0BVOj1FaQ-S-sS4chwneYR2ulBACadk7J9JYpyfgfB9-BhGxHlGtf7yQbwcRZkXFUhffI5O4wJEFB3nuMwpf-d5Gj6qQMjqvulmo_6inQ6QkmTufBfXQWvRk&lib=MX6Dimxu5oQYS2KeuzvbToOj-0yJRUXWL";
            break;
        case "2":
            $model = AgusA::class;
            $url = "https://script.google.com/macros/s/AKfycbwBimGuuG2YWel3WgagVi5XfWwe2r3XRMV0tqCT3VZPYibgx2j28Xl_1qdvfdeA7JmvjA/exec";
            break;
        case "3":
            $model = Zaenal::class;
            $url = "https://script.google.com/macros/s/AKfycbxTAnHPO6bEcOZtCH9Kad2d3AwH0ztm3166fWJMlO5Y0QDYNg5PWs3bsTaeokw5BD77uQ/exec";
            break;
        case "4":
            $model = Zaenuddin::class;
            $url = "https://script.google.com/macros/s/AKfycbyv_UnGfNcwatUlGJ20JvsmbPS81hVXLSBrzm9IE_1elJi5q2jZMN1s_dUFX4EErwBE/exec";
            break;
        case "5":
            $model = Junaidi::class;
            $url = "https://script.google.com/macros/s/AKfycbyvnVGLHLky298FLdjjBlsiqKDoHKfTKDfB1-OqOlyBUKHBFb39GteijyBpXtlDJuib/exec";
            break;
        default:
            abort(403, 'Unauthorized action.');
    }

    // Hapus data sebelumnya
    $model::truncate();

    try {
        $client = new Client();
        $response = $client->request('GET', $url, ['verify' => false]);
        $data = json_decode($response->getBody());
    
        // Filter data kosong atau tidak valid
        // $order = collect($data)->filter(function ($ord) {
        //     return !empty($ord->tgl_penawaran) && !empty($ord->tanggal_do) &&
        //            !empty($ord->nama_sales) && !empty($ord->nama_customer) &&
        //            !empty($ord->nama_produk);
        // });
    
    } catch (\Throwable $th) {
        return redirect()->back()->with('delete', 'Data Repeat Order Gagal di Sinkronisasi!');
    }

    foreach ($data as $ord) {
        try {
        // Validasi data sebelum disimpan
        $tanggal_penawaran = !empty($ord->tgl_penawaran) ? DateTime::createFromFormat('d-m-Y', $ord->tgl_penawaran) : null;
            $tanggal_do = !empty($ord->tanggal_do) ? DateTime::createFromFormat('d-m-Y', $ord->tanggal_do) : null;

            $model::create([
                'tanggal_penawaran' => $tanggal_penawaran ? $tanggal_penawaran->format('Y-m-d') : null,
                'tanggal_do' => $tanggal_do ? $tanggal_do->format('Y-m-d') : null,
                'sales' => $ord->nama_sales ?? null,
                'customer' => $ord->nama_customer ?? null,
                'produk' => $ord->nama_produk ?? null,
                'qty' => $ord->total_qty ?? null,
                'msk' => $ord->jenis_msk ?? null,
                'checklist_do' => $ord->checklist_do ?? null,
            ]);
        // } else {
        //     return redirect()->back()->with('error', 'Format tanggal tidak valid untuk order ' . ($ord->nama_customer ?? 'tanpa nama'));
        // }
        }catch (\Exception $e) {
            // Log error untuk data yang gagal disimpan
            Log::error('Gagal menyimpan data Repeat Order: ', ['error' => $e->getMessage(), 'data' => $ord]);
        }
    }

    return redirect()->back()->with('success', 'Data Repeat Order berhasil disinkronisasi!');
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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
}
