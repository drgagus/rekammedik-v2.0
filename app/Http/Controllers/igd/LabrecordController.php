<?php

namespace App\Http\Controllers\igd;

use Auth;
use App\Mymodels\medicalrecord;
use App\Mymodels\labrecord;
use App\Mymodels\lab;
use App\Mymodels\typeoflab;
use App\Mymodels\member;
use App\Mymodels\room;
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
        $medicalrecord = medicalrecord::findOrFail($id);
        $pasien = member::findOrFail($medicalrecord->member_id) ;
        $typeoflabs = typeoflab::get();
        $poli = room::findOrFail(10);
        return view('igd/forminputlaboratorium', [
            'pasien'=> $pasien,
            'medicalrecord' => $medicalrecord,
            'typeoflabs' => $typeoflabs,
            'poli' => $poli
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
        $user_id = Auth::user()->id;
        $medicalrecordid = $request->medicalrecord_id;
        $labs = lab::get();
        foreach ($labs as $lab):
            $labid = $lab->id;
            $hasil = 'hasil'.$labid;
            if ($request->$hasil):
                $labrecord = new labrecord ;
                $labrecord -> medicalrecord_id = $medicalrecordid ;
                $labrecord -> lab_id = $labid ;
                $labrecord -> hasil = $request->$hasil ;
                $labrecord -> user_id = $user_id ;
                $labrecord ->save();

            else:
            endif;
        endforeach;
        return redirect()->to('/igd/pasien')->with('status', 'Hasil pemeriksaan berhasil diinput');
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
        $medicalrecord = medicalrecord::findOrFail($id);
        $pasien = member::findOrFail($medicalrecord->member_id) ;
        $typeoflabs = typeoflab::get();
        $labrecords = labrecord::where('medicalrecord_id', $medicalrecord->id)->get();
        $poli = room::findOrFail(10);
        return view('igd/formeditlaboratorium', [
            'pasien'=> $pasien,
            'medicalrecord' => $medicalrecord,
            'typeoflabs' => $typeoflabs,
            'labrecords' => $labrecords,
            'poli' => $poli
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
        $labs = lab::get();
        $labrecords = labrecord::where('medicalrecord_id', $medicalrecordid)->get();
        foreach ($labs as $lab):
            $labid = $lab->id;
            $hasil = 'hasil'.$labid;
            //  echo $request->$hasil.'<br>';
            //  echo $labid.'<br>';
            if ($request->$hasil):
                foreach ($labrecords as $labrecord):
                        if ($labrecord->lab_id == $lab->id):
                            labrecord::where('id',$labrecord->id)->where('lab_id',$labrecord->lab_id)->update([
                                'hasil' => $request -> $hasil
                                ]);
                        endif;
                endforeach;
                foreach ($labrecords as $labrecord):
                    if ($labrecord->lab_id == $lab->id):
                    else:
                        $labrecord = new labrecord ;
                        $labrecord -> medicalrecord_id = $medicalrecordid ;
                        $labrecord -> lab_id = $labid ;
                        $labrecord -> hasil = $request->$hasil ;
                        $labrecord -> user_id = $user_id ;
                        $labrecord ->save();
                    endif;
                endforeach;
            else:
                foreach ($labrecords as $labrecord):
                    if ($labrecord->lab_id == $lab->id):
                        labrecord::destroy($labrecord->id);
                    endif;
                endforeach;
            endif;
        endforeach;
        return redirect()->to('/igd/pasien')->with('status', 'Hasil pemeriksaan berhasil diedit');
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

    public function update2(Request $request, $id)
    {
        $medicalrecordid = $request->medicalrecord_id;
        $labs = lab::get();
        $labrecords = labrecord::where('medicalrecord_id', $medicalrecordid)->get();
        foreach ($labs as $lab):
            $labid = $lab->id;
            $hasil = 'hasil'.$labid;
            //  echo $request->$hasil.'<br>';
            //  echo $labid.'<br>';
            if ($request->$hasil):
                foreach ($labrecords as $labrecord):
                        if ($labrecord->lab_id == $lab->id):
                            labrecord::where('id',$labrecord->id)->where('lab_id',$labrecord->lab_id)->update([
                                'hasil' => $request -> $hasil
                                ]);
                        else:
                            $labrecord = new labrecord ;
                            $labrecord -> medicalrecord_id = $medicalrecordid ;
                            $labrecord -> lab_id = $labid ;
                            $labrecord -> hasil = $request->$hasil ;
                            $labrecord ->save();
                        endif;
                endforeach;
            else:
                foreach ($labrecords as $labrecord):
                    if ($labrecord->lab_id == $lab->id):
                        labrecord::destroy($labrecord->id);
                    endif;
                endforeach;
            endif;
        endforeach;
        return redirect()->to('/igd/pasien')->with('status', 'Hasil pemeriksaan berhasil diedit');
    }
}
