@extends ('../layouts/rekammedik')


@section('title', 'Laboratorium')


@section('navigation')
@include ('laboratorium/navigation')
@endsection



@section('content')
<div class="container">
<h3>Daftar Pasien Tanggal {{ date('d M Y') }}</h3>
<div class="row">
    <div class="col-lg-6">
            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
    </div>
</div>

    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">Nomor<br>Antrian</th>
                    <th scope="col">Nomor<br>Rekam Medik</th>
                    <th scope="col">Poli</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pasiens as $pasien)
                @if (count($pasien->labrecord))
                    <tr>
                    <th scope="row"></th>
                    <td>{{$pasien->member->head->norm}}</td>
                    <td>{{$pasien->room->room}}</td>
                    <td><a href="/laboratorium/pasien/{{$pasien->id}}" class="text-decoration-none text-dark font-weight-bold">{{$pasien->member->nama}}</a></td>
                    <td>
                    @foreach($pasien->labrecord as $labrecord)
                        {{$labrecord->lab->pemeriksaan}} : {{$labrecord->hasil}} {{$labrecord->lab->satuan}}<br>
                    @endforeach
                    </td>
                    </tr>
                @endif  
                @endforeach
                @foreach ($patients as $patient)
                    <tr>
                    <th scope="row">{{$patient->member->patient->id}}</th>
                    <td>{{$patient->member->head->norm}}</td>
                    <td>{{$patient->room->room}}</td>
                    <td><a href="/laboratorium/pasien/{{$patient->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$patient->member->nama}}</a></td>
                    <td>
                    @foreach($patient->labrecord as $labrecord)
                        {{$labrecord->lab->pemeriksaan}} : {{$labrecord->hasil}} {{$labrecord->lab->satuan}}<br>
                    @endforeach
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection