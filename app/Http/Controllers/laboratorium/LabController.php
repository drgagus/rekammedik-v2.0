<?php

namespace App\Http\Controllers\laboratorium;
use App\Mymodels\typeoflab;
use App\Mymodels\lab;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeoflabs = typeoflab::get();
        $labs = lab::get();
        return view('laboratorium/daftarpemeriksaan', [
            'typeoflabs' => $typeoflabs,
            'labs' => $labs
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
            'typeoflab_id' => 'required',
            'pemeriksaan' => 'required',
        ]);

        $lab = new lab ;
        $lab -> typeoflab_id = $request->typeoflab_id ;
        $lab -> pemeriksaan = $request -> pemeriksaan ;
        $lab -> satuan =  $request -> satuan;
        $lab -> active =  $request -> active;
        $lab ->save();
    
        return redirect()->to('/laboratorium/pemeriksaan')->with('status', 'Pemeriksaan berhasil ditambahkan');
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
        $typeoflabs = typeoflab::get();
        $labs = lab::get();
        $lab = lab::findOrFail($id);
        return view('laboratorium/formeditpemeriksaan', [
            'typeoflabs' => $typeoflabs,
            'labs' => $labs,
            'lab' => $lab
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
            'typeoflab_id' => 'required',
            'pemeriksaan' => 'required',
        ]);

        $pemeriksaan = lab::findOrFail($id);
        lab::where('id',$id)->update([
            'typeoflab_id' => $request -> typeoflab_id,
            'pemeriksaan' => $request -> pemeriksaan,
            'satuan' => $request -> satuan,
            'active' => $request -> active
            ]);
    
            return redirect()->to('/laboratorium/pemeriksaan')->with('status', 'Pemeriksaan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lab = lab::findOrFail($id);
        if (count($lab->labrecord)):
            return redirect('/laboratorium/pemeriksaan')->with('status', 'Pemeriksaan laboratorium tidak dapat dihapus');
        else:
            lab::destroy($id);
            return redirect('/laboratorium/pemeriksaan')->with('status', 'Pemeriksaan laboratorium Berhasil Dihapus.');
        endif;
    }
}
