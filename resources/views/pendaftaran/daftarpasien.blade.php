@extends ('../layouts/rekammedik')


@section('title', 'pendaftaran')


@section('navigation')
@include ('pendaftaran/navigation')
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
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Kepala Keluarga</th>
                    <th scope="col">Alamat</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($patients as $patient)
                    <tr>
                    <th scope="row">{{$patient->id}}</th>
                    <td>{{$patient->member->head->norm}}</td>
                    <td><a href="/pendaftaran/anggotakeluarga/{{$patient->member_id}}" class="text-decoration-none text-dark font-weight-bold">
                    {{$patient->member->nama}}
                    </a></td> 
                    <td>{{$patient->member->jeniskelamin}}</td>
                    <td>Tn. {{$patient->member->head->kepalakeluarga}}</td>
                    <td>{{$patient->member->head->village->desa}}</td>
                    <td>
@if ($patient->selesai === null)
<!-- ----hapus----- -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModal{{$patient->id}}">
            hapus
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$patient->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/pendaftaran/pasien/{{$patient->id}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Nomor Rekam Medik : {{$patient -> member -> head -> norm}} <br>
                    Nama : {{$patient -> member -> nama}} <br>
                    Jenis Kelamin : {{$patient -> member -> jeniskelamin}} <br>
                    Kepala Keluarga : Tn. {{$patient -> member -> head -> kepalakeluarga}} <br>
                    Desa : {{$patient -> member -> head -> Village -> desa}} <br>
                    </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
<!-- ----akhir hapus----- -->
@endif                 
                    
                    
                    
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
<hr>
        </div>
    </div>


    <div class="row">
    <div class="col-lg-12">
    <!-- ----hapus----- -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModalAll">
            hapus
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Daftar Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/pendaftaran/pasien" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Yakin Hapus Seluruh Daftar Pasien?
                    </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        <!-- ----akhir hapus----- -->
    </div>
    </div>

</div>
@endsection