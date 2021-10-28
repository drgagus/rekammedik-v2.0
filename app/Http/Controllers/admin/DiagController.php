<?php

namespace App\Http\Controllers\admin;

use App\Mymodels\room;
use App\Mymodels\medicalrecord;
use App\Mymodels\diag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiagController extends Controller
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
        $diags = diag::orderBy('diagnosa', 'asc')->paginate(5);
        $rooms = room::get();
        return view('admin/daftardiagnosa', [
            'diags' => $diags,
            'rooms' => $rooms,
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
        $request->validate([
            'room_id' => 'required|integer',
            'kode' => 'required',
            'diagnosa' => 'required',
        ]);

        $diag = new diag ;
        $diag -> room_id = $request->room_id ;
        $diag -> kode = $request -> kode ;
        $diag -> diagnosa = $request -> diagnosa ;
        $diag ->save();
        
        return redirect('/admin/diagnosa')->with('status', 'Diagnosa Baru Berhasil Ditambahkan.');
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
        $poli1 = room::findOrFail(1);
        $poli2 = room::findOrFail(2);
        $poli3 = room::findOrFail(3);
        $poli10 = room::findOrFail(10);
        $diagnosa = diag::findOrFail($id);
        $diags = diag::orderBy('diagnosa', 'asc')->paginate(5);
        $rooms = room::get();
        return view('admin/formeditdiagnosa', [
            'diags' => $diags,
            'rooms' => $rooms,
            'diagnosa' => $diagnosa,
            'poli1' => $poli1,
            'poli2' => $poli2,
            'poli3' => $poli3,
            'poli10' => $poli10
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
            'room_id' => 'required|integer',
            'kode' => 'required',
            'diagnosa' => 'required',
        ]);

        diag::where('id',$id)->update([
            'room_id' => $request -> room_id,
            'kode' => $request -> kode,
            'diagnosa' => $request -> diagnosa
            ]);
    
            return redirect()->to('/admin/diagnosa')->with('status', 'Diagnosa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicalrecords = medicalrecord::where('diag_id',$id)->get();
        if (count($medicalrecords)):
            return redirect('/admin/diagnosa')->with('status', 'Diagnosa Tidak Dapat Dihapus.');
        else:
            diag::destroy($id);
            return redirect('/admin/diagnosa')->with('status', 'Diagnosa Berhasil Dihapus.');
        endif;
    }
}
