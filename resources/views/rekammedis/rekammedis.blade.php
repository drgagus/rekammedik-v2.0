@extends ('../layouts/rekammedik')


@section('title', 'Rekam Medis')

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
    <span class="btn btn-outline-dark">{{$umur}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Jenis Kelamin
    <span class="btn btn-outline-dark">{{$pasien->jeniskelamin}}</span>
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
</ul>
</div>
</div>

      </div>
      <div class="card-body text-dark">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{$poli1->room}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{$poli2->room}}</a>
        </li>
@if($pasien->jeniskelamin == 'Laki-laki')
@else
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">{{$poli3->room}}</a>
        </li>
@endif
        <li class="nav-item">
            <a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="false">{{$poli4->room}}</a>
        </li>
        </ul>


        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<!-- awal poli1 -->
            <table class="table table-hover table-responsive">
                <tr class="">
                    <th class="">#</th>
                    <th class="">Tanggal</th>
                    <th class="">Tanda-tanda<br>Vital</th>
                    <th class="">Keluhan&<br>Pemeriksaan</th>
                    <th class="">Pemeriksaan<br>Laboratorium</th>
                    <th class="">Diagnosa</th>
                    <th class="">obat</th>
                    <th class="">Dokter<br>Bidan</th>
                </tr>
@foreach ($poli1medicalrecords as $medicalrecord)
                <tr class="">
                    <td class="">#</td>
                    <td class="">{{ date('d-m-Y', strtotime($medicalrecord->tanggalkunjungan))}}</td>
                    <td class="">
                    TD: {{$medicalrecord->tekanandarah}} mm/Hg<br>
                    RR: {{$medicalrecord->pernafasan}}/menit<br>
                    HR: {{$medicalrecord->detakjantung}}/menit<br>
                    Temp: {{$medicalrecord->suhu}} Celcius<br></td>
                    <td class="">{{$medicalrecord->keluhanutama}}<br>{{$medicalrecord->pemeriksaanawal}}<br>{{$medicalrecord->pemeriksaanlanjutan}}<br></td>
                    <td class="">
                      <?php $laboran = '' ; ?>
                      @foreach ($medicalrecord->labrecord as $labrecord)
                      {{$labrecord->lab->pemeriksaan}} : {{$labrecord->hasil}} {{$labrecord->lab->satuan}}<br>
                      <?php $laboran = $labrecord->user->name ; ?>
                      @endforeach
                      {{$laboran ?? ''}}
                    </td>
                    <td class="">@if ($medicalrecord->diag_id){{ $medicalrecord->diag->diagnosa}}@endif</td>
                    <td class="">{{ $medicalrecord->pengobatan}}</td>
                    <td class="">{{ $medicalrecord->user->name}}</td>
                </tr>
@endforeach
            </table>
<!-- akhir poli1 -->
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<!-- awal poli2 -->
@if ($odontogram)
<div class="row mb-3">
    <div class="col-lg-12">
      <label class="font-weight-bold">Odontogram</label>
        <table class="table-responsive" cellpadding="10">
        <tr class="text-center font-weight-bold text-monospace">
        <td>Maxila</td><td class="border-bottom border-dark">18</td><td class="border-bottom border-dark">17</td><td class="border-bottom border-dark">16</td><td class="border-bottom border-dark">15</td><td class="border-bottom border-dark">14</td><td class="border-bottom border-dark">13</td><td class="border-bottom border-dark">12</td><td class="border-bottom border-dark border-right">11</td><td class="border-bottom border-dark border-left">21</td><td class="border-bottom border-dark">22</td><td class="border-bottom border-dark">23</td><td class="border-bottom border-dark">24</td><td class="border-bottom border-dark">25</td><td class="border-bottom border-dark">26</td><td class="border-bottom border-dark">27</td><td class="border-bottom border-dark">28</td>
        </tr>
        <tr class="text-center font-weight-bold text-monospace">
        <td>Mandibula</td><td class="border-top border-dark">48</td><td class="border-top border-dark">47</td><td class="border-top border-dark">46</td><td class="border-top border-dark">45</td><td class="border-top border-dark">44</td><td class="border-top border-dark">43</td><td class="border-top border-dark">42</td><td class="border-top border-dark border-right">41</td><td class="border-top border-dark border-left">31</td><td class="border-top border-dark">32</td><td class="border-top border-dark">33</td><td class="border-top border-dark">34</td><td class="border-top border-dark">35</td><td class="border-top border-dark">36</td><td class="border-top border-dark">37</td><td class="border-top border-dark">38</td>
        </tr>
        </table>
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-3">
        <table class="">
          <tr class="">
            <th class="">Periodontal</th><td class="">:</td><td class="">{{$odontogram->periodontal}}</td>
          </tr>
          <tr class="">
            <th class="">Karang gigi</th><td class="">:</td><td class="">{{$odontogram->karanggigi}}</td>
          </tr>
          <tr class="">
            <th class="">Sikat gigi</th><td class="">:</td><td class="">{{$odontogram->sikatgigi}}</td>
          </tr>
        </table>
    </div>
    <div class="col-lg-6">
        <table class="">
          <tr class="">
            <th class="">Indeks debris</th><td class="">:</td><td class="">{{$odontogram->indeksdebris}}</td>
          </tr>
          <tr class="">
            <th class="">Indeks kalkulus</th><td class="">:</td><td class="">{{$odontogram->indekskalkulus}}</td>
          </tr>
          <tr class="">
            <th class="">OHIS</th><td class="">:</td><td class="">{{$odontogram->ohis}}</td>
          </tr>
        </table>
    </div>
</div>
@endif
<table class="table table-hover table-responsive">
                <tr class="">
                    <th class="">#</th>
                    <th class="">Tanggal</th>
                    <th class="">Tanda-tanda<br>Vital</th>
                    <th class="">Keluhan&<br>Pemeriksaan</th>
                    <th class="">Pemeriksaan<br>Laboratorium</th>
                    <th class="">Diagnosa</th>
                    <th class="">obat</th>
                    <th class="">Dokter<br>Bidan</th>
                </tr>
@foreach ($poli2medicalrecords as $medicalrecord)
                <tr class="">
                    <td class="">#</td>
                    <td class="">{{ date('d-m-Y', strtotime($medicalrecord->tanggalkunjungan))}}</td>
                    <td class="">TD: {{$medicalrecord->tekanandarah}} mm/Hg<br>RR: {{$medicalrecord->pernafasan}}/menit<br>HR: {{$medicalrecord->detakjantung}}/menit<br>Temp: {{$medicalrecord->suhu}} Celcius<br></td>
                    <td class="">{{$medicalrecord->keluhanutama}}<br>{{$medicalrecord->pemeriksaanawal}}<br>{{$medicalrecord->pemeriksaanlanjutan}}<br></td>
                    <td class="">
                      <?php $laboran = '' ; ?>
                      @foreach ($medicalrecord->labrecord as $labrecord)
                      {{$labrecord->lab->pemeriksaan}} : {{$labrecord->hasil}} {{$labrecord->lab->satuan}}<br>
                      <?php $laboran = $labrecord->user->name ; ?>
                      @endforeach
                      {{$laboran ?? ''}}
                    </td>
                    <td class="">@if ($medicalrecord->diag_id){{ $medicalrecord->diag->diagnosa}}@endif</td>
                    <td class="">{{ $medicalrecord->pengobatan}}</td>
                    <td class="">{{ $medicalrecord->user->name}}</td>
                </tr>
@endforeach
            </table>
<!-- akhir poli2 -->
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
<!-- awal poli3 -->
            <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="polikia-tab" data-toggle="tab" href="#polikia" role="tab" aria-controls="polikia" aria-selected="true">{{$poli3->room}}</a>
                </li>
                @foreach ($momcards as $momcard)
                <li class="nav-item">
                    <a class="nav-link" id="kartuibu{{$momcard->id}}-tab" data-toggle="tab" href="#kartuibu{{$momcard->id}}" role="tab" aria-controls="kartuibu{{$momcard->id}}" aria-selected="false">Kartu Ibu {{date('d-m-Y', strtotime($momcard->tanggalkunjungan))}}</a>
                </li>
                @endforeach
            </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="polikia" role="tabpanel" aria-labelledby="polikia-tab">
    <!-- awal tabel -->
    <table class="table table-hover table-responsive">
                <tr class="">
                    <th class="">#</th>
                    <th class="">Tanggal</th>
                    <th class="">Tanda-tanda<br>Vital</th>
                    <th class="">Keluhan&<br>Pemeriksaan</th>
                    <th class="">Pemeriksaan<br>Kebidanan</th>
                    <th class="">Pemeriksaan<br>Laboratorium</th>
                    <th class="">Diagnosa</th>
                    <th class="">obat</th>
                    <th class="">Dokter<br>Bidan</th>
                </tr>
@foreach ($poli3medicalrecords as $medicalrecord)
                <tr class="">
                    <td class="">#</td>
                    <td class="">{{ date('d-m-Y', strtotime($medicalrecord->tanggalkunjungan))}}</td>
                    <td class="">BB: {{$medicalrecord->beratbadan}} Kg<br>TD: {{$medicalrecord->tekanandarah}} mm/Hg<br>RR: {{$medicalrecord->pernafasan}}/menit<br>HR: {{$medicalrecord->detakjantung}}/menit<br>Temp: {{$medicalrecord->suhu}} Celcius<br></td>
                    <td class="">{{$medicalrecord->keluhanutama}}<br>{{$medicalrecord->pemeriksaanawal}}<br>{{$medicalrecord->pemeriksaanlanjutan}}<br></td>
                    <td class="">
                        Tinggi fundus: @if ($medicalrecord->tinggifundus){{ $medicalrecord->tinggifundus}}@else - @endif <br>
                        Bentuk uteri: @if ($medicalrecord->bentukuteri){{ $medicalrecord->bentukuteri}}@else - @endif <br>
                        Letak janin: @if ($medicalrecord->letakjanin){{ $medicalrecord->letakjanin}}@else - @endif <br>
                        Gerak janin: @if ($medicalrecord->gerakjanin){{ $medicalrecord->gerakjanin}}@else - @endif <br>
                        DJJ: @if ($medicalrecord->detakjantungjanin){{ $medicalrecord->detakjantungjanin}}@else - @endif
                    </td>
                    <td class="">
                      <?php $laboran = '' ; ?>
                      @foreach ($medicalrecord->labrecord as $labrecord)
                      {{$labrecord->lab->pemeriksaan}} : {{$labrecord->hasil}} {{$labrecord->lab->satuan}}<br>
                      <?php $laboran = $labrecord->user->name ; ?>
                      @endforeach
                      {{$laboran ?? ''}}
                    </td>
                    <td class="">@if ($medicalrecord->diag_id){{ $medicalrecord->diag->diagnosa}}@endif</td>
                    <td class="">{{ $medicalrecord->pengobatan}}</td>
                    <td class="">{{ $medicalrecord->user->name}}</td>
                </tr>
