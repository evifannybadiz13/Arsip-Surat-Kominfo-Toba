<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKeluar;
use PDF;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SuratkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generatePDF1(){
        $surat_keluar = SuratKeluar::all();
        $pdf = PDF::loadView('surat_keluar_pdf',compact('surat_keluar'));
        return $pdf->download('laporan-surat-keluar.pdf');
    }

    public function search(Request $request)
    {
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
                $surat_keluar= SuratKeluar::where('nomor_surat','LIKE','%'.$cari.'%')
                ->orwhereYear('tanggal_surat','LIKE','%'.$cari.'%')
                ->orwhere('perihal', 'LIKE', '%'.$cari.'%')
                ->paginate();
                if(count ($surat_keluar) > 0){
                    return view ('surat_keluar.surat_keluar', ['surat_keluar' => $surat_keluar]);
                }else{
                    return view('surat_keluar.surat_keluar',['surat_keluar'=> $surat_keluar])-> with("No Result Found!");
                }
            }
        }

    }

    public function index()
    {
        $tahun = Carbon::now()->year;
        $surat_keluar= SuratKeluar::whereYear('created_at',$tahun)
        ->orderBy('id','DESC')
        ->paginate();
        return view('surat_keluar.surat_keluar', compact ('surat_keluar','tahun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat_keluar.tambah_suratkeluar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            "nomor_surat.required" => "Masukkan Nomor Surat",
            "tanggal_surat.required" => "Masukkan Tanggal Surat",
            "sifat.required" => "Pilih Sifat Surat",
            "pengirim.required" => "Masukkan Pengirim",
            "perihal.required" => "Masukkan Perihal Surat",
            "ditujukan.required" => "Pilih Penerima Surat",
            "isi.required" => "Masukkan Isi Surat"
        ];

        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'sifat' => 'required',
            'pengirim' => 'required',
            'perihal' =>'required',
            'ditujukan' =>'required',
            'isi' =>'required'
        ], $messages);

        if($validator->fails()){
            toastr()->error("Pastikan Semua Form Terisi");
            return back()->withErrors($validator)->withInput();
        }else{
            $surat_keluar=new SuratKeluar;
            $surat_keluar->nomor_surat=$request->nomor_surat;
            $surat_keluar->tanggal_surat=$request->tanggal_surat;
            $surat_keluar->sifat=$request->sifat;
            $surat_keluar->pengirim=$request->pengirim;
            $surat_keluar->perihal=$request->perihal;
            $surat_keluar->ditujukan=$request->ditujukan;
            $surat_keluar->isi=$request->isi;
            $surat_keluar->save();
            toastr()->success("Data Surat Keluar Berhasil Ditambahkan");
            return redirect('/surat_keluar');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat_keluar=SuratKeluar::find($id);
        return view('surat_keluar.view_suratkeluar', compact ('surat_keluar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat_keluar=SuratKeluar:: find($id);
        return view('surat_keluar.edit_suratkeluar', compact ('surat_keluar'));
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
            "nomor_surat.required" => "Masukkan Nomor Surat",
            "tanggal_surat.required" => "Masukkan Tanggal Surat",
            "sifat.required" => "Pilih Sifat Surat",
            "pengirim.required" => "Masukkan Pengirim Surat",
            "perihal.required" => "Masukkan Perihal Surat",
            "ditujunkan.required" => "Pilih Penerima Surat",
            "isi.required" => "Masukkan Isi Surat"
        ];

        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'sifat' => 'required',
            'pengirim' => 'required',
            'perihal' => 'required',
            'ditujukan' => 'required',
            'isi' => 'required'
        ], $messages);

        if($validator->fails()){
            toastr()->error("Pastikan Semua Form Terisi");
            return back()->withErrors($validator)->withInput();
        }else{
            $surat_keluar = SuratKeluar:: find($id);
            $surat_keluar->nomor_surat=$request->nomor_surat;
            $surat_keluar->tanggal_surat=$request->tanggal_surat;
            $surat_keluar->sifat = $request->sifat;
            $surat_keluar->pengirim=$request->pengirim;
            $surat_keluar->perihal = $request->perihal;
            $surat_keluar->ditujukan=$request->ditujukan;
            $surat_keluar->isi=$request->isi;
            $surat_keluar->save();
            toastr()->success("Surat Keluar Berhasi Diubah");
            return redirect('/surat_keluar');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat_keluar = SuratKeluar:: find($id);
        SuratKeluar::find($id)->delete();

        return redirect('/surat_keluar');
    }
}
