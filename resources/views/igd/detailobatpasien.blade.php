@extends ('../layouts/rekammedik')


@section('title', 'IGD')


@section('navigation')
@include ('igd/navigation')
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <div class="card border-dark mb-3">
      <div class="card-header">
<div class="row">
<div class="col-lg-6">
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Nama
    <span class="btn btn-outline-dark">{{$pasien->nama}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Janis Kelamin
    <span class="btn btn-outline-dark">{{$pasien->jeniskelamin}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Jaminan Kesehatan
    <span class="btn btn-outline-dark">{{$pasien->jaminankesehatan}}</span>
  </li>
</ul>
</div>
<div class="col-lg-6">
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Nomor Rekam Medik
    <span class="btn btn-outline-dark">{{$pasien->head->norm}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Kepala Keluarga
    <span class="btn btn-outline-dark">Tn. {{$pasien->head->kepalakeluarga}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Alamat
    <span class="btn btn-outline-dark">{{$pasien->head->village->desa}}</span>
  </li>
</ul>
</div>
</div>

      </div>
      <div class="card-body text-dark">

      <div class="row">
      <div class="col-lg-12">
        <h2 class="text-center">{{$poli->room}}</h2>
      </div>
      </div>

        
        <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-header">{{$medicalrecord->room->room}}</div>
                <div class="card-body">
                    <h5 class="card-title">Diagnosa : {{$medicalrecord->diag->diagnosa}}</h5>
                        <table class="table table-hover">
                        <tr class=""><td class="">#</td><td class="">Nama Obat</td><td class="">Jumlah</td></tr>
                        @foreach ($medicinerecords as $medicinerecord)
                        <tr class=""><td class="">#</td><td class="">{{$medicinerecord->medicine->obat}}</td><td class="">{{$medicinerecord->jumlah}}</td></tr>
                        @endforeach
                        </table>
                </div>
            <div class="card-footer bg-transparent border-success text-right">
                <a href="/igd/obatpasien/{{$medicalrecord->id}}/edit" class="btn btn-primary">EDIT</a>
            </div>
            </div>
        </div>
        </div>

        

      </div> 
    </div>
    
       
        </div>
    </div>
</div>

@endsection