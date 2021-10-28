<?php

namespace App\Http\Controllers\poligigi;

use Auth;
use App\Mymodels\momcard;
use App\Mymodels\room;
use App\Mymodels\patient;
use App\Mymodels\diag;
use App\Mymodels\member;
use App\Mymodels\medicine;
use App\Mymodels\head;
use App\Mymodels\medicinerecord;
use App\Mymodels\labrecord;
use App\Mymodels\medicalrecord;
use App\Mymodels\odontogram;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicalrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalrecords = medicalrecord::where ('room_id', 2)->where('tanggalkunjungan', date('Y-m-d'))->orderBy('updated_at', 'asc')->get();
        $patients = patient::where ('room_id', 2)->where('selesai',1)->where('tanggalkunjungan', date('Y-m-d'))->orderBy('updated_at', 'desc')->get();
        return view('poligigi/daftarpasien', [
            'patients' => $patients,
            'medicalrecords' => $medicalrecords
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $vitalsign = patient::where('id',$id)->where('room_id', 2)->where('tanggalkunjungan',date('Y-m-d'))->where('selesai', 1)->firstOrFail();
        $pasien_id = $vitalsign->member_id;
        $pasien = member::findOrFail($pasien_id);
        $diags = diag::where('room_id', 2)->get();
        $medicines = medicine::orderBy('obat', 'asc')->get();
        $odontogram = odontogram::where('member_id', $pasien_id)->first();
        $poli = room::findOrFail(2);
        $rooms = room::where('id','<',10)->get();
        return view('poligigi/forminputmedicalrecord', [
            'pasien' => $pasien,
            'vitalsign' => $vitalsign,
            'diags' => $diags,
            'odontogram' => $odontogram,
            'medicines' => $medicines,
            'poli' => $poli,
            'rooms' => $rooms
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
        if ($request -> ceklab){
            $request->validate([
                'member_id' => 'required'
            ]);
        }else{
            if ($request -> rujukinternal){
                $request->validate([
                    'room_id' => 'required',
                    'member_id' => 'required',
                    'diag_id' => 'required'
                ]);
            }else{
                $request->validate([
                    'member_id' => 'required',
                    'diag_id' => 'required'
                ]);
            }
        }
        
        $member_id = $request -> member_id ;
        $member = member::findOrFail($member_id);
        $tanggallahir = $member->tanggallahir;

        $tgl_lahir= date('d', strtotime($tanggallahir));
			$bln_lahir= date('m', strtotime($tanggallahir));
			$thn_lahir= date('Y', strtotime($tanggallahir));
			$tgl_today = date('d');
			$bln_today= date('m');
			$thn_today = date('Y');

        if ($tgl_today >= $tgl_lahir) {
            $hari = $tgl_today - $tgl_lahir ; 
                if ($bln_today >= $bln_lahir) {
                    $bulan = $bln_today - $bln_lahir ;
                    $tahun = $thn_today - $thn_lahir ;
                }else if ($bln_today < $bln_lahir) {
                    $bulan = ($bln_today + 12 )  - $bln_lahir ;	
                    $tahun = ($thn_today - 1 ) - $thn_lahir ;
                }else{ 
                }
        }else if ($tgl_today < $tgl_lahir) {
            $hari = ($tgl_today + 30 )  - $tgl_lahir ;
                if (($bln_today-1) >= $bln_lahir) {
                    $bulan = ($bln_today-1) - $bln_lahir ;
                    $tahun = $thn_today - $thn_lahir ;
                }else if (($bln_today-1) < $bln_lahir) {
                    $bulan = ($bln_today+11) - $bln_lahir ;
                    $tahun = ($thn_today-1) - $thn_lahir ;
                }else{
                }
        }else{
        }

        $user_id = Auth::user()->id;
        $medicalrecord = new medicalrecord ;
        $medicalrecord -> member_id = $request -> member_id ;
        $medicalrecord -> tanggalkunjungan = now() ;
        $medicalrecord -> umurtahun = $tahun ;
        $medicalrecord -> umurbulan = $bulan ;
        $medicalrecord -> umurhari = $hari ;
        $medicalrecord -> keluhanutama = $request -> keluhanutama ;
        $medicalrecord -> tinggibadan = $request -> tinggibadan ;
        $medicalrecord -> beratbadan = $request -> beratbadan ;
        $medicalrecord -> lingkarperut = $request -> lingkarperut ;
        $medicalrecord -> tekanandarah = $request -> tekanandarah ;
        $medicalrecord -> pernafasan = $request -> pernafasan ;
        $medicalrecord -> detakjantung = $request -> detakjantung ;
        $medicalrecord -> suhu = $request -> suhu ;
        $medicalrecord -> pemeriksaanawal = $request -> pemeriksaanawal ;
        $medicalrecord -> pemeriksaanlanjutan = $request -> pemeriksaanlanjutan ;
        $medicalrecord -> diag_id = $request -> diag_id ;
        $medicalrecord -> tindakan = $request -> tindakan ;
        $medicalrecord -> pengobatan = $request -> pengobatan ;
        $medicalrecord -> keterangan = $request -> keterangan ;
        $medicalrecord -> room_id = 2 ;
        $medicalrecord -> user_id = $user_id ;
        $medicalrecord ->save();

        $pasien = $request->member_id;

        if ($request -> ceklab){
                patient::where('member_id',$pasien)->update([
                    'selesai' => 9
                ]);
                return redirect('/poligigi')->with('status', 'Silahkan Isi Form Cek-Lab');
        }else{
                if ($request -> rujukinternal){
                        patient::where('member_id',$pasien)->update([
                            'room_id' => $request -> room_id,
                            'selesai' => 1,
                            'rujukinternal' => $request -> rujukinternal,
                        ]);
                        return redirect('/poligigi')->with('status', 'Pasien telah selesai dan dirujuk internal.');
                }else{
                        patient::where('member_id',$pasien)->update([
                            'selesai' => 2
                        ]);
                        return redirect('/poligigi')->with('status', 'Pasien Telah Selesai.');
                }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = member::findOrFail($id);

        $tgl_lahir= date('d', strtotime($pasien->tanggallahir));
        $bln_lahir= date('m', strtotime($pasien->tanggallahir));
        $thn_lahir= date('Y', strtotime($pasien->tanggallahir));
        $tgl_today = date('d');
        $bln_today= date('m');
        $thn_today = date('Y');

        if ($tgl_today >= $tgl_lahir) {
            $hari = $tgl_today - $tgl_lahir ; 
                if ($bln_today >= $bln_lahir) {
                    $bulan = $bln_today - $bln_lahir ;
                    $tahun = $thn_today - $thn_lahir ;
                }else if ($bln_today < $bln_lahir) {
                    $bulan = ($bln_today + 12 )  - $bln_lahir ;	
                    $tahun = ($thn_today - 1 ) - $thn_lahir ;
                }else{ 
                }
        }else if ($tgl_today < $tgl_lahir) {
            $hari = ($tgl_today + 30 )  - $tgl_lahir ;
                if (($bln_today-1) >= $bln_lahir) {
                    $bulan = ($bln_today-1) - $bln_lahir ;
                    $tahun = $thn_today - $thn_lahir ;
                }else if (($bln_today-1) < $bln_lahir) {
                    $bulan = ($bln_today+11) - $bln_lahir ;
                    $tahun = ($thn_today-1) - $thn_lahir ;
                }else{
                }
        }else{
        }
        $umur = $tahun.' Tahun '.$bulan.' Bulan '.$hari.' Hari';

        $poli1 = room::findOrFail(1);
        $poli1medicalrecords = medicalrecord::where('member_id',$pasien->id)->where('room_id',$poli1->id)->get();
        $poli2 = room::findOrFail(2);
        $poli2medicalrecords = medicalrecord::where('member_id',$pasien->id)->where('room_id',$poli2->id)->get();
        $poli3 = room::findOrFail(3);
        $poli3medicalrecords = medicalrecord::where('member_id',$pasien->id)->where('room_id',$poli3->id)->get();
        $poli4 = room::findOrFail(10);
        $poli4medicalrecords = medicalrecord::where('member_id',$pasien->id)->where('room_id',$poli4->id)->get();
        $odontogram = odontogram::where('member_id',$id)->first();
        $momcards = momcard::where('member_id',$id)->get();
        return view('rekammedis/rekammedis', [
            'pasien' => $pasien,
            'poli1' => $poli1,
            'poli1medicalrecords' => $poli1medicalrecords,
            'poli2' => $poli2,
            'poli2medicalrecords' => $poli2medicalrecords,
            'poli3' => $poli3,
            'poli3medicalrecords' => $poli3medicalrecords,
            'poli4' => $poli4,
            'poli4medicalrecords' => $poli4medicalrecords,
            'odontogram' => $odontogram,
            'momcards' => $momcards,
            'umur' => $umur
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
        $medicalrecord = medicalrecord::where('id',$id)->where('room_id', 2)->where('tanggalkunjungan', date('Y-m-d'))->firstOrFail();
        $medicinerecords = medicinerecord::where('medicalrecord_id', $medicalrecord->id)->get();
        $pasien = member::findOrFail($medicalrecord->member_id) ;
        $patient = patient::where('member_id',$medicalrecord->member_id)->firstOrFail() ;
        $diags = diag::where('room_id', 2)->get();
        $medicines = medicine::orderBy('obat', 'asc')->get();
        $labrecords = labrecord::where('medicalrecord_id', $id)->get();
        $odontogram = odontogram::where('member_id', $medicalrecord->member_id)->first();
        $poli = room::findOrFail(2);
        $rooms = room::where('id', '<', 10)->get();
        return view('poligigi/formeditmedicalrecord', [
            'pasien'=> $pasien,
            'medicalrecord' => $medicalrecord,
            'diags'=> $diags,
            'medicines'=> $medicines,
            'labrecords' => $labrecords,
            'medicinerecords' => $medicinerecords,
            'odontogram' => $odontogram,
            'patient' => $patient,
            'poli' => $poli,
            'rooms' => $rooms
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
        if ($request -> rujukinternal){
            $request->validate([
                'room_id' => 'required',
                'diag_id' => 'required'
            ]);
        }else{
            $request->validate([
                'diag_id' => 'required'
            ]);
        }

        $medicalrecord = medicalrecord::findOrFail($id);

    medicalrecord::where('id',$id)->where('room_id', 2)->where('tanggalkunjungan', date('Y-m-d'))->update([
        'keluhanutama' => $request -> keluhanutama,
        'tinggibadan' => $request -> tinggibadan,
        'beratbadan' => $request -> beratbadan,
        'lingkarperut' => $request -> lingkarperut,
        'tekanandarah' => $request -> tekanandarah,
        'pernafasan' => $request -> pernafasan,
        'detakjantung' => $request -> detakjantung,
        'suhu' => $request -> suhu,
        'pemeriksaanawal' => $request -> pemeriksaanawal,
        'pemeriksaanlanjutan' => $request -> pemeriksaanlanjutan,
        'diag_id' => $request -> diag_id,
        'tindakan' => $request -> tindakan,
        'pengobatan' => $request -> pengobatan,
        'keterangan' => $request -> keterangan
        ]);

        $pasien = $medicalrecord->member_id;

        if ($request -> rujukinternal){
            patient::where('member_id',$pasien)->update([
                'room_id' => $request -> room_id,
                'selesai' => 1,
                'rujukinternal' => $request -> rujukinternal,
            ]);
            return redirect('/poligigi')->with('status', 'Pasien telah selesai dan dirujuk internal.');
        }else{
                patient::where('member_id',$pasien)->update([
                    'selesai' => 2
                ]);
                return redirect('/poligigi')->with('status', 'Pasien Telah Selesai.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicalrecord = medicalrecord::findOrFail($id);
        $pasien_id = $medicalrecord->member_id;
        $labrecords = labrecord::where('medicalrecord_id', $medicalrecord->id)->get();
        $medicinerecords = medicinerecord::where('medicalrecord_id', $medicalrecord->id)-get();

        if (count($labrecord)):
            return redirect('/poligigi')->with('status', 'Data Kunjungan Tidak Dapat Dihapus');
        else:
            if (count($medicinerecords)):
                return redirect('/poligigi')->with('status', 'Data Kunjungan Tidak Dapat Dihapus');
            else:
                medicalrecord::destroy($id);
                patient::where('member_id', $pasien_id)->update([
                    'selesai' => 1
                ]);
                return redirect('/poligigi')->with('status', 'Data Kunjungan Telah Berhasil Dihapus');
            endif;
        endif;
           
    }
}
