<?php

namespace App\Http\Controllers\poliumum;

use App\Mymodels\labrecord;
use App\Mymodels\typeoflab;
use App\Mymodels\lab;
use App\Mymodels\member;
use App\Mymodels\medicalrecord;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $medicalrecord = medicalrecord::where('id',$id)->where('room_id', 1)->where('tanggalkunjungan', date('Y-m-d'))->firstOrFail();
        $typeoflabs = typeoflab::get();
        $pasien = member::findOrFail($medicalrecord->member_id) ;
        
        return view('poliumum/formceklab', [
            'pasien'=> $pasien,
            'medicalrecord' => $medicalrecord,
            'typeoflabs' => $typeoflabs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicalrecordid = $request->medicalrecord_id;
        $labs = lab::get();
        foreach ($labs as $lab):
            $pemeriksaanid = $lab->id;
            $namapemeriksaan = 'pemeriksaan'.$pemeriksaanid;
            if ($request->$namapemeriksaan):
                $labrecord = new labrecord ;
                $labrecord -> medicalrecord_id = $medicalrecordid ;
                $labrecord -> lab_id = $pemeriksaanid ;
                $labrecord ->save();
            endif;
        endforeach;

        return redirect('/poliumum/pasien')->with('status', 'Form Cek-Lab Telah Diisi.');
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
        $medicalrecord = medicalrecord::where('id',$id)->where('room_id', 1)->where('tanggalkunjungan', date('Y-m-d'))->firstOrFail();
        $labrecords = labrecord::where('medicalrecord_id', $medicalrecord->id)->get();
        foreach ($labrecords as $labrecord):
            if ($labrecord->hasil):
                return redirect('/poliumum/pasien')->with('status', 'Form Cek-Lab Tidak Dapat Diubah, Hasil Lab Telah Keluar.');
            else:
            endif;
        endforeach;
        $typeoflabs = typeoflab::get();
        $pasien = member::findOrFail($medicalrecord->member_id) ;
        
        return view('poliumum/formeditceklab', [
            'pasien'=> $pasien,
            'medicalrecord' => $medicalrecord,
            'labrecords' => $labrecords,
            'typeoflabs' => $typeoflabs,
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
        $medicalrecordid = $request->medicalrecord_id;
        $labs = lab::get();
        foreach ($labs as $lab):
            $pemeriksaanid = $lab->id;
            $namapemeriksaan = 'pemeriksaan'.$pemeriksaanid;
            if ($request->$namapemeriksaan):
                $ceklab = labrecord::where('medicalrecord_id', $medicalrecordid)->where('lab_id', $pemeriksaanid)->get();
                if (count($ceklab)):
                else:
                    $labrecord = new labrecord ;
                    $labrecord -> medicalrecord_id = $medicalrecordid ;
                    $labrecord -> lab_id = $pemeriksaanid ;
                    $labrecord ->save();
                endif;
            else:
                $ceklab = labrecord::where('medicalrecord_id', $medicalrecordid)->where('lab_id', $pemeriksaanid)->first();
                if ($ceklab):
                    labrecord::destroy($ceklab->id);
                else:
                endif;
            endif;
        endforeach;

        return redirect('/poliumum/pasien')->with('status', 'Form Cek-Lab Telah Diubah.');
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
