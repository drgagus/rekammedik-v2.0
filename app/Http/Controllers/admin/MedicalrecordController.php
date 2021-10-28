<?php

namespace App\Http\Controllers\admin;

use App\Mymodels\room;
use App\Mymodels\medicalrecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicalrecordController extends Controller
{
    public function poliumum()
    {
        $poli1 = room::findOrFail(1);
        $poli2 = room::findOrFail(2);
        $poli3 = room::findOrFail(3);
        $poli10 = room::findOrFail(10);
        $medicalrecords = medicalrecord::where('room_id', 1)->orderBy('tanggalkunjungan', 'desc')->paginate(5);
        return view('admin/kunjunganpoli', [
            'medicalrecords' => $medicalrecords,
            'poli' => $poli1,
            'poli1' => $poli1,
            'poli2' => $poli2,
            'poli3' => $poli3,
            'poli10' => $poli10
        ]);
    }

    public function poligigi()
    {
        $poli1 = room::findOrFail(1);
        $poli2 = room::findOrFail(2);
        $poli3 = room::findOrFail(3);
        $poli10 = room::findOrFail(10);
        $medicalrecords = medicalrecord::where('room_id', 2)->orderBy('tanggalkunjungan', 'desc')->paginate(5);
        return view('admin/kunjunganpoli', [
            'medicalrecords' => $medicalrecords,
            'poli' => $poli2,
            'poli1' => $poli1,
            'poli2' => $poli2,
            'poli3' => $poli3,
            'poli10' => $poli10
        ]);
    }

    public function polikia()
    {
        $poli1 = room::findOrFail(1);
        $poli2 = room::findOrFail(2);
        $poli3 = room::findOrFail(3);
        $poli10 = room::findOrFail(10);
        $medicalrecords = medicalrecord::where('room_id', 3)->orderBy('tanggalkunjungan', 'desc')->paginate(5);
        return view('admin/kunjunganpoli', [
            'medicalrecords' => $medicalrecords,
            'poli' => $poli3,
            'poli1' => $poli1,
            'poli2' => $poli2,
            'poli3' => $poli3,
            'poli10' => $poli10
        ]);
    }

    public function igd()
    {
        $poli1 = room::findOrFail(1);
        $poli2 = room::findOrFail(2);
        $poli3 = room::findOrFail(3);
        $poli10 = room::findOrFail(10);
        $medicalrecords = medicalrecord::where('room_id', 10)->orderBy('tanggalkunjungan', 'desc')->paginate(5);
        return view('admin/kunjunganpoli', [
            'medicalrecords' => $medicalrecords,
            'poli' => $poli10,
            'poli1' => $poli1,
            'poli2' => $poli2,
            'poli3' => $poli3,
            'poli10' => $poli10
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poli1 = room::findOrFail(1);
        $poli2 = room::findOrFail(2);
        $poli3 = room::findOrFail(3);
        $poli10 = room::findOrFail(10);
        $medicalrecords = medicalrecord::orderBy('tanggalkunjungan', 'desc')->paginate(5);
        return view('admin/daftarkunjungan', [
            'medicalrecords' => $medicalrecords,
            'poli1' => $poli1,
            'poli2' => $poli2,
            'poli3' => $poli3,
            'poli10' => $poli10
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
