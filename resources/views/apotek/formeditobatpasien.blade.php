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
    Janis Kelamin
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

        <form action="/apotek/pasien/{{$medicalrecord->id}}/edit" method="post" class="">
        @csrf
        @method('patch')
        <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-header"> {{$medicalrecord->room->room}}  </div>
                <div class="card-body">
                    <h5 class="card-title">Diagnosa :   {{$medicalrecord->diag->diagnosa}}</h5>

        @foreach ($medicinerecords as $medicalmedicine)
                <div class="row">
                  <div class="col-lg-12 p-0">
                      <div class="form-group d-flex">
                        <div class="col-9">
                        <input type="hidden" name="medicalrecord" value="{{$medicalrecord->id}}">
                          <select class="form-control mb-1" name="obat{{$medicalmedicine->id}}">
                                <option value="hapus" class="text-danger">--hapus obat--</option>
                                <option value="{{$medicalmedicine -> medicine_id}}" selected>{{$medicalmedicine -> medicine ->obat}}</option>
                                <!-- @foreach ($medicines as $medicine)
                                <option {{ $medicalmedicine -> medicine_id === $medicine->id ? 'selected':'' }} value="{{$medicine->id}}">{{$medicine->obat}}</option>
                                @endforeach -->
                          </select>
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" name="jumlah{{$medicalmedicine->id}}"  value="{{$medicalmedicine->jumlah}}">
                        </div>
                      </div>
                  </div>
                </div>
        @endforeach

        @for ($i = 1; $i < 6; $i++)
              <div class="row">
                  <div class="col-lg-12 p-0">
                      <div class="form-group d-flex">
                        <div class="col-9">
                        <input type="hidden" name="medicalrecordid{{$medicalrecord->id}}" value="{{$medicalrecord->id}}">
                          <select class="form-control mb-1" name="obat{{$medicalrecord->id.$i}}">
                                <option value="" >nama obat</option>
                                @foreach ($medicines as $medicine)
                                <option value="{{$medicine->id}}">{{$medicine->obat}}</option>
                                @endforeach
                          </select>
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" name="jumlah{{$medicalrecord->id.$i}}"  Placeholder="jumlah">
                        </div>
                      </div>
                  </div>
                </div>
              @endfor

                </div>
            <div class="card-footer bg-transparent border-success text-right">
            <button type="submit" class="btn btn-primary">EDIT</button>
            </div>
            </div>
        </div>
        </div>
        </form>

        

      </div> 
    </div>
    
       
        </div>
    </div>
</div>

@endsection