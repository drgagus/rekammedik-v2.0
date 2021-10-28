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

<h3>Daftar Obat</h3>
    <div class="row">
        <div class="col-lg-6">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($medicines as $medicine)
                    <tr>
                    <th scope="row">#</th>
                    <td><a href="/igd/obat/{{$medicine->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$medicine->obat}}</a></td>
                    <td>{{$medicine->igdjumlah}}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                {{$medicines->links()}}
        </div>
    </div>
</div>
@endsection