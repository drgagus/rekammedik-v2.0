<?php

namespace App\Http\Controllers\pendaftaran;

use App\Mymodels\village;
use App\Mymodels\head;
use App\Mymodels\member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heads = head::orderBy('norm', 'asc')->paginate(9);
        return view('pendaftaran/daftarkepalakeluarga',[
            'heads' => $heads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendaftaran/forminputkepalakeluarga', [
            'villages' => village::get()
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
        $request->validate([
            'norm' => 'required|integer|unique:heads',
            'kepalakeluarga' => 'required',
            'kartukeluarga' => 'required|integer|unique:heads',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'village_id' => 'required',
        ]);

        $head = new head ;
        $head -> kepalakeluarga = $request -> kepalakeluarga ;
        $head -> kartukeluarga = $request -> kartukeluarga ;
        $head -> alamat = $request -> alamat ;
        $head -> rt = $request -> rt ;
        $head -> rw = $request -> rw ;
        $head -> village_id = $request -> village_id ;
        $head -> norm = $request -> norm ;
        $head ->save();
        $headbaru = head ::latest()->first();
        
        $member = new member ;
        $member -> head_id = $headbaru->id ;
        $member -> nama = $request -> kepalakeluarga ;
        $member -> jeniskelamin = 'Laki-laki' ;
        $member -> perkawinan = 'Kawin' ;
        $member -> hubungankeluarga = 'A' ;
        $member ->save();
        
        return redirect('/pendaftaran/kepalakeluarga/'.$headbaru->id)->with('status', 'Keluarga Baru Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kepalakeluarga = head ::findOrFail($id);
        $members = $kepalakeluarga->members()->orderby('hubungankeluarga', 'asc')->get();
        // $members = member::orderby('hubungankeluarga', 'asc')->where('head_id',$kepalakeluarga->id)->get();
        return view('pendaftaran/detailkepalakeluarga', [
            'kepalakeluarga' => $kepalakeluarga,
            'members' => $members
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
        $kepalakeluarga = head::findorFail($id);
        $villages = village::get();
        return view('pendaftaran/formeditkepalakeluarga',[
            'kepalakeluarga' => $kepalakeluarga,
            'villages' => $villages
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
            'kepalakeluarga' => 'required',
            'kartukeluarga' => 'required|integer',
            'rt' => 'required',
            'rw' => 'required',
            'village_id' => 'required',
            'norm' => 'required|integer',
        ]);

        head::where('id',$id)->update([
            'kepalakeluarga' => $request -> kepalakeluarga,
            'kartukeluarga' => $request -> kartukeluarga,
            'alamat' => $request -> alamat,
            'rt' => $request -> rt,
            'rw' => $request -> rw,
            'village_id' => $request -> village_id,
            'norm' => $request -> norm,
        ]);
        return redirect()->to('/pendaftaran/kepalakeluarga/'.$id);
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
