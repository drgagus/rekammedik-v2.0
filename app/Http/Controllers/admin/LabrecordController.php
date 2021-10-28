<?php

namespace App\Http\Controllers\admin;

use App\Mymodels\medicalrecord;
use App\Mymodels\labrecord;
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
        $poli1 = room::findOrFail(1);
        $poli2 = room::findOrFail(2);
        $poli3 = room::findOrFail(3);
        $poli10 = room::findOrFail(10);
        $medicalrecords = medicalrecord::orderBy('tanggalkunjungan', 'desc')->paginate(5);
        $labrecords = labrecord::orderBy('medicalrecord_id', 'desc')->paginate(5);
        return view('admin/kunjunganlab', [
            'labrecords' => $labrecords,
            'medicalrecords' => $medicalrecords,
            'poli' => $poli3,
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
