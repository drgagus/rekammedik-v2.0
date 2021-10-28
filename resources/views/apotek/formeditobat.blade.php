@extends ('../layouts/rekammedik')


@section('title', 'Apotek')


@section('navigation')
@include ('apotek/navigation')
@endsection



@section('content')
<div class="container">

<form action="/apotek/obat/{{$obat->id}}/edit" method="post">
<div class="row mt-2">
            @csrf
            @method('patch')
    <div class="col-lg-3">
        <div class="form-group">
            <input type="text" class="form-control" id="obat" name="obat" value="{{ old('obat') ?? $obat->obat}}" >
            @error('obat')<label class="text text-danger">Nama obat belum diisi</label>@enderror
        </div>
    </div>
    <div class="col-lg-1">
        <div class="form-group">
            <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{$obat->jumlah}}">
            @error('jumlah')<label class="text text-danger">Jumlah obat belum diisi atau tidak valid</label>@enderror
        </div>
    </div>
    <div class="col-lg-1">
        <div class="form-group">
        <input id="igdobat" type="checkbox" name="igdobat" {{$obat->igdobat === 1  ? 'checked':'' }} value="1"> <label for="igdobat" class="">IGD</label>
        </div>
    </div>
    <div class="col-lg-1">
        <div class="form-group">
        <input id="pustuobat" type="checkbox" name="pustuobat" {{$obat->pustuobat === 1  ? 'checked':'' }} value="1"> <label for="pustuobat" class="">Pustu</label>
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
                    <th scope="col">#</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col" style="background:salmon">IGD</th>
                    <th scope="col" style="background:salmon">Jumlah</th>
                    <th scope="col" style="background:lightblue">Pustu</th>
                    <th scope="col" style="background:lightblue">Jumlah</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($medicines as $medicine)
                    <tr>
                    <th scope="row">#</th>
                    <td><a href="/apotek/obat/{{$medicine->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$medicine->obat}}</a></td>
                    <td>{{$medicine->jumlah}}</td>
                    <td class="" style="background:salmon">
                    @if($medicine->igdobat == 1)
                    <input type="checkbox" checked>
                    @else
                    <input type="checkbox">
                    @endif
                    </td>
                    <td class="" style="background:salmon">{{$medicine->igdjumlah}}</td>
                    <td class="" style="background:lightblue">
                    @if($medicine->pustuobat == 1)
                    <input type="checkbox" checked>
                    @else
                    <input type="checkbox">
                    @endif
                    </td>
                    <td class="" style="background:lightblue">{{$medicine->pustujumlah}}</td>
                    <td>
<!-- ----hapus----- -->
        <!-- Button trigger modal -->
@if (count($medicine->medicinerecord))
@else
        <button type="button" class="badge badge-danger mr-1" data-toggle="modal" data-target="#exampleModal{{$medicine->id}}">
            hapus
            </button>
@endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$medicine->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/apotek/obat/{{$medicine->id}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Nama Obat: {{$medicine -> obat}} <br>
                    Jumlah : {{$medicine -> jumlah}} <br>
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
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                {{$medicines->links()}}
        </div>
    </div>
</div>
@endsection