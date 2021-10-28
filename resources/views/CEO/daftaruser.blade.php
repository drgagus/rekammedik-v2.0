@extends ('../layouts/rekammedik')


@section('title', 'CEO')


@section('navigation')
@include ('CEO/navigation')
@endsection



@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-6">
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>
        </div>

<h3>
<a href="/CEO/user" class="text-decoration-none text-dark">Daftar User</a>
</h3>
<a href="/CEO/user/create" class="btn btn-sm btn-primary">+User Admin</a>
    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Username</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Date Update</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <td class="">#</td>
                    <td class="">{{$user->name}}</td>
                    <td class="">{{$user->jabatan}}</td>
                    <td class="">{{$user->username}}</td>
                    <td class="">{{date('d M Y', strtotime($user->created_at))}}</td>
                    <td class="">{{date('d M Y', strtotime($user->updated_at))}}</td>
                    <td class="">
                    @if ($user->jabatan == 'admin')
                    <a href="/CEO/user/{{$user->id}}/edit" class="btn btn-sm btn-primary">Ganti Password</a>
                    @endif
                    </td>
                    <td class="">
<!-- ----hapus----- -->
        <!-- Button trigger modal -->
@if ($user->jabatan == 'admin')
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
            hapus
            </button>
@endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/CEO/user/{{$user->id}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Nama : {{$user -> name}}
                    </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
<!-- ----akhir hapus----- -->                 
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection