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

<form action="/admin/desa" method="post">
<div class="row mt-2">
            @csrf
    <div class="col-lg-1">
        <div class="form-group">
            <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ old('id')}}" Placeholder="Nomor">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <input type="text" class="form-control @error('desa') is-invalid @enderror" id="desa" name="desa" value="{{ old('desa')}}" Placeholder="Nama Desa Baru">
        </div>
    </div>

    <div class="col-lg-1 text-right">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">INPUT</button>
        </div>
    </div>
</div>
</form>

<h3><a href="/admin/desa" class="text-decoration-none text-dark">Daftar Desa/Kelurahan</a></h3>
    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Poli</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($villages as $village)
                    <tr>
                    <td class="">{{$village->id}}</td>
                    <td class=""><a href="/admin/desa/{{$village->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$village->desa}}</a></td>
                    <td class="">
<!-- ----hapus----- -->
        <!-- Button trigger modal -->
@if (count($village->head))
@else
        <button type="button" class="badge badge-danger mr-1" data-toggle="modal" data-target="#exampleModal{{$village->id}}">
            hapus
            </button>
@endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$village->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Desa/Kelurahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/desa/{{$village->id}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Nama Desa/Kelurahan : {{$village -> desa}}
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
        </div>
    </div>
</div>
@endsection