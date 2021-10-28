<?php

namespace App\Http\Controllers\pendaftaran;

use App\Mymodels\patient;
use App\Mymodels\member;
use App\Mymodels\village;
use App\Mymodels\head;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('created_at', 'asc')->get();
        return view('pendaftaran/daftarpasien', [
            'patients' => $patients
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
            'member_id' => 'unique:patients'
        ]);
        
        $member = member::findOrFail($request->member_id);
        
            $tgl_lahir= date('d', strtotime($member->tanggallahir));
			$bln_lahir= date('m', strtotime($member->tanggallahir));
			$thn_lahir= date('Y', strtotime($member->tanggallahir));
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

        $patient = new patient ;
        $patient -> member_id = $request -> member_id ;
        $patient -> umur = $umur ;
        $patient -> tanggalkunjungan = now() ;
        $patient ->save();
        
        return redirect('/pendaftaran/pasien/')->with('status', 'Pasien Baru Berhasil Ditambahkan.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = patient::findOrFail($id);
        if ($patient->selesai):
            return redirect('/pendaftaran/pasien')->with('status', 'Pasien Tidak Dapat Dihapus.');
        else:
            patient::destroy($id);
            return redirect('/pendaftaran/pasien')->with('status', 'Pasien Berhasil Dihapus.');
        endif;
    }

    public function destroyall()
    {
        patient::truncate();
        return redirect('/pendaftaran')->with('status', 'Pasien Hari Ini Telah Dikosongkan.');
    }
}
