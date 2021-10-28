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

<form action="/admin/diagnosa/{{$diagnosa->id}}/edit" method="post">
<div class="row mt-2">
            @csrf
            @method('patch')
    <div class="col-lg-2">
        <div class="form-group">
                <select class="form-control @error('room_id') is-invalid @enderror" id="room_id" name="room_id">
                    @foreach ($rooms as $room)
                    <option {{ old('room_id') ?? $diagnosa->room_id == $room -> id ? 'selected':'' }} value={{$room->id}} >{{$room->room}}</option>
                    @endforeach
                </select>
        </div>
    </div>
    <div class="col-lg-1">
        <div class="form-group">
            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode') ?? $diagnosa->kode}}" >
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <input type="text" class="form-control @error('diagnosa') is-invalid @enderror" id="diagnosa" name="diagnosa" value="{{ old('diagnosa') ?? $diagnosa->diagnosa}}" >
        </div>
    </div>

    <div class="col-lg-1 text-right">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">EDIT</button>
        </div>
    </div>
</div>
</form>

<h3><a href="/admin/diagnosa" class="text-decoration-none text-dark">Daftar Diagnosa</a></h3>
    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Poli</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Diagnosa</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diags as $diag)
                    <tr>
                    <td class="">#</td>
                    <td class="">{{$diag->room->room}}</td>
                    <td class="">{{$diag->kode}}</td>
                    <td class=""><a href="/admin/diagnosa/{{$diag->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$diag->diagnosa}}</a></td>
                    <td class="">
<!-- ----hapus----- -->
        <!-- Button trigger modal -->
@if (count($diag->medicalrecord))
@else
        <button type="button" class="badge badge-danger mr-1" data-toggle="modal" data-target="#exampleModal{{$diag->id}}">
            hapus
            </button>
@endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$diag->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Diagnosa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/diagnosa/{{$diag->id}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Kode: {{$diag -> kode}} <br>
                    Diagnosa : {{$diag -> diagnosa}} <br>
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
                {{$diags->links()}}
        </div>
    </div>
</div>
@endsection