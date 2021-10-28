<?php

namespace App\Http\Controllers\laboratorium;

use Auth;
use App\Mymodels\medicalrecord;
use App\Mymodels\typeoflab;
use App\Mymodels\labrecord;
use App\Mymodels\member;
use App\Mymodels\patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LabrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasiens = medicalrecord::where('tanggalkunjungan', date('Y-m-d'))->where('diag_id', '!=', null)->orderBy('updated_at', 'desc')->get();
        $patients = medicalrecord::where('tanggalkunjungan', date('Y-m-d'))->where('diag_id', null)->orderBy('updated_at', 'desc')->get();
        return view('laboratorium/daftarpasien', [
            'pasiens' => $pasiens,
            'patients' => $patients,
        ]);
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
        $medicalrecord = medicalrecord::findOrFail($id);
        $pasien = member::findOrFail($medicalrecord->member_id) ;
        $typeoflabs = typeoflab::get();
        $labrecords = labrecord::where('medicalrecord_id', $medicalrecord->id)->get();

        return view('laboratorium/detailhasillaboratorium', [
            'pasien'=> $pasien,
            'medicalrecord' => $medicalrecord,
            'typeoflabs' => $typeoflabs,
            'labrecords' => $labrecords
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicalrecord = medicalrecord::where('id', $id)->where('tanggalkunjungan', date('Y-m-d'))->where('diag_id', null)->firstOrFail();
        $pasien = member::findOrFail($medicalrecord->member_id) ;
        $typeoflabs = typeoflab::get();
        $labrecords = labrecord::where('medicalrecord_id', $medicalrecord->id)->get();

        return view('laboratorium/formedithasillaboratorium', [
            'pasien'=> $pasien,
            'medicalrecord' => $medicalrecord,
            'typeoflabs' => $typeoflabs,
            'labrecords' => $labrecords
        ]);
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
        $user_id = Auth::user()->id;
        $medicalrecordid = $request->medicalrecord_id;
        $labrecords = labrecord::where('medicalrecord_id', $medicalrecordid)->get();

        foreach ($labrecords as $labrecord):
            $labrecordid = $labrecord->id;
            $labid = $labrecord->lab_id;
            $hasil = 'hasil'.$labid;
                labrecord::where('id',$labrecordid)->where('lab_id',$labid)->update([
                    'hasil' => $request -> $hasil,
                    'user_id' => $user_id
                    ]);
        endforeach;
        
        return redirect()->to('/laboratorium/pasien')->with('status', 'Hasil pemeriksaan berhasil diinput');
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
