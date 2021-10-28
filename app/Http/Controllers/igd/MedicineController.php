<?php

namespace App\Http\Controllers\igd;

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
        $medicines = medicine::where('igdobat', 1)->orderBy('obat', 'asc')->paginate(5);
        return view('igd/daftarobat', [
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
        $medicines = medicine::where('igdobat', 1)->orderBy('obat', 'asc')->paginate(5);
        $obat = medicine::findOrFail($id);
        return view('igd/formeditjumlah', [
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
            'igdjumlah' => 'required|integer',
        ]);

        $obat = medicine::findOrFail($id);
        $obatlama = $obat->obat;
        $jumlahlama = $obat->igdjumlah;
        $jumlahbaru = $request -> igdjumlah;
        medicine::where('igdobat', 1)->where('id',$id)->update([
            'igdjumlah' => $request -> igdjumlah
            ]);
    
            return redirect()->to('/igd/obat')->with('status', 'Jumlah '.$obatlama.' berhasil diubah dari '.$jumlahlama.' menjadi '.$jumlahbaru.'.');
    
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
