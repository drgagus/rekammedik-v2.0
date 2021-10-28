<?php

namespace App\Http\Controllers\polikia;

use App\Mymodels\room;
use App\Mymodels\momcard;
use App\Mymodels\member;
use App\Mymodels\patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MomcardController extends Controller
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
        $pasien = member::findOrFail($id);
        $patient = patient::where('member_id',$id)->firstOrFail();
        return view('polikia/forminputkartuibu', [
            'pasien' => $pasien,
            'patient' => $patient
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
            'kontrasepsiterakhir' => 'required',
            'haidterakhir' => 'required',
            'perkiraanpartus' => 'required',
            'keluhanutama' => 'required',
            'nafsumakan' => 'required',
            'muntah' => 'required',
            'pusing' => 'required',
            'nyeriperut' => 'required',
            'oedema' => 'required',
            'penyakitdiderita' => 'required',
            'riwayatkeluarga' => 'required',
            'kebiasaankehamilan' => 'required',
            'pucat' => 'required',
            'kesadaran' => 'required',
            'bentuktubuh' => 'required',
            'suhubadan' => 'required',
            'kuning' => 'required',
            'lila' => 'required',
            'tinggibadan' => 'required',
            'beratbadan' => 'required',
            'tekanandarah' => 'required',
            'detakjantung' => 'required',
            'pernafasan' => 'required',
            'muka' => 'required',
            'mulut' => 'required',
            'gigi' => 'required',
            'paruparu' => 'required',
            'jantung' => 'required',
            'payudara' => 'required',
            'hati' => 'required',
            'abdomen' => 'required',
            'tangantungkai' => 'required',
            'tinggifundus' => 'required',
            'bentukfundus' => 'required',
            'bentukuterus' => 'required',
            'letakjanin' => 'required',
            'gerakjanin' => 'required',
            'detakjantungjanin' => 'required',
            'inspekulo' => 'required',
            'perdarahan' => 'required',
            'golongandarah' => 'required'
        ]);

        $momcard = new momcard ;
            $momcard -> member_id = $request -> member_id ;
            $momcard -> tanggalkunjungan = $request -> tanggalkunjungan ;

            $momcard -> kontrasepsiterakhir = $request -> kontrasepsiterakhir;
            
            $momcard -> umuranak1 = $request -> umuranak1;
            $momcard -> beratanak1 = $request -> beratanak1;
            $momcard -> penolongpersalinananak1 = $request -> penolongpersalinananak1;
            $momcard -> carapersalinananak1 = $request -> carapersalinananak1;
            $momcard -> keadaanbayianak1 = $request -> keadaanbayianak1;
            $momcard -> komplikasianak1 = $request -> komplikasianak1;
            $momcard -> umuranak2 = $request -> umuranak2;
            $momcard -> beratanak2 = $request -> beratanak2;
            $momcard -> penolongpersalinananak2 = $request -> penolongpersalinananak2;
            $momcard -> carapersalinananak2 = $request -> carapersalinananak2;
            $momcard -> keadaanbayianak2 = $request -> keadaanbayianak2;
            $momcard -> komplikasianak2 = $request -> komplikasianak2;
            $momcard -> umuranak3 = $request -> umuranak3;
            $momcard -> beratanak3 = $request -> beratanak3;
            $momcard -> penolongpersalinananak3 = $request -> penolongpersalinananak3;
            $momcard -> carapersalinananak3 = $request -> carapersalinananak3;
            $momcard -> keadaanbayianak3 = $request -> keadaanbayianak3;
            $momcard -> komplikasianak3 = $request -> komplikasianak3;
            
            $momcard -> haidterakhir = $request -> haidterakhir;
            $momcard -> perkiraanpartus = $request -> perkiraanpartus ;
            $momcard -> keluhanutama = $request -> keluhanutama;
            
            $momcard -> nafsumakan = $request -> nafsumakan;
            $momcard -> muntah = $request -> muntah;
            $momcard -> pusing = $request -> pusing;
            $momcard -> nyeriperut = $request -> nyeriperut;
            $momcard -> oedema = $request -> oedema;
            $momcard -> penyakitdiderita = $request -> penyakitdiderita;
            $momcard -> riwayatkeluarga = $request -> riwayatkeluarga;
            $momcard -> kebiasaankehamilan = $request -> kebiasaankehamilan;
            
            $momcard -> pucat = $request -> pucat;
            $momcard -> kesadaran = $request -> kesadaran;
            $momcard -> bentuktubuh = $request -> bentuktubuh;
            $momcard -> suhubadan = $request -> suhubadan;
            $momcard -> kuning = $request -> kuning;
            $momcard -> lila = $request -> lila;
            $momcard -> tinggibadan = $request -> tinggibadan;
            $momcard -> beratbadan = $request -> beratbadan;
            $momcard -> tekanandarah = $request -> tekanandarah;
            $momcard -> detakjantung = $request -> detakjantung;
            $momcard -> pernafasan = $request -> pernafasan;
            
            $momcard -> muka = $request -> muka;
            $momcard -> mulut = $request -> mulut;
            $momcard -> gigi = $request -> gigi;
            $momcard -> paruparu = $request -> paruparu;
            $momcard -> jantung = $request -> jantung;
            $momcard -> payudara = $request -> payudara;
            $momcard -> hati = $request -> hati;
            $momcard -> abdomen = $request -> abdomen;
            $momcard -> tangantungkai = $request -> tangantungkai;
            
            $momcard -> tinggifundus = $request -> tinggifundus;
            $momcard -> bentukfundus = $request -> bentukfundus;
            $momcard -> bentukuterus = $request -> bentukuterus;
            $momcard -> letakjanin = $request -> letakjanin;
            $momcard -> gerakjanin = $request -> gerakjanin;
            $momcard -> detakjantungjanin = $request -> detakjantungjanin;
            $momcard -> inspekulo = $request -> inspekulo;
            $momcard -> perdarahan = $request -> perdarahan;
            $momcard -> pemeriksaandalam = $request -> pemeriksaandalam;

            $momcard -> haemoglobin = $request -> haemoglobin;
            $momcard -> urinealbumine = $request -> urinealbumine;
            $momcard -> urinereduksi = $request -> urinereduksi;
            $momcard -> faeces = $request -> faeces;
            $momcard -> malaria = $request -> malaria;
            $momcard -> golongandarah = $request -> golongandarah;
            $momcard ->save();

            $member_id = $request -> member_id;
            $patient = patient::where('member_id',$member_id)->firstOrFail();

            return redirect('/polikia/pasien/create/'.$patient->id)->with('status', 'Kartu Ibu Berhasil Diinput.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poli = room::findOrFail(3);
        $pasien = member::findOrFail($id);
        $momcards = momcard::where('member_id', $id)->get();
        $patient = patient::where('member_id', $id)->where('room_id', 3)->firstOrFail();
        return view('polikia/kartuibu', [
            'pasien' => $pasien,
            'momcards' => $momcards,
            'poli' => $poli,
            
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
        $momcard = momcard::findOrFail($id);
        $pasien = member::findOrFail($momcard->member_id);
        $patient = patient::where('member_id', $momcard->member_id)->where('room_id', 3)->firstOrFail();
        return view('polikia/formeditkartuibu', [
            'pasien' => $pasien,
            'momcard' => $momcard,
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
            'kontrasepsiterakhir' => 'required',
            'haidterakhir' => 'required',
            'perkiraanpartus' => 'required',
            'keluhanutama' => 'required',
            'nafsumakan' => 'required',
            'muntah' => 'required',
            'pusing' => 'required',
            'nyeriperut' => 'required',
            'oedema' => 'required',
            'penyakitdiderita' => 'required',
            'riwayatkeluarga' => 'required',
            'kebiasaankehamilan' => 'required',
            'pucat' => 'required',
            'kesadaran' => 'required',
            'bentuktubuh' => 'required',
            'suhubadan' => 'required',
            'kuning' => 'required',
            'lila' => 'required',
            'tinggibadan' => 'required',
            'beratbadan' => 'required',
            'tekanandarah' => 'required',
            'detakjantung' => 'required',
            'pernafasan' => 'required',
            'muka' => 'required',
            'mulut' => 'required',
            'gigi' => 'required',
            'paruparu' => 'required',
            'jantung' => 'required',
            'payudara' => 'required',
            'hati' => 'required',
            'abdomen' => 'required',
            'tangantungkai' => 'required',
            'tinggifundus' => 'required',
            'bentukfundus' => 'required',
            'bentukuterus' => 'required',
            'letakjanin' => 'required',
            'gerakjanin' => 'required',
            'detakjantungjanin' => 'required',
            'inspekulo' => 'required',
            'perdarahan' => 'required',
            'golongandarah' => 'required'
        ]);

        momcard::where('id',$id)->update([
            'kontrasepsiterakhir' => $request -> kontrasepsiterakhir,
            
            'umuranak1' => $request -> umuranak1,
            'beratanak1' => $request -> beratanak1,
            'penolongpersalinananak1' => $request -> penolongpersalinananak1,
            'carapersalinananak1' => $request -> carapersalinananak1,
            'keadaanbayianak1' => $request -> keadaanbayianak1,
            'komplikasianak1' => $request -> komplikasianak1,
            'umuranak2' => $request -> umuranak2,
            'beratanak2' => $request -> beratanak2,
            'penolongpersalinananak2' => $request -> penolongpersalinananak2,
            'carapersalinananak2' => $request -> carapersalinananak2,
            'keadaanbayianak2' => $request -> keadaanbayianak2,
            'komplikasianak2' => $request -> komplikasianak2,
            'umuranak3' => $request -> umuranak3,
            'beratanak3' => $request -> beratanak3,
            'penolongpersalinananak3' => $request -> penolongpersalinananak3,
            'carapersalinananak3' => $request -> carapersalinananak3,
            'keadaanbayianak3' => $request -> keadaanbayianak3,
            'komplikasianak3' => $request -> komplikasianak3,
            
            'haidterakhir' => $request -> haidterakhir,
            'perkiraanpartus' => $request -> perkiraanpartus ,
            'keluhanutama' => $request -> keluhanutama,
            
            'nafsumakan' => $request -> nafsumakan,
            'muntah' => $request -> muntah,
            'pusing' => $request -> pusing,
            'nyeriperut' => $request -> nyeriperut,
            'oedema' => $request -> oedema,
            'penyakitdiderita' => $request -> penyakitdiderita,
            'riwayatkeluarga' => $request -> riwayatkeluarga,
            'kebiasaankehamilan' => $request -> kebiasaankehamilan,
            
            'pucat' => $request -> pucat,
            'kesadaran' => $request -> kesadaran,
            'bentuktubuh' => $request -> bentuktubuh,
            'suhubadan' => $request -> suhubadan,
            'kuning' => $request -> kuning,
            'lila' => $request -> lila,
            'tinggibadan' => $request -> tinggibadan,
            'beratbadan' => $request -> beratbadan,
            'tekanandarah' => $request -> tekanandarah,
            'detakjantung' => $request -> detakjantung,
            'pernafasan' => $request -> pernafasan,
            
            'muka' => $request -> muka,
            'mulut' => $request -> mulut,
            'gigi' => $request -> gigi,
            'paruparu' => $request -> paruparu,
            'jantung' => $request -> jantung,
            'payudara' => $request -> payudara,
            'hati' => $request -> hati,
            'abdomen' => $request -> abdomen,
            'tangantungkai' => $request -> tangantungkai,
            
            'tinggifundus' => $request -> tinggifundus,
            'bentukfundus' => $request -> bentukfundus,
            'bentukuterus' => $request -> bentukuterus,
            'letakjanin' => $request -> letakjanin,
            'gerakjanin' => $request -> gerakjanin,
            'detakjantungjanin' => $request -> detakjantungjanin,
            'inspekulo' => $request -> inspekulo,
            'perdarahan' => $request -> perdarahan,
            'pemeriksaandalam' => $request -> pemeriksaandalam,

            'haemoglobin' => $request -> haemoglobin,
            'urinealbumine' => $request -> urinealbumine,
            'urinereduksi' => $request -> urinereduksi,
            'faeces' => $request -> faeces,
            'malaria' => $request -> malaria,
            'golongandarah' => $request -> golongandarah,
            ]);

        $momcard = momcard::findOrFail($id);
        return redirect('/polikia/kartuibu/'.$momcard->member_id)->with('status', 'Data Kartu Ibu Berhasil Diedit.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $momcard = momcard::findOrFail($id);
        momcard::destroy($id);
        return redirect('/polikia/kartuibu/'.$momcard->member_id)->with('status', 'Data Kartu Ibu Berhasil Dihapus.');
    }
}
