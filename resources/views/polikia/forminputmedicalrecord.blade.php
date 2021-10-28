@extends ('../layouts/rekammedik')


@section('title', 'Poli KIA')


@section('navigation')
@include ('polikia/navigation')
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <form action="/polikia/pasien" method="post">
            @csrf
            <input type="hidden" name="member_id" value={{$pasien->id}}>
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
        <h2 class="text-center">{{$poli->room}}</h2>
      </div>
      </div>

      <div class="row d-flex justify-content-between">
      <div class="col-lg-6">
      </div>
      <div class="col-lg-6 text-right">
        <a class="btn btn-sm btn-primary" href="/polikia/pasien/{{$pasien->id}}" target=_blank>Rekam Medik</a>
        <a class="btn btn-sm btn-primary" href="/polikia/kartuibu/{{$pasien->id}}" >Kartu Ibu</a>
      </div>
      </div>

@if ($vitalsign->rujukinternal)
        <div class="row">
          <div class="col-lg-12">
            <div class="card bg-light border-danger mb-3">
              <div class="card-header font-weight-bold">Rujuk Internal</div>
              <div class="card-body">
                  <div class="form-group">
                    <label class="" for="rujukinternal">Alasan Rujuk</label>
                    <textarea class="form-control" id="rujukinternal" rows="3" name="rujukinternal">{{ $vitalsign->rujukinternal}}</textarea>
                  </div>
              </div>
            </div>
          </div>
        </div>
