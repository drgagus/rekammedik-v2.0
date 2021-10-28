@extends ('../layouts/rekammedik')


@section('title', 'Admin')


@section('navigation')
@include ('admin/navigation')
@endsection



@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    <form method="POST" action="/admin/user/{{$user->id}}/edit">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name}}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jabatan" class="col-md-4 col-form-label text-md-right">Jabatan</label>
                            <div class="col-md-6">
                            <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" autofocus>
                                <option  {{ old('jabatan') ?? $user->jabatan === 'dokter' ? 'selected':'' }} value="dokter" >Dokter</option>
                                <option  {{ old('jabatan') ?? $user->jabatan === 'dokter gigi' ? 'selected':'' }} value="dokter gigi" >Dokter Gigi</option>
                                <option  {{ old('jabatan') ?? $user->jabatan === 'bidan' ? 'selected':'' }} value="bidan" >Bidan</option>
                                <option  {{ old('jabatan') ?? $user->jabatan === 'perawat' ? 'selected':'' }} value="perawat" >Perawat</option>
                                <option  {{ old('jabatan') ?? $user->jabatan === 'analis kesehatan' ? 'selected':'' }} value="analis kesehatan" >Analis Kesehatan</option>
                                <option {{ old('jabatan') ?? $user->jabatan === 'apoteker' ? 'selected':'' }}  value="apoteker" >Apoteker</option>
                                <option  {{ old('jabatan') ?? $user->jabatan === 'pendaftaran' ? 'selected':'' }} value="pendaftaran" >Pendaftaran</option>
                                <option  {{ old('jabatan') ?? $user->jabatan === 'kasir' ? 'selected':'' }} value="kasir" >Kasir</option>
                            </select>

                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? $user->username}}" autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    EDIT
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>        
    </div>
</div>
@endsection