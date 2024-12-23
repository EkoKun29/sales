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
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
//     public function index()
// {
//     $models = [
//         "1" => RepeatOrder::class,
//         "2" => AgusA::class,
//         "3" => Zaenal::class,
//         "4" => Zaenuddin::class,
//         "5" => Junaidi::class,
//     ];

//     // Periksa apakah role pengguna valid
//     $role = Auth::user()->role;
//     if (array_key_exists($role, $models)) {
//         // Query sesuai role pengguna
//         $order = $models[$role]::query()->get();
//     } else {
//         // Jika role tidak valid, tampilkan error
//         abort(403, 'Unauthorized action.');
//     }

//     // Return data ke view
//     return view('welcome', compact('order'));
// }


public function index()
{
    // Definisikan role dan API endpoint
    try {
        $client = new Client();
    $apis = [
        "1" => [
            "model" => RepeatOrder::class,
            "url" => "https://script.google.com/macros/s/AKfycbxkOqMtfgxaTuH7RYZpP9S1i0N5Rf0JzYcDD8RiDShaDvrwdGOHeSQlju57sitztJqf/exec",
        ],
        "2" => [
            "model" => AgusA::class,
            "url" => "https://script.google.com/macros/s/AKfycbxnW2q3RP2Teh5q00qm21sXCQiDIC_cJODhEM1ScLoFoe7lBtfXs4G11ll0UcZyXPf6GQ/exec",
        ],
        "3" => [
            "model" => Zaenal::class,
            "url" => "https://script.google.com/macros/s/AKfycbwoyNVEJj6DPvdhZ9-GAseKd7eWQqifBC2h668mkyvRQYT8UqJI27z7kFNXPGp3itApnA/exec",
        ],
        "4" => [
            "model" => Zaenuddin::class,
            "url" => "https://script.google.com/macros/s/AKfycbzl8ui1iPvkJurZojReR1aJBwfsdG4GPMsyCbOgtnLkrpmhONFarxVCYFsRDhJaIM0u/exec",
        ],
        "5" => [
            "model" => Junaidi::class,
            "url" => "https://script.google.com/macros/s/AKfycbw66b5X0SuRcStPh2PpZMWObnVyV-zLPvZEgw2h9jMU4CEhTxO7EOWRxbNdAn1_2JCyRw/exec",
        ],
    ];

    // Periksa apakah role pengguna valid
    $role = Auth::user()->role;
    if (!array_key_exists($role, $apis)) {
        abort(403, 'Unauthorized action.');
    }

    // Ambil model dan API URL berdasarkan role
    $model = $apis[$role]['model'];
    $url = $apis[$role]['url'];

    $response = $client->request('GET', $url, [
        'verify'  => false,
    ]);

    // Decode JSON response dari API
    $apiData = json_decode($response->getBody());

    $DataApi = collect($apiData);
} catch (\Throwable $th) {
    return redirect()->back()->with('danger', 'Gagal Mengambil Data Supplier!.');
}

    // Return data ke view
    return view('welcome', compact('DataApi'));
}

// public function sync()
// {
//     $role = Auth::user()->role;

//     switch ($role) {
//         case "1":
//             $model = RepeatOrder::class;
//             $url = "https://script.google.com/macros/s/AKfycbxkOqMtfgxaTuH7RYZpP9S1i0N5Rf0JzYcDD8RiDShaDvrwdGOHeSQlju57sitztJqf/exec";
//             break;
//         case "2":
//             $model = AgusA::class;
//             $url = "https://script.google.com/macros/s/AKfycbxnW2q3RP2Teh5q00qm21sXCQiDIC_cJODhEM1ScLoFoe7lBtfXs4G11ll0UcZyXPf6GQ/exec";
//             break;
//         case "3":
//             $model = Zaenal::class;
//             $url = "https://script.google.com/macros/s/AKfycbxTAnHPO6bEcOZtCH9Kad2d3AwH0ztm3166fWJMlO5Y0QDYNg5PWs3bsTaeokw5BD77uQ/exec";
//             break;
//         case "4":
//             $model = Zaenuddin::class;
//             $url = "https://script.google.com/macros/s/AKfycbyv_UnGfNcwatUlGJ20JvsmbPS81hVXLSBrzm9IE_1elJi5q2jZMN1s_dUFX4EErwBE/exec";
//             break;
//         case "5":
//             $model = Junaidi::class;
//             $url = "https://script.google.com/macros/s/AKfycbyvnVGLHLky298FLdjjBlsiqKDoHKfTKDfB1-OqOlyBUKHBFb39GteijyBpXtlDJuib/exec";
//             break;
//         default:
//             abort(403, 'Unauthorized action.');
//     }

//     // Hapus data sebelumnya
//     $model::truncate();

//     try {
//         $client = new Client();
//         $response = $client->request('GET', $url, ['verify' => false]);
//         $data = json_decode($response->getBody());
    
//     } catch (\Throwable $th) {
//         return redirect()->back()->with('delete', 'Data Repeat Order Gagal di Sinkronisasi!');
//     }

//     foreach ($data as $ord) {
//         try {
//         // Validasi data sebelum disimpan
//         $tanggal_penawaran = !empty($ord->tgl_penawaran) ? DateTime::createFromFormat('d-m-Y', $ord->tgl_penawaran) : null;
//             $tanggal_do = !empty($ord->tanggal_do) ? DateTime::createFromFormat('d-m-Y', $ord->tanggal_do) : null;

//             $model::create([
//                 'tanggal_penawaran' => $tanggal_penawaran ? $tanggal_penawaran->format('Y-m-d') : null,
//                 'tanggal_do' => $tanggal_do ? $tanggal_do->format('Y-m-d') : null,
//                 'sales' => $ord->nama_sales ?? null,
//                 'customer' => $ord->nama_customer ?? null,
//                 'produk' => $ord->nama_produk ?? null,
//                 'qty' => $ord->total_qty ?? null,
//                 'msk' => $ord->jenis_msk ?? null,
//                 'checklist_do' => $ord->checklist_do ?? null,
//             ]);
//         // } else {
//         //     return redirect()->back()->with('error', 'Format tanggal tidak valid untuk order ' . ($ord->nama_customer ?? 'tanpa nama'));
//         // }
//         }catch (\Exception $e) {
//             // Log error untuk data yang gagal disimpan
//             Log::error('Gagal menyimpan data Repeat Order: ', ['error' => $e->getMessage(), 'data' => $ord]);
//         }
//     }

//     return redirect()->back()->with('success', 'Data Repeat Order berhasil disinkronisasi!');
// }


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
