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

<form action="/igd" class="" method="post">
@csrf
    <div class="row">
        <div class="col-lg-6">
            <label for="cari">Cari Pasien</label>
            <div class="input-group mb-3">
            <input type="text" id="cari" class="form-control" placeholder="Ketik nama pasien" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
            </div>
        </div>
    </div>
</form>

@if (count($members))
    <div class="row">
        <div class="col-lg-6">
                <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nomor<br>Rekam Medik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($members as $member)
                    <tr class="text-center">
                    <th scope="row">#</th>
                    <td scope="row">{{$member->head->norm}}</td>
                    <td scope="row"><a href="/igd/pasien/create/{{$member->id}}" class="text-decoration-none text-dark font-weight-bold">{{$member->nama}}</a></td>
                    <td scope="row">{{$member->head->village->desa}}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>
    </div>
@endif

</div>
@endsection