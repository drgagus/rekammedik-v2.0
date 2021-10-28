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
        <h5 class="card-title"><a href="/pendaftaran/kepalakeluarga/{{$kepalakeluarga->id}}" class="text-decoration-none">Tn. {{ $kepalakeluarga -> kepalakeluarga }}</a></h5>
        <p class="card-text">{{ $kepalakeluarga -> alamat .' RT/RW '.$kepalakeluarga -> rt.'/'.$kepalakeluarga -> rw.' '.$kepalakeluarga -> village->village}}</p>
        <p class="card-text">Nomor Kartu Keluarga {{ $kepalakeluarga -> kartukeluarga }}</p>
      </div>
    </div>

        </div>
    <div>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-4">  
        <form action="/pendaftaran/anggotakeluarga" method="post">
        @csrf 
        <input type="hidden" name="head_id" value="{{ $kepalakeluarga -> id }}">    

  <div class="form-group">
    <label class="font-weight-bold" for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}">
    @error('nama')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <div class="form-group">
    <label class="font-weight-bold" for="nik">NIK</label>
    <input type="text" class="form-control" id="nik" placeholder="Nomor KTP" name="nik" value="{{ old('nik') }}">
    @error('nik')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="jeniskelamin">Jenis Kelamin</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jeniskelamin" id="laki-laki" {{ old('jeniskelamin')  === "Laki-laki" ? 'checked':'' }} value="Laki-laki">
      <label class="form-check-label" for="laki-laki">
        Laki-laki
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" {{ old('jeniskelamin')  === "Perempuan" ? 'checked':'' }} value="Perempuan">
      <label class="form-check-label" for="perempuan">
        Perempuan
      </label>
      @error('jeniskelamin')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
    </div>
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="tempatlahir">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempatlahir" placeholder="Tempat Lahir" name="tempatlahir" value="{{ old('tempatlahir') }}">
    @error('tempatlahir')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="tanggallahir">Tanggal Lahir</label>
    <input type="date" class="form-control" id="tanggallahir" placeholder="Tanggal Lahir" name="tanggallahir" value={{ old('tanggallahir') }}>
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
      <option value="Islam">Islam</option>
      <option value="Kristen">Kristen</option>
      <option value="Katolik">Katolik</option>
      <option value="Hindu">Hindu</option>
      <option value="Budha">Budha</option>
      <option value="Kong Hu Chu">Kong Hu Chu</option>
    </select>
    @error('agama')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="pendidikan">Pendidikan</label>
    <select class="form-control" id="pendidikan" name="pendidikan">
        <option value="">pilih pendidikan</option>
        <option value="Belum/Tidak Tamat SD/Sederajat">Belum/Tidak Tamat SD/Sederajat</option> 
        <option value="SD/MI/Sederajat">SD/MI/Sederajat</option> 
        <option value="SLTP/MTs/Sederajat">SLTP/MTs/Sederajat</option> 
        <option value="SLTA/SMK/MA/Sederajat">SLTA/SMK/MA/Sederajat</option> 
        <option value="Diploma I/II">Diploma I/II</option> 
        <option value="Diploma III/Sarjana Muda">Diploma III/Sarjana Muda</option> 
        <option value="Diploma IV/S1">Diploma IV/S1</option> 
        <option value="S2/S3">S2/S3</option> 
    </select>
    @error('pendidikan')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="pekerjaan">Pekerjaan</label>
    <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
    @error('pekerjaan')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="golongandarah">Golongan Darah</label>
    <select class="form-control" id="golongandarah" name="golongandarah">
      <option value="">pilih golongan darah</option>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="AB">AB</option>
      <option value="O">O</option>
      <option value="tidak tahu">tidak tahu</option>
    </select>
    @error('golongandarah')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="kawin">Status Perkawinan</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="perkawinan" id="kawin" {{ old('perkawinan')  === "Kawin" ? 'checked':'' }} value="Kawin">
      <label class="form-check-label" for="kawin">
        Kawin
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="perkawinan" id="belumkawin" {{ old('perkawinan')  === "Belum Kawin" ? 'checked':'' }} value="Belum Kawin">
      <label class="form-check-label" for="belumkawin">
        Belum Kawin
      </label>
      @error('perkawinan')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
    </div>
  </div>

  </div>
  <div class="col-lg-4">

  <div class="form-group">
    <label class="font-weight-bold" for="hubungankeluarga">Status Hubungan Dalam Keluarga</label>
    <select class="form-control" id="hubungankeluarga" name="hubungankeluarga">
      <option value="">pilih hubungan dalam keluarga</option>
      <option {{ old('hubungankeluarga')  === "A" ? 'selected':'' }} value="A">Kepala Keluarga</option>
      <option {{ old('hubungankeluarga')  === "B" ? 'selected':'' }} value="B">Istri</option>
      <option {{ old('hubungankeluarga')  === "C" ? 'selected':'' }} value="C">Anak Kandung</option>
      <option {{ old('hubungankeluarga')  === "Z" ? 'selected':'' }} value="Z">Lainnya</option>
    </select>
    @error('hubungankeluarga')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>


  <div class="form-group">
    <label class="font-weight-bold" for="jaminankesehatan">Jaminan Kesehatan</label>
    <select class="form-control" id="jaminankesehatan" name="jaminankesehatan">
      <option value="">pilih jaminan kesehatan</option>
      <option {{ old('jaminankesehatan')  === "BPJS/JKN" ? 'selected':'' }} value="BPJS/JKN">BPJS/JKN</option>
      <option {{ old('jaminankesehatan')  === "Pasien Umum" ? 'selected':'' }} value="Pasien Umum">Pasien Umum</option>
    </select>
    @error('jaminankesehatan')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="nomorjaminankesehatan">Nomor BPJS/JKN</label>
    <input type="text" class="form-control" id="nomorjaminankesehatan" placeholder="Nomor BPJS/JKN" name="nomorjaminankesehatan" value="{{ old('nomorjaminankesehatan') }}">
    @error('nomorjaminankesehatan')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label class="font-weight-bold" for="nomortelepon">Nomor Telepon</label>
    <input type="text" class="form-control" id="nomortelepon" placeholder="Nomor Telepon" name="nomortelepon" value="{{ old('nomortelepon') }}">
    @error('nomortelepon')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary">INPUT</button>
  </div>


</form>

        </div>
    </div>
</div>

@endsection