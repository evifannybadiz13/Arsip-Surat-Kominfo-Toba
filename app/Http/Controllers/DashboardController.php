<?php

namespace App\Http\Controllers;
use App\Disposisi;
use DB;
use App\SuratMasuk;
use Illuminate\Http\Request;
use App\Charts\BloodPressureChart;
use App\SuratKeluar;

use Carbon\Carbon;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SURAT MASUK
        $surat= SuratMasuk::whereYear('tgl_terima', Carbon::now()->year)
        ->select(DB::raw('count(id) total'),DB::raw('MONTH(tgl_terima) as month'))
               ->groupby('month' )
               ->get();

        $year = [0,0,0,0,0,0,0,0,0,0,0,0];//initialize all months to 0

        foreach($surat as $key){
            $year[$key->month-1] = $key->total;//update each month with the total value
        }

        //AKHIR SURAT MASUK

        //SURAT KELUAR
        $surat= SuratKeluar::whereYear('tanggal_surat', Carbon::now()->year)
        ->select(DB::raw('count(id) total2'),DB::raw('MONTH(tanggal_surat) as month2'))
        ->groupby('month2' )
        ->get();

        $tahun = [0,0,0,0,0,0,0,0,0,0,0,0];//initialize all months to 0

        foreach($surat as $key){
            $tahun[$key->month2-1] = $key->total2;//update each month with the total value
        }
        //AKHIR SURAT KELUAR

        $Chart= new BloodPressureChart;
        $Chart->labels(['Jan', 'Feb', 'Mar','April','Mei','Juni','Juli','Agus','September','Okto','Nove','Des']);
        $Chart->dataset('Surat Masuk '. Carbon::now()->year, 'bar',$year)
                    ->color("rgb(30,144,255)")
                    ->backgroundcolor("rgb(30,144,255)");
        $Chart->dataset('Surat Keluar '. Carbon::now()->year, 'bar',$tahun)
                    ->color("rgb(192,192,192)")
                    ->backgroundcolor("rgb(192,192,192)");

        return view('Home.dashboard',['chart'=>$Chart]);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
