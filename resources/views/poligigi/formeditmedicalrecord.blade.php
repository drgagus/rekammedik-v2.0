@extends ('../layouts/rekammedik')


@section('title', 'Poli Gigi')


@section('navigation')
@include ('poligigi/navigation')
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

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
    <span class="btn btn-dark">{{date('d M Y', strtotime($medicalrecord->tanggalkunjungan))}}</span>
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

      <div class="row">
      <div class="col-lg-6"></div>
      <div class="col-lg-6 text-right">
        <a class="btn btn-sm btn-primary" href="/poligigi/pasien/{{$pasien->id}}" target=_blank>Rekam Medik</a>
        @if ($odontogram)
        <a class="btn btn-sm btn-warning" href="/poligigi/odontogram/{{$patient->member->id}}/edit">Odontogram</a>
        @endif
        <!-- ----hapus----- -->
        <!-- Button trigger modal -->
@if (count($labrecords))
@else
    @if(count($medicinerecords))
    @else
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModal">
            hapus
            </button>
    @endif
@endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kunjungan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/poligigi/pasien/{{$medicalrecord->id}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12 text-left">
                    <table>
                    <tr><td>Nama</td><td>:</td><td>{{$medicalrecord -> member -> nama}}</td></tr>
                    <tr><td>Poli</td><td>:</td><td>{{$medicalrecord -> room -> room}}</td></tr>
                    </table>
                    </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        <!-- ----akhir hapus----- -->
      </div>
      </div>


      <form action="/poligigi/pasien/{{$medicalrecord->id}}/edit" method="post">
            @csrf
            @method('patch')

        <div class="row">
        <div class="col-lg-3">
          <div class="form-group">
            <label for="tanggalkunjungan">Tanggal</label>
            <input type="date" class="form-control" id="tanggalkunjungan" name="tanggalkunjungan" value={{ $medicalrecord->tanggalkunjungan }} readonly>
            @error('tanggalkunjungan')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="font-weight-bold" for="keluhanutama">Keluhan Utama</label>
            <input type="text" class="form-control" id="keluhanutama" name="keluhanutama" value="{{ old('keluhanutama') ?? $medicalrecord->keluhanutama}}">
            @error('keluhanutama')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="font-weight-bold" for="tinggibadan" name="tinggibadan">Tinggi Badan (cm)</label>
            <input type="text" class="form-control" id="tinggibadan" name="tinggibadan" value="{{ old('tinggibadan') ?? $medicalrecord->tinggibadan}}">
            @error('tinggibadan')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="font-weight-bold" for="beratbadan">Berat Badan (Kg)</label>
            <input type="text" class="form-control" id="beratbadan" name="beratbadan" value="{{ old('beratbadan') ?? $medicalrecord->beratbadan}}">
            @error('beratbadan')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="font-weight-bold" for="lingkarperut">Lingkar Perut (cm)</label>
            <input type="text" class="form-control" id="lingkarperut" name="lingkarperut" value="{{ old('lingkarperut') ?? $medicalrecord->lingkarperut}}">
            @error('lingkarperut')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        </div>
        
        <div class="row">
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="tekanandarah" name="tekanandarah">Tekanan Darah (mm/Hg)</label>
            <input type="text" class="form-control" id="tekanandarah" name="tekanandarah" value="{{ old('tekanandarah') ?? $medicalrecord->tekanandarah}}">
            @error('tekanandarah')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="pernafasan">Pernafasan (/menit)</label>
            <input type="text" class="form-control" id="pernafasan" name="pernafasan" value="{{ old('pernafasan') ?? $medicalrecord->pernafasan}}">
            @error('pernafasan')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="detakjantung">Detak Jantung (/menit)</label>
            <input type="text" class="form-control" id="detakjantung" name="detakjantung" value="{{ old('detakjantung') ?? $medicalrecord->detakjantung}}">
            @error('detakjantung')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="font-weight-bold" for="suhu">Suhu (celcius)</label>
            <input type="text" class="form-control" id="suhu" name="suhu" value="{{ old('suhu') ?? $medicalrecord->suhu}}">
            @error('suhu')<label class="text text-danger">{{ $message }}</label>@enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="pemeriksaanawal">Pemeriksaan Awal</label>
              <textarea class="form-control" id="pemeriksaanawal" rows="3" name="pemeriksaanawal">{{ old('pemeriksaanawal') ?? $medicalrecord->pemeriksaanawal}}</textarea>
              @error('pemeriksaanawal')<label class="text text-danger">{{ $message }}</label>@enderror
            </div>
        </div>
        </div>

        @if (count($labrecords))
        <div class="row mb-3">
        <div class="col-lg-12">
        <label class="font-weight-bold" for="pemeriksaanlaboratorium">Pemeriksaan Laboratorium</label>
              <table class="border">
              @foreach ($labrecords as $labrecord)
                <tr><td>{{$labrecord->lab->pemeriksaan}}</td><td>:</td><td>{{$labrecord->hasil}}</td><td>{{$labrecord->lab->satuan}}</td></tr>
              @endforeach
              </table>
        </div>
        </div>
        @endif

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="pemeriksaanlanjutan">Pemeriksaan Lanjutan</label>
              <textarea class="form-control" id="pemeriksaanlanjutan" rows="3" name="pemeriksaanlanjutan">{{ old('pemeriksaanlanjutan') ?? $medicalrecord->pemeriksaanlanjutan}}</textarea>
              @error('pemeriksaanlanjutan')<label class="text text-danger">{{ $message }}</label>@enderror
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
              <label class="font-weight-bold" for="diag_id">Diagnosa</label>
              @if ($medicalrecord -> diag_id)
                <select class="form-control" id="diag_id" name="diag_id">
                    <option value="">pilih diagnosa</option>
                    @foreach ($diags as $diag)
                    <option {{ $medicalrecord -> diag_id === $diag->id ? 'selected':'' }} value="{{$diag->id}}">{{$diag->diagnosa}}</option>
                    @endforeach
                </select>
              @else
              <select class="form-control" id="diag_id" name="diag_id">
                    <option value="">pilih diagnosa</option>
                    @foreach ($diags as $diag)
                    <option value="{{$diag->id}}">{{$diag->diagnosa}}</option>
                    @endforeach
                </select>
              @endif
              @error('diag_id')<label class="text text-danger">Diagnosa belum dipilih</label>@enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="tindakan">Tindakan/perawatan</label>
              <textarea class="form-control" id="tindakan" rows="3" name="tindakan">{{ old('tindakan') ?? $medicalrecord->tindakan}}</textarea>
              @error('tindakan')<label class="text text-danger">{{ $message }}</label>@enderror
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="pengobatan">Obat</label>
              <select class="form-control mb-1">
                    <option value="">daftar obat yang tersedia</option>
                    @foreach ($medicines as $medicine)
                    <option>{{$medicine->obat}} - {{$medicine->jumlah}}</option>
                    @endforeach
              </select>
              <textarea class="form-control" id="pengobatan" rows="3" name="pengobatan">{{ old('pengobatan') ?? $medicalrecord->pengobatan}}</textarea>
              @error('pengobatan')<label class="text text-danger">{{ $message }}</label>@enderror
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
              <label class="font-weight-bold" for="keterangan">Keterangan</label>
              <textarea class="form-control" id="keterangan" rows="3" name="keterangan">{{ old('keterangan') ?? $medicalrecord->keterangan}}</textarea>
              @error('keterangan')<label class="text text-danger">{{ $message }}</label>@enderror
            </div>
        </div>
        </div>

        @if ($pasien->patient->selesai == 9)
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
        @endif

      </div>
      <div class="card-footer bg-transparent border-success text-right">
      <button type="submit" class="btn btn-primary">
      @if ($medicalrecord->diag_id)
      EDIT
      @else
      INPUT
      @endif
      </button>
      </div>
    </div>
    </form>
       
        </div>
    </div>
</div>

@endsection