<?php

namespace App\Http\Controllers\CEO;

use App\Mymodels\user;
use App\Mymodels\head;
use App\Mymodels\member;
use App\Mymodels\diag;
use App\Mymodels\medicalrecord;
use App\Mymodels\laboftype;
use App\Mymodels\lab;
use App\Mymodels\labrecord;
use App\Mymodels\medicine;
use App\Mymodels\medicinerecord;
use App\Mymodels\room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heads = head::get();
        $members = member::get();
        $diags = diag::get();
        $medicalrecords = medicalrecord::get();
        $labs = lab::get();
        $labrecords = labrecord::get();
        $medicines = medicine::get();
        $medicinerecords = medicinerecord::get();
        return view('CEO/deleteall' , [
            'heads' => $heads,
            'members' => $members,
            'diags' => $diags,
            'medicalrecords' => $medicalrecords,
            'labs' => $labs,
            'labrecords' => $labrecords,
            'medicines' => $medicines,
            'medicinerecords' => $medicinerecords
        ]);
    }

    public function medicinerecords()
    {
        medicinerecord::truncate();
        return redirect('/CEO')->with('status', 'Kunjungan Apotek Telah Dihapus Semua');
    }
    
    public function medicines()
    {
        $medicinerecords = medicinerecord::get();
        if (count($medicinerecords)){
            return redirect('/CEO')->with('status', 'Data Obat Tidak Dapat Dihapus');
        }else{
            medicine::truncate();
            return redirect('/CEO')->with('status', 'Data Obat Telah Dihapus Semua');
        }
    }
    
    public function larecords()
    {
        larecord::truncate();
        return redirect('/CEO')->with('status', 'Kunjungan Laboratorium Telah Dihapus Semua');
    }
    
    public function labs()
    {
        $labrecords = labrecord::get();
        if (count($labrecords)){
            return redirect('/CEO')->with('status', 'Data Pemeriksaan Laboratorium Tidak Dapat Dihapus');
        }else{
            lab::truncate();
            return redirect('/CEO')->with('status', 'Data Pemerikssan Laboratorium Telah Dihapus Semua');
        }
    }
    
    public function medicalrecords()
    {
        $medicinerecords = medicinerecord::get();
        $labrecords = labrecord::get();
        if (count($medicinerecords)){
            return redirect('/CEO')->with('status', 'Kunjungan Pasien Tidak Dapat Dihapus');
        }else{
            if (count($labrecords)){
                return redirect('/CEO')->with('status', 'Kunjungan Pasien Tidak Dapat Dihapus');
            }else{
                medicalrecord::truncate();
                return redirect('/CEO')->with('status', 'Kunjungan Pasien Telah Dihapus Semua');
            }
        }
    }
    
    public function diags()
    {
        $medicalrecords = medicalrecord::get();
        if (count($medicalrecords)){
            return redirect('/CEO')->with('status', 'Data Diagnosa Tidak Dapat Dihapus');
        }else{
            diag::truncate();
            return redirect('/CEO')->with('status', 'Data Diagnosa Telah Dihapus Semua');
        }
    }

    public function members()
    {
        $medicalrecords = medicalrecord::get();
        if (count($medicalrecords)){
            return redirect('/CEO')->with('status', 'Data Pasien Tidak Dapat Dihapus');
        }else{
            member::truncate();
            return redirect('/CEO')->with('status', 'Data Pasien Telah Dihapus Semua');
        }
    }
    
    public function heads()
    {
        $members = member::get();
        if (count($members)){
            return redirect('/CEO')->with('status', 'Data Kepala Keluarga Tidak Dapat Dihapus');
        }else{
            member::truncate();
            return redirect('/CEO')->with('status', 'Data Kepala Keluarga Telah Dihapus Semua');
        }
    }

    public function akun()
    {
        $users = user::where('id', '>', 1)->orderBy('jabatan','asc')->get();
        return view('CEO/daftaruser', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CEO/forminputuser');
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
            'name' => 'required|max:30',
            'username' => 'required|max:20|min:4|unique:users',
            'password' => 'required|max:20|min:4|confirmed:password_confirmation'
        ]);

        user::create([
            'username' => $request -> username,
            'name' => $request -> name,
            'jabatan' => 'admin',
            'password' => Hash::make($request -> password)
        ]);

        return redirect('/CEO/user')->with('status', 'User Admin Berhasil Ditambahkan.');
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
        $user = user::where('jabatan','admin')->where('id',$id)->firstOrFail();
        return view('CEO/formedituser', [
            'user' => $user
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
            'name' => 'required|max:30',
            'username' => 'required|max:20|min:4',
            'password' => 'required|max:20|min:4|confirmed:password_confirmation'
        ]);

        $new_password = $request->password;
        $user = user::where('jabatan','admin')->where('id',$id)->firstOrFail();
        user::where('id', $id)->update([
            'password' => Hash::make($new_password)
        ]);
        return redirect('/CEO/user')->with('status', 'Password '.$user->name.' Berhasil Diganti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::where('jabatan','admin')->where('id',$id)->firstOrFail();
        user::destroy($id);
        return redirect('/CEO/user')->with('status', $user->name.' Berhasil Dihapus.');
    }
}
