<?php

namespace App\Http\Controllers\pendaftaran;

use App\Mymodels\medicalrecord;
use App\Mymodels\member;
use App\Mymodels\head;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = member::orderBy('nama', 'asc')->paginate(9);
        $nama = 'agus';
        return view('pendaftaran/daftaranggotakeluarga', [
            'nama' => $nama,
            'members' => $members
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kepalakeluarga = head::findOrFail($id);
        return view('pendaftaran/forminputanggotakeluarga', ['kepalakeluarga' => $kepalakeluarga]);
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
            'nama' => 'required',
            'nik' => 'required|unique:members',
            'jeniskelamin' => 'required',
            'tanggallahir' => 'required',
            'perkawinan' => 'required',
            'hubungankeluarga' => 'required',
            'jaminankesehatan' => 'required',
        ]);

        $member = new member ;
        $member -> head_id = $request -> head_id ;
        $member -> nama = $request -> nama ;
        $member -> nik = $request -> nik ;
        $member -> jeniskelamin = $request -> jeniskelamin ;
        $member -> tempatlahir = $request -> tempatlahir ;
        $member -> tanggallahir = $request -> tanggallahir ;
        $member -> agama = $request -> agama ;
        $member -> pendidikan = $request -> pendidikan ;
        $member -> pekerjaan = $request -> pekerjaan ;
        $member -> golongandarah = $request -> golongandarah ;
        $member -> perkawinan = $request -> perkawinan ;
        $member -> hubungankeluarga = $request -> hubungankeluarga ;
        $member -> jaminankesehatan = $request -> jaminankesehatan ;
        $member -> nomorjaminankesehatan = $request -> nomorjaminankesehatan ;
        $member -> nomortelepon = $request -> nomortelepon ;
        $member ->save();

        $baru = member ::latest()->first();

        return redirect('/pendaftaran/anggotakeluarga/'.$baru->id)->with('status', 'Anggota Keluarga Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggotakeluarga = member::findOrFail($id);
        $head_id = $anggotakeluarga->head_id;
        $kepalakeluarga = head::find($head_id);
        $medicalrecords = medicalrecord::where('member_id',$id)->get();
        return view('pendaftaran/detailanggotakeluarga', [
            'anggotakeluarga' => $anggotakeluarga,
            'kepalakeluarga' => $kepalakeluarga,
            'medicalrecords' => $medicalrecords
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
        $anggotakeluarga = member::findOrFail($id);
        $kepalakeluarga = $anggotakeluarga->head;
        return view('pendaftaran/formeditanggotakeluarga', [
            'anggotakeluarga'=> $anggotakeluarga,
            'kepalakeluarga' => $kepalakeluarga
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
            'nama' => 'required',
            'nik' => 'required',
            'jeniskelamin' => 'required',
            'tanggallahir' => 'required',
            'perkawinan' => 'required',
            'hubungankeluarga' => 'required',
            'jaminankesehatan' => 'required',
        ]);

        member::where('id',$id)->update([
            'head_id' => $request -> head_id,
            'nama' => $request -> nama,
            'nik' => $request -> nik,
            'jeniskelamin' => $request -> jeniskelamin,
            'tempatlahir' => $request -> tempatlahir,
            'tanggallahir' => $request -> tanggallahir,
            'agama' => $request -> agama,
            'pendidikan' => $request -> pendidikan,
            'pekerjaan' => $request -> pekerjaan,
            'golongandarah' => $request -> golongandarah,
            'perkawinan' => $request -> perkawinan,
            'hubungankeluarga' => $request -> hubungankeluarga,
            'jaminankesehatan' => $request -> jaminankesehatan,
            'nomorjaminankesehatan' => $request -> nomorjaminankesehatan,
            'nomortelepon' => $request -> nomortelepon
            ]);
    
            return redirect()->to('/pendaftaran/anggotakeluarga/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicalrecords = medicalrecord::where('member_id',$id)->get();
        if (count($medicalrecords)):
            $head_id = member::find($id)->head->id;
            return redirect('/pendaftaran/kepalakeluarga/'.$head_id)->with('status', 'Anggota Keluarga Tidak Dapat Dihapus.');
        else:
            $head_id = member::find($id)->head->id;
            member::destroy($id);
            return redirect('/pendaftaran/kepalakeluarga/'.$head_id)->with('status', 'Anggota Keluarga Berhasil Dihapus.');
        endif;
    }
}
