@extends ('../layouts/rekammedik')


@section('title', 'pendaftaran')


@section('navigation')
@include ('pendaftaran/navigation')
@endsection



@section('content')
<div class="container">
<h3>Daftar Pasien</h3>
    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Kepala Keluarga</th>
                    <th scope="col">Desa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($members as $member)
                    <tr>
                    <th scope="row">#</th>
                    <td><a href="/pendaftaran/anggotakeluarga/{{ $member -> id}}" class="text-decoration-none">{{ $member -> nama }}</a></td>
                    <td>{{ $member -> jeniskelamin }}</td>
                    <td><a href="/pendaftaran/kepalakeluarga/{{$member->head->id}}" class="text-decoration-none">Tn. {{ $member -> head -> kepalakeluarga }}</a></td>
                    <td>{{$member -> head -> village -> desa}}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
@endsection