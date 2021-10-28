@extends ('../layouts/rekammedik')


@section('title', 'Poli Umum')


@section('navigation')
@include ('poliumum/navigation')
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
                @foreach ($patienttodays as $patienttoday)
                    <tr>
                    <th scope="row">#</th>
                    <td>{{$patienttoday->member->head->norm}}</td>
                    <td><a href="/poliumum/pasien/{{$patienttoday->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$patienttoday->member->nama}}</a></td>
                    <td>
                    @if ($patienttoday->diag_id)
                        {{$patienttoday->diag->diagnosa}}
                    @else
                        @if (count($patienttoday->labrecord))
                            <a href="/poliumum/ceklab/{{$patienttoday->id}}/edit" class="">Form Cek-Lab</a>
                        @else
                            <a href="/poliumum/ceklab/create/{{$patienttoday->id}}" class="">Form Cek-Lab</a>
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
                    @if ($patient->selesai == 2) 
                    <a href="/poliumum/pasien/{{$patient->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$patient->member->nama}}</a>
                    @else
                    <a href="/poliumum/pasien/create/{{$patient->id}}" class="text-decoration-none text-dark font-weight-bold">{{$patient->member->nama}}</a>
                    @endif
                    </td>
                    <td>@if ($patient->selesai == 2) 
                        <input type="checkbox" checked> <label class="text text-success">Selesai</label>
                        @else
                        <input type="checkbox"> <label class="text text-danger"> Belum Selesai</label>
                        @endif
                     </td>
                    </tr>
                    
                @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection