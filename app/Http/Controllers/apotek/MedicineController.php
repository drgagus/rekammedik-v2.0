<?php

namespace App\Http\Controllers\Apotek;

use App\Mymodels\medicine;
use App\Mymodels\medicinerecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = medicine::orderBy('obat', 'asc')->paginate(5);
        return view('apotek/daftarobat', [
            'medicines' => $medicines
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
            'obat' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $medicine = new medicine ;
        $medicine -> obat = $request->obat ;
        $medicine -> jumlah = $request -> jumlah ;
        $medicine -> igdobat =  $request -> igdobat;
        $medicine -> pustuobat =  $request -> pustuobat;
        $medicine ->save();
        
        return redirect('/apotek/obat')->with('status', 'Obat Baru Berhasil Ditambahkan.');
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
        $medicines = medicine::orderBy('obat', 'asc')->paginate(5);
        $obat = medicine::findOrFail($id);
        return view('apotek/formeditobat', [
            'obat' => $obat,
            'medicines' => $medicines,
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
            'obat' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $obat = medicine::findOrFail($id);
        $obatlama = $obat->obat;
        $obatbaru = $request -> obat;
        medicine::where('id',$id)->update([
            'obat' => $request -> obat,
            'jumlah' => $request -> jumlah,
            'igdobat' => $request -> igdobat,
            'pustuobat' => $request -> pustuobat
            ]);
    
            return redirect()->to('/apotek/obat')->with('status', 'berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicinerecords = medicinerecord::where('medicine_id',$id)->get();
        if (count($medicinerecords)):
            return redirect('/apotek/obat')->with('status', 'Obat Tidak Dapat Dihapus.');
        else:
            medicine::destroy($id);
            return redirect('/apotek/obat')->with('status', 'Obat Berhasil Dihapus.');
        endif;
    }
}
