<?php

namespace App\Http\Controllers\Apotek;

use Auth;
use App\Mymodels\medicinerecord;
use App\Mymodels\medicine;
use App\Mymodels\member;
use App\Mymodels\patient;
use App\Mymodels\medicalrecord;
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
        $patients = patient::where('tanggalkunjungan', date('Y-m-d'))->where('selesai', 2)->get();
        $pasiens = patient::where('tanggalkunjungan', date('Y-m-d'))->where('selesai', 3)->get();
        return view('apotek/daftarpasien', [
            'patients' => $patients,
            'pasiens'=> $pasiens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $medicines = medicine::get();
        $pasien = patient::where('id',$id)->where('selesai', 2)->firstOrFail();
        $patient_id = $pasien->member->id;
        $medicalrecords = medicalrecord::where('member_id', $patient_id)->where('tanggalkunjungan', date('Y-m-d'))->get(); 
        return view('apotek/forminputobatpasien', [
            'pasien' => $pasien,
            'medicalrecords' => $medicalrecords,
            'medicines'=>$medicines
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
        $medicalrecords = medicalrecord::where('tanggalkunjungan', date('Y-m-d'))->where('member_id', $member_id)->get();
        foreach ($medicalrecords as $medicalrecord):
        $mr = $request -> medicalrecord_id.$medicalrecord->id;
        
        for ($i = 1; $i < 6; $i++):
            $obat = 'obat'.$medicalrecord->id.$i ;
            $jumlah = 'jumlah'.$medicalrecord->id.$i ;
            $obat_id=$request->$obat;
            $jumlahobat=$request->$jumlah;
             if ($obat_id)
             {
                $medicinerecord = new medicinerecord ;
                $medicinerecord -> medicalrecord_id = $mr ;
                $medicinerecord -> medicine_id = $obat_id ;
                $medicinerecord -> jumlah = $jumlahobat ;
                $medicinerecord -> user_id = $user_id ;
                $medicinerecord ->save();

                $medicine = medicine::findOrFail($obat_id);
                $oldstock = $medicine->jumlah;
                $newstock = $oldstock - $jumlahobat;
                medicine::where('id',$obat_id)->update([
                    'jumlah' => $newstock,
                    ]);

             }
            
        endfor;
        endforeach;

        patient::where('member_id', $member_id)->where('tanggalkunjungan', date('Y-m-d'))->update([
            'selesai' => 3,
            ]);
        return redirect('/apotek/pasien')->with('status', 'Obat Pasien Telah Diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = patient::findOrFail($id);
        $member_id = $pasien->member_id;
        $medicalrecords = medicalrecord::where('member_id', $member_id)->where('tanggalkunjungan', date('Y-m-d'))->get();
        return view('apotek/detailobatpasien', [
            'medicalrecords' => $medicalrecords,
            'pasien' => $pasien
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
        $pasien = patient::where('member_id',$medicalrecord->member_id)->firstOrFail();
        $medicines = medicine::get();
        return view('apotek/formeditobatpasien', [
            'medicines' => $medicines,
            'medicalrecord' => $medicalrecord,
            'medicinerecords' => $medicinerecords,
            'pasien' => $pasien
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
        $medicalmedicines = medicinerecord::where('medicalrecord_id', $id)->get();
        foreach ($medicalmedicines as $medicalmedicine):
            $obat = 'obat'.$medicalmedicine->id ;
            $jumlah = 'jumlah'.$medicalmedicine->id;
           $medicalmedicineid = $request->medicalmedicine.$medicalmedicine->id;
           $obatid = $request-> $obat;
           $jumlahobat =  $request-> $jumlah;

           if ($obatid == 'hapus'){
            $medicinerecord = medicinerecord::findOrFail($medicalmedicineid);
            $jumlahlama = $medicinerecord->jumlah;
            $obatidlama = $medicinerecord->medicine_id;

            $medicine = medicine::findOrFail($obatidlama);
            $oldstock = $medicine->jumlah;
            $newstock = $oldstock + $jumlahlama;
            
            medicine::where('id',$obatidlama)->update([
                'jumlah' => $newstock,
                ]);

            medicinerecord::destroy($medicalmedicineid);
           }else{
               $medicinerecord = medicinerecord::findOrFail($medicalmedicineid);
               $jumlahlama = $medicinerecord->jumlah;
               $selisih = $jumlahobat - $jumlahlama;

               $medicine = medicine::findOrFail($obatid);
               $oldstock = $medicine->jumlah;
               $newstock = $oldstock - $selisih;

               medicinerecord::where('id',$medicalmedicineid)->update([
                'medicine_id' => $obatid,
                'jumlah' => $jumlahobat,
                ]);
                
                medicine::where('id',$obatid)->update([
                    'jumlah' => $newstock,
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
                $medicinerecord -> user_id = $user_id ;
                $medicinerecord ->save();

                $medicine = medicine::findOrFail($obat_id);
                $oldstock = $medicine->jumlah;
                $newstock = $oldstock - $jumlahobat;
                medicine::where('id',$obat_id)->update([
                    'jumlah' => $newstock,
                    ]);
             }
            
        endfor;

        return redirect('/apotek/pasien')->with('status', 'Obat Pasien Telah Diubah');

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
