<?php

namespace App\Http\Controllers\pemeriksaanawal;

use App\Mymodels\member;
use App\Mymodels\patient;
use App\Mymodels\room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date('Y-m-d');
        $patients = Patient::where('tanggalkunjungan',$today)->orderBy('created_at', 'asc')->get();
        return view('pemeriksaanawal/daftarpasien', [
            'patients' => $patients
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
        $pasien = patient::findOrFail($id);
        $rooms = room::where('id', '<', 10)->get();
        return view('pemeriksaanawal/vitalsign', [
            'pasien' => $pasien,
            'rooms' => $rooms
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
        $rooms = room::where('id', '<', 10)->get();
        $pasien = patient::findOrFail($id);
        return view('pemeriksaanawal/forminputvitalsign', [
            'pasien' => $pasien,
            'rooms' => $rooms
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
        $request->validate([
            'keluhanutama' => 'required',
            'tinggibadan' => 'required',
            'beratbadan' => 'required',
            'lingkarperut' => 'required',
            'tekanandarah' => 'required',
            'pernafasan' => 'required',
            'detakjantung' => 'required',
            'suhu' => 'required',
            'pemeriksaanawal' => 'required',
            'room_id' => 'required'
        ]);

        patient::where('id',$id)->update([
            'keluhanutama' => $request -> keluhanutama,
            'tinggibadan' => $request -> tinggibadan,
            'beratbadan' => $request -> beratbadan,
            'lingkarperut' => $request -> lingkarperut,
            'tekanandarah' => $request -> tekanandarah,
            'pernafasan' => $request -> pernafasan,
            'detakjantung' => $request -> detakjantung,
            'suhu' => $request -> suhu,
            'pemeriksaanawal' => $request -> pemeriksaanawal,
            'room_id' => $request -> room_id,
            'selesai' => 1 ,
        ]);

        return redirect('/pemeriksaanawal/pasien')->with('status', 'Pemeriksaan Awal Telah Di Input');
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