@endforeach
            </table>
    <!-- akhir table -->
                    </div>
                    @foreach ($momcards as $momcard)
                    <div class="tab-pane fade" id="kartuibu{{$momcard->id}}" role="tabpanel" aria-labelledby="kartuibu{{$momcard->id}}-tab">
        <!-- awal kartu ibu -->
        <h5>Riwayat Kontrasepsi Terakhir</h5>
        <label for="" class="ml-3">{{$momcard->kontrasepsiterakhir}}</label>

        <h5 class="mt-3">Riwayat Kehamilan Terdahulu</h5>
              <div class="row">
                  <div class="col-lg-12">
                      <table class="table table-responsive">
                          <tr class="text-center"><td>Anak</td><td>Umur<br>(Tahun)</td><td>Berat Lahir<br>(gram)</td><td>Penolong<br>Persalinan</td><td>Cara<br>Persalinan</td><td>Keadaan Bayi</td><td>Komplikasi</td></tr>
                          <tr><td>Ke-1</td><td>{{$momcard->umuranak1}}</td><td>{{$momcard->beratanak1}}</td><td>{{$momcard->penolongpersalinananak1}}</td><td>{{$momcard->carapersalinananak1}}</td><td>{{$momcard->keadaanbayianak1}}</td><td>{{$momcard->komplikasianak1}}</td></tr>
                          <tr><td>Ke-2</td><td>{{$momcard->umuranak2}}</td><td>{{$momcard->beratanak2}}</td><td>{{$momcard->penolongpersalinananak2}}</td><td>{{$momcard->carapersalinananak2}}</td><td>{{$momcard->keadaanbayianak2}}</td><td>{{$momcard->komplikasianak2}}</td></tr>
                          <tr><td>Ke-3</td><td>{{$momcard->umuranak3}}</td><td>{{$momcard->beratanak3}}</td><td>{{$momcard->penolongpersalinananak3}}</td><td>{{$momcard->carapersalinananak3}}</td><td>{{$momcard->keadaanbayianak3}}</td><td>{{$momcard->komplikasianak3}}</td></tr>
                      </table>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-12">
                    <h5 class="">Riwayat Kehamilan Sekarang</h5>
                      <table class="table table-responsive">
                          <tr class=""><td>Haid Terakhir</td><td>:</td><td>{{date('d-m-Y', strtotime($momcard->haidterakhir))}}</td></tr>
                          <tr class=""><td>Perkiraan Partus</td><td>:</td><td>{{date('d-m-Y', strtotime($momcard->perkiraanpartus))}}</td></tr>
                          <tr class=""><td>Keluhan Utama</td><td>:</td><td>{{$momcard->keluhanutama}}</td></tr>
                          <tr class=""><td>Nafsu Makan</td><td>:</td><td>{{$momcard->nafsumakan}}</td></tr>
                          <tr class=""><td>Muntah</td><td>:</td><td>{{$momcard->muntah}}</td></tr>
                          <tr class=""><td>Pusing</td><td>:</td><td>{{$momcard->pusing}}</td></tr>
                          <tr class=""><td>Nyeri Perut</td><td>:</td><td>{{$momcard->nyeriperut}}</td></tr>
                          <tr class=""><td>Oedema</td><td>:</td><td>{{$momcard->oedema}}</td></tr>
                          <tr class=""><td>Penyakit Yang Diderita</td><td>:</td><td>{{$momcard->penyakitdiderita}}</td></tr>
                          <tr class=""><td>Riwayat Kesehatan Keluarga</td><td>:</td><td>{{$momcard->riwayatkeluarga}}</td></tr>
                          <tr class=""><td>Kebiasaan Yang Mempengaruhi Kehamilan</td><td>:</td><td>{{$momcard->kebiasaankehamilan}}</td></tr>
                      </table>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-6">
                    <h5 class="">Pemeriksaan Umum</h5>
                      <table class="table table-responsive">
                          <tr class=""><td>Pucat</td><td>:</td><td>{{$momcard->pucat}}</td></tr>
                          <tr class=""><td>Kesadaran</td><td>:</td><td>{{$momcard->kesadaran}}</td></tr>
                          <tr class=""><td>Bentuk Tubuh</td><td>:</td><td>{{$momcard->bentuktubuh}}</td></tr>
                          <tr class=""><td>Suhu Badan</td><td>:</td><td>{{$momcard->suhubadan}}</td></tr>
                          <tr class=""><td>Kuning</td><td>:</td><td>{{$momcard->kuning}}</td></tr>
                          <tr class=""><td>LILA</td><td>:</td><td>{{$momcard->lila}} cm</td></tr>
                          <tr class=""><td>Tinggi Badan</td><td>:</td><td>{{$momcard->tinggibadan}} cm</td></tr>
                          <tr class=""><td>Berat Badan</td><td>:</td><td>{{$momcard->beratbadan}} Kg</td></tr>
                          <tr class=""><td>Tekanan Darah</td><td>:</td><td>{{$momcard->tekanandarah}} mm/Hg</td></tr>
                          <tr class=""><td>Nadi</td><td>:</td><td>{{$momcard->detakjantung}} /menit</td></tr>
                          <tr class=""><td>Pernafasan</td><td>:</td><td>{{$momcard->pernafasan}} /menit</td></tr>
                      </table>
                  </div>
                  <div class="col-lg-6">
                    <h5 class="">Pemeriksaan Fisik</h5>
                      <table class="table table-responsive">
                          <tr class=""><td>Muka</td><td>:</td><td>{{$momcard->muka}}</td></tr>
                          <tr class=""><td>Mulut</td><td>:</td><td>{{$momcard->mulut}}</td></tr>
                          <tr class=""><td>Gigi</td><td>:</td><td>{{$momcard->gigi}}</td></tr>
                          <tr class=""><td>Paru-paru</td><td>:</td><td>{{$momcard->paruparu}}</td></tr>
                          <tr class=""><td>Jantung</td><td>:</td><td>{{$momcard->jantung}}</td></tr>
                          <tr class=""><td>Payudara</td><td>:</td><td>{{$momcard->payudara}}</td></tr>
                          <tr class=""><td>Hati</td><td>:</td><td>{{$momcard->hati}}</td></tr>
                          <tr class=""><td>Abdomen</td><td>:</td><td>{{$momcard->abdomen}}</td></tr>
                          <tr class=""><td>Tangan Tungkai</td><td>:</td><td>{{$momcard->tangantungkai}}</td></tr>
                      </table>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-6">
                    <h5 class="">Pemeriksaan Kebidanan</h5>
                      <table class="table table-responsive">
                          <tr class=""><td>Tinggi Fundus</td><td>:</td><td>{{$momcard->tinggifundus}}</td></tr>
                          <tr class=""><td></td><td>:</td><td>{{$momcard->bentukfundus}}</td></tr>
                          <tr class=""><td>Bentuk Uterus</td><td>:</td><td>{{$momcard->bentukuterus}}</td></tr>
                          <tr class=""><td>Letak Janin</td><td>:</td><td>{{$momcard->letakjanin}}</td></tr>
                          <tr class=""><td>Gerak Janin</td><td>:</td><td>{{$momcard->gerakjanin}}</td></tr>
                          <tr class=""><td>Detak Jantung Janin</td><td>:</td><td>{{$momcard->detakjantungjanin}} /menit</td></tr>
                          <tr class=""><td>Inspekulo</td><td>:</td><td>{{$momcard->inspekulo}}</td></tr>
                          <tr class=""><td>Perdarahan</td><td>:</td><td>{{$momcard->perdarahan}}</td></tr>
                          <tr class=""><td>Pemeriksaan Dalam Atas Indikasi</td><td>:</td><td>{{$momcard->pemeriksaandalam}}</td></tr>
                      </table>
                  </div>
                  <div class="col-lg-6">
                    <h5 class="">Pemeriksaan Laboratorium</h5>
                      <table class="table table-responsive">
                          <tr class=""><td>Haemoglobin</td><td>:</td><td>{{$momcard->haemoglobin}} gr/dl</td></tr>
                          <tr class=""><td>Urine Albumine</td><td>:</td><td>{{$momcard->urinealbumine}}</td></tr>
                          <tr class=""><td>Urine Reduksi</td><td>:</td><td>{{$momcard->urinereduksi}}</td></tr>
                          <tr class=""><td>Faeces</td><td>:</td><td>{{$momcard->faeces}}</td></tr>
                          <tr class=""><td>Malaria</td><td>:</td><td>{{$momcard->malaria}}</td></tr>
                          <tr class=""><td>Golongan Darah</td><td>:</td><td>{{$momcard->golongandarah}}</td></tr>
                      </table>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-12 text-right">
        <!-- ----hapus----- -->
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModal{{$momcard->id}}">
                    HAPUS
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$momcard->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Anggota Keluarga</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <form action="/polikia/kartuibu/{{$momcard->id}}" method="post">
                            @csrf
                            @method('delete')
                            <div class="row">
                            <div class="col-lg-12">
                            <table class="">
                              <tr class="">
                                <td class="">Nama</td><td class="">:</td><td class="">{{$momcard -> member -> nama}}</td>
                              </tr>
                              <tr class="">
                                <td class="">Jenis Kelamin</td><td class="">:</td><td class="">{{$momcard -> member -> jeniskelamin}}</td>
                              </tr>
                              <tr class="">
                                <td class="">Kepala Keluarga</td><td class="">:</td><td class="">Tn. {{$momcard -> member -> head -> kepalakeluarga}}</td>
                              </tr>
                              <tr class="">
                                <td class="">Desa</td><td class="">:</td><td class="">{{$momcard -> member -> head -> Village -> desa}}</td>
                              </tr>
                              <tr class="">
                                <td class="">Tanggal Kunjungan</td><td class="">:</td><td class="">{{date('d M Y', strtotime($momcard -> tanggalkunjungan))}}</td>
                              </tr>
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
                      <a href="/polikia/kartuibu/{{$momcard->id}}/edit" class="btn btn-sm btn-primary">EDIT</a>
                  </div>
              </div>


        <!-- akhir kartu ibu -->
            </div>
            @endforeach
        </div>
