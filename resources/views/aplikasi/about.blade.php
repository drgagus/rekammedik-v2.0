@extends('layouts.app')

@section('content')
<div class="container">
<!-- <a href="javascript:window.history.go(-1);" class="text-primary">KEMBALI</a> -->
    <div class="row">
        <div class="col-lg-12">
            <p class="">Ini adalah aplikasi rekam medik digital . . .</p>
            <p class=""><img src="{{ asset ('images/alur.png') }}" alt="" class="" style="width:100%"></p>
            <p class="text-right"><a href="{{ asset ('doc/guide.pdf') }}" target=_blank class="btn btn-sm btn-dark text-white">download</a></p>
        </div>
    </div>
</div>
@endsection