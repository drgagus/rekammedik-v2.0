<form action="/apotek/obat" method="post">
<div class="row mt-2">
            @csrf
    <div class="col-lg-3">
        <div class="form-group">
            <input type="text" class="form-control" id="obat" name="obat" value="{{ old('obat')}}" Placeholder="Nama Obat Baru">
            @error('obat')<label class="text text-danger">Nama obat belum diisi</label>@enderror
        </div>
    </div>
    <div class="col-lg-1">
        <div class="form-group">
            <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah')}}" Placeholder="Jumlah Obat">
            @error('jumlah')<label class="text text-danger">Jumlah obat belum diisi atau tidak valid</label>@enderror
        </div>
    </div>
    <div class="col-lg-1">
        <div class="form-group">
        <input id="igdobat" type="checkbox" name="igdobat" value="1"> <label for="igdobat" class="">IGD</label>
        </div>
    </div>
    <div class="col-lg-1">
        <div class="form-group">
        <input id="pustuobat" type="checkbox" name="pustuobat"  value="1"> <label for="pustuobat" class="">Pustu</label>
        </div>
    </div>

    <div class="col-lg-1 text-right">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">INPUT</button>
        </div>
    </div>
</div>
</form>