<!-- akhir poli3 -->
        </div>
        <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
<!-- awal poli4 -->
<table class="table table-hover table-responsive">
                <tr class="">
                    <th class="">#</th>
                    <th class="">Tanggal</th>
                    <th class="">Tanda-tanda<br>Vital</th>
                    <th class="">Keluhan&<br>Pemeriksaan</th>
                    <th class="">Pemeriksaan<br>Laboratorium</th>
                    <th class="">Diagnosa</th>
                    <th class="">Tindakan</th>
                    <th class="">obat</th>
                    <th class="">Dokter<br>Bidan</th>
                </tr>
@foreach ($poli4medicalrecords as $medicalrecord)
                <tr class="">
                    <td class="">#</td>
                    <td class="">{{ date('d-m-Y', strtotime($medicalrecord->tanggalkunjungan))}}</td>
                    <td class="">
                    GCS: @if($medicalrecord->gcs) {{$medicalrecord->gcs}} @else - @endif<br>
                    TD: @if($medicalrecord->tekanandarah) {{$medicalrecord->tekanandarah}} mm/Hg @else - @endif<br>
                    RR: @if($medicalrecord->pernafasan) {{$medicalrecord->pernafasan}} /menit @else - @endif<br>
                    HR: @if($medicalrecord->detakjantung) {{$medicalrecord->detakjantung}} /menit @else - @endif<br>
                    Temp: @if($medicalrecord->suhu) {{$medicalrecord->suhu}} Celcius @else - @endif<br></td>
                    <td class="">
                        {{$medicalrecord->keluhanutama}}<br>
                        {{$medicalrecord->pemeriksaanawal}}<br>
                        {{$medicalrecord->pemeriksaanlanjutan}}<br>
                    </td>
                    <td class="">
                      <?php $laboran = '' ; ?>
                        @foreach ($medicalrecord->labrecord as $labrecord)
                          {{$labrecord->lab->pemeriksaan}} : {{$labrecord->hasil}} {{$labrecord->lab->satuan}}<br>
                          <?php $laboran = $labrecord->user->name ; ?>
                        @endforeach
                        {{$laboran ?? ''}}
                    </td>
                    <td class="">@if ($medicalrecord->diag_id){{ $medicalrecord->diag->diagnosa}}@endif</td>
                    <td class="">{{ $medicalrecord->tindakan}}</td>
                    <td class="">{{ $medicalrecord->pengobatan}}</td>
                    <td class="">{{ $medicalrecord->user->name}}</td>
                </tr>
@endforeach
            </table>
<!-- akhir poli4 -->
        </div>
        </div>
        



      </div>
    </div>
       
        </div>
    </div>
</div>

@endsection