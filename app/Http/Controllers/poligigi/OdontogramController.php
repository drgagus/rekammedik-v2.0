<?php

namespace App\Http\Controllers\poligigi;

use App\Mymodels\odontogram;
use App\Mymodels\patient;
use App\Mymodels\member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OdontogramController extends Controller
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
        $pasienhariini = patient::where('member_id', $id)->firstOrFail();
        $pasien = member::findOrFail($id);
        return view('poligigi/forminputodontogram', [
            'pasien' => $pasien
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
            'member_id' => 'unique:odontograms',
            'gigi11' => 'required',
            'gigi12' => 'required',
            'gigi13' => 'required',
            'gigi14' => 'required',
            'gigi15' => 'required',
            'gigi16' => 'required',
            'gigi17' => 'required',
            'gigi18' => 'required',
            'gigi21' => 'required',
            'gigi22' => 'required',
            'gigi23' => 'required',
            'gigi24' => 'required',
            'gigi25' => 'required',
            'gigi26' => 'required',
            'gigi27' => 'required',
            'gigi28' => 'required',
            'gigi31' => 'required',
            'gigi32' => 'required',
            'gigi33' => 'required',
            'gigi34' => 'required',
            'gigi35' => 'required',
            'gigi36' => 'required',
            'gigi37' => 'required',
            'gigi38' => 'required',
            'gigi41' => 'required',
            'gigi42' => 'required',
            'gigi43' => 'required',
            'gigi44' => 'required',
            'gigi45' => 'required',
            'gigi46' => 'required',
            'gigi47' => 'required',
            'gigi48' => 'required',
            'periodontal' => 'required',
            'karanggigi' => 'required',
            'sikatgigi' => 'required',
            'debris16' => 'required',
            'debris11' => 'required',
            'debris26' => 'required',
            'debris46' => 'required',
            'debris31' => 'required',
            'debris36' => 'required',
            'kalkulus16' => 'required',
            'kalkulus11' => 'required',
            'kalkulus26' => 'required',
            'kalkulus46' => 'required',
            'kalkulus31' => 'required',
            'kalkulus36' => 'required'
        ]);

        $indeksdebris = number_format(($request->debris16 + $request->debris11 + $request->debris26 + $request->debris46 + $request->debris31 + $request->debris36)/6 , 2) ;
        $indekskalkulus = number_format(($request->kalkulus16 + $request->kalkulus11 + $request->kalkulus26 + $request->kalkulus46 + $request->kalkulus31 + $request->kalkulus36)/6 , 2) ;
        $ohis = number_format(($indeksdebris+$indekskalkulus)/2 , 2);

        $odontogram = new odontogram ;
        $odontogram -> member_id = $request -> member_id ;
        $odontogram -> tanggalkunjungan = $request -> tanggalkunjungan ;
        $odontogram -> gigi11 = $request -> gigi11 ;
        $odontogram -> gigi12 = $request -> gigi12 ;
        $odontogram -> gigi13 = $request -> gigi13 ;
        $odontogram -> gigi14 = $request -> gigi14 ;
        $odontogram -> gigi15 = $request -> gigi15 ;
        $odontogram -> gigi16 = $request -> gigi16 ;
        $odontogram -> gigi17 = $request -> gigi17 ;
        $odontogram -> gigi18 = $request -> gigi18 ;
        $odontogram -> gigi21 = $request -> gigi21 ;
        $odontogram -> gigi22 = $request -> gigi22 ;
        $odontogram -> gigi23 = $request -> gigi23 ;
        $odontogram -> gigi24 = $request -> gigi24 ;
        $odontogram -> gigi25 = $request -> gigi25 ;
        $odontogram -> gigi26 = $request -> gigi26 ;
        $odontogram -> gigi27 = $request -> gigi27 ;
        $odontogram -> gigi28 = $request -> gigi28 ;
        $odontogram -> gigi31 = $request -> gigi31 ;
        $odontogram -> gigi32 = $request -> gigi32 ;
        $odontogram -> gigi33 = $request -> gigi33 ;
        $odontogram -> gigi34 = $request -> gigi34 ;
        $odontogram -> gigi35 = $request -> gigi35 ;
        $odontogram -> gigi36 = $request -> gigi36 ;
        $odontogram -> gigi37 = $request -> gigi37 ;
        $odontogram -> gigi38 = $request -> gigi38 ;
        $odontogram -> gigi41 = $request -> gigi41 ;
        $odontogram -> gigi42 = $request -> gigi42 ;
        $odontogram -> gigi43 = $request -> gigi43 ;
        $odontogram -> gigi44 = $request -> gigi44 ;
        $odontogram -> gigi45 = $request -> gigi45 ;
        $odontogram -> gigi46 = $request -> gigi46 ;
        $odontogram -> gigi47 = $request -> gigi47 ;
        $odontogram -> gigi48 = $request -> gigi48 ;
        $odontogram -> periodontal = $request -> periodontal ;
        $odontogram -> karanggigi = $request -> karanggigi ;
        $odontogram -> sikatgigi = $request -> sikatgigi ;
        $odontogram -> debris16 = $request -> debris16 ;
        $odontogram -> debris11 = $request -> debris11 ;
        $odontogram -> debris26 = $request -> debris26 ;
        $odontogram -> debris46 = $request -> debris46 ;
        $odontogram -> debris31 = $request -> debris31 ;
        $odontogram -> debris36 = $request -> debris36 ;
        $odontogram -> kalkulus16 = $request -> kalkulus16 ;
        $odontogram -> kalkulus11 = $request -> kalkulus11 ;
        $odontogram -> kalkulus26 = $request -> kalkulus26 ;
        $odontogram -> kalkulus46 = $request -> kalkulus46 ;
        $odontogram -> kalkulus31 = $request -> kalkulus31 ;
        $odontogram -> kalkulus36 = $request -> kalkulus36 ;
        $odontogram -> indeksdebris = $indeksdebris ;
        $odontogram -> indekskalkulus = $indekskalkulus ;
        $odontogram -> ohis = $ohis ;
        $odontogram ->save();

        $member_id = $request -> member_id;
        $patient_id = patient::where('member_id', $member_id)->firstOrFail()->id ;
    
        return redirect()->to('/poligigi/pasien/create/'.$patient_id);

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
        $patient = patient::where('member_id',$id)->firstOrFail();
        $pasien = member::findOrFail($id);
        $odontogram = odontogram::where('member_id', $id )->firstOrFail();
        
        return view('poligigi/formeditodontogram', [
            'pasien' => $pasien,
            'odontogram' => $odontogram
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
            'member_id' => 'unique:odontograms',
            'gigi11' => 'required',
            'gigi12' => 'required',
            'gigi13' => 'required',
            'gigi14' => 'required',
            'gigi15' => 'required',
            'gigi16' => 'required',
            'gigi17' => 'required',
            'gigi18' => 'required',
            'gigi21' => 'required',
            'gigi22' => 'required',
            'gigi23' => 'required',
            'gigi24' => 'required',
            'gigi25' => 'required',
            'gigi26' => 'required',
            'gigi27' => 'required',
            'gigi28' => 'required',
            'gigi31' => 'required',
            'gigi32' => 'required',
            'gigi33' => 'required',
            'gigi34' => 'required',
            'gigi35' => 'required',
            'gigi36' => 'required',
            'gigi37' => 'required',
            'gigi38' => 'required',
            'gigi41' => 'required',
            'gigi42' => 'required',
            'gigi43' => 'required',
            'gigi44' => 'required',
            'gigi45' => 'required',
            'gigi46' => 'required',
            'gigi47' => 'required',
            'gigi48' => 'required',
            'periodontal' => 'required',
            'karanggigi' => 'required',
            'sikatgigi' => 'required',
            'debris16' => 'required',
            'debris11' => 'required',
            'debris26' => 'required',
            'debris46' => 'required',
            'debris31' => 'required',
            'debris36' => 'required',
            'kalkulus16' => 'required',
            'kalkulus11' => 'required',
            'kalkulus26' => 'required',
            'kalkulus46' => 'required',
            'kalkulus31' => 'required',
            'kalkulus36' => 'required'
        ]);

        $indeksdebris = number_format(($request->debris16 + $request->debris11 + $request->debris26 + $request->debris46 + $request->debris31 + $request->debris36)/6 , 2) ;
        $indekskalkulus = number_format(($request->kalkulus16 + $request->kalkulus11 + $request->kalkulus26 + $request->kalkulus46 + $request->kalkulus31 + $request->kalkulus36)/6 , 2) ;
        $ohis = number_format(($indeksdebris+$indekskalkulus)/2 , 2);

        odontogram::where('member_id',$id)->update([
        'gigi11' => $request -> gigi11,
        'gigi12' => $request -> gigi12,
        'gigi13' => $request -> gigi13,
        'gigi14' => $request -> gigi14,
        'gigi15' => $request -> gigi15,
        'gigi16' => $request -> gigi16,
        'gigi17' => $request -> gigi17,
        'gigi18' => $request -> gigi18,
        'gigi21' => $request -> gigi21,
        'gigi22' => $request -> gigi22,
        'gigi23' => $request -> gigi23,
        'gigi24' => $request -> gigi24,
        'gigi25' => $request -> gigi25,
        'gigi26' => $request -> gigi26,
        'gigi27' => $request -> gigi27,
        'gigi28' => $request -> gigi28,
        'gigi31' => $request -> gigi31,
        'gigi32' => $request -> gigi32,
        'gigi33' => $request -> gigi33,
        'gigi34' => $request -> gigi34,
        'gigi35' => $request -> gigi35,
        'gigi36' => $request -> gigi36,
        'gigi37' => $request -> gigi37,
        'gigi38' => $request -> gigi38,
        'gigi41' => $request -> gigi41,
        'gigi42' => $request -> gigi42,
        'gigi43' => $request -> gigi43,
        'gigi44' => $request -> gigi44,
        'gigi45' => $request -> gigi45,
        'gigi46' => $request -> gigi46,
        'gigi47' => $request -> gigi47,
        'gigi48' => $request -> gigi48,
        'periodontal' => $request -> periodontal,
        'karanggigi' => $request -> karanggigi,
        'sikatgigi' => $request -> sikatgigi,
        'debris16' => $request -> debris16,
        'debris11' => $request -> debris11,
        'debris26' => $request -> debris26,
        'debris46' => $request -> debris46,
        'debris31' => $request -> debris31,
        'debris36' => $request -> debris36,
        'kalkulus16' => $request -> kalkulus16,
        'kalkulus11' => $request -> kalkulus11,
        'kalkulus26' => $request -> kalkulus26,
        'kalkulus46' => $request -> kalkulus46,
        'kalkulus31' => $request -> kalkulus31,
        'kalkulus36' => $request -> kalkulus36,
        'indeksdebris' => $indeksdebris,
        'indekskalkulus' => $indekskalkulus,
        'ohis' => $ohis
            ]);

        return redirect()->to('/poligigi');
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
