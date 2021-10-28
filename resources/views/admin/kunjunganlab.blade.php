@extends ('../layouts/rekammedik')


@section('title', 'Admin')


@section('navigation')
@include ('admin/navigation')
@endsection



@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-6">
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>
        </div>

<h3><a href="/admin/laboratorium" class="text-decoration-none text-dark">Kunjungan Laboratorium</a></h3>
    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal<br>Kunjungan</th>
                    <th scope="col">Unit/Poli</th>
                    <th scope="col">Nomor<br>Rekam Medis</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Pemeriksaan<br>Laboratorium</th>
                    <th scope="col">Hasil</th>
                    <th scope="col">Laboran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($labrecords as $labrecord)
                    <tr>
                    <td class=""></td>
                    <td class="">{{date('d-m-Y', strtotime($labrecord->medicalrecord->tanggalkunjungan))}}</td>
                    <td class="">{{$labrecord->medicalrecord->room->room}}</td>
                    <td class="">{{$labrecord->medicalrecord->member->head->norm}}</td>
                    <td class="">{{$labrecord->medicalrecord->member->nama}}</td>
                    <td class="">{{$labrecord->medicalrecord->umurtahun}} Tahun</td>
                    <td class="">{{$labrecord->lab->pemeriksaan}}</td>
                    <td class="">{{$labrecord->hasil}} {{$labrecord->lab->satuan}}</td>
                    <td class="">{{$labrecord->user->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {{$labrecords->links()}}
        </div>
    </div>
</div>
@endsection