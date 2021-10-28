@extends ('../layouts/rekammedik')


@section('title', 'Poli Gigi')


@section('navigation')
@include ('poligigi/navigation')
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
                    <th scope="col">Nama</th>
                    <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($medicalrecords as $medicalrecord)
                    <tr>
                    <th scope="row"></th>
                    <td>{{$medicalrecord->member->head->norm}}</td>
                    <td><a href="/poligigi/pasien/{{$medicalrecord->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$medicalrecord->member->nama}}</a></td>
                    <td>
                    @if ($medicalrecord->diag_id)
                        {{$medicalrecord->diag->diagnosa}}
                    @else
                        @if (count($medicalrecord->labrecord))
                            <a href="/poligigi/ceklab/{{$medicalrecord->id}}/edit" class="">Form Cek-Lab</a>
                        @else
                            <a href="/poligigi/ceklab/create/{{$medicalrecord->id}}" class="">Form Cek-Lab</a>
                        @endif
                    @endif
                    </td>
                    </tr>
                @endforeach
                @foreach ($patients as $patient)
                    <tr>
                    <th scope="row">{{$patient->id}}</th>
                    <td>{{$patient->member->head->norm}}</td>
                    <td>
                    <a href="/poligigi/pasien/create/{{$patient->id}}" class="text-decoration-none text-dark font-weight-bold">{{$patient->member->nama}}</a>
                    </td>
                    <td>
                        <input type="checkbox"> <label class="text text-danger"> Belum Selesai</label>
                     </td>
                    </tr>
                    
                @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection