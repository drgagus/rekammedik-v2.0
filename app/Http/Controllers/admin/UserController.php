<?php

namespace App\Http\Controllers\admin;

use App\Mymodels\medicinerecord;
use App\Mymodels\labrecord;
use App\Mymodels\medicalrecord;
use App\Mymodels\user;
use App\Mymodels\room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poli1 = room::findOrFail(1);
        $poli2 = room::findOrFail(2);
        $poli3 = room::findOrFail(3);
        $poli10 = room::findOrFail(10);
        $users = user::where('id', '>', 1)->where('jabatan', '!=', 'admin')->get();
        return view('admin/daftaruser', [
            'users' => $users,
            'poli1' => $poli1,
            'poli2' => $poli2,
            'poli3' => $poli3,
            'poli10' => $poli10
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poli1 = room::findOrFail(1);
        $poli2 = room::findOrFail(2);
        $poli3 = room::findOrFail(3);
        $poli10 = room::findOrFail(10);
        return view('admin/forminputuser', [
            'poli1' => $poli1,
            'poli2' => $poli2,
            'poli3' => $poli3,
            'poli10' => $poli10
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
            'name' => 'required|max:30',
            'jabatan' => 'required',
            'username' => 'required|max:20|min:4|unique:users',
            'password' => 'required|max:20|min:4|confirmed:password_confirmation'
        ]);

        user::create([
            'username' => $request -> username,
            'name' => $request -> name,
            'jabatan' => $request -> jabatan,
            'password' => Hash::make($request -> password)
        ]);

        return redirect('/admin/user')->with('status', 'User Baru Berhasil Ditambahkan.');
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
        if ($id == 1){
            abort(401);
        }

        $user = user::findOrFail($id);
        
        if ($user->jabatan == 'admin'){
            abort(401);
        }

        $poli1 = room::findOrFail(1);
        $poli2 = room::findOrFail(2);
        $poli3 = room::findOrFail(3);
        $poli10 = room::findOrFail(10);
        return view('admin/formedituser', [
            'user' => $user,
            'poli1' => $poli1,
            'poli2' => $poli2,
            'poli3' => $poli3,
            'poli10' => $poli10
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
        if ($id == 1){
            abort(401);
        }

        $user = user::findOrFail($id);
        
        if ($user->jabatan == 'admin'){
            abort(401);
        }

        $request->validate([
            'name' => 'required|max:30',
            'jabatan' => 'required',
            'username' => 'required|max:20|min:4'
        ]);

        user::where('id', $id)->update([
            'username' => $request -> username,
            'name' => $request -> name,
            'jabatan' => $request -> jabatan
        ]);

        return redirect('/admin/user')->with('status', 'User Berhasil Diubah.');

    }
    
    public function reset(Request $request, $id)
    {
        $user = user::findOrFail($id);
        user::where('id', $id)->update([
            'password' => Hash::make('1234')
        ]);

        return redirect('/admin/user')->with('status', 'Password '.$user->name.' Berhasil Direset.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1){
            abort(401);
        }
        $user = user::findOrFail($id);
        
        if ($user->jabatan == 'admin'){
            abort(401);
        }

        $medicalrecords = medicalrecord::where('user_id',$id)->get();
        $medicinerecords = medicinerecord::where('user_id',$id)->get();
        $labrecords = labrecord::where('user_id',$id)->get();
        if (count($medicalrecords)):
            return redirect('/admin/user')->with('status', $user->name.' Tidak Dapat Dihapus.');
        else:
            if (count($labrecords)):
                return redirect('/admin/user')->with('status', $user->name.' Tidak Dapat Dihapus.');
            else:
                if (count($medicinerecords)):
                    return redirect('/admin/user')->with('status', $user->name.' Tidak Dapat Dihapus.');
                else:
                    user::destroy($id);
                    return redirect('/admin/user')->with('status', $user->name.' Berhasil Dihapus.');
                endif;
            endif;
        endif;
    }
}
