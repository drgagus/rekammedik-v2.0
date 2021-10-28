@extends ('../layouts/rekammedik')


@section('title', 'Poli Umum')


@section('navigation')
@include ('poliumum/navigation')
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <form action="/poliumum/ceklab/{{$medicalrecord->id}}/edit" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="medicalrecord_id" value={{$medicalrecord->id}}>
        <div class="card border-primary mb-3">
      <div class="card-header">
<div class="row">
<div class="col-lg-6">
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Nama
    <span class="btn btn-outline-dark">{{$pasien->nama}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Umur
    <span class="btn btn-outline-dark">{{$pasien->patient->umur}}</span>
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
        <h2 class="text-center">CEK-LAB</h2>
      </div>
      </div>
        
        <div class="row">
          @foreach ($typeoflabs as $typeoflab)
          <div class="col-lg-4 mb-3">
            <div class="row font-weight-bold">{{$typeoflab->tipe}}</div>
                @foreach ($typeoflab->lab as $lab)
                  @if ($lab->active == 1 )
                    <div class="form-check">
                    <input type="checkbox" id="pemeriksaan{{$lab->id}}" value="1" name="pemeriksaan{{$lab->id}}" class="form-check-input" 
                    @foreach ($labrecords as $labrecord)
                        @if ($labrecord->lab_id == $lab->id)
                        checked
                        @else
                        @endif
                    @endforeach
                     > <label class="form-check-label" for="pemeriksaan{{$lab->id}}">{{$lab->pemeriksaan}}</label>
                    </div>
                  @else
                    <div class="form-check">
                    <label class="form-check-label text-danger" for="pemeriksaan{{$lab->id}}">{{$lab->pemeriksaan}}</label>
                    </div>
                  @endif
                @endforeach
          </div>
          @endforeach
        </div>

        

      </div>
      <div class="card-footer bg-transparent border-success text-right">
      <button type="submit" class="btn btn-primary">EDIT</button>
      </div>
    </div>
    </form>
       
        </div>
    </div>
</div>

@endsection