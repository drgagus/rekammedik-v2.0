@extends ('../layouts/rekammedik')


@section('title', 'Apotek')


@section('navigation')
@include ('apotek/navigation')
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
                    <th scope="col">#</th>
                    <th scope="col">Nomor<br>Rekam Medik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pasiens as $pasien)
                    <tr>
                    <th scope="row">#</th>
                    <td>{{$pasien->member->head->norm}}</td>
                    <td><a href="/apotek/pasien/{{$pasien->id}}" class="text-decoration-none text-dark font-weight-bold">{{$pasien->member->nama}}</a></td>
                    <td><input type="checkbox" checked> <label class="text text-success">Selesai</label></td>
                    </tr>
                @endforeach
                @foreach ($patients as $patient)
                    <tr>
                    <th scope="row">#</th>
                    <td>{{$patient->member->head->norm}}</td>
                    <td><a href="/apotek/pasien/create/{{$patient->id}}" class="text-decoration-none text-dark font-weight-bold">{{$patient->member->nama}}</a></td>
                    <td><input type="checkbox"> <label class="text text-danger"> Belum Selesai</label></td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection