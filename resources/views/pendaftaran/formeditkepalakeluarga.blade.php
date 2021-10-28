@extends ('../layouts/rekammedik')


@section('title', 'pendaftaran')


@section('navigation')
@include ('pendaftaran/navigation')
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <form action="/pendaftaran/kepalakeluarga/{{$kepalakeluarga->id}}/edit" method="post">
            @csrf
            @method('patch')
        <div class="card border-dark mb-3">
      <div class="card-header"><label for="norm" class="font-weight-bold">Nomor Rekam Medik</label><input type="text" class="form-control"  id="norm" name="norm" value="{{ old('norm') ?? $kepalakeluarga->norm}}" >
                @error('norm')
                  <div class="text text-danger">nomor rekam medik harus diisi dan terdiri angka</div>
                @enderror
      </div>
      <div class="card-body text-dark">
        <p class="card-title"><label for="kepalakeluarga" class="font-weight-bold">Kepala Keluarga</label><input type="text" class="form-control" id="kepalakeluarga" name="kepalakeluarga" value="{{ old('kepalakeluarga') ?? $kepalakeluarga->kepalakeluarga}}">@error('kepalakeluarga')<label class="text text-danger">nama kepala keluarga harus diisi</label>@enderror</p>
        <p class="card-text"><label for="kartukeluarga" class="font-weight-bold">Nomor Kartu Keluarga</label><input type="text" class="form-control" id="kartukeluarga" name="kartukeluarga" value="{{ old('kartukeluarga') ?? $kepalakeluarga->kartukeluarga}}">@error('kartukeluarga')<label class="text text-danger">nomor kartu keluarga harus diisi dan terdiri angka 16 digit</label>@enderror
        </p>
        <p class="card-text"><label for="alamat" class="font-weight-bold">Alamat</label>
        <div class="row">
        <div class="col-lg-5 mb-3">
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') ?? $kepalakeluarga->alamat}}">
            @error('alamat')<label class="text text-danger">alamat harus diisi</label>@enderror
            </div>
            <div class="col-lg-2 mb-3">
                  <select class="form-control" id="rt" name="rt">
                      <option {{ $kepalakeluarga -> rt === '001' ? 'selected':'' }}  value="001" >001</option>
                      <option {{ $kepalakeluarga -> rt === '002' ? 'selected':'' }} value="002">002</option>
                      <option {{ $kepalakeluarga -> rt === '003' ? 'selected':'' }} value="003">003</option>
                    </select>
                    @error('rt')<label class="text text-danger">RT belum dipilih</label>@enderror
            </div>
            <div class="col-lg-2 mb-3">
                    <select class="form-control" id="rw" name="rw">
                    <option {{ $kepalakeluarga -> rw === '001' ? 'selected':'' }}  value="001" >001</option>
                    <option {{ $kepalakeluarga -> rw === '002' ? 'selected':'' }} value="002">002</option>
                    <option {{ $kepalakeluarga -> rw === '003' ? 'selected':'' }} value="003">003</option>
                    </select>
                    @error('rw')<label class="text text-danger">RW belum dipilih</label>@enderror
            </div>
            <div class="col-lg-3">
                      <select class="form-control" id="desa" name="village_id">
                        @foreach ($villages as $village)
                        <option {{ $kepalakeluarga -> village_id === $village -> id ? 'selected':'' }} value="{{ $village -> id }}">{{ $village -> desa }}</option>
                        @endforeach
                      </select>
                      @error('village_id')<label class="text text-danger">Desa/Kelurahan belum dipilih</label>@enderror
            </div>
        </div>
        </p>
        
      </div>
      <div class="card-footer bg-transparent border-success text-right">
      <button type="submit" class="btn btn-primary">EDIT</button>
      </div>
    </div>
    </form>
       
        </div>
    </div>
</div>

@endsection