@extends ('../layouts/rekammedik')


@section('title', 'Poli KIA')


@section('navigation')
@include ('polikia/navigation')
@endsection



@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

        <form action="/polikia/kartuibu/{{$momcard->id}}/edit" method="post">
            @csrf
            @method('patch')

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
    <span class="btn btn-dark">{{date('d M Y', strtotime($momcard->tanggalkunjungan))}}</span>
  </li>
</ul>
</div>
</div>

      </div>
      <div class="card-body text-dark">

        <div class="row ">
            <div class="col-lg-12 ">
        <h5 class="text-center font-weight-bold"><a href="/polikia/kartuibu/{{$momcard->member_id}}" class="text-decoration-none text-dark">KARTU IBU</a></h5>
            </div>
        </div>
        <hr>

        
        <h5 @error('kontrasepsiterakhir') class="text-danger" @enderror>Riwayat Kontrasepsi Terakhir</h5>
        <div class="row mb-3">
        <div class="col-lg-2">
                <div class="form-check">
                <input class="form-check-input" type="radio" name="kontrasepsiterakhir" id="takmenggunakan" {{ old('kontrasepsiterakhir') ?? $momcard->kontrasepsiterakhir === 'tidak menggunakan' ? 'checked':'' }} value="tidak menggunakan">
                <label class="form-check-label" for="takmenggunakan">tidak menggunakan</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="kontrasepsiterakhir" id="lain-lain" {{ old('kontrasepsiterakhir') ?? $momcard->kontrasepsiterakhir === 'lain-lain' ? 'checked':'' }} value="lain-lain">
                <label class="form-check-label" for="lain-lain">lain-lain</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="kontrasepsiterakhir" id="susuk" {{ old('kontrasepsiterakhir') ?? $momcard->kontrasepsiterakhir === 'susuk' ? 'checked':'' }} value="susuk">
                <label class="form-check-label" for="susuk">susuk</label>
                </div>
        </div>
        <div class="col-lg-6">
                <div class="form-check">
                <input class="form-check-input" type="radio" name="kontrasepsiterakhir" id="suntikan" {{ old('kontrasepsiterakhir') ?? $momcard->kontrasepsiterakhir === 'suntikan' ? 'checked':'' }} value="suntikan">
                <label class="form-check-label" for="suntikan">suntikan</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="kontrasepsiterakhir" id="pil" {{ old('kontrasepsiterakhir') ?? $momcard->kontrasepsiterakhir === 'pil' ? 'checked':'' }} value="pil">
                <label class="form-check-label" for="pil">pil</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="kontrasepsiterakhir" id="IUD" {{ old('kontrasepsiterakhir') ?? $momcard->kontrasepsiterakhir === 'IUD' ? 'checked':'' }} value="IUD">
                <label class="form-check-label" for="IUD">IUD</label>
                </div>
        </div>
        </div>

      <h5>Riwayat Kehamilan Terdahulu</h5>
      <div class="row">
          <div class="col-lg-12">
              <table class="table table-responsive">
                  <tr class="text-center"><td>Anak</td><td>Umur<br>(Tahun)</td><td>Berat Lahir<br>(gram)</td><td>Penolong<br>Persalinan</td><td>Cara<br>Persalinan</td><td>Keadaan Bayi</td><td>Komplikasi</td></tr>
                  <tr><td>Ke-1</td><td><input type="text" class="form-control" id="umuranak1" name="umuranak1" value="{{ old('umuranak1') ?? $momcard->umuranak1}}"></td><td><input type="text" class="form-control" id="beratanak1" name="beratanak1" value="{{ old('beratanak1') ?? $momcard->beratanak1}}"></td><td>
                  <select class="form-control" id="penolongpersalinananak1" name="penolongpersalinananak1">
                      <option value="">pilih</option>
                      <option {{ old('penolongpersalinananak1') ?? $momcard->penolongpersalinananak1 === 'Dokter' ? 'selected':'' }} value="Dokter">Dokter</option>
                      <option {{ old('penolongpersalinananak1') ?? $momcard->penolongpersalinananak1 === 'Bidan Paramedis' ? 'selected':'' }} value="Bidan Paramedis">Bidan Paramedis</option>
                      <option {{ old('penolongpersalinananak1') ?? $momcard->penolongpersalinananak1 === 'Dukun Terlatih' ? 'selected':'' }} value="Dukun Terlatih">Dukun Terlatih</option>
                      <option {{ old('penolongpersalinananak1') ?? $momcard->penolongpersalinananak1 === 'Dukun Tidak Terlatih' ? 'selected':'' }} value="Dukun Tidak Terlatih">Dukun Tidak Terlatih</option>
                    </select>
                  </td><td>
                  <select class="form-control" id="carapersalinananak1" name="carapersalinananak1">
                    <option value="">pilih</option>
                    <option {{ old('carapersalinananak1') ?? $momcard->carapersalinananak1 === 'Normal' ? 'selected':'' }} value="Normal">Normal</option>
                    <option {{ old('carapersalinananak1') ?? $momcard->carapersalinananak1 === 'Sungsang' ? 'selected':'' }} value="Sungsang">Sungsang</option>
                    <option {{ old('carapersalinananak1') ?? $momcard->carapersalinananak1 === 'Alat' ? 'selected':'' }} value="Alat">Alat</option>
                    <option {{ old('carapersalinananak1') ?? $momcard->carapersalinananak1 === 'Seksio' ? 'selected':'' }} value="Seksio">Seksio</option>
                  </select>
                  </td><td>    <select class="form-control" id="keadaanbayianak1" name="keadaanbayianak1">
                    <option value="">pilih</option>
                    <option {{ old('keadaanbayianak1') ?? $momcard->keadaanbayianak1 === 'Sehat' ? 'selected':'' }} value="Sehat">Sehat</option>
                    <option {{ old('keadaanbayianak1') ?? $momcard->keadaanbayianak1 === 'Sakit/cacat' ? 'selected':'' }} value="Sakit">Sakit/cacat</option>
                    <option {{ old('keadaanbayianak1') ?? $momcard->keadaanbayianak1 === 'Mati' ? 'selected':'' }} value="Cacat">Mati</option>
                  </select>
                  </td><td>
                  <select class="form-control" id="komplikasianak1" name="komplikasianak1">
                    <option value="">pilih</option>
                    <option {{ old('komplikasianak1') ?? $momcard->komplikasianak1  === 'Pend Ante Partum' ? 'selected':'' }} value="Pend Ante Partum">Pend Ante Partum</option>
                    <option {{ old('komplikasianak1') ?? $momcard->komplikasianak1  === 'Hipertensi' ? 'selected':'' }} value="Hipertensi">Hipertensi</option>
                    <option {{ old('komplikasianak1') ?? $momcard->komplikasianak1  === 'Infeksi' ? 'selected':'' }} value="Infeksi">Infeksi</option>
                    <option {{ old('komplikasianak1') ?? $momcard->komplikasianak1  === 'Partus Lama' ? 'selected':'' }} value="Partus Lama">Partus Lama</option>
                    <option {{ old('komplikasianak1') ?? $momcard->komplikasianak1  === 'Partus Preterm' ? 'selected':'' }} value="Partus Preterm">Partus Preterm</option>
                  </select>
                  </td></tr>
                  
                  <tr><td>Ke-2</td><td><input type="text" class="form-control" id="umuranak2" name="umuranak2" value="{{ old('umuranak2') ?? $momcard->umuranak2 }}"></td><td><input type="text" class="form-control" id="beratanak2" name="beratanak2" value="{{ old('beratanak2') ?? $momcard->beratanak2 }}"></td><td>
                  <select class="form-control" id="penolongpersalinananak2" name="penolongpersalinananak2">
                      <option value="">pilih</option>
                      <option {{ old('penolongpersalinananak2') ?? $momcard->penolongpersalinananak2 === 'Dokter' ? 'selected':'' }} value="Dokter">Dokter</option>
                      <option {{ old('penolongpersalinananak2') ?? $momcard->penolongpersalinananak2 === 'Bidan Paramedis' ? 'selected':'' }} value="Bidan Paramedis">Bidan Paramedis</option>
                      <option {{ old('penolongpersalinananak2') ?? $momcard->penolongpersalinananak2 === 'Dukun Terlatih' ? 'selected':'' }} value="Dukun Terlatih">Dukun Terlatih</option>
                      <option {{ old('penolongpersalinananak2') ?? $momcard->penolongpersalinananak2 === 'Dukun Tidak Terlatih' ? 'selected':'' }} value="Dukun Tidak Terlatih">Dukun Tidak Terlatih</option>
                    </select>
                  </td><td>
                  <select class="form-control" id="carapersalinananak2" name="carapersalinananak2">
                    <option value="">pilih</option>
                    <option {{ old('carapersalinananak2') ?? $momcard->carapersalinananak2 === 'Normal' ? 'selected':'' }} value="Normal">Normal</option>
                    <option {{ old('carapersalinananak2') ?? $momcard->carapersalinananak2 === 'Sungsang' ? 'selected':'' }} value="Sungsang">Sungsang</option>
                    <option {{ old('carapersalinananak2') ?? $momcard->carapersalinananak2 === 'Alat' ? 'selected':'' }} value="Alat">Alat</option>
                    <option {{ old('carapersalinananak2') ?? $momcard->carapersalinananak2 === 'Seksio' ? 'selected':'' }} value="Seksio">Seksio</option>
                  </select>
                  </td><td>    <select class="form-control" id="keadaanbayianak2" name="keadaanbayianak2">
                    <option value="">pilih</option>
                    <option {{ old('keadaanbayianak2') ?? $momcard->keadaanbayianak2 === 'Sehat' ? 'selected':'' }} value="Sehat">Sehat</option>
                    <option {{ old('keadaanbayianak2') ?? $momcard->keadaanbayianak2 === 'Sakit/cacat' ? 'selected':'' }} value="Sakit">Sakit/cacat</option>
                    <option {{ old('keadaanbayianak2') ?? $momcard->keadaanbayianak2 === 'Mati' ? 'selected':'' }} value="Cacat">Mati</option>
                  </select>
                  </td><td>
                  <select class="form-control" id="komplikasianak2" name="komplikasianak2">
                    <option value="">pilih</option>
                    <option {{ old('komplikasianak2') ?? $momcard->komplikasianak2 === 'Pend Ante Partum' ? 'selected':'' }} value="Pend Ante Partum">Pend Ante Partum</option>
                    <option {{ old('komplikasianak2') ?? $momcard->komplikasianak2 === 'Hipertensi' ? 'selected':'' }} value="Hipertensi">Hipertensi</option>
                    <option {{ old('komplikasianak2') ?? $momcard->komplikasianak2 === 'Infeksi' ? 'selected':'' }} value="Infeksi">Infeksi</option>
                    <option {{ old('komplikasianak2') ?? $momcard->komplikasianak2 === 'Partus Lama' ? 'selected':'' }} value="Partus Lama">Partus Lama</option>
                    <option {{ old('komplikasianak2') ?? $momcard->komplikasianak2 === 'Partus Preterm' ? 'selected':'' }} value="Partus Preterm">Partus Preterm</option>
                  </select>
                  </td></tr>

                  <tr><td>Ke-3</td><td><input type="text" class="form-control" id="umuranak3" name="umuranak3" value="{{ old('umuranak3') ?? $momcard->umuranak3 }}"></td><td><input type="text" class="form-control" id="beratanak3" name="beratanak3" value="{{ old('beratanak3') ?? $momcard->beratanak3 }}"></td><td>
                  <select class="form-control" id="penolongpersalinananak3" name="penolongpersalinananak3">
                      <option value="">pilih</option>
                      <option {{ old('penolongpersalinananak3') ?? $momcard->penolongpersalinananak3 === 'Dokter' ? 'selected':'' }} value="Dokter">Dokter</option>
                      <option {{ old('penolongpersalinananak3') ?? $momcard->penolongpersalinananak3 === 'Bidan Paramedis' ? 'selected':'' }} value="Bidan Paramedis">Bidan Paramedis</option>
                      <option {{ old('penolongpersalinananak3') ?? $momcard->penolongpersalinananak3 === 'Dukun Terlatih' ? 'selected':'' }} value="Dukun Terlatih">Dukun Terlatih</option>
                      <option {{ old('penolongpersalinananak3') ?? $momcard->penolongpersalinananak3 === 'Dukun Tidak Terlatih' ? 'selected':'' }} value="Dukun Tidak Terlatih">Dukun Tidak Terlatih</option>
                    </select>
                  </td><td>
                  <select class="form-control" id="carapersalinananak3" name="carapersalinananak3">
                    <option value="">pilih</option>
                    <option {{ old('carapersalinananak3') ?? $momcard->carapersalinananak3 === 'Normal' ? 'selected':'' }} value="Normal">Normal</option>
                    <option {{ old('carapersalinananak3') ?? $momcard->carapersalinananak3 === 'Sungsang' ? 'selected':'' }} value="Sungsang">Sungsang</option>
                    <option {{ old('carapersalinananak3') ?? $momcard->carapersalinananak3 === 'Alat' ? 'selected':'' }} value="Alat">Alat</option>
                    <option {{ old('carapersalinananak3') ?? $momcard->carapersalinananak3 === 'Seksio' ? 'selected':'' }} value="Seksio">Seksio</option>
                  </select>
                  </td><td>    <select class="form-control" id="keadaanbayianak3" name="keadaanbayianak3">
                    <option value="">pilih</option>
                    <option {{ old('keadaanbayianak3') ?? $momcard->keadaanbayianak3 === 'Sehat' ? 'selected':'' }} value="Sehat">Sehat</option>
                    <option {{ old('keadaanbayianak3') ?? $momcard->keadaanbayianak3 === 'Sakit/cacat' ? 'selected':'' }} value="Sakit">Sakit/cacat</option>
                    <option {{ old('keadaanbayianak3') ?? $momcard->keadaanbayianak3 === 'Mati' ? 'selected':'' }} value="Cacat">Mati</option>
                  </select>
                  </td><td>
                  <select class="form-control" id="komplikasianak3" name="komplikasianak3">
                    <option value="">pilih</option>
                    <option {{ old('komplikasianak3') ?? $momcard->komplikasianak3 === 'Pend Ante Partum' ? 'selected':'' }} value="Pend Ante Partum">Pend Ante Partum</option>
                    <option {{ old('komplikasianak3') ?? $momcard->komplikasianak3 === 'Hipertensi' ? 'selected':'' }} value="Hipertensi">Hipertensi</option>
                    <option {{ old('komplikasianak3') ?? $momcard->komplikasianak3 === 'Infeksi' ? 'selected':'' }} value="Infeksi">Infeksi</option>
                    <option {{ old('komplikasianak3') ?? $momcard->komplikasianak3 === 'Partus Lama' ? 'selected':'' }} value="Partus Lama">Partus Lama</option>
                    <option {{ old('komplikasianak3') ?? $momcard->komplikasianak3 === 'Partus Preterm' ? 'selected':'' }} value="Partus Preterm">Partus Preterm</option>
                  </select>
                  </td></tr>   
              </table>
          </div>
      </div>

      <h5>Riwayat Kehamilan Sekarang</h5>
      <div class="row">
        <div class="col-lg-7">
          <div class="form-group">
            <label @error('haidterakhir') class="text-danger" @enderror for="haidterakhir">Haid Terakhir</label>
            <input type="date" class="form-control" id="haidterakhir" placeholder="haidterakhir" name="haidterakhir" value="{{ old('haidterakhir') ?? $momcard->haidterakhir}}">
          </div>
          <div class="form-group">
            <label @error('perkiraanpartus') class="text-danger" @enderror for="perkiraanpartus">Perkiraan Partus</label>
            <input type="date" class="form-control" id="perkiraanpartus" placeholder="perkiraanpartus" name="perkiraanpartus" value="{{ old('perkiraanpartus') ?? $momcard->perkiraanpartus}}">
          </div>
            <div class="form-group">
              <label @error('keluhanutama') class="text-danger" @enderror for="keluhanutama">Keluhan Utama Pasien</label>
              <input type="text" class="form-control" id="keluhanutama" name="keluhanutama" value="{{ old('keluhanutama') ?? $momcard -> keluhanutama }}">
            </div>
        </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('nafsumakan') class="text-danger" @enderror for="nafsumakan">Nafsu Makan</label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nafsumakan" id="Baik" {{ old('nafsumakan') ?? $momcard->nafsumakan === 'Baik' ? 'checked':'' }}  value="Baik">
                <label class="form-check-label" for="Baik">Baik</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nafsumakan" id="Kurang" {{ old('nafsumakan') ?? $momcard->nafsumakan === 'Kurang' ? 'checked':'' }}  value="Kurang">
                <label class="form-check-label" for="Kurang">Kurang</label>
              </div>
      </div>
      </div>
      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('muntah') class="text-danger" @enderror for="muntah">Muntah</label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="muntah" id="biasa" {{ old('muntah') ?? $momcard->muntah === 'Biasa, gejala hamil muda' ? 'checked':'' }}  value="Biasa, gejala hamil muda">
                <label class="form-check-label" for="biasa">Biasa, gejala hamil muda</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="muntah" id="terus" {{ old('muntah') ?? $momcard->muntah === 'Terus menerus' ? 'checked':'' }}  value="Terus menerus">
                <label class="form-check-label" for="terus">Terus menerus</label>
              </div>
      </div>
      </div>
      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('pusing') class="text-danger" @enderror for="pusing">Pusing</label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pusing" id="biasapusing" {{ old('pusing') ?? $momcard->pusing === 'Biasa, gejala hamil muda' ? 'checked':'' }}  value="Biasa, gejala hamil muda">
                <label class="form-check-label" for="biasapusing">Biasa, gejala hamil muda</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pusing" id="teruspusing" {{ old('pusing') ?? $momcard->pusing === 'Terus menerus' ? 'checked':'' }}  value="Terus menerus">
                <label class="form-check-label" for="teruspusing">Terus menerus</label>
              </div>
      </div>
      </div>
      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('nyeriperut') class="text-danger" @enderror for="nyeriperut">Nyeri Perut</label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nyeriperut" id="tidakadanyeriperut" {{ old('nyeriperut') ?? $momcard->nyeriperut === 'Tidak ada' ? 'checked':'' }} value="Tidak ada">
                <label class="form-check-label" for="tidakadanyeriperut">Tidak ada</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nyeriperut" id="adanyeriperut" {{ old('nyeriperut') ?? $momcard->nyeriperut === 'Ada' ? 'checked':'' }} value="Ada">
                <label class="form-check-label" for="adanyeriperut">Ada</label>
              </div>
      </div>
      </div>
      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('oedema') class="text-danger" @enderror for="oedema">Oedema</label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="oedema" id="tidakadaoedema" {{ old('oedema') ?? $momcard->oedema === 'Tidak ada' ? 'checked':'' }}  value="Tidak ada">
                <label class="form-check-label" for="tidakadaoedema">Tidak ada</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="oedema" id="adaoedema" {{ old('oedema') ?? $momcard->oedema === 'Ada' ? 'checked':'' }}  value="Ada">
                <label class="form-check-label" for="adaoedema">Ada</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('penyakitdiderita') class="text-danger" @enderror for="">Penyakit Yang Diderita</label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="penyakitdiderita" id="tidakadapenyakitdiderita" {{ old('penyakitdiderita') ?? $momcard->penyakitdiderita === 'Tidak ada' ? 'checked':'' }} value="Tidak ada">
                <label class="form-check-label" for="tidakadapenyakitdiderita">Tidak ada</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="penyakitdiderita" id="paru" {{ old('penyakitdiderita') ?? $momcard->penyakitdiderita === 'Penyakit paru-paru' ? 'checked':'' }} value="Penyakit paru-paru">
                <label class="form-check-label" for="paru">Penyakit paru-paru</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="penyakitdiderita" id="jantung" {{ old('penyakitdiderita') ?? $momcard->penyakitdiderita === 'Penyakit jantung' ? 'checked':'' }} value="Penyakit jantung">
                <label class="form-check-label" for="jantung">Penyakit jantung</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="penyakitdiderita" id="hati" {{ old('penyakitdiderita') ?? $momcard->penyakitdiderita === 'Penyakit hati' ? 'checked':'' }} value="Penyakit hati">
                <label class="form-check-label" for="hati">Penyakit hati</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="penyakitdiderita" id="ginjal" {{ old('penyakitdiderita') ?? $momcard->penyakitdiderita === 'Penyakit ginjal' ? 'checked':'' }} value="Penyakit ginjal">
                <label class="form-check-label" for="ginjal">Penyakit ginjal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="penyakitdiderita" id="diabetes" {{ old('penyakitdiderita') ?? $momcard->penyakitdiderita === 'Diabetes' ? 'checked':'' }} value="Diabetes">
                <label class="form-check-label" for="diabetes">Diabetes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="penyakitdiderita" id="malaria" {{ old('penyakitdiderita') ?? $momcard->penyakitdiderita === 'Malaria' ? 'checked':'' }} value="Malaria">
                <label class="form-check-label" for="malaria">Malaria</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="penyakitdiderita" id="psikosis" {{ old('penyakitdiderita') ?? $momcard->penyakitdiderita === 'Psikosis' ? 'checked':'' }} value="Psikosis">
                <label class="form-check-label" for="psikosis">Psikosis</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="penyakitdiderita" id="epilepsi" {{ old('penyakitdiderita') ?? $momcard->penyakitdiderita === 'Epilepsi' ? 'checked':'' }} value="Epilepsi">
                <label class="form-check-label" for="epilepsi">Epilepsi</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('riwayatkeluarga') class="text-danger" @enderror for="">Riwayat Kesehatan Keluarga</label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="riwayatkeluarga" id="tidakadariwayat" {{ old('riwayatkeluarga') ?? $momcard->riwayatkeluarga === 'Tidak ada' ? 'checked':'' }} value="Tidak ada">
                <label class="form-check-label" for="tidakadariwayat">Tidak ada</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="riwayatkeluarga" id="riwayathipertensi" {{ old('riwayatkeluarga') ?? $momcard->riwayatkeluarga === 'Hipertensi' ? 'checked':'' }} value="Hipertensi">
                <label class="form-check-label" for="riwayathipertensi">Hipertensi</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="riwayatkeluarga" id="riwayatdiabetes" {{ old('riwayatkeluarga') ?? $momcard->riwayatkeluarga === 'Diabetes' ? 'checked':'' }} value="Diabetes">
                <label class="form-check-label" for="riwayatdiabetes">Diabetes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="riwayatkeluarga" id="riwayatjantung" {{ old('riwayatkeluarga') ?? $momcard->riwayatkeluarga === 'Penyakit jantung' ? 'checked':'' }} value="Penyakit jantung">
                <label class="form-check-label" for="riwayatjantung">Penyakit jantung</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="riwayatkeluarga" id="riwayatpsikosis" {{ old('riwayatkeluarga') ?? $momcard->riwayatkeluarga === 'Psikosis' ? 'checked':'' }} value="Psikosis">
                <label class="form-check-label" for="riwayatpsikosis">Psikosis</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="riwayatkeluarga" id="riwayatcacatbawaan" {{ old('riwayatkeluarga') ?? $momcard->riwayatkeluarga === 'Cacat bawaan' ? 'checked':'' }} value="Cacat bawaan">
                <label class="form-check-label" for="riwayatcacatbawaan">Cacat bawaan</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="riwayatkeluarga" id="riwayatgemelli" {{ old('riwayatkeluarga') ?? $momcard->riwayatkeluarga === 'Gemelli' ? 'checked':'' }} value="Gemelli">
                <label class="form-check-label" for="riwayatgemelli">Gemelli</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('kebiasaankehamilan') class="text-danger" @enderror for="">Kebiasaan Yang Mempengaruhi Kehamilan</label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kebiasaankehamilan" id="tidakadakebiasaan" {{ old('kebiasaankehamilan') ?? $momcard->kebiasaankehamilan === 'Tidak ada' ? 'checked':'' }} value="Tidak ada">
                <label class="form-check-label" for="tidakadakebiasaan">Tidak ada</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kebiasaankehamilan" id="kebiasaanmerokok" {{ old('kebiasaankehamilan') ?? $momcard->kebiasaankehamilan === 'Merokok' ? 'checked':'' }} value="Merokok">
                <label class="form-check-label" for="kebiasaanmerokok">Merokok</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kebiasaankehamilan" id="kebiasaanminum" {{ old('kebiasaankehamilan') ?? $momcard->kebiasaankehamilan === 'Minum minuman keras' ? 'checked':'' }} value="Minum minuman keras">
                <label class="form-check-label" for="kebiasaanminum">Minum minuman keras</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kebiasaankehamilan" id="kebiasaanpenenang" {{ old('kebiasaankehamilan') ?? $momcard->kebiasaankehamilan === 'Minum obat penenang' ? 'checked':'' }} value="Minum obat penenang">
                <label class="form-check-label" for="kebiasaanpenenang">Minum obat penenang</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kebiasaankehamilan" id="kebiasaannarkotik" {{ old('kebiasaankehamilan') ?? $momcard->kebiasaankehamilan === 'Narkotika' ? 'checked':'' }} value="Narkotika">
                <label class="form-check-label" for="kebiasaannarkotik">Narkotika</label>
              </div>
      </div>
      </div>

