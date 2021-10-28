@extends ('../layouts/rekammedik')


@section('title', 'Apotek')


@section('navigation')
@include ('apotek/navigation')
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <form action="/apotek/pasien" method="post">
            @csrf

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
            
        <div class="row">
        <input type="hidden" name="pasien" value="{{$pasien->member->id}}">
        @foreach ($medicalrecords as $medicalrecord)
        <input type="hidden" name="medicalrecord_id{{$medicalrecord->id}}" value="{{$medicalrecord->id}}">
        <div class="col-lg-12">
          <div class="card bg-light mb-3">
            <div class="card-header">{{$medicalrecord->room->room}}</div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4">
                    <h5 class="card-title">{{$medicalrecord->diag->diagnosa}}</h5>
                    <p class="card-text">{!! nl2br($medicalrecord->pengobatan) ?? '-' !!}</p>
                </div>
                <div class="col-lg-8">
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
        @endforeach
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