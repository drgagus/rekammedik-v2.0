@extends ('../layouts/rekammedik')


@section('title', 'pendaftaran')


@section('navigation')
@include ('pendaftaran/navigation')
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nomor Rekam Medik</th>
                    <th scope="col">Nama Kepala Keluarga</th>
                    <th scope="col">Desa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($heads as $head)
                    <tr>
                    <th scope="row">#</th>
                    <td>{{ $head -> norm }}</td>
                    <td><a href="/pendaftaran/kepalakeluarga/{{$head->id}}" class="text-decoration-none font-weight-bold">Tn. {{ $head -> kepalakeluarga }}</a></td>
                    <td>{{$head -> village -> desa}}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                {{$heads->links()}}
        </div>
    </div>
</div>
@endsection