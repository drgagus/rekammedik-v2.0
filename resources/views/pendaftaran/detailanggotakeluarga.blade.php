@extends ('../layouts/rekammedik')


@section('title', 'pendaftaran')


@section('navigation')
@include ('pendaftaran/navigation')
@endsection



@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">

    <div class="card border-dark mb-3">
      <div class="card-header">Nomor Rekam Medik : {{ $kepalakeluarga -> norm }}</div>
      <div class="card-body text-dark">
        <h5 class="card-title"><a href="/pendaftaran/kepalakeluarga/{{$kepalakeluarga->id}}" class="text-decoration-none">Tn. {{ $kepalakeluarga -> kepalakeluarga }}</a></h5>
        <p class="card-text">Nomor Kartu Keluarga {{ $kepalakeluarga -> kartukeluarga }}</p>
        <p class="card-text">{{ $kepalakeluarga -> alamat .' RT/RW '.$kepalakeluarga -> rt.'/'.$kepalakeluarga -> rw.' '.$kepalakeluarga -> village->desa}}</p>
      </div>
    </div>

        </div>
    <div>
</div>


<div class="container">

    <div class="row mb-3">
        <div class="col-lg-6 d-flex">
        <!-- ----hapus----- -->
        <!-- Button trigger modal -->
@if (count($medicalrecords))
@else
            <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModal">
            hapus
            </button>
@endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Anggota Keluarga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/pendaftaran/anggotakeluarga/{{$anggotakeluarga->id}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Nama : {{$anggotakeluarga -> nama}} <br>
                    Jenis Kelamin : {{$anggotakeluarga -> jeniskelamin}} <br>
                    Kepala Keluarga : Tn. {{$anggotakeluarga -> head -> kepalakeluarga}} <br>
                    Desa : {{$anggotakeluarga -> head -> Village -> desa}} <br>
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

        <a href="/pendaftaran/anggotakeluarga/{{$anggotakeluarga->id}}/edit" class="btn btn-sm btn-warning mr-1">edit</a>
        <form action="/pendaftaran/pasien" method="post">
        @csrf
        <input type="hidden" value="{{$anggotakeluarga->id}}" name="member_id">
        <button type="submit" class="btn btn-sm btn-success">berobat</button>
        </form>
        </div>
    </div>
        @error('member_id')<div class="text text-danger">Pasien sudah ada dalam daftar pasien hari ini</div>@enderror

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
        <div class="col-lg-6">
                <table class="table table-hover">
                    <tr>
                    <th scope="col">Nama</th>
                    <td scope="col">{{$anggotakeluarga -> nama}}</td>
                    </tr>
                    <tr>
                    <th scope="col">NIK</th>
                    <td scope="col">{{$anggotakeluarga -> nik}}</td>
                    </tr>
                    <tr>
                    <th scope="col">Jenis Kelamin</th>
                    <td scope="col">{{$anggotakeluarga -> jeniskelamin}}</td>
                    </tr>
                    <tr>
                    <th scope="col">Tempat, Tanggal Lahir</th>
                    <td scope="col">{{$anggotakeluarga -> tempatlahir.", ".$anggotakeluarga->tanggallahir}}</td>
                    </tr>
                    <tr>
                    <th scope="col">Agama</th>
                    <td scope="col">{{$anggotakeluarga -> agama}}</td>
                    </tr>
                    <tr class="border-bottom">
                    <th scope="col">Pendidikan</th>
                    <td scope="col">{{$anggotakeluarga -> pendidikan}}</td>
                    </tr>
                    <tr class="border-bottom">
                    <th scope="col">Pekerjaan</th>
                    <td scope="col">{{$anggotakeluarga -> pekerjaan}}</td>
                    </tr>
                </table>
        </div>
        <div class="col-lg-6">
                <table class="table table-hover">
                    <tr>
                    <th scope="col">Golongan Darah</th>
                    <td scope="col">{{$anggotakeluarga -> golongandarah}}</td>
                    </tr>
                    <tr>
                    <th scope="col">Status Perkawinan</th>
                    <td scope="col">{{$anggotakeluarga -> perkawinan}}</td>
                    </tr>
                    <tr>
                    <th scope="col">Status Hubungan Dalam Keluarga</th>
                    <td scope="col">@if (($anggotakeluarga -> hubungankeluarga) == 'A') Kepala Keluarga
                                    @elseif (($anggotakeluarga -> hubungankeluarga) == 'B') Istri
                                    @elseif (($anggotakeluarga -> hubungankeluarga) == 'C') Anak Kandung
                                    @else Lainnya
                                    @endif </td>
                    </tr>
                    <tr>
                    <th scope="col">Jaminan Kesehatan</th>
                    <td scope="col">{{$anggotakeluarga -> jaminankesehatan}}</td>
                    </tr>
                    <tr class="border-bottom">
                    <th scope="col">Nomor Jaminan Kesehatan</th>
                    <td scope="col">{{$anggotakeluarga -> nomorjaminankesehatan}}</td>
                    </tr>
                    <tr class="border-bottom">
                    <th scope="col">Nomor Handphone</th>
                    <td scope="col">{{$anggotakeluarga -> phonenumber}}</td>
                    </tr>
                </table>
        </div>
        
    </div>
</div>
@endsection