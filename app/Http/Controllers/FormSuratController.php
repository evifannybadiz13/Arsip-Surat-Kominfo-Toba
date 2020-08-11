<?php

namespace App\Http\Controllers;
use App\FormSurat;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generatePDF($id)

    {
        $pdf= FormSurat::find($id);
        $pdf = PDF::loadView('form_surat_pdf',compact ('pdf'));
        return $pdf->download('surat-final.pdf');
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
            return back();
        }else{
            $cari = $request->get('search');
        if($cari != ''){
            $form_surat= FormSurat::where('pengirim','LIKE','%'.$cari.'%')
            ->orwhereYear('created_at','LIKE','%'.$cari.'%')
            ->orwhere('nomor_surat', 'LIKE', '%'.$cari.'%')
            ->paginate(5);

            if(count ($form_surat) > 0){
                return view ('formsurat.formsurat', ['form_surat' => $form_surat]);
            }else{
                return view('formsurat.formsurat',['form_surat'=>$form_surat])-> with("No Result Found!");
            }
        }
        }

    }

    public function index()
    {
        $tahun=Carbon::now()->year;
        $form_surat = FormSurat::whereYear('created_at',$tahun)
        ->orderBy('id','DESC')
        ->paginate();
        return view('formsurat.formsurat', compact ('form_surat','tahun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formsurat.tambah_surat');
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
            "sifat.required" => "Masukkan Sifat Surat",
            "lampiran.required" => "Masukkan Lampiran Surat",
            "pengirim.required" => "Masukkan Pengirim Surat",
            "perihal.required" => "Masukkan Perihal Surat",
            "penerima.required" => "Pilih Penerima Surat",
            "isi.required" => "Masukkan Isi Surat"
        ];


        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'sifat' => 'required',
            'lampiran' => 'required',
            'pengirim' => 'required',
            'perihal' =>'required',
            'penerima' =>'required',
            'isi' =>'required',
        ], $messages);

        if($validator->fails()){
            toastr()->error("Pastikan Semua Form Terisi");
            return back()->withErrors($validator)->withInput();
        }else{


            $form_surat=new FormSurat;
            $form_surat->nomor_surat=$request->nomor_surat;
            $form_surat->sifat=$request->sifat;
            $form_surat->lampiran=$request->lampiran;
            $form_surat->perihal=$request->perihal;
            $form_surat->penerima=$request->penerima;
            $form_surat->pengirim=$request->pengirim;
            $form_surat->isi=$request->isi;

            toastr()->success("Surat Keluar Berhasil Ditambah");
            $form_surat->save();
            return redirect('/formsurat');
        }

    }

    public function destroy($id)
    {
        $form_surat = FormSurat:: find($id);
        FormSurat::find($id)->delete();
        toastr()->success("Data Berhasil Dihapus");
        return redirect()->back()->with('Succes','Data Berhasil Dihapus');
    }

    public function opensurat($id)
    {
        $form_surat = FormSurat::find($id);
        $pdf = PDF::loadView('form_surat_pdf',['pdf'=>$form_surat])->setPaper('a4','portrait');
        $filename = $form_surat->nomor_surat;
        return $pdf->stream($filename . '.pdf');
    }

}
