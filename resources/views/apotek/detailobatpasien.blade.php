@extends ('../layouts/rekammedik')


@section('title', 'Apotek')


@section('navigation')
@include ('apotek/navigation')
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
    <span class="btn btn-outline-dark">{{$pasien->member->nama}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Umur
    <span class="btn btn-outline-dark">{{$pasien->umur}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Jenis Kelamin
    <span class="btn btn-outline-dark">{{$pasien->member->jeniskelamin}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Jaminan Kesehatan
    <span class="btn btn-outline-dark">{{$pasien->member->jaminankesehatan}}</span>
  </li>
</ul>
</div>
<div class="col-lg-6">
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Nomor Rekam Medik
    <span class="btn btn-outline-dark">{{$pasien->member->head->norm}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Kepala Keluarga
    <span class="btn btn-outline-dark">Tn. {{$pasien->member->head->kepalakeluarga}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Alamat
    <span class="btn btn-outline-dark">{{$pasien->member->head->village->desa}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Tanggal
    <span class="btn btn-dark">{{date('d M Y')}}</span>
  </li>
</ul>
</div>
</div>

      </div>
      <div class="card-body text-dark">

      <div class="row">
      <div class="col-lg-12">
        <h2 class="text-center">APOTEK</h2>
      </div>
      </div>

        
        <div class="row mt-3">
        @foreach ($medicalrecords as $medicalrecord)
        <div class="col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-header">{{$medicalrecord->room->room}}</div>
                <div class="card-body">
                    <h5 class="card-title">Diagnosa : {{$medicalrecord->diag->diagnosa}}</h5>
                        <table class="table table-hover">
                        <tr class=""><td class="">#</td><td class="">Nama Obat</td><td class="">Jumlah</td></tr>
                        @foreach ($medicalrecord->medicinerecord as $medicalmedicine)
                        <tr class=""><td class="">#</td><td class="">{{$medicalmedicine->medicine->obat}}</td><td class="">{{$medicalmedicine->jumlah}}</td></tr>
                        @endforeach
                        </table>
                </div>
            <div class="card-footer bg-transparent border-success text-right">
                <a href="/apotek/pasien/{{$medicalrecord->id}}/edit" class="btn btn-primary">EDIT</a>
            </div>
            </div>
        </div>
        @endforeach
        </div>

        

      </div> 
    </div>
    
       
        </div>
    </div>
</div>

@endsection