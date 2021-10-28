@extends ('../layouts/rekammedik')


@section('title', 'Pemeriksaan Awal')


@section('navigation')
@include ('pemeriksaanawal/navigation')
@endsection



@section('content')
<div class="container">
<h3>Daftar Pasien Tanggal {{ date('d M Y')}}</h3>
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
        <div class="countdown col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">Nomor<br>Antrian</th>
                    <th scope="col">Nomor<br>Rekam Medik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Kepala Keluarga</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($patients as $patient)
                    <tr>
                    <th scope="row">{{$patient->id}}</th>
                    <td>{{$patient->member->head->norm}}</td>
                    <td>
                    @if ($patient->selesai == null )
                    <a href="/pemeriksaanawal/pasien/{{$patient->id}}/edit" class="text-decoration-none text-dark font-weight-bold">
                    {{$patient->member->nama}}</a>
                    @elseif ($patient->selesai == 1 )
                    <a href="/pemeriksaanawal/pasien/{{$patient->id}}/edit" class="text-decoration-none text-dark font-weight-bold">
                    {{$patient->member->nama}}</a>
                    @else
                    <a href="/pemeriksaanawal/pasien/{{$patient->id}}" class="text-decoration-none text-dark font-weight-bold">{{$patient->member->nama}}</a>
                    @endif
                    </td> 
                    <td>{{$patient->member->jeniskelamin}}</td>
                    <td>Tn. {{$patient->member->head->kepalakeluarga}}</td>
                    <td>{{$patient->member->head->village->desa}}</td>
                    <td>
                    @if ($patient->room_id)
                    {{$patient->room->room}}
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