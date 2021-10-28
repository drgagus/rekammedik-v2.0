@extends('layouts.app')

@section('content')

<div class="container ">
    <div class="row mb-4 ">
        <div class="col-lg-4">
            <div class="list-group border border-dark">
              <a href="/CEO" class="list-group-item bg-dark text-white text-decoration-none">Owner</a>
              <a href="/admin" class="list-group-item bg-success text-white text-decoration-none">Admin</a>
              <a class="list-group-item list-group-item-action" href={{url("/pendaftaran")}}>Pendaftaran</a>
              <a class="list-group-item list-group-item-action" href={{url('/pemeriksaanawal')}}>Pemeriksaan Awal</a>
              <a class="list-group-item list-group-item-action" href={{url("/poliumum")}}>{{$poli1->room}}</a>
              <a class="list-group-item list-group-item-action" href={{url("/poligigi")}}>{{$poli2->room}}</a>
              <a class="list-group-item list-group-item-action" href={{url("/polikia")}}>{{$poli3->room}}</a>
              <a class="list-group-item list-group-item-action" href={{url("/laboratorium")}}>Laboratorium</a>
              <a class="list-group-item list-group-item-action" href={{url("/apotek")}}>Apotek</a>
              <a class="list-group-item list-group-item-action" href={{url("/igd")}}>{{$poli10->room}}</a>
              <!-- <a class="list-group-item list-group-item-action" href={{url("/kasir")}}>Kasir</a> -->
            </div>
        </div>
    </div>
</div>

@endsection