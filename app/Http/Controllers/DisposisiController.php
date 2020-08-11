<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disposisi;
use DB;
use PDF;
use View;
use App\SuratMasuk;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user()->role;
        if($user=='admin' ){
            $disposisi = Disposisi::whereYear('created_at',Carbon::now()->year)->where('status_admin','Belum')->orderBy('id','DESC')->paginate();
            return view('disposisi.index',compact('disposisi'));

        }elseif($user=='skdi'){
            $jumlah = DB::select(DB::raw("SELECT * FROM `disposisis`  WHERE `disposisi` ='skdi' AND `status_kabid` = 'Menunggu'"));
            $disposisi = Disposisi::where('status_admin','Sudah')
                                  ->where('disposisi','skdi')
                                  ->orderBy('id','DESC')
                                  ->paginate();
            return view('disposisi_skdi.index',compact('disposisi','jumlah'));

        }elseif($user=='aplikasi'){
            $disposisi = Disposisi::where('status_admin','Sudah')->where('disposisi','aplikasi')->orderBy('id','DESC')->paginate();
            $jumlah = DB::select(DB::raw("SELECT * FROM `disposisis` WHERE `disposisi` ='aplikasi' AND `status_kabid` = 'Menunggu' "));
            return view('disposisi_aplikasi.index',compact('disposisi','jumlah'));

        }elseif($user=='statistik'){
            $jumlah = DB::select(DB::raw("SELECT * FROM `disposisis`  WHERE `disposisi` ='statistik' AND `status_kabid` = 'Menunggu'"));
            $disposisi = Disposisi::where('status_admin','Sudah')->where('disposisi','statistik')->orderBy('id','DESC')->paginate();
            return view('disposisi_statistik.index',compact('disposisi','jumlah'));

        }elseif($user=='kadis'){
            $disposisi = DB::select(DB::raw("SELECT * FROM `disposisis` WHERE `status_admin` = 'Sudah' "));
            return view('disposisi.index',compact('disposisi'));

        }else{
            $disposisi = DB::select(DB::raw("SELECT * FROM `disposisis` WHERE `status_admin` = 'Sudah' "));
            return view('disposisi.index',compact('disposisi'));
        }

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
        $disposisi = Disposisi::find($id);
        return view('disposisi.show',compact('disposisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $messages = [
            "sifat.required" => "Pilih Sifat Surat",
            "disposisi_sekdis.required" => "Masukkan Disposisi Sekretaris",
            "disposisi_kadis.required" => "Masukkan Disposisi Kepala Dinas"
        ];

        $validator = Validator::make($request->all(), [
            'sifat' => 'required',
            'disposisi_sekdis' => 'required',
            'disposisi_kadis' => 'required'
        ], $messages);

        if($validator->fails()){
            toastr()->error("Pastikan Form Terisi");
            return back()->withErrors($validator)->withInput();
        }else{
            $disposisi= Disposisi::find($id);
            $disposisi->sifat = $request->sifat;
            $disposisi->disposisi = $request->disposisi;
            $disposisi->disposisi_sekdis = $request->disposisi_sekdis;
            $disposisi->disposisi_kadis = $request->disposisi_kadis;
            $disposisi->status_admin ='Sudah';
            $disposisi->status_kabid='Menunggu';
            $disposisi->save();
            toastr()->success("Berhasil Melakukan disposisi");
            return redirect('/disposisi');
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function terdisposisi(){
        $tahun = Carbon::now()->year;
        $disposisi = Disposisi::whereYear('created_at',$tahun)->where('status_admin','Sudah' )->orderBy('id','DESC')->paginate();
        return view('disposisi.terdisposisi',compact('disposisi','tahun'));
    }




    //Semua Disposisi
    public function dp_all(){
        $tahun = Carbon::now()->year;
        $disposisi= Disposisi::whereYear('created_at',Carbon::now()->year)->where('status_admin','Sudah')->where('status_kabid','Konfirmasi')->orderBy('id','DESC')->paginate();
        return view('disposisi.all',compact('disposisi','tahun'));
    }

    public function konfirmasi(Request $request, $id){

        $messages = [
            "disposisi_kabid.required" => "Disposisi Kabid Masih Kosong",
        ];

        $validator = Validator::make($request->all(), [
            'disposisi_kabid' => 'required'
        ], $messages);

        if($validator->fails()){
            toastr()->error("Isi Form Terlebih Dahulu");
            return back()->withErrors($validator)->withInput();
        }else{
            $disposisi = Disposisi::find($id);
            $disposisi->disposisi_kabid = $request->disposisi_kabid;
            $disposisi->status_kabid = 'Konfirmasi';
            $disposisi->save();
            toastr()->success("Konfirmasi Berhasil");
            return redirect('/disposisi');

        }
    }

    public function look($id){
        $disposisi = Disposisi::find($id);
        return view('disposisi_skdi.show',compact('disposisi'));
    }

    public function view($id){
        $disposisi = Disposisi::find($id);
        return view('disposisi.view_disposisi',compact('disposisi'));
    }

    public function search_aplikasi(Request $request){
        $messages=[
            "search.required" => "Masukkan Pencarian"
        ];

        $validator = validator::make($request->all(),[
          'search' => 'required'
        ], $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
          }else{
            $cari = $request->get('search');
            if($cari != ''){
                $disposisi = DB::select(DB::raw("SELECT * FROM `disposisis`  WHERE `disposisi` ='aplikasi' AND (`pengirim` LIKE '%$cari%' OR `perihal` LIKE '%$cari%') order by `id` DESC "));
                $jumlah= DB::select(DB::raw("SELECT * FROM `disposisis`  WHERE `disposisi` ='aplikasi' AND  `status_kabid` = 'Menunggu' AND(`pengirim` LIKE '%$cari%' OR `perihal` LIKE '%$cari%')"));
                if(count ($disposisi) > 0){
                    return view ('disposisi_aplikasi.index', ['disposisi' => $disposisi]);
                }else{
                    return view('disposisi_aplikasi.index',compact('disposisi','jumlah'));
                }
            }
          }

    }

    public function search_all(Request $request){
        $messages=[
            "search.required" => "Masukkan Pencarian"
        ];

        $validator = validator::make($request->all(),[
          'search' => 'required'
        ], $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
          }else{
            $cari = $request->get('search');
            if($cari != ''){
                $disposisi= Disposisi::where('nomor_surat','LIKE','%'.$cari.'%')
                ->orwhere('perihal', 'LIKE', '%'.$cari.'%')
                ->orderBy('id','DESC')
                ->paginate(5)
                ->setpath('');

                if(count ($disposisi) > 0){
                    return view ('disposisi.all', ['disposisi' => $disposisi]);
                }else{
                    return view('disposisi.all',['disposisi' => $disposisi])-> with("No Result Found!");
                }
            }
          }

    }


    public function search_skdi(Request $request){
        $messages=[
            "search.required" => "Masukkan Pencarian"
        ];

        $validator = validator::make($request->all(),[
          'search' => 'required'
        ], $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
          }else{
            $cari = $request->get('search');
            if($cari != ''){
                $jumlah= DB::select(DB::raw("SELECT * FROM `disposisis`  WHERE `disposisi` ='skdi' AND  `status_kabid` = 'Menunggu' AND(`pengirim` LIKE '%$cari%' OR `perihal` LIKE '%$cari%')"));
                $disposisi = DB::select(DB::raw("SELECT * FROM `disposisis`  WHERE `disposisi` ='skdi' AND (`pengirim` LIKE '%$cari%' OR `perihal` LIKE '%$cari%') order by `id` DESC "));
                if(count ($disposisi) > 0){
                    return view ('disposisi_skdi.index', ['disposisi' => $disposisi,'jumlah'=>$jumlah]);
                }else{
                    return view('disposisi_skdi.index',['disposisi'=>$disposisi, 'jumlah'=>$jumlah])-> with("No Result Found!");
                }
            }
          }
    }


    public function search_statistik(Request $request){
        $messages=[
            "search.required" => "Masukkan Pencarian"
        ];

        $validator = validator::make($request->all(),[
          'search' => 'required'
        ], $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
          }else{
            $cari = $request->get('search');
            if($cari != ''){
                $jumlah= DB::select(DB::raw("SELECT * FROM `disposisis`  WHERE `disposisi` ='statistik' AND  `status_kabid` = 'Menunggu' AND(`pengirim` LIKE '%$cari%' OR `perihal` LIKE '%$cari%')"));
                $disposisi = DB::select(DB::raw("SELECT * FROM `disposisis`  WHERE `disposisi` ='statistik' AND (`pengirim` LIKE '%$cari%' OR `perihal` LIKE '%$cari%') order by `id` DESC "));
                if(count ($disposisi) > 0){
                    return view ('disposisi_statistik.index', ['disposisi' => $disposisi,'jumlah'=>$jumlah]);
                }else{
                    return view('disposisi_statistik.index',['disposisi' => $disposisi, 'jumlah'=>$jumlah])-> with("No Result Found!");
                }
            }
          }
    }

    public function search(Request $request){
        $messages=[
            "search.required" => "Masukkan Pencarian"
        ];

        $validator = validator::make($request->all(),[
          'search' => 'required'
        ], $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }else{
            $cari = $request->get('search');
            if($cari != ''){
                $disposisi = Disposisi::where('pengirim','LIKE','%' .$cari.'%')
                ->orwhere('perihal', 'LIKE', '%'.$cari.'%')
                ->paginate(5)
                ->setpath('');

                if(count ($disposisi) > 0){
                    return view ('disposisi.index', ['disposisi' => $disposisi]);
                }else{
                    return view('disposisi.index',['disposisi' =>$disposisi])-> with("No Result Found!");
                }
            }
        }
    }

    public function search_terdispo(Request $request){
        $messages=[
            "search.required" => "Masukkan Pencarian"
        ];

        $validator = validator::make($request->all(),[
          'search' => 'required'
        ], $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }else{
            $cari = $request->get('search');
            if($cari != ''){
                $disposisi = Disposisi::where('nomor_surat','LIKE','%' .$cari.'%')
                ->where('status_kabid','Konfirmasi')
                ->orwhere('perihal', 'LIKE', '%'.$cari.'%')
                ->paginate(5)
                ->setpath('');

                if(count ($disposisi) > 0){
                    return view ('disposisi.terdisposisi', ['disposisi' => $disposisi]);
                }else{
                    return view('disposisi.terdisposisi',['disposisi'=>$disposisi])-> with("No Result Found!");
                }
            }
        }

    }

    public function print_view($id){
        $disposisi = SuratMasuk::find($id);
        $pdf = PDF::loadView('pdf.Disposisi',['pdf'=>$disposisi])->setPaper('a4','portrait');
        $filename = $disposisi->nomor_surat;
        return $pdf->stream($filename . '.pdf');
    }

    public function pdf_terdisposisi($id){
        $pdf= Disposisi::find($id);
        $pdf=PDF::loadview('pdf-terdisposisi.Disposisi',compact('pdf'));
        return $pdf->stream('Disposisi_Terdiposisi.pdf');
    }

    public function show_konfir($id){
        $disposisi = Disposisi::find($id);
        return view('disposisi_skdi.konfirmasi',compact('disposisi'));

    }

    public function destroy($id){
        $disposisi = Disposisi::find($id);
        $disposisi->delete();
        toastr()->success("Berhasil Menghapus Disposisi");
        return redirect("/disposisi");
    }
}
