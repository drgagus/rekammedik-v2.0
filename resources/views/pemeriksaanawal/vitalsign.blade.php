@extends ('../layouts/rekammedik')


@section('title', 'Pemeriksaan Awal')


@section('navigation')
@include ('pemeriksaanawal/navigation')
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
        <h2 class="text-center">PEMERIKSAAN AWAL</h2>
      </div>
      </div>

        <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="font-weight-bold" for="keluhanutama">Keluhan Utama</label>
            <input type="text" class="form-control" id="keluhanutama" name="keluhanutama" value="{{ old('keluhanutama') ?? $pasien->keluhanutama}}"readonly>
            @error('keluhanutama')<label class="text text-danger">Keluhan utama harus diisi</label>@enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="font-weight-bold" for="tinggibadan" name="tinggibadan">Tinggi Badan (cm)</label>
            <input type="text" class="form-control" id="tinggibadan" name="tinggibadan" value="{{ old('tinggibadan') ?? $pasien->tinggibadan}}"readonly>
            @error('tinggibadan')<label class="text text-danger">Tinggi badan harus diisi</label>@enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="font-weight-bold" for="beratbadan">Berat Badan (Kg)</label>
            <input type="text" class="form-control" id="beratbadan" name="beratbadan" value="{{ old('beratbadan') ?? $pasien->beratbadan}}"readonly>
            @error('beratbadan')<label class="text text-danger">Berat badan harus diisi</label>@enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="font-weight-bold" for="lingkarperut">Lingkar Perut (cm)</label>
            <input type="text" class="form-control" id="lingkarperut" name="lingkarperut" value="{{ old('lingkarperut') ?? $pasien->lingkarperut}}"readonly>
            @error('lingkarperut')<label class="text text-danger">Lingkar perut harus diisi</label>@enderror
          </div>
        </div>
        </div>
        
        <div class="row">
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="tekanandarah" name="tekanandarah">Tekanan Darah (mm/Hg)</label>
            <input type="text" class="form-control" id="tekanandarah" name="tekanandarah" value="{{ old('tekanandarah') ?? $pasien->tekanandarah}}"readonly>
            @error('tekanandarah')<label class="text text-danger">Tekanan darah harus diisi</label>@enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="pernafasan">Pernafasan (/menit)</label>
            <input type="text" class="form-control" id="pernafasan" name="pernafasan" value="{{ old('pernafasan') ?? $pasien->pernafasan}}"readonly>
            @error('pernafasan')<label class="text text-danger">Pernafasan harus diisi</label>@enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="detakjantung">Detak Jantung (/menit)</label>
            <input type="text" class="form-control" id="detakjantung" name="detakjantung" value="{{ old('detakjantung') ?? $pasien->detakjantung}}"readonly>
            @error('detakjantung')<label class="text text-danger">Detak jantung harus diisi</label>@enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="suhu">Suhu (celcius)</label>
            <input type="text" class="form-control" id="suhu" name="suhu" value="{{ old('suhu') ?? $pasien->suhu}}"readonly>
            @error('suhu')<label class="text text-danger">Suhu tubuh harus diisi</label>@enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="pemeriksaanawal">Pemeriksaan Awal</label>
              <textarea class="form-control" id="pemeriksaanawal" rows="3" name="pemeriksaanawal" readonly>{{ old('pemeriksaanawal') ?? $pasien->pemeriksaanawal}}</textarea>
              @error('pemeriksaanawal')<label class="text text-danger">Pemeriksaan awal harus diisi</label>@enderror
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-3">
          <div class="form-group">
              <label class="font-weight-bold" for="room_id">Poli</label>
              <select class="form-control" id="room_id" name="room_id" readonly>
                    <option value="">--pilih poli tujuan--</option>
                    @foreach ($rooms as $room)
                      <option {{ $pasien->room_id === $room->id ? 'selected':'' }} value="{{$room->id}}">{{$room->room}}</option>
                    @endforeach
              </select>
              @error('room_id')<label class="text text-danger">Poli harus dipilih</label>@enderror
          </div>
        </div>
        </div>

      </div>
    </div>
       
        </div>
    </div>
</div>

@endsection