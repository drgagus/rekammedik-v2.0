@extends('layouts.app')

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

    <div class="row">
        <div class="col-lg-6">

        <div class="card bg-light mb-3">
                <div class="card-header"><a href="/akun/name" class="text-decoration-none text-dark font-weight-bold">{{Auth::user()->name}}</a></div>
                <div class="card-body">
                    <h5 class="card-title">Username : {{Auth::user()->username}}</h5>
                    - {{Auth::user()->jabatan}} -
                </div>
            <div class="card-footer bg-transparent border-success text-right">
                <a href="/akun/password" class="btn btn-primary">Ganti Password</a>
            </div>
            </div>

        </div>
    </div>
</div>
@endsection