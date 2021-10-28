@extends ('../layouts/rekammedik')


@section('title', 'IGD')


@section('navigation')
@include ('igd/navigation')
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


    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr class="text-center">
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nomor<br>Rekam Medik</th>
                    <th scope="col">Nama</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($medicalrecords as $medicalrecord)
                    <tr class="text-center">
                    <td scope="row">{{date('d-m-Y', strtotime($medicalrecord->tanggalkunjungan))}}</td>
                    <td scope="row">{{$medicalrecord->member->head->norm}}</td>
                    <td scope="row"><a href="/igd/pasien/{{$medicalrecord->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$medicalrecord->member->nama}}</a></td>
                    <td scope="row">
                        @if (count($medicalrecord->medicinerecord))
                        <input type="checkbox" checked> <a href="/igd/obatpasien/{{$medicalrecord->id}}" class="text text-success text-decoration-none">Obat</a>
                        @else
                        <input type="checkbox"> <a href="/igd/obatpasien/create/{{$medicalrecord->id}}" class="text text-danger text-decoration-none">Obat</a>
                        @endif
                    </td>
                    <td scope="row">
                    @if (count($medicalrecord->labrecord))
                        <input type="checkbox" checked> <a href="/igd/lab/{{$medicalrecord->id}}/edit" class="text text-success text-decoration-none">Cek-Lab</a>
                        @else
                        <input type="checkbox"> <a href="/igd/lab/create/{{$medicalrecord->id}}" class="text text-danger text-decoration-none">Cek-Lab</a>
                        @endif
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                {{$medicalrecords->links()}}
        </div>
    </div>

</div>
@endsection