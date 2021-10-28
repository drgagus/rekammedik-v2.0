@extends ('../layouts/rekammedik')


@section('title', 'Laboratorium')


@section('navigation')
@include ('laboratorium/navigation')
@endsection



@section('content')
<div class="container">

<form action="/laboratorium/pemeriksaan" method="post">
<div class="row mt-2">
            @csrf
    <div class="col-lg-3">
        <div class="form-group">
                <select class="form-control" id="typeoflab_id" name="typeoflab_id">
                    <option  value="" >--pilih tipe pemeriksaan--</option>
                    @foreach ($typeoflabs as $typeoflab)
                    <option  {{ old('typeoflab_id') == $typeoflab -> id ? 'selected':'' }} value={{$typeoflab->id}} >{{$typeoflab->tipe}}</option>
                    @endforeach
                </select>
              @error('typeoflab_id')<label class="text text-danger">Tipe pemeriksaan belum dipilih</label>@enderror
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <input type="text" class="form-control" id="pemeriksaan" name="pemeriksaan" value="{{old('pemeriksaan')}}" Placeholder="Nama pemeriksaan">
            @error('pemeriksaan')<label class="text text-danger">Nama pemeriksaan belum diisi</label>@enderror
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
        <input type="text" class="form-control" id="satuan" name="satuan" value="{{old('satuan')}}" Placeholder="Satuan pemeriksaan">
            @error('satuan')<label class="text text-danger">Satuan pemeriksaan belum diisi atau tidak valid</label>@enderror
        </div>
    </div>
    <div class="col-lg-1">
        <div class="form-group">
        <input id="active" type="checkbox" name="active" {{old('active') == 1  ? 'checked':'' }} value="1" > <label for="active" class="">Aktif</label>
        </div>
    </div>

    <div class="col-lg-1 text-right">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">INPUT</button>
        </div>
    </div>
</div>
</form>

<div class="row">
    <div class="col-lg-6">
            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
    </div>
</div>

<h3>Daftar Pemeriksaan</h3>
    <div class="row">
        <div class="col-lg-12">
                <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">Tipe Pemeriksaan</th>
                    <th scope="col">Nama Pemeriksaan</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Aktif</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($typeoflabs as $typeoflab)
                <tr>
                    <th scope="col" class="bg-dark text-white">{{$typeoflab->tipe}}</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                @foreach ($typeoflab->lab as $lab)
                    <tr>
                    <th scope="row"></th>
                    <td><a href="/laboratorium/pemeriksaan/{{$lab->id}}/edit" class="text-decoration-none text-dark font-weight-bold">{{$lab->pemeriksaan}}</a></td>
                    <td>{{$lab->satuan}}</td>
                    <td class="">
                    @if($lab->active == 1)
                    <label class="text-primary">aktif</label>
                    @else
                    <label class="text-danger">tidak aktif</label>
                    @endif
                    </td>
                    <td>
<!-- ----hapus----- -->
        <!-- Button trigger modal -->
@if (count($lab->labrecord))
@else
        <button type="button" class="badge badge-danger mr-1" data-toggle="modal" data-target="#exampleModal{{$lab->id}}">
            hapus
            </button>
@endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$lab->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pemeriksaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/laboratorium/pemeriksaan/{{$lab->id}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    <table class="">
                    <tr class="">
                    <td class="">Tipe pemeriksaan</td>
                    <td class="">:</td>
                    <td class="">{{$lab -> typeoflab -> tipe}}</td>
                    </tr>
                    <tr class="">
                    <td class="">Nama Pemeriksaan</td>
                    <td class="">:</td>
                    <td class="">{{$lab -> pemeriksaan}}</td>
                    </tr>
                    <tr class="">
                    <td class="">Satuan</td>
                    <td class="">:</td>
                    <td class="">{{$lab -> satuan}}</td>
                    </tr>
                    </table>
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
                @endforeach
                </tbody>
                </table>
                
        </div>
    </div>
</div>
@endsection