@extends ('../layouts/rekammedik')


@section('title', 'CEO')


@section('navigation')
@include ('CEO/navigation')
@endsection



@section('content')
<div class="container">
<h3>DELETE ALL</h3>
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
                    <tr>
                    <th scope="col">Data User</th>
                    <th scope="col"></th>
                    </tr>
                    <tr>
                    <th scope="col">Data Kepala Keluarga</th>
                    <th scope="col">
<!-- ----hapus Data Kepala Keluarga----- -->
        <!-- Button trigger modal -->
@if (count($members))
        <button type="button" class="btn btn-sm btn-outline-danger mr-1">
            hapus
            </button>
@else
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModalAllheads">
            hapus
            </button>
@endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModalAllheads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Semua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/CEO/heads" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Yakin Hapus Seluruh Data Kepala Keluarga?
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
<!-- ----akhir hapus Data Kepala Keluarga----- -->  
                    </th>
                    </tr>
                    <tr>
                    <th scope="col">Data Pasien</th>
                    <th scope="col">
<!-- ----hapus Data Pasien----- -->
        <!-- Button trigger modal -->
@if (count($medicalrecords))
        <button type="button" class="btn btn-sm btn-outline-danger mr-1">
            hapus
            </button>
@else
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModalAllmembers">
            hapus
            </button>
@endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModalAllmembers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Semua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/CEO/members" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Yakin Hapus Seluruh Data Pasien?
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
<!-- ----akhir hapus Data Pasien----- -->  
                    </th>
                    </tr>
                    <tr>
                    <th scope="col">Data Diagnosa</th>
                    <th scope="col">
<!-- ----hapus Data Diagnosa----- -->
        <!-- Button trigger modal -->
@if (count($medicalrecords))
        <button type="button" class="btn btn-sm btn-outline-danger mr-1">
            hapus
            </button>
@else
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModalAlldiags">
            hapus
            </button>
@endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModalAlldiags" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Semua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/CEO/diags" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Yakin Hapus Seluruh Data Diagnosa?
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
<!-- ----akhir hapus Data Diagnosa----- -->  
                    </th>
                    </tr>
                    <tr>
                    <th scope="col">Kunjungan Pasien</th>
                    <th scope="col">
<!-- ----hapus Kunjungan Pasien----- -->
        <!-- Button trigger modal -->
@if (count($medicinerecords))
        <button type="button" class="btn btn-sm btn-outline-danger mr-1">
            hapus
            </button>
@else
    @if (count($labrecords))
        <button type="button" class="btn btn-sm btn-outline-danger mr-1">
            hapus
            </button>
    @else
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModalAllmedicalrecords">
            hapus
            </button>
    @endif
@endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModalAllmedicalrecords" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Semua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/CEO/medicalrecords" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Yakin Hapus Seluruh Kunjungan Pasien?
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
<!-- ----akhir hapus Kunjungan Pasien----- -->  
                    </th>
                    </tr>
                    <tr>
                    <th scope="col">Pemeriksaan Laboratorium</th>
                    <th scope="col">
<!-- ----hapus Pemeriksaan Laboratorium----- -->
        <!-- Button trigger modal -->
@if (count($labrecords))
        <button type="button" class="btn btn-sm btn-outline-danger mr-1" >
            hapus
            </button>
@else
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModalAlllabs">
            hapus
            </button>
@endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModalAlllabs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Semua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/CEO/labs" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Yakin Hapus Seluruh Pemeriksaan Laboratorium?
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
<!-- ----akhir hapus Pemeriksaan Laboratorium----- -->  
                    </th>
                    </tr>
                    <tr>
                    <th scope="col">Kunjungan Laboratorium</th>
                    <th scope="col">
<!-- ----hapus Kunjungan Laboratorium----- -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModalAlllabrecords">
            hapus
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalAlllabrecords" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Semua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/CEO/labrecords" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Yakin Hapus Seluruh Kunjungan Laboratorium?
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
<!-- ----akhir hapus Kunjungan Laboratorium----- -->  
                    </th>
                    </tr>
                    <tr>
                    <th scope="col">Data Obat</th>
                    <th scope="col">
<!-- ----hapus data obat----- -->
        <!-- Button trigger modal -->
@if (count($medicinerecords))
        <button type="button" class="btn btn-sm btn-outline-danger mr-1">
            hapus
            </button>
@else
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModalAllmedicines">
            hapus
            </button>
@endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModalAllmedicines" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Semua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/CEO/medicines" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Yakin Hapus Seluruh Data Obat?
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
<!-- ----akhir hapus data obat----- -->   
                    </th>
                    </tr>
                    <tr>
                    <th scope="col">Kunjungan Apotek</th>
                    <th scope="col">
<!-- ----hapus kunjungan apotek----- -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModalAllmedicinerecords">
            hapus
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalAllmedicinerecords" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Semua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/CEO/medicinerecords" method="post">
                    @csrf
                    @method('delete')
                    <div class="row">
                    <div class="col-lg-12">
                    Yakin Hapus Seluruh Kunjungan Apotek?
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
<!-- ----akhir hapus kunjungan apotek----- -->                   
                    </th>
                    </tr>
                </table>
        </div>
    </div>
</div>
@endsection