@extends ('../layouts/rekammedik')


@section('title', 'Laboratorium')


@section('navigation')
@include ('laboratorium/navigation')
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <form action="/laboratorium/pasien/{{$medicalrecord->id}}/edit" method="post">
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
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Poli
    <span class="btn btn-outline-dark">{{$medicalrecord->room->room}}</span>
  </li>
</ul>
</div>
</div>

      </div>
      <div class="card-body text-dark">

      <div class="row">
      <div class="col-lg-12">
        <h2 class="text-center">LABORATORIUM</h2>
      </div>
      </div>
        
        <div class="row">
            @foreach ($typeoflabs as $typeoflab)
              <div class="col-lg-4">
                <div class="row font-weight-bold">{{$typeoflab->tipe}}</div>
                    @foreach ($typeoflab->lab as $lab)
                   
                              @foreach ($labrecords as $labrecord)
                            @if ($lab->id === $labrecord->lab_id)
                        <div class="form-group d-flex">
                            <div class="col-8">
                                <label class="form-check-label" for="pemeriksaan{{$lab->id}}">{{$lab->pemeriksaan}}</label>
                            </div>
                            <div class="col-4">
                              <input type="text" class="form-control" id="pemeriksaan{{$lab->id}}" name="hasil{{$lab->id}}" 
                                value="{{$labrecord->hasil}}"
                          
                               >
                            </div>
                        </div>
                            @endif
                            @endforeach
                        
                    @endforeach  
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