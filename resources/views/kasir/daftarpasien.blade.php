@extends ('../layouts/rekammedik')


@section('title', 'kasir')


@section('navigation')
@include ('kasir/navigation')
@endsection



@section('content')
<div class="container">
<h3>Pembayaran</h3>
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
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Kepala Keluarga</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($patients as $patient)
                    <tr>
                    <th scope="row">{{$patient->id}}</th>
                    <td>{{$patient->member->head->norm}}</td>
                    <td>{{$patient->member->nama}}</td> 
                    <td>{{$patient->member->jeniskelamin}}</td>
                    <td>Tn. {{$patient->member->head->kepalakeluarga}}</td>
                    <td>{{$patient->member->head->village->desa}}</td>
                    <td class="text-danger">
                    @if ($patient->member->jaminankesehatan == 'BPJS/JKN')
                    GRATIS
                    @else
                    Rp. Calculating on proses.....
                    @endif
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
<hr>
        </div>
    </div>


    

</div>
@endsection