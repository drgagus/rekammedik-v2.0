<?php

namespace App\Http\Controllers\admin;
use App\Mymodels\room;
use App\Mymodels\medicalrecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
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
        $rooms = room::get();
        return view('admin/daftarpoli', [
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
            'id' => 'required|integer|unique:rooms',
            'room' => 'required',
        ]);

        $room = new room ;
        $room -> id = $request->id ;
        $room -> room = $request -> room ;
        $room ->save();
        
        return redirect('/admin/poli')->with('status', 'Poli Baru Berhasil Ditambahkan.');
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
        $rooms = room::get();
        $poli = room::findOrFail($id);
        return view('admin/formeditpoli', [
            'rooms' => $rooms,
            'poli' => $poli,
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
            'room' => 'required',
        ]);

        room::where('id',$id)->update([
            'id' => $request -> id,
            'room' => $request -> room
            ]);
    
            return redirect()->to('/admin/poli')->with('status', 'Nama poli berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicalrecords = medicalrecord::where('room_id',$id)->get();
        if (count($medicalrecords)):
            return redirect('/admin/poli')->with('status', 'Poli Tidak Dapat Dihapus.');
        else:
            room::destroy($id);
            return redirect('/admin/poli')->with('status', 'Poli Berhasil Dihapus.');
        endif;
    }
}
