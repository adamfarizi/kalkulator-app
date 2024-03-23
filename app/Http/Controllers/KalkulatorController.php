<?php

namespace App\Http\Controllers;

use App\Custom\Kalkulator;
use App\Custom\LanjutanKalkulator;
use App\Models\Perhitungan;
use Illuminate\Http\Request;

class KalkulatorController extends Controller
{   
    public function index()
    {      
        // Function untuk menampilkan blade index
        $a = "";
        $b = "";
        $operasi = "";
        $hasil = "";

        $riwayats = Perhitungan::orderBy('id_perhitungan')->get();
        // Menyimpan data riwayat pada variabel riwayats
        return view('index', [
            'a' => $a,
            'b' => $b,
            'operasi' => $operasi,
            'hasil' => $hasil,
            'riwayats' => $riwayats,
        ]);      
    }
    
    public function hitung(Request $request)
    {   
        // Function untuk memproses aritmatik dan menyimpan di database
        $kalkulator = new Kalkulator();
        $lanjutankalkulator = new LanjutanKalkulator();
        // Memanggil class

        $operasi = $request->input('operasi');
        $a = $request->input('a');
        $b = $request->input('b');
        // Mendeklarasikan input kedalam variabel

        switch ($operasi) {
            case 'tambah':
                $hasil = $kalkulator->tambah($a, $b);
                break;
            case 'kurang':
                $hasil = $kalkulator->kurang($a, $b);
                break;
            case 'kali':
                $hasil = $kalkulator->kali($a, $b);
                break;
            case 'bagi':
                $hasil = $kalkulator->bagi($a, $b);
                break;
            case 'modulo':
                $hasil = $lanjutankalkulator->modulo($a, $b);
                break;
            default:
                $hasil = "Operasi tidak valid";
        }
        // Melakukan operasi aritmatika dengan switch

        Perhitungan::create([
            'a' => $a,
            'operasi' => $operasi,
            'b' => $b,
            'hasil' => $hasil,
        ]);
        // Menyimpan riwayat perhitungan kedalam database

        $riwayats = Perhitungan::orderBy('id_perhitungan')->get();
        
        return view('index', [
            'a' => $a,
            'b' => $b,
            'operasi' => $operasi,
            'hasil' => $hasil,
            'riwayats' => $riwayats,
        ]);
    }

    public function indexRiwayat(Request $request, $id_perhitungan)
    {
        // Function untuk menampilkan kembali riwayat perhitungan
        $riwayat = Perhitungan::where('id_perhitungan', $id_perhitungan)->first();
        $a = $riwayat->a;
        $b = $riwayat->b;
        $operasi = $riwayat->operasi;
        $hasil = $riwayat->hasil;

        $riwayats = Perhitungan::orderBy('id_perhitungan')->get();
        return view('index', [
            'a' => $a,
            'b' => $b,
            'operasi' => $operasi,
            'hasil' => $hasil,
            'riwayats' => $riwayats,
        ]);      
    }
}
