<?php

namespace App\Providers;
use DB;
use View;
use App\SuratMasuk;
use App\Disposisi;
use App\SuratKeluar;
use Carbon\Carbon;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        $aplikasi = DB::select(DB::raw("SELECT * FROM `disposisis` WHERE `disposisi` ='aplikasi' AND `status_kabid` = 'Menunggu'"));
        $skdi = DB::select(DB::raw("SELECT * FROM `disposisis` WHERE `disposisi` ='skdi' AND `status_kabid` = 'Menunggu'"));
        $statistik = DB::select(DB::raw("SELECT * FROM `disposisis` WHERE `disposisi` ='statistik' AND `status_kabid` = 'Menunggu'"));

        $jml_surat_masuk = SuratMasuk::whereYear('tgl_terima', Carbon::now()->year)->get();
        $jml_surat_keluar = SuratKeluar::whereYear('created_at', Carbon::now()->year)->get();
        $jml_disposisi = Disposisi::whereYear('created_at', Carbon::now()->year)->get();
        $tahun = Carbon::now()->year;


        View::share('skdi',$skdi);
        View::share('aplikasi',$aplikasi);
        View::share('statistik',$statistik);
        View::share('jml_surat_masuk',$jml_surat_masuk);
        View::share('jml_surat_keluar',$jml_surat_keluar);
        View::share('jml_disposisi',$jml_disposisi);
        View::share('tahun',$tahun);
    }
}
