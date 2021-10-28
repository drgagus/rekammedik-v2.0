@extends ('../layouts/rekammedik')


@section('title', 'IGD')


@section('navigation')
@include ('igd/navigation')
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <form action="/igd/obatpasien" method="post">
            @csrf

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
    Jenis Kelamin
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
        <h2 class="text-center">{{$room->room}}</h2>
      </div>
      </div>

        <form action="/igd/obatpasien" method="post">
            @csrf
            
        <div class="row">
        <input type="hidden" name="pasien" value="{{$pasien->id}}">
        <input type="hidden" name="medicalrecord_id" value="{{$medicalrecord->id}}">
        <div class="col-lg-6">
          <div class="card bg-light mb-3">
            <div class="card-header">{{$medicalrecord->room->room}}</div>
            <div class="card-body">
              <h5 class="card-title">{{$medicalrecord->diag->diagnosa}}</h5>
              <p class="card-text">{{$medicalrecord->pengobatan}}</p>
              @for ($i = 1; $i < 6; $i++)
              <div class="row">
                  <div class="col-lg-12 p-0">
                      <div class="form-group d-flex">
                        <div class="col-9">
                          <select class="form-control mb-1" name="obat{{$medicalrecord->id.$i}}">
                                <option value="">nama obat</option>
                                @foreach ($medicines as $medicine)
                                <option value="{{$medicine->id}}">{{$medicine->obat}}</option>
                                @endforeach
                          </select>
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="jumlahobat{{$i}}" name="jumlah{{$medicalrecord->id.$i}}"  Placeholder="jumlah">
                        </div>
                      </div>
                  </div>
                </div>
              @endfor
            </div>
          </div>
        </div>
        </div>

        

      </div>
      <div class="card-footer bg-transparent border-success text-right">
      <button type="submit" class="btn btn-primary">INPUT</button>
      </div>
    </div>
    </form>
       
        </div>
    </div>
</div>

@endsection