<div class="row">
<div class="col-lg-7">

<h5>Pemeriksaan Umum</h5>
      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('pucat') class="text-danger" @enderror for="">Pucat </label>
      </div>
      <div class="col-lg-10">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pucat" id="tidakpucat" {{ old('pucat') ?? $momcard->pucat === 'Tidak' ? 'checked':'' }} value="Tidak">
                <label class="form-check-label" for="tidakpucat">Tidak</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pucat" id="yapucat" {{ old('pucat') ?? $momcard->pucat === 'Ya' ? 'checked':'' }} value="Ya">
                <label class="form-check-label" for="yapucat">Ya</label>
              </div>
      </div>
      </div>
        
      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('kesadaran') class="text-danger" @enderror for="">Kesadaran </label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kesadaran" id="kesadaranbaik" {{ old('kesadaran') ?? $momcard->kesadaran === 'Baik' ? 'checked':'' }} value="Baik">
                <label class="form-check-label" for="kesadaranbaik">Baik</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kesadaran" id="kesadaranadagangguan" {{ old('kesadaran') ?? $momcard->kesadaran === 'Sungsang' ? 'checked':'' }} value="Ada gangguan">
                <label class="form-check-label" for="kesadaranadagangguan">Ada gangguan</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('bentuktubuh') class="text-danger" @enderror for="">Bentuk Tubuh </label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bentuktubuh" id="bentuktubuhnormal" {{ old('bentuktubuh') ?? $momcard->bentuktubuh === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="bentuktubuhnormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bentuktubuh" id="bentuktubuhkelainanpanggul" {{ old('bentuktubuh') ?? $momcard->bentuktubuh === 'Kelainan panggul' ? 'checked':'' }} value="Kelainan panggul">
                <label class="form-check-label" for="bentuktubuhkelainanpanggul">Kelainan panggul</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bentuktubuh" id="bentuktubuhkelainantulangbelakang" {{ old('bentuktubuh') ?? $momcard->bentuktubuh === 'Kelainan Tulang Belakang' ? 'checked':'' }} value="Kelainan Tulang Belakang">
                <label class="form-check-label" for="bentuktubuhkelainantulangbelakang">Kelainan Tulang Belakang</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bentuktubuh" id="bentuktubuhkelainantungkai" {{ old('bentuktubuh') ?? $momcard->bentuktubuh === 'Kelainan tungkai' ? 'checked':'' }} value="Kelainan tungkai">
                <label class="form-check-label" for="bentuktubuhkelainantungkai">Kelainan tungkai</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('suhubadan') class="text-danger" @enderror for="">Suhu badan</label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="suhubadan" id="suhubadannormal" {{ old('suhubadan') ?? $momcard->suhubadan === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="suhubadannormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="suhubadan" id="suhubadandemam" {{ old('suhubadan') ?? $momcard->suhubadan === 'Demam' ? 'checked':'' }} value="Demam">
                <label class="form-check-label" for="suhubadandemam">Demam</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-2">
      <label @error('kuning') class="text-danger" @enderror for="">Kuning</label>
      </div>
      <div class="col-lg-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kuning" id="kuningtidak" {{ old('kuning') ?? $momcard->kuning === 'Tidak' ? 'checked':'' }} value="Tidak">
                <label class="form-check-label" for="kuningtidak">Tidak</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kuning" id="kuningya" {{ old('kuning') ?? $momcard->kuning === 'Ya' ? 'checked':'' }} value="Ya">
                <label class="form-check-label" for="kuningya">Ya</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-2">
              <label @error('lila') class="text-danger" @enderror for="lila">LILA (cm)</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
              <input type="text" class="form-control" id="lila" name="lila" value="{{ old('lila') ?? $momcard->lila}}">
            </div>
          </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-2">
              <label @error('tinggibadan') class="text-danger" @enderror for="tinggibadan">Tinggi Badan (cm)</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
              <input type="text" class="form-control" id="tinggibadan" name="tinggibadan" value="{{ old('tinggibadan') ?? $momcard -> tinggibadan }}">
            </div>
          </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-2">
              <label @error('beratbadan') class="text-danger" @enderror for="beratbadan">Berat Badan (kg)</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
              <input type="text" class="form-control" id="beratbadan" name="beratbadan" value="{{ old('beratbadan') ?? $momcard -> beratbadan }}">
            </div>
          </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-2">
              <label @error('tekanandarah') class="text-danger" @enderror for="tekanandarah">Tekanan Darah (mm/Hg)</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
              <input type="text" class="form-control" id="tekanandarah" name="tekanandarah" value="{{ old('tekanandarah') ?? $momcard -> tekanandarah }}">
            </div>
          </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-2">
              <label @error('detakjantung') class="text-danger" @enderror for="detakjantung">Nadi (/menit)</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
              <input type="text" class="form-control" id="detakjantung" name="detakjantung" value="{{ old('detakjantung') ?? $momcard -> detakjantung }}">
            </div>
          </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-2">
              <label @error('pernafasan') class="text-danger" @enderror for="pernafasan">Pernafasan (/menit)</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
              <input type="text" class="form-control" id="pernafasan" name="pernafasan" value="{{ old('pernafasan') ?? $momcard -> pernafasan }}">
            </div>
          </div>
      </div>

  </div>
  <div class="col-lg-5">

      <h5>Pemeriksaan Fisik</h5>
      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('muka') class="text-danger" @enderror for="">Muka</label>
      </div>
      <div class="col-lg-9">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="muka" id="mukanormal" {{ old('muka') ?? $momcard->muka === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="mukanormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="muka" id="mukakonjungtivapucat" {{ old('muka') ?? $momcard->muka === 'Konjungtiva Pucat' ? 'checked':'' }} value="Konjungtiva Pucat">
                <label class="form-check-label" for="mukakonjungtivapucat">Konjungtiva Pucat</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('mulut') class="text-danger" @enderror for="">Mulut</label>
      </div>
      <div class="col-lg-9">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="mulut" id="mulutnormal" {{ old('mulut') ?? $momcard->mulut === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="mulutnormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="mulut" id="mulutkelainan" {{ old('mulut') ?? $momcard->mulut === 'Kelainan' ? 'checked':'' }} value="Kelainan">
                <label class="form-check-label" for="mulutkelainan">Kelainan</label>
              </div>
      </div>
      </div>
      
      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('gigi') class="text-danger" @enderror for="">Gigi</label>
      </div>
      <div class="col-lg-9">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gigi" id="giginormal" {{ old('gigi') ?? $momcard->gigi === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="giginormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gigi" id="gigikelainan" {{ old('gigi') ?? $momcard->gigi === 'Kelainan' ? 'checked':'' }} value="Kelainan">
                <label class="form-check-label" for="gigikelainan">Kelainan</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('paruparu') class="text-danger" @enderror for="">Paru-paru</label>
      </div>
      <div class="col-lg-9">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="paruparu" id="paruparunormal" {{ old('paruparu') ?? $momcard->paruparu === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="paruparunormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="paruparu" id="paruparukelainan" {{ old('paruparu') ?? $momcard->paruparu === 'Kelainan' ? 'checked':'' }} value="Kelainan">
                <label class="form-check-label" for="paruparukelainan">Kelainan</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('jantung') class="text-danger" @enderror for="">Jantung</label>
      </div>
      <div class="col-lg-9">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jantung" id="jantungnormal" {{ old('jantung') ?? $momcard->jantung === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="jantungnormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jantung" id="jantungkelainan" {{ old('jantung') ?? $momcard->jantung === 'Kelainan' ? 'checked':'' }} value="Kelainan">
                <label class="form-check-label" for="jantungkelainan">Kelainan</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('payudara') class="text-danger" @enderror for="">Payudara</label>
      </div>
      <div class="col-lg-9">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payudara" id="payudaranormal" {{ old('payudara') ?? $momcard->payudara === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="payudaranormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payudara" id="payudarakelainan" {{ old('payudara') ?? $momcard->payudara === 'Kelainan' ? 'checked':'' }} value="Kelainan">
                <label class="form-check-label" for="payudarakelainan">Kelainan</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('hati') class="text-danger" @enderror for="">Hati</label>
      </div>
      <div class="col-lg-9">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="hati" id="hatinormal" {{ old('hati') ?? $momcard->hati === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="hatinormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="hati" id="hatikelainan" {{ old('hati') ?? $momcard->hati === 'Kelainan' ? 'checked':'' }} value="Kelainan">
                <label class="form-check-label" for="hatikelainan">Kelainan</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('abdomen') class="text-danger" @enderror for="">Abdomen</label>
      </div>
      <div class="col-lg-9">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="abdomen" id="abdomennormal" {{ old('abdomen') ?? $momcard->abdomen === 'Pembesaran normal' ? 'checked':'' }} value="Pembesaran normal">
                <label class="form-check-label" for="abdomennormal">Pembesaran normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="abdomen" id="abdomenkelainan" {{ old('abdomen') ?? $momcard->abdomen === 'Pembesaran berlebihan' ? 'checked':'' }} value="Pembesaran berlebihan">
                <label class="form-check-label" for="abdomenkelainan">Pembesaran berlebihan</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('tangantungkai') class="text-danger" @enderror for="">Tangan tungkai</label>
      </div>
      <div class="col-lg-9">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tangantungkai" id="tangantungkainormal" {{ old('tangantungkai') ?? $momcard->tangantungkai === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="tangantungkainormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tangantungkai" id="tangantungkaikelainan" {{ old('tangantungkai') ?? $momcard->tangantungkai === 'Oedema' ? 'checked':'' }} value="Oedema">
                <label class="form-check-label" for="tangantungkaikelainan">Oedema</label>
              </div>
      </div>
      </div>

    </div>
  </div>

  <div class="row">
  <div class="col-lg-7">
<h5>Pemeriksaan Kebidanan</h5>

        <div class="row">
          <div class="col-lg-3">
              <label @error('tinggifundus') class="text-danger" @enderror for="tinggifundus">Tinggi Fundus Uteri (cm)</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
              <input type="text" class="form-control" id="tinggifundus" name="tinggifundus" value="{{ old('tinggifundus') ?? $momcard->tinggifundus}}">
            </div>
          </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      </div>
      <div class="col-lg-9">
      <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bentukfundus" id="sesuaikurva" {{ old('bentukfundus') ?? $momcard->bentukfundus === 'Sesuai kurva' ? 'checked':'' }} value="Sesuai kurva">
                <label class="form-check-label @error('bentukfundus') text-danger @enderror" for="sesuaikurva">Sesuai kurva</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bentukfundus" id="tidaksesuaikurva" {{ old('bentukfundus') ?? $momcard->bentukfundus === 'Tidak sesuai kurva' ? 'checked':'' }} value="Tidak sesuai kurva">
                <label class="form-check-label @error('bentukfundus') text-danger @enderror" for="tidaksesuaikurva">Tidak sesuai kurva</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('bentukuterus') class="text-danger" @enderror for="">Bentuk Uterus </label>
      </div>
      <div class="col-lg-9">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bentukuterus" id="bentukuterusnormal" {{ old('bentukuterus') ?? $momcard->bentukuterus === 'normal' ? 'checked':'' }} value="normal">
                <label class="form-check-label" for="bentukuterusnormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bentukuterus" id="bentukuteruskelainan" {{ old('bentukuterus') ?? $momcard->bentukuterus === 'Kelainan' ? 'checked':'' }} value="Kelainan">
                <label class="form-check-label" for="bentukuteruskelainan">Kelainan</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('letakjanin') class="text-danger" @enderror for="">Letak Janin </label>
      </div>
      <div class="col-lg-9">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="letakjanin" id="letakjaninkepala" {{ old('letakjanin') ?? $momcard->letakjanin === 'Kepala' ? 'checked':'' }} value="Kepala">
                <label class="form-check-label" for="letakjaninkepala">Kepala</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="letakjanin" id="letakjaninsungsang" {{ old('letakjanin') ?? $momcard->letakjanin === 'Sungsang' ? 'checked':'' }} value="Sungsang">
                <label class="form-check-label" for="letakjaninsungsang">Sungsang</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="letakjanin" id="letakjaninmelintang" {{ old('letakjanin') ?? $momcard->letakjanin === 'Melintang' ? 'checked':'' }} value="Melintang">
                <label class="form-check-label" for="letakjaninmelintang">Melintang</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('gerakjanin') class="text-danger" @enderror for="">Gerak Janin </label>
      </div>
      <div class="col-lg-9">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gerakjanin" id="gerakjaninaktif" {{ old('gerakjanin') ?? $momcard->gerakjanin === 'Aktif' ? 'checked':'' }} value="Aktif">
                <label class="form-check-label" for="gerakjaninaktif">Aktif</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gerakjanin" id="gerakjaninjarang" {{ old('gerakjanin') ?? $momcard->gerakjanin === 'Jarang' ? 'checked':'' }} value="Jarang">
                <label class="form-check-label" for="gerakjaninjarang">Jarang</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gerakjanin" id="gerakjanintidakaktif" {{ old('gerakjanin') ?? $momcard->gerakjanin === 'Tidak aktif' ? 'checked':'' }} value="Tidak aktif">
                <label class="form-check-label" for="gerakjanintidakaktif">Tidak aktif</label>
              </div>
      </div>
      </div>

      <div class="row">
          <div class="col-lg-3">
              <label @error('detakjantungjanin') class="text-danger" @enderror for="detakjantungjanin">Detak Jantung Janin (/menit)</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
              <input type="text" class="form-control" id="detakjantungjanin" name="detakjantungjanin" value="{{ old('detakjantungjanin') ?? $momcard->detakjantungjanin}}">
            </div>
          </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('inspekulo') class="text-danger" @enderror for="">Inspekulo </label>
      </div>
      <div class="col-lg-9">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inspekulo" id="inspekulonormal" {{ old('inspekulo') ?? $momcard->inspekulo === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="inspekulonormal">Normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inspekulo" id="inspekulotumor" {{ old('inspekulo') ?? $momcard->inspekulo === 'Tumor/Ca. Servix' ? 'checked':'' }} value="Tumor/Ca. Servix">
                <label class="form-check-label" for="inspekulotumor">Tumor/Ca. Servix</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('perdarahan') class="text-danger" @enderror for="">Perdarahan </label>
      </div>
      <div class="col-lg-9">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="perdarahan" id="perdarahantidak" {{ old('perdarahan') ?? $momcard->perdarahan === 'Tidak' ? 'checked':'' }} value="Tidak">
                <label class="form-check-label" for="perdarahantidak">Tidak</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="perdarahan" id="perdarahanya" {{ old('perdarahan') ?? $momcard->perdarahan === 'Ya' ? 'checked':'' }} value="Ya">
                <label class="form-check-label" for="perdarahanya">Ya</label>
              </div>
      </div>
      </div>

      <div class="row mb-3">
      <div class="col-lg-3">
      <label @error('pemeriksaandalam') class="text-danger" @enderror for="">Pemeriksaan Dalam Atas Indikasi </label>
      </div>
      <div class="col-lg-9">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pemeriksaandalam" id="pemeriksaandalampanggulnormal" {{ old('pemeriksaandalam') ?? $momcard->pemeriksaandalam === 'Panggul normal' ? 'checked':'' }} value="Panggul normal">
                <label class="form-check-label" for="pemeriksaandalampanggulnormal">Panggul normal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pemeriksaandalam" id="pemeriksaandalampanggulsempit" {{ old('pemeriksaandalam') ?? $momcard->pemeriksaandalam === 'Panggul sempit' ? 'checked':'' }} value="Panggul sempit">
                <label class="form-check-label" for="pemeriksaandalampanggulsempit">Panggul sempit</label>
              </div>
      </div>
      </div>





  </div>
  <div class="col-lg-5">
  <h5>Pemeriksaan Laboratorium</h5>
        <div class="row">
          <div class="col-lg-3">
              <label @error('haemoglobin') class="text-danger" @enderror for="haemoglobin">Haemoglobin (gr/dl)</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
              <input type="text" class="form-control" id="haemoglobin" name="haemoglobin" value="{{ old('haemoglobin') ?? $momcard->haemoglobin}}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3">
              <label>Urine</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
            <select class="form-control @error('urinealbumine') is-invalid @enderror" id="urinealbumine" name="urinealbumine">
                      <option   value="">Albumine</option>
                      <option {{ old('urinealbumine') ?? $momcard->urinealbumine === 'Negati' ? 'selected':'' }} value="Negatif">Negatif</option>
                      <option {{ old('urinealbumine') ?? $momcard->urinealbumine === 'Positif +' ? 'selected':'' }} value="Positif +">Positif +</option>
                      <option {{ old('urinealbumine') ?? $momcard->urinealbumine === 'Positif ++' ? 'selected':'' }} value="Positif ++">Positif ++</option>
                      <option {{ old('urinealbumine') ?? $momcard->urinealbumine === 'Positif +++' ? 'selected':'' }} value="Positif +++">Positif +++</option>
                      <option {{ old('urinealbumine') ?? $momcard->urinealbumine === 'Positif ++++' ? 'selected':'' }} value="Positif ++++">Positif ++++</option>
                    </select>
            </div>
          </div>
            <div class="col-lg-3">
            <div class="form-group">
            <select class="form-control @error('urinereduksi') is-invalid @enderror" id="urinereduksi" name="urinereduksi">
                      <option  value="">Reduksi</option>
                      <option {{ old('urinereduksi') ?? $momcard->urinereduksi === 'Negati' ? 'selected':'' }} value="Negatif">Negatif</option>
                      <option {{ old('urinereduksi') ?? $momcard->urinereduksi === 'Positif +' ? 'selected':'' }} value="Positif +">Positif +</option>
                      <option {{ old('urinereduksi') ?? $momcard->urinereduksi === 'Positif ++' ? 'selected':'' }} value="Positif ++">Positif ++</option>
                      <option {{ old('urinereduksi') ?? $momcard->urinereduksi === 'Positif +++' ? 'selected':'' }} value="Positif +++">Positif +++</option>
                      <option {{ old('urinereduksi') ?? $momcard->urinereduksi === 'Positif ++++' ? 'selected':'' }} value="Positif ++++">Positif ++++</option>
                    </select>
            </div>
          </div>
        </div>
 
        <div class="row">
          <div class="col-lg-3">
              <label @error('faeces') class="text-danger" @enderror for="faeces">Faeces</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
              <input type="text" class="form-control" id="faeces" name="faeces" value="{{ old('faeces') ?? $momcard->faeces}}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3">
              <label @error('malaria') class="text-danger" @enderror for="malaria">Darah Tepi (Malaria)</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
            <select class="form-control" id="malaria" name="malaria">
                      <option  value="">pilih</option>
                      <option {{ old('malaria') ?? $momcard->malaria === 'Negatif' ? 'selected':'' }} value="Negatif">Negatif</option>
                      <option {{ old('malaria') ?? $momcard->malaria === 'Positif' ? 'selected':'' }} value="Positif">Positif</option>
                    </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3">
              <label @error('golongandarah') class="text-danger" @enderror for="golongandarah">Golongan Darah</label>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
            <select class="form-control" id="golongandarah" name="golongandarah">
                      <option  value="">pilih</option>
                      <option {{ old('golongandarah') ?? $momcard->golongandarah === 'A' ? 'selected':'' }} value="A">A</option>
                      <option {{ old('golongandarah') ?? $momcard->golongandarah === 'B' ? 'selected':'' }} value="B">B</option>
                      <option {{ old('golongandarah') ?? $momcard->golongandarah === 'AB' ? 'selected':'' }} value="AB">AB</option>
                      <option {{ old('golongandarah') ?? $momcard->golongandarah === 'O' ? 'selected':'' }} value="O">O</option>
                    </select>
            </div>
          </div>
        </div>

  
  </div>
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