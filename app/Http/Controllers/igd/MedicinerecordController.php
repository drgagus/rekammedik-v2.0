<?php

namespace App\Http\Controllers\igd;

use Auth;
use App\Mymodels\medicalrecord;
use App\Mymodels\medicinerecord;
use App\Mymodels\medicine;
use App\Mymodels\member;
use App\Mymodels\room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicinerecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $medicines = medicine::where('igdobat', 1)->get();
        $medicalrecord = medicalrecord::where('id', $id)->where('room_id', 10)->firstOrFail(); 
        $pasien = member::where('id',$medicalrecord->member_id)->firstOrFail();
        $room = room::findOrFail(10);
        return view('igd/forminputobatpasien', [
            'pasien' => $pasien,
            'medicalrecord' => $medicalrecord,
            'medicines'=>$medicines,
            'room'=>$room
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
        $user_id = Auth::user()->id;
        $member_id = $request->pasien;
        $medicalrecord_id = $request->medicalrecord_id;
        
        for ($i = 1; $i < 6; $i++):
            $obat = 'obat'.$medicalrecord_id.$i ;
            $jumlah = 'jumlah'.$medicalrecord_id.$i ;
            $obat_id=$request->$obat;
            $jumlahobat=$request->$jumlah;
             if ($obat_id)
             {
                $medicinerecord = new medicinerecord ;
                $medicinerecord -> medicalrecord_id = $medicalrecord_id ;
                $medicinerecord -> medicine_id = $obat_id ;
                $medicinerecord -> jumlah = $jumlahobat ;
                $medicinerecord -> user_id = $user_id ;
                $medicinerecord ->save();

                $medicine = medicine::findOrFail($obat_id);
                $oldstock = $medicine->igdjumlah;
                $newstock = $oldstock - $jumlahobat;
                medicine::where('id',$obat_id)->update([
                    'igdjumlah' => $newstock,
                    ]);

             }
            
        endfor;

        return redirect('/igd/pasien')->with('status', 'Obat Pasien Telah Diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicalrecord = medicalrecord::findOrFail($id);
        $medicinerecords = medicinerecord::where('medicalrecord_id',$medicalrecord->id)->get();
        $member_id = $medicalrecord->member_id;
        $pasien = member::findOrFail($member_id);
        $poli = room::findOrFail(10);
        return view('igd/detailobatpasien', [
            'medicalrecord' => $medicalrecord,
            'medicinerecords' => $medicinerecords,
            'pasien' => $pasien,
            'poli' => $poli
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
        $medicalrecord = medicalrecord::findOrFail($id);
        $medicinerecords = medicinerecord::where('medicalrecord_id',$medicalrecord->id)->get();
        $pasien = member::findOrFail($medicalrecord->member_id);
        $medicines = medicine::where('igdobat', 1)->get();
        $poli = room::findOrFail(10);
        return view('igd/formeditobatpasien', [
            'medicines' => $medicines,
            'medicalrecord' => $medicalrecord,
            'medicinerecords' => $medicinerecords,
            'pasien' => $pasien,
            'poli' => $poli
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
        $user_id = Auth::user()->id;
        $medicalrecordid = $id ;
        $medicinerecords = medicinerecord::where('medicalrecord_id', $id)->get();
        foreach ($medicinerecords as $medicinerecord):
            $obat = 'obat'.$medicinerecord->id ;
            $jumlah = 'jumlah'.$medicinerecord->id;
           $medicinerecordid = $request->medicinerecord.$medicinerecord->id;
           $obatid = $request-> $obat;
           $jumlahobat =  $request-> $jumlah;

           if ($obatid == 'hapus'){
            $medicinerecord = medicinerecord::findOrFail($medicinerecordid);
            $jumlahlama = $medicinerecord->jumlah;
            $obatidlama = $medicinerecord->medicine_id;

            $medicine = medicine::findOrFail($obatidlama);
            $oldstock = $medicine->igdjumlah;
            $newstock = $oldstock + $jumlahlama;
            
            medicine::where('id',$obatidlama)->update([
                'igdjumlah' => $newstock,
                ]);

            medicinerecord::destroy($medicinerecordid);
           }else{
               $medicinerecord = medicinerecord::findOrFail($medicinerecordid);
               $jumlahlama = $medicinerecord->jumlah;
               $selisih = $jumlahobat - $jumlahlama;

               $medicine = medicine::findOrFail($obatid);
               $oldstock = $medicine->igdjumlah;
               $newstock = $oldstock - $selisih;

               medicinerecord::where('id',$medicinerecordid)->update([
                'medicine_id' => $obatid,
                'jumlah' => $jumlahobat,
                ]);
                
                medicine::where('id',$obatid)->update([
                    'igdjumlah' => $newstock,
                    ]);

            }
        endforeach;

        for ($i = 1; $i < 6; $i++):
            $obat = 'obat'.$id.$i ;
            $jumlah = 'jumlah'.$id.$i ;
            $obat_id=$request->$obat;
            $jumlahobat=$request->$jumlah;
             if ($obat_id)
             {
                $medicinerecord = new medicinerecord ;
                $medicinerecord -> medicalrecord_id = $id ;
                $medicinerecord -> medicine_id = $obat_id ;
                $medicinerecord -> jumlah = $jumlahobat ;
                $medicinerecord -> user_id = $User_id ;
                $medicinerecord ->save();

                $medicine = medicine::findOrFail($obat_id);
                $oldstock = $medicine->igdjumlah;
                $newstock = $oldstock - $jumlahobat;
                medicine::where('id',$obat_id)->update([
                    'igdjumlah' => $newstock,
                    ]);
             }
            
        endfor;

        return redirect('/igd/obatpasien/'.$id)->with('status', 'Obat Pasien Telah Diubah');
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
