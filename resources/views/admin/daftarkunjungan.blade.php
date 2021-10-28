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

<h3>Daftar Kunjungan</h3>
    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal<br>Kunjungan</th>
                    <th scope="col">Nomor<br>Rekam Medis</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Diagnosa</th>
                    <th scope="col">Poli</th>
                    <th scope="col">Dokter/Bidan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicalrecords as $medicalrecord)
                    <tr>
                    <td class=""></td>
                    <td class="">{{date('d-m-Y', strtotime($medicalrecord->tanggalkunjungan))}}</td>
                    <td class="">{{$medicalrecord->member->head->norm}}</td>
                    <td class="">{{$medicalrecord->member->nama}}</td>
                    <td class="">{{$medicalrecord->umurtahun}} Tahun</td>
                    <td class="">
                    @if ($medicalrecord->diag_id)
                    {{$medicalrecord->diag->diagnosa}}
                    @endif
                    </td>
                    <td class="">{{$medicalrecord->room->room}}</td>
                    <td class="">{{$medicalrecord->user->name}}</td>
                    <td class=""></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {{$medicalrecords->links()}}
        </div>
    </div>
</div>
@endsection