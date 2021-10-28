@extends ('../layouts/rekammedik')


@section('title', 'Admin')


@section('navigation')
@include ('admin/navigation')
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
<a href="/admin/user" class="text-decoration-none text-dark">Daftar User</a>
</h3>
<a href="/admin/user/create" class="btn btn-sm btn-primary">+User</a>
    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Username</th>
                    <th scope="col">Reset<br>Password</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <td class="">#</td>
                    <td class=""><a href="/admin/user/{{$user->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$user->name}}</a></td>
                    <td class="">{{$user->jabatan}}</td>
                    <td class="">{{$user->username}}</td>
                    <td class="">
<!-- ----reset password----- -->
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#exampleModalreset{{$user->id}}">
            reset
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalreset{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/user/{{$user->id}}/reset" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                    <div class="col-lg-12">
                    Nama : {{$user -> name}}<br>
                    Password akan direset menjadi 1234
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
<!-- ----akhir reset password----- -->
                    </td>
                    <td class="">
<!-- ----hapus----- -->
        <!-- Button trigger modal -->
@if (count($user->medicalrecord))
@else
    @if (count($user->labrecord))
    @else
        @if (count($user->medicinerecord))
        @else
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
            hapus
            </button>
        @endif
    @endif
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
                    <form action="/admin/user/{{$user->id}}" method="post">
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