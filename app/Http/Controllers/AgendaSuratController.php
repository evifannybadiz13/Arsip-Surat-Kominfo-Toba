<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use App\SuratKeluar;
use PDF;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AgendaSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function search(Request $request)
    {
      //  $surat_masuk= SuratMasuk::paginate(10);
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
                $agenda_masuk= SuratMasuk::where('pengirim','LIKE','%'.$cari.'%')
                ->orwhere('perihal', 'LIKE', '%'.$cari.'%')
                ->orwhere('nomor_surat','LIKE','%'.$cari.'%')
                ->orwhere('tgl_surat','LIKE', '%'.$cari.'%')
                ->orwhere('tgl_terima','LIKE', '%'.$cari.'%')
                ->orderBy('id','DESC')
                ->paginate()
                ->setpath('');

                if(count ($agenda_masuk) > 0){
                    return view ('agenda.agenda_masuk', ['agenda_masuk' => $agenda_masuk]);
                }else{
                    return view('agenda.agenda_masuk',['agenda_masuk'=>$agenda_masuk])-> with("No Result Found!");
                }
            }

        }


    }

    public function search1(Request $request)
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
                $agenda_keluar= SuratKeluar::where('ditujukan','LIKE','%'.$cari.'%')
                ->orwhere('perihal', 'LIKE', '%'.$cari.'%')
                ->orwhere('nomor_surat','LIKE', '%'.$cari.'%')
                ->orwhere('tanggal_surat','LIKE', '%'.$cari.'%')
                ->orderBy('id','DESC')
                ->paginate()
                ->setpath('');

                if(count ($agenda_keluar) > 0){
                    return view ('agenda.agenda_keluar', ['agenda_keluar' => $agenda_keluar]);
                }else{
                    return redirect('agenda.agenda_keluar',['agenda_keluar'=>$agenda_keluar])-> with("No Result Found!");
                }
            }
        }



    }


    public function generatePDF()

    {
        $agenda_masuk= SuratMasuk::all();
        $pdf = PDF::loadView('agenda_masuk_pdf', ['agenda_masuk' => $agenda_masuk]);
        return $pdf->download('laporan-agenda-masuk.pdf');
    }

    public function index()
    {
        $tahun = Carbon::now()->year;
        $agenda_masuk=SuratMasuk::whereYear('created_at',$tahun)->orderBy('id','DESC')->paginate();
        return view('agenda.agenda_masuk', compact ('agenda_masuk','tahun'));
    }

    public function index1()
    {
        $tahun= Carbon::now()->year;
        $agenda_keluar= SuratKeluar::whereYear('created_at',$tahun)->orderBy('id','DESC')->paginate();
        return view('agenda.agenda_keluar', compact ('agenda_keluar','tahun'));
    }

    public function generatePDF1()

    {
        $agenda_keluar= SuratKeluar::all();
        $pdf = PDF::loadView('agenda_keluar_pdf', ['agenda_keluar' => $agenda_keluar]);
        return $pdf->download('laporan-agenda-keluar.pdf');
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



