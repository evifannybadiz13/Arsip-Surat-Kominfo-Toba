<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use App\Disposisi;
use PDF;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;
use Brian2694\Toastr\Facades\Toastr;
class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generatePDF()

    {
        $surat_masuk= SuratMasuk::all();
        $pdf = PDF::loadView('surat_masuk_pdf', ['surat_masuk' => $surat_masuk]);
        return $pdf->download('laporan-surat-masuk.pdf');
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
            $surat_masuk= SuratMasuk::where('pengirim','LIKE','%'.$cari.'%')
            ->orwhere('perihal', 'LIKE', '%'.$cari.'%')
            ->orwhereYear('tgl_terima','LIKE','%'.$cari.'%')
            ->paginate()
            ->setpath('');

            if(count ($surat_masuk) > 0){
                return view ('surat_masuk.surat_masuk', ['surat_masuk' => $surat_masuk]);
            }else{
                return view('surat_masuk.surat_masuk',compact('surat_masuk'))-> with("No Result Found!");
            }
        }
      }
    }

    public function index()
    {
        $tahun = Carbon::now()->year;
        $surat_masuk= SuratMasuk::whereYear('tgl_terima',$tahun)->orderBy('id','DESC')->paginate();
        return view('surat_masuk.surat_masuk', compact ('surat_masuk','tahun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat_masuk.tambah_surat');
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
            "no_agenda.unique" => "Nomor Agenda Sudah Ada",
            "no_agenda.required" => "Masukkan Nomor Agenda",
            "nomor_surat.required" => "Masukkan Nomor Surat",
            "tgl_surat.required" => "Masukkan Tanggal Surat",
            "tgl_terima" => "Masukkan Tanggal Terima Surat",
            "pengirim.require" => "Masukkan Pengirim Surat",
            "perihal.require" => "Masukkan Perihal Surat"
        ];

        $validator = Validator::make($request->all(), [
            'no_agenda' => 'required|unique:surat_masuks',
            'nomor_surat' => 'required',
            'tgl_surat' => 'required',
            'tgl_terima' => 'required',
            'pengirim' => 'required',
            'perihal' =>'required',
        ], $messages);

        if($validator->fails()){
            toastr()->error('Pastikan Semua Form Terisi');
            return back()->withErrors($validator)->withInput();
        }else{
            $surat_masuk=new SuratMasuk;
        if($request->file('file')){
            $file=$request->file('file');
            $filename=time()."_".$file->getClientOriginalName();
            $request->file->move('file/',$filename);
            $surat_masuk->file=$filename;
        }
        $surat_masuk->no_agenda =$request->no_agenda;
        $surat_masuk->nomor_surat=$request->nomor_surat;
        $surat_masuk->tgl_surat=$request->tgl_surat;
        $surat_masuk->tgl_terima=$request->tgl_terima;
        $surat_masuk->pengirim=$request->pengirim;
        $surat_masuk->perihal=$request->perihal;
        $surat_masuk->save();

        $disposisi= new Disposisi;
        $disposisi->surat_masuk_id = $surat_masuk->id;
        $disposisi->nomor_surat = $request->nomor_surat;
        $disposisi->nomor_agenda = $request->no_agenda;
        $disposisi->tgl_surat = $request->tgl_surat;
        $disposisi->tgl_terima = $request->tgl_terima;
        $disposisi->pengirim = $request->pengirim;
        $disposisi->perihal = $request->perihal;
        $disposisi->status_admin = 'BELUM';
        $disposisi->save();

        toastr()->success('Data Berhasil Ditambah');
        return redirect('/surat_masuk');
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
        $surat_masuk=SuratMasuk::find($id);
        return view('surat_masuk.view_suratmasuk', compact ('surat_masuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat=SuratMasuk::find($id);
        return view('surat_masuk.edit_suratmasuk', compact('surat'));
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
            "no_agenda.required" => "Masukkan Nomor Agenda",
            "nomor_surat.required" => "Masukkan Nomor Surat",
            "tgl_surat.required" => "Masukkan Tanggal Surat",
            "tgl_terima" => "Masukkan Tanggal Terima Surat",
            "pengirim.require" => "Masukkan Pengirim Surat",
            "perihal.require" => "Masukkan Perihal Surat"
        ];

        $validator = Validator::make($request->all(), [
            'no_agenda' => 'required',
            'nomor_surat' => 'required',
            'tgl_surat' => 'required',
            'tgl_terima' => 'required',
            'pengirim' => 'required',
            'perihal' =>'required',
        ], $messages);

        if($validator->fails()){
            toastr()->error("Pastikan Semua Form Terisi");
            return back()->withErrors($validator)->withInput();
        }else{

            $surat_masuk = SuratMasuk::find($id);
            if($request->file('file')){
                $file=$request->file('file');
                $filename=time()."_".$file->getClientOriginalName();
                $request->file->move('file/',$filename);
                $surat_masuk->file=$filename;
            }
            $surat_masuk->no_agenda= $request->no_agenda;
            $surat_masuk->nomor_surat=$request->nomor_surat;
            $surat_masuk->tgl_surat=$request->tgl_surat;
            $surat_masuk->tgl_terima=$request->tgl_terima;
            $surat_masuk->pengirim=$request->pengirim;
            $surat_masuk->perihal=$request->perihal;
            $surat_masuk->save();

            $disposisi = Disposisi::where('surat_masuk_id',$surat_masuk->id)->first();
            $disposisi->nomor_surat = $request->nomor_surat;
            $disposisi->tgl_surat = $request->tgl_surat;
            $disposisi->tgl_terima = $request->tgl_terima;
            $disposisi->pengirim = $request->pengirim;
            $disposisi->perihal = $request->perihal;
            $disposisi->save();
            toastr()->success('Data Berhasil Diubah');
            return redirect('/surat_masuk');
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
        $surat_masuk = SuratMasuk:: find($id);
        SuratMasuk::find($id)->delete();
        toastr()->success('Data Berhasil Dihapus');
        return redirect('/surat_masuk');
    }


}
