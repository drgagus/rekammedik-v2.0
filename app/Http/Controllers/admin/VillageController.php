<?php

namespace App\Http\Controllers\admin;

use App\Mymodels\room;
use App\Mymodels\head;
use App\Mymodels\village;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VillageController extends Controller
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
        $villages = village::get();
        return view('admin/daftardesa', [
            'villages' => $villages,
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
            'id' => 'required|integer|unique:villages',
            'desa' => 'required',
        ]);

        $village = new village ;
        $village -> id = $request -> id ;
        $village -> desa = $request -> desa ;
        $village ->save();
        
        return redirect('/admin/desa')->with('status', 'Desa/Kelurahan Baru Berhasil Ditambahkan.');
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
        $desa = village::findOrFail($id);
        $villages = village::get();
        return view('admin/formeditdesa', [
            'villages' => $villages,
            'desa' => $desa,
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
            'id' => 'required|integer',
            'desa' => 'required',
        ]);

        village::where('id',$id)->update([
            'id' => $request -> id,
            'desa' => $request -> desa
            ]);
    
            return redirect()->to('/admin/desa')->with('status', 'Nama Desa/Kelurahan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $heads = head::where('village_id',$id)->get();
        if (count($heads)):
            return redirect('/admin/desa')->with('status', 'Desa/Kelurahan Tidak Dapat Dihapus.');
        else:
            village::destroy($id);
            return redirect('/admin/desa')->with('status', 'Desa/Kelurahan Berhasil Dihapus.');
        endif;
    }
}
