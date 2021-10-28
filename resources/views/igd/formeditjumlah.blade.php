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

<form action="/igd/obat/{{$obat->id}}/edit" method="post">
<div class="row mt-2">
            @csrf
            @method('patch')
    <div class="col-lg-3">
        <div class="form-group">
            <input type="text" class="form-control" id="obat" name="obat" value="{{ old('obat') ?? $obat->obat}}" readonly>
            @error('obat')<label class="text text-danger">Nama obat belum diisi</label>@enderror
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <input type="text" class="form-control" id="jumlah" name="igdjumlah" value="{{old('jumlah') ?? $obat->igdjumlah}}">
            @error('igdjumlah')<label class="text text-danger">Jumlah obat belum diisi atau tidak valid</label>@enderror
        </div>
    </div>

    <div class="col-lg-1 text-right">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">EDIT</button>
        </div>
    </div>
</div>
</form>

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