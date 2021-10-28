@extends ('../layouts/rekammedik')


@section('title', 'pendaftaran')


@section('navigation')
@include ('pendaftaran/navigation')
@endsection



@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">

    <div class="card border-dark mb-3">
      <div class="card-header">Nomor Rekam Medik : {{ $kepalakeluarga -> norm }}</div>
      <div class="card-body text-dark">
        <h5 class="card-title"><a href="/pendaftaran/kepalakeluarga/{{$kepalakeluarga->id}}" class="text-decoration-none" >Tn. {{ $kepalakeluarga -> kepalakeluarga }}</a></h5>
        <p class="card-text">Nomor Kartu Keluarga {{ $kepalakeluarga -> kartukeluarga }}</p>
        <p class="card-text">{{ $kepalakeluarga -> alamat .' RT/RW '.$kepalakeluarga -> rt.'/'.$kepalakeluarga -> rw.' '.$kepalakeluarga -> village->village}}</p>
      </div>
    </div>

        </div>
    <div>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-4">  
        <form action="/pendaftaran/anggotakeluarga/{{$anggotakeluarga->id}}/edit" method="post">
        @csrf 
        @method('patch')
        <input type="hidden" name="head_id" value={{ $kepalakeluarga -> id }}>    

  <div class="form-group">
    <label class="font-weight-bold" for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" value="{{$anggotakeluarga->nama}}"> @error('nama')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <div class="form-group">
    <label class="font-weight-bold" for="nik">NIK</label>
    <input type="text" class="form-control" id="nik" placeholder="Nomor KTP" name="nik" value="{{$anggotakeluarga->nik}}">
    @error('nik')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="jeniskelamin">Jenis Kelamin</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jeniskelamin" id="laki-laki" value="Laki-laki" {{ $anggotakeluarga -> jeniskelamin === 'Laki-laki' ? 'checked':'' }}>
      <label class="form-check-label" for="laki-laki">
        Laki-laki
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="Perempuan" {{ $anggotakeluarga -> jeniskelamin === 'Perempuan' ? 'checked':'' }}>
      <label class="form-check-label" for="perempuan">
        Perempuan
      </label>
    </div>
    @error('jeniskelamin')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="tempatlahir">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempatlahir" placeholder="Tempat Lahir" name="tempatlahir" value="{{$anggotakeluarga->tempatlahir}}">
    @error('nomortelepon')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="tanggallahir">Tanggal Lahir</label>
    <input type="date" class="form-control" id="tanggallahir" placeholder="Tanggal Lahir" name="tanggallahir" value="{{$anggotakeluarga->tanggallahir}}">
    @error('tanggallahir')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  </div>
  <div class="col-lg-4">

  <div class="form-group">
    <label class="font-weight-bold" for="agama">Agama</label>
    <select class="form-control" id="agama" name="agama">
      <option value="">pilih agama</option>
      <option {{ $anggotakeluarga -> agama === 'Islam' ? 'selected':'' }} value="Islam">Islam</option>
      <option {{ $anggotakeluarga -> agama === 'Kristen' ? 'selected':'' }} value="Kristen">Kristen</option>
      <option {{ $anggotakeluarga -> agama === 'Katolik' ? 'selected':'' }} value="Katolik">Katolik</option>
      <option {{ $anggotakeluarga -> agama === 'Hindu' ? 'selected':'' }} value="Hindu">Hindu</option>
      <option {{ $anggotakeluarga -> agama === 'Budha' ? 'selected':'' }} value="Budha">Budha</option>
      <option {{ $anggotakeluarga -> agama === 'Kong Hu Chu' ? 'selected':'' }} value="Kong Hu Chu">Kong Hu Chu</option>
    </select>
    @error('agama')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="pendidikan">Pendidikan</label>
    <select class="form-control" id="pendidikan" name="pendidikan">
      <option value="">pilih pendidikan</option>
        <option {{ $anggotakeluarga -> pendidikan === 'Belum/Tidak Tamat SD/Sederajat' ? 'selected':'' }} value="Belum/Tidak Tamat SD/Sederajat">Belum/Tidak Tamat SD/Sederajat</option> 
        <option {{ $anggotakeluarga -> pendidikan === 'SD/MI/Sederajat' ? 'selected':'' }} value="SD/MI/Sederajat">SD/MI/Sederajat</option> 
        <option {{ $anggotakeluarga -> pendidikan === 'SLTP/MTs/Sederajat' ? 'selected':'' }} value="SLTP/MTs/Sederajat">SLTP/MTs/Sederajat</option> 
        <option {{ $anggotakeluarga -> pendidikan === 'SLTA/SMK/MA/Sederajat' ? 'selected':'' }} value="SLTA/SMK/MA/Sederajat">SLTA/SMK/MA/Sederajat</option> 
        <option {{ $anggotakeluarga -> pendidikan === 'Diploma I/II' ? 'selected':'' }} value="Diploma I/II">Diploma I/II</option> 
        <option {{ $anggotakeluarga -> pendidikan === 'Diploma III/Sarjana Muda' ? 'selected':'' }} value="Diploma III/Sarjana Muda">Diploma III/Sarjana Muda</option> 
        <option {{ $anggotakeluarga -> pendidikan === 'Diploma IV/S1' ? 'selected':'' }} value="Diploma IV/S1">Diploma IV/S1</option> 
        <option {{ $anggotakeluarga -> pendidikan === 'S2/S' ? 'selected':'' }} value="S2/S3">S2/S3</option> 
    </select>
    @error('pendidikan')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="pekerjaan">Pekerjaan</label>
    <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" value="{{$anggotakeluarga->pekerjaan}}">
    @error('pekerjaan')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="golongandarah">Golongan Darah</label>
    <select class="form-control" id="golongandarah" name="golongandarah">
      <option value="">pilih golongan darah</option>
      <option {{ $anggotakeluarga -> golongandarah === 'A' ? 'selected':'' }}  value="A">A</option>
      <option {{ $anggotakeluarga -> golongandarah === 'B' ? 'selected':'' }}  vBlue="B">B</option>
      <option {{ $anggotakeluarga -> golongandarah === 'AB' ? 'selected':'' }}  value="AB">AB</option>
      <option {{ $anggotakeluarga -> golongandarah === 'O' ? 'selected':'' }}  value="O">O</option>
      <option {{ $anggotakeluarga -> golongandarah === 'tidak tahu' ? 'selected':'' }}  value="tidak tahu">tidak tahu</option>
    </select>
    @error('golongandarah')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="jeniskelamin">Status Perkawinan</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="perkawinan" id="kawin" value="Kawin" {{$anggotakeluarga->perkawinan === 'Kawin' ? 'checked':'' }}  >
      <label class="form-check-label" for="kawin">
        Kawin
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="perkawinan" id="belumkawin" value="Belum Kawin" {{$anggotakeluarga->perkawinan === 'Belum Kawin' ? 'checked':'' }}  >
      <label class="form-check-label" for="belumkawin">
        Belum Kawin
      </label>
    </div>
    @error('perkawinan')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  </div>
  <div class="col-lg-4">

  <div class="form-group">
    <label class="font-weight-bold" for="hubungankeluarga">Status Hubungan Dalam Keluarga</label>
    <select class="form-control" id="hubungankeluarga" name="hubungankeluarga">
      <option {{$anggotakeluarga->hubungankeluarga === 'A' ? 'selected':'' }} value="A">Kepala Keluarga</option>
      <option {{$anggotakeluarga->hubungankeluarga === 'B' ? 'selected':'' }} value="B">Istri</option>
      <option {{$anggotakeluarga->hubungankeluarga === 'C' ? 'selected':'' }} value="C">Anak Kandung</option>
      <option {{$anggotakeluarga->hubungankeluarga === 'Z' ? 'selected':'' }} value="Z">Lainnya</option>
    </select>
    @error('hubungankeluarga')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>


  <div class="form-group">
    <label class="font-weight-bold" for="jaminankesehatan">Jaminan Kesehatan</label>
    <select class="form-control" id="jaminankesehatan" name="jaminankesehatan">
      <option value="">pilih jaminan kesehatan</option>
      <option {{$anggotakeluarga->jaminankesehatan === 'BPJS/JKN' ? 'selected':'' }} value="BPJS/JKN">BPJS/JKN</option>
      <option {{$anggotakeluarga->jaminankesehatan === 'Pasien Umum' ? 'selected':'' }}  value="anggotakeluarga Umum">Pasien Umum</option>
    </select>
    @error('jaminankesehatan')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="nomorjaminankesehatan">Nomor BPJS/JKN</label>
    <input type="text" class="form-control" id="nomorjaminankesehatan" placeholder="Nomor BPJS/JKN" name="nomorjaminankesehatan" value="{{$anggotakeluarga->nomorjaminankesehatan}}">
    @error('nomorjaminankesehatan')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="nomortelepon">Nomor Telepon</label>
    <input type="text" class="form-control" id="nomortelepon" placeholder="Nomor Telepon" name="nomortelepon" value="{{$anggotakeluarga->nomortelepon}}">
    @error('nomortelepon')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary">EDIT</button>
  </div>


</form>

        </div>
    </div>
</div>

@endsection