@endif

        <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="font-weight-bold" for="keluhanutama">Keluhan Utama</label>
            <input type="text" class="form-control" id="keluhanutama" name="keluhanutama" value="{{ old('keluhanutama') ?? $vitalsign->keluhanutama}}">
            @error('keluhanutama')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="font-weight-bold" for="tinggibadan" name="tinggibadan">Tinggi Badan (cm)</label>
            <input type="text" class="form-control" id="tinggibadan" name="tinggibadan" value="{{ old('tinggibadan') ?? $vitalsign->tinggibadan}}">
            @error('tinggibadan')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="font-weight-bold" for="beratbadan">Berat Badan (Kg)</label>
            <input type="text" class="form-control" id="beratbadan" name="beratbadan" value="{{ old('beratbadan') ?? $vitalsign->beratbadan}}">
            @error('beratbadan')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="font-weight-bold" for="lingkarperut">Lingkar Perut (cm)</label>
            <input type="text" class="form-control" id="lingkarperut" name="lingkarperut" value="{{ old('lingkarperut') ?? $vitalsign->lingkarperut}}">
            @error('lingkarperut')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        </div>
        
        <div class="row">
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="tekanandarah" name="tekanandarah">Tekanan Darah (mm/Hg)</label>
            <input type="text" class="form-control" id="tekanandarah" name="tekanandarah" value="{{ old('tekanandarah') ?? $vitalsign->tekanandarah}}">
            @error('tekanandarah')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="pernafasan">Pernafasan (/menit)</label>
            <input type="text" class="form-control" id="pernafasan" name="pernafasan" value="{{ old('pernafasan') ?? $vitalsign->pernafasan}}">
            @error('pernafasan')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="detakjantung">Detak Jantung (/menit)</label>
            <input type="text" class="form-control" id="detakjantung" name="detakjantung" value="{{ old('detakjantung') ?? $vitalsign->detakjantung}}">
            @error('detakjantung')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="suhu">Suhu (celcius)</label>
            <input type="text" class="form-control" id="suhu" name="suhu" value="{{ old('suhu') ?? $vitalsign->suhu}}">
            @error('suhu')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="pemeriksaanawal">Pemeriksaan Awal</label>
              <textarea class="form-control" id="pemeriksaanawal" rows="3" name="pemeriksaanawal">{{ old('pemeriksaanawal') ?? $vitalsign->pemeriksaanawal}}</textarea>
              @error('pemeriksaanawal')<label class="text text-danger">{{ $message }}</label>@enderror
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="tinggifundus" name="tinggifundus">Tinggi fundus uteri</label>
            <input type="text" class="form-control" id="tinggifundus" name="tinggifundus" value="{{ old('tinggifundus') }}">
            @error('tinggifundus')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
              <label class="font-weight-bold" for="bentukuteri">Bentuk Uteri</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="bentukuteri" id="bentukuterinormal" {{ old('bentukuteri') === 'Normal' ? 'checked':'' }} value="Normal">
                <label class="form-check-label" for="bentukuterinormal">
                  Normal
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="bentukuteri" id="bentukuterikelainan" {{ old('bentukuteri') === 'Kelainan' ? 'checked':'' }} value="Kelainan">
                <label class="form-check-label" for="bentukuterikelainan">
                  Kelainan
                </label>
                @error('bentukuteri')
              <div class="text text-danger">{{ $message }}</div>
              @enderror
              </div>
            </div>
        </div>
        <div class="col-lg-2">
              <div class="form-group">
                <label class="font-weight-bold" for="letakjanin">Letak janin</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="letakjanin" id="letakjaninkepala" {{ old('letakjanin') === 'Kepala' ? 'checked':'' }} value="Kepala">
                  <label class="form-check-label" for="letakjaninkepala">
                    Kepala
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="letakjanin" id="letakjaninsungsang" {{ old('letakjanin') === 'Sungsang' ? 'checked':'' }} value="Sungsang">
                  <label class="form-check-label" for="letakjaninsungsang">
                    Sungsang
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="letakjanin" id="letakjaninmelintang" {{ old('letakjanin') === 'melintang' ? 'checked':'' }} value="melintang">
                  <label class="form-check-label" for="letakjaninmelintang">
                    melintang
                  </label>
                  @error('letakjanin')
                  <div class="text text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
              <label class="font-weight-bold" for="gerakjanin">Gerak janin</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gerakjanin" id="gerakjaninaktif" {{ old('gerakjanin') === 'Aktif' ? 'checked':'' }} value="Aktif">
                <label class="form-check-label" for="gerakjaninaktif">
                  Aktif
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gerakjanin" id="gerakjaninjarang" {{ old('gerakjanin') === 'Jarang' ? 'checked':'' }} value="Jarang">
                <label class="form-check-label" for="gerakjaninjarang">
                  Jarang
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gerakjanin" id="gerakjanintidakaktif" {{ old('gerakjanin') === 'Tidak aktif' ? 'checked':'' }} value="Tidak aktif">
                <label class="form-check-label" for="gerakjanintidakaktif">
                  Tidak aktif
                </label>
                @error('gerakjanin')
              <div class="text text-danger">{{ $message }}</div>
              @enderror
              </div>
            </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="detakjantungjanin">Detak jantung janin (/menit)</label>
            <input type="text" class="form-control" id="detakjantungjanin" name="detakjantungjanin" value="{{ old('detakjantungjanin') }}">
            @error('detakjantungjanin')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="pemeriksaanlanjutan">Pemeriksaan Lanjutan</label>
              <input type="checkbox" id="ceklab" name="ceklab" value="cek" class="ml-3"> <label class="text text-danger" for="ceklab">Cek Lab</label>
              <textarea class="form-control" id="pemeriksaanlanjutan" rows="3" name="pemeriksaanlanjutan">{{ old('pemeriksaanlanjutan') }}</textarea>
              @error('pemeriksaanlanjutan')<label class="text text-danger">{{ $message }}</label>@enderror
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
              <label class="font-weight-bold" for="diag_id">Diagnosa</label>
                <select class="form-control" id="diag_id" name="diag_id">
                    <option value="">pilih diagnosa</option>
                    @foreach ($diags as $diag)
                    <option {{ old('diag_id') == $diag -> id ? 'selected':'' }} value="{{$diag->id}}">{{$diag->diagnosa}}</option>
                    @endforeach
                </select>
              @error('diag_id')<label class="text text-danger">diagnosa belum dipilih</label>@enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="tindakan">Tindakan/perawatan</label>
              <textarea class="form-control" id="tindakan" rows="3" name="tindakan">{{ old('tindakan') }}</textarea>
              @error('tindakan')<label class="text text-danger">{{ $message }}</label>@enderror
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="pengobatan">Pengobatan </label>
              <select class="form-control mb-1">
                    <option value="">daftar obat yang tersedia</option>
                    @foreach ($medicines as $medicine)
                    <option>{{$medicine->obat}} - {{$medicine->jumlah}}</option>
                    @endforeach
              </select>
              <textarea class="form-control" id="pengobatan" rows="3" name="pengobatan">{{ old('pengobatan') }}</textarea>
              @error('pengobatan')<label class="text text-danger">{{ $message }}</label>@enderror
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="keterangan">Keterangan</label>
              <textarea class="form-control" id="keterangan" rows="3" name="keterangan">{{ old('keterangan') }}</textarea>
              @error('keterangan')<label class="text text-danger">{{ $message }}</label>@enderror
            </div>
        </div>
        </div>


        <div class="row">
          <div class="col-lg-12">
            <div class="card bg-light border-primary mb-3">
              <div class="card-header font-weight-bold">Rujuk Internal</div>
              <div class="card-body">
                  <div class="form-group">
                    <label class="" for="rujukinternal">Alasan Rujuk</label>
                    <textarea class="form-control" id="rujukinternal" rows="3" name="rujukinternal">{{ old('rujukinternal')}}</textarea>
                  </div>
                  <div class="form-group">
                    <label class="" for="room_id">Poli Tujuan</label>
                    <select class="form-control" id="room_id" name="room_id">
                          <option value="">--pilih poli tujuan--</option>
                          @foreach ($rooms as $room)
                            <option {{ old('room_id') == $room->id ? 'selected':'' }} value="{{$room->id}}">{{$room->room}}</option>
                          @endforeach
                    </select>
                    @error('room_id')<label class="text text-danger">Poli tujuan rujuk belum dipilih</label>@enderror
                  </div>
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