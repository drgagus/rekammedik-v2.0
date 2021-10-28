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

<h3><a href="/admin/apotek" class="text-decoration-none text-dark">Kunjungan Apotek</a></h3>
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
                    <th scope="col">Obat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Apoteker</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicinerecords as $medicinerecord)
                    <tr>
                    <td class=""></td>
                    <td class="">{{date('d-m-Y', strtotime($medicinerecord->medicalrecord->tanggalkunjungan))}}</td>
                    <td class="">{{$medicinerecord->medicalrecord->member->head->norm}}</td>
                    <td class="">{{$medicinerecord->medicalrecord->member->nama}}</td>
                    <td class="">{{$medicinerecord->medicalrecord->umurtahun}} Tahun</td>
                    <td class="">{{$medicinerecord->medicine->obat}}</td>
                    <td class="">{{$medicinerecord->jumlah}}</td>
                    <td class="">{{$medicinerecord->user->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {{$medicinerecords->links()}}
        </div>
    </div>
</div>
@endsection