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
      <div class="card-header d-flex justify-content-between">
      <div class="col-6 text-left p-0">Nomor Rekam Medik : {{ $kepalakeluarga -> norm }}</div>
      <div class="col-6 text-right p-0">
      <a href="/pendaftaran/kepalakeluarga/{{$kepalakeluarga->id}}/edit" class="btn btn-sm btn-warning">edit</a>
      <a href="/pendaftaran/anggotakeluarga/create/{{$kepalakeluarga->id}}" class="btn btn-sm btn-primary">+anggota keluarga</a>
      </div>
      </div>

      <div class="card-body text-dark">
        <h5 class="card-title">Tn. {{ $kepalakeluarga -> kepalakeluarga }}</h5>
        <p class="card-text">Nomor Kartu Keluarga {{ $kepalakeluarga -> kartukeluarga }}</p>
        <p class="card-text">{{ $kepalakeluarga -> alamat .' RT/RW '.$kepalakeluarga -> rt.'/'.$kepalakeluarga -> rw.' '.$kepalakeluarga -> village->desa}}</p>
      </div>
    </div>

        </div>
    <div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <h4>Anggota Keluarga</h4>
            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Status Hubungan Dalam Keluarga</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($members as $member)
                    <tr>
                    <th scope="row">#</th>
                    <td><a href="/pendaftaran/anggotakeluarga/{{$member->id}}" class="text-decoration-none">{{ $member -> nama }}</a></td>
                    <td>{{ $member -> jeniskelamin }}</td>
                    <td>@if (($member -> hubungankeluarga) == 'A') Kepala Keluarga
                                    @elseif (($member -> hubungankeluarga) == 'B') Istri
                                    @elseif (($member -> hubungankeluarga) == 'C') Anak Kandung
                                    @else Lainnya
                                    @endif</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection