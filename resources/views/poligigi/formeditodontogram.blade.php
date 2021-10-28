@extends ('../layouts/rekammedik')


@section('title', 'Poli Gigi')


@section('navigation')
@include ('poligigi/navigation')
@endsection



@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

        <form action="/poligigi/odontogram/{{$pasien->id}}/edit" method="post">
            @csrf
            @method('patch')
            

        <div class="card border-primary mb-3">
      <div class="card-header">
<div class="row">
<div class="col-lg-6">
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Nama
    <span class="btn btn-outline-dark">{{$pasien->nama}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Umur
    <span class="btn btn-outline-dark">{{$pasien->patient->umur}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Jenis Kelamin
    <span class="btn btn-outline-dark">{{$pasien->jeniskelamin}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Jaminan Kesehatan
    <span class="btn btn-outline-dark">{{$pasien->jaminankesehatan}}</span>
  </li>
</ul>
</div>
<div class="col-lg-6">
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Nomor Rekam Medik
    <span class="btn btn-outline-dark">{{$pasien->head->norm}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Kepala Keluarga
    <span class="btn btn-outline-dark">Tn. {{$pasien->head->kepalakeluarga}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Alamat
    <span class="btn btn-outline-dark">{{$pasien->head->village->desa}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Tanggal
    <span class="btn btn-dark">{{date('d M Y', strtotime($odontogram->tanggalkunjungan))}}</span>
  </li>
</ul>
</div>
</div>

      </div>
      <div class="card-body text-dark">

        <div class="row ">
        <div class="col-lg-12 ">
        <h5 class="text-center font-weight-bold">ODONTOGRAM</h5>
        </div>
        </div>

        <div class="row mt-3">
        <div class="col-12">
        <table class="table-responsive">
        <tr class="border-none"><td></td>
            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi18" id="gigi18ada"  {{ old('gigi18') ?? $odontogram->gigi18 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi18ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi18" id="gigi18tidakada" {{ old('gigi18')  ?? $odontogram->gigi18 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label  " for="gigi18tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi17" id="gigi17ada" {{ old('gigi17') ?? $odontogram->gigi17 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi17ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi17" id="gigi17tidakada" {{ old('gigi17')  ?? $odontogram->gigi17 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi17tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi16" id="gigi16ada" {{ old('gigi16') ?? $odontogram->gigi16 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi16ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi16" id="gigi16tidakada" {{ old('gigi16')  ?? $odontogram->gigi16 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi16tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi15" id="gigi15ada" {{ old('gigi15') ?? $odontogram->gigi15 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi15ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi15" id="gigi15tidakada" {{ old('gigi15')  ?? $odontogram->gigi15 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi15tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi14" id="gigi14ada" {{ old('gigi14') ?? $odontogram->gigi14 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi14ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi14" id="gigi14tidakada" {{ old('gigi14')  ?? $odontogram->gigi14 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi14tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi13" id="gigi13ada" {{ old('gigi13') ?? $odontogram->gigi13 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi13ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi13" id="gigi13tidakada" {{ old('gigi13')  ?? $odontogram->gigi13 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi13tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi12" id="gigi12ada" {{ old('gigi12') ?? $odontogram->gigi12 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi12ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi12" id="gigi12tidakada" {{ old('gigi12')  ?? $odontogram->gigi12 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi12tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi11" id="gigi11ada" {{ old('gigi11') ?? $odontogram->gigi11 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi11ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi11" id="gigi11tidakada" {{ old('gigi11')  ?? $odontogram->gigi11 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi11tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi21" id="gigi21ada" {{ old('gigi21') ?? $odontogram->gigi21 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi21ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi21" id="gigi21tidakada" {{ old('gigi21')  ?? $odontogram->gigi21 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi21tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi22" id="gigi22ada" {{ old('gigi22') ?? $odontogram->gigi22 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi22ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi22" id="gigi22tidakada" {{ old('gigi22')  ?? $odontogram->gigi22 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi22tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi23" id="gigi23ada" {{ old('gigi23') ?? $odontogram->gigi23 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi23ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi23" id="gigi23tidakada" {{ old('gigi23')  ?? $odontogram->gigi23 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi23tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi24" id="gigi24ada" {{ old('gigi24') ?? $odontogram->gigi24 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi24ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi24" id="gigi24tidakada" {{ old('gigi24')  ?? $odontogram->gigi24 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi24tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi25" id="gigi25ada" {{ old('gigi25') ?? $odontogram->gigi25 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi25ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi25" id="gigi25tidakada" {{ old('gigi25')  ?? $odontogram->gigi25 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi25tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi26" id="gigi26ada" {{ old('gigi26') ?? $odontogram->gigi26 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi26ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi26" id="gigi26tidakada" {{ old('gigi26')  ?? $odontogram->gigi26 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi26tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi27" id="gigi27ada" {{ old('gigi27') ?? $odontogram->gigi27 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi27ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi27" id="gigi27tidakada" {{ old('gigi27')  ?? $odontogram->gigi27 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi27tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi28" id="gigi28ada" {{ old('gigi28') ?? $odontogram->gigi28 === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi28ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi28" id="gigi28tidakada" {{ old('gigi28')  ?? $odontogram->gigi28 === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi28tidakada">Tidak Ada</label></div></td>            
    </tr>
        <tr class="text-center font-weight-bold text-monospace">
        <td>Maxila</td><td class="border-bottom border-dark @error('gigi18') text-danger font-weight-bold @enderror">18</td><td class="border-bottom border-dark @error('gigi17') text-danger font-weight-bold @enderror">17</td><td class="border-bottom border-dark @error('gigi16') text-danger font-weight-bold @enderror">16</td><td class="border-bottom border-dark @error('gigi15') text-danger font-weight-bold @enderror">15</td><td class="border-bottom border-dark @error('gigi14') text-danger font-weight-bold @enderror">14</td><td class="border-bottom border-dark @error('gigi13') text-danger font-weight-bold @enderror">13</td><td class="border-bottom border-dark @error('gigi12') text-danger font-weight-bold @enderror">12</td><td class="border-bottom border-dark @error('gigi11') text-danger font-weight-bold @enderror border-right">11</td><td class="border-bottom border-dark @error('gigi21') text-danger font-weight-bold @enderror border-left">21</td><td class="border-bottom border-dark @error('gigi22') text-danger font-weight-bold @enderror">22</td><td class="border-bottom border-dark @error('gigi23') text-danger font-weight-bold @enderror">23</td><td class="border-bottom border-dark @error('gigi24') text-danger font-weight-bold @enderror">24</td><td class="border-bottom border-dark @error('gigi25') text-danger font-weight-bold @enderror">25</td><td class="border-bottom border-dark @error('gigi26') text-danger font-weight-bold @enderror">26</td><td class="border-bottom border-dark @error('gigi27') text-danger font-weight-bold @enderror">27</td><td class="border-bottom border-dark @error('gigi28') text-danger font-weight-bold @enderror">28</td>
        </tr>
        <tr class="text-center font-weight-bold text-monospace">
        <td>Mandibula</td><td class="border-top border-dark @error('gigi48') text-danger font-weight-bold @enderror">48</td><td class="border-top border-dark @error('gigi47') text-danger font-weight-bold @enderror">47</td><td class="border-top border-dark @error('gigi46') text-danger font-weight-bold @enderror">46</td><td class="border-top border-dark @error('gigi45') text-danger font-weight-bold @enderror">45</td><td class="border-top border-dark @error('gigi44') text-danger font-weight-bold @enderror">44</td><td class="border-top border-dark @error('gigi43') text-danger font-weight-bold @enderror">43</td><td class="border-top border-dark @error('gigi42') text-danger font-weight-bold @enderror">42</td><td class="border-top border-dark @error('gigi41') text-danger font-weight-bold @enderror border-right">41</td><td class="border-top border-dark @error('gigi31') text-danger font-weight-bold @enderror border-left">31</td><td class="border-top border-dark @error('gigi32') text-danger font-weight-bold @enderror">32</td><td class="border-top border-dark @error('gigi33') text-danger font-weight-bold @enderror">33</td><td class="border-top border-dark @error('gigi34') text-danger font-weight-bold @enderror">34</td><td class="border-top border-dark @error('gigi35') text-danger font-weight-bold @enderror">35</td><td class="border-top border-dark @error('gigi36') text-danger font-weight-bold @enderror">36</td><td class="border-top border-dark @error('gigi37') text-danger font-weight-bold @enderror">37</td><td class="border-top border-dark @error('gigi38') text-danger font-weight-bold @enderror">38</td>
        </tr>
        <tr class="border-none"><td></td>
            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi48" id="gigi48ada" {{ old('gigi48') ?? $odontogram->gigi48  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi48ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi48" id="gigi48tidakada" {{ old('gigi48') ?? $odontogram->gigi48  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi48tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi47" id="gigi47ada" {{ old('gigi47') ?? $odontogram->gigi47  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi47ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi47" id="gigi47tidakada" {{ old('gigi47') ?? $odontogram->gigi47  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi47tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi46" id="gigi46ada" {{ old('gigi46') ?? $odontogram->gigi46  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi46ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi46" id="gigi46tidakada" {{ old('gigi46') ?? $odontogram->gigi46  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi46tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi45" id="gigi45ada" {{ old('gigi45') ?? $odontogram->gigi45  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi45ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi45" id="gigi45tidakada" {{ old('gigi45') ?? $odontogram->gigi45  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi45tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi44" id="gigi44ada" {{ old('gigi44') ?? $odontogram->gigi44  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi44ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi44" id="gigi44tidakada" {{ old('gigi44') ?? $odontogram->gigi44  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi44tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi43" id="gigi43ada" {{ old('gigi43') ?? $odontogram->gigi43  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi43ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi43" id="gigi43tidakada" {{ old('gigi43') ?? $odontogram->gigi43  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi43tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi42" id="gigi42ada" {{ old('gigi42') ?? $odontogram->gigi42  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi42ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi42" id="gigi42tidakada" {{ old('gigi42') ?? $odontogram->gigi42  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi42tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi41" id="gigi41ada" {{ old('gigi41') ?? $odontogram->gigi41  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi41ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi41" id="gigi41tidakada" {{ old('gigi41') ?? $odontogram->gigi41  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi41tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi31" id="gigi31ada" {{ old('gigi31') ?? $odontogram->gigi31  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi31ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi31" id="gigi31tidakada" {{ old('gigi31') ?? $odontogram->gigi31  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi31tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi32" id="gigi32ada" {{ old('gigi32') ?? $odontogram->gigi32  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi32ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi32" id="gigi32tidakada" {{ old('gigi32') ?? $odontogram->gigi32  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi32tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi33" id="gigi33ada" {{ old('gigi33') ?? $odontogram->gigi33  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi33ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi33" id="gigi33tidakada" {{ old('gigi33') ?? $odontogram->gigi33  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi33tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi34" id="gigi34ada" {{ old('gigi34') ?? $odontogram->gigi34  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi34ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi34" id="gigi34tidakada" {{ old('gigi34') ?? $odontogram->gigi34  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi34tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi35" id="gigi35ada" {{ old('gigi35') ?? $odontogram->gigi35  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi35ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi35" id="gigi35tidakada" {{ old('gigi35') ?? $odontogram->gigi35  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi35tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi36" id="gigi36ada" {{ old('gigi36') ?? $odontogram->gigi36  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi36ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi36" id="gigi36tidakada" {{ old('gigi36') ?? $odontogram->gigi36  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi36tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi37" id="gigi37ada" {{ old('gigi37') ?? $odontogram->gigi37  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi37ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi37" id="gigi37tidakada" {{ old('gigi37') ?? $odontogram->gigi37  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi37tidakada">Tidak Ada</label></div></td>

            <td><div class="form-check pl-5"><input class="form-check-input " type="radio" name="gigi38" id="gigi38ada" {{ old('gigi38') ?? $odontogram->gigi38  === "Ada" ? 'checked':'' }} value="Ada"><label class="form-check-label " for="gigi38ada">Ada</label>
            <br>
            <input class="form-check-input " type="radio" name="gigi38" id="gigi38tidakada" {{ old('gigi38') ?? $odontogram->gigi38  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="form-check-label " for="gigi38tidakada">Tidak Ada</label></div></td>            
    </tr>
        </table>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <table>
            <tr><td class="text-left font-weight-bold text-monospace d-flex">Periodontal @error('periodontal') <div class="text-danger"> (belum dipilih) </div> @enderror</td><td><input class="ml-3" type="radio" name="periodontal" id="Sehat" {{ old('periodontal') ?? $odontogram->periodontal  === "Sehat" ? 'checked':'' }} value="Sehat"><label class="ml-1"  for="Sehat"> Sehat</label></td><td><input class="ml-3" type="radio" name="periodontal" id="Gingivitis" {{ old('periodontal') ?? $odontogram->periodontal  === "Gingivitis" ? 'checked':'' }} value="Gingivitis"><label class="ml-1" for="Gingivitis"> Gingivitis</label></td><td></td><td></td></tr>

            <tr><td class="text-left font-weight-bold text-monospace d-flex">Karang Gigi @error('karanggigi') <div class="text-danger"> (belum dipilih) </div> @enderror</td><td><input class="ml-3" type="radio" name="karanggigi" id="tidakada" {{ old('karanggigi') ?? $odontogram->karanggigi  === "Tidak Ada" ? 'checked':'' }} value="Tidak Ada"><label class="ml-1"  for="tidakada"> Tidak Ada</label></td><td><input class="ml-3" type="radio" name="karanggigi" id="ada" {{ old('karanggigi') ?? $odontogram->karanggigi  === "Ada" ? 'checked':'' }} value="Ada"><label class="ml-1" for="ada"> Ada</label><td></td></td><td></td></tr>

            <tr><td class="text-left font-weight-bold text-monospace d-flex">Sikat Gigi @error('sikatgigi') <div class="text-danger"> (belum dipilih) </div> @enderror</td><td><input class="ml-3" type="radio" name="sikatgigi" id="1kali" {{ old('sikatgigi') ?? $odontogram->sikatgigi  === "Satu Kali Sehari" ? 'checked':'' }} value="Satu Kali Sehari"><label class="ml-1"  for="1kali"> Satu Kali Sehari</label></td><td><input class="ml-3" type="radio" name="sikatgigi" id="2kali" {{ old('sikatgigi') ?? $odontogram->sikatgigi  === "Dua Kali Sehari" ? 'checked':'' }} value="Dua Kali Sehari"><label class="ml-1" for="2kali"> Dua Kali Sehari</label></td><td><input class="ml-3" type="radio" name="sikatgigi" id="3kali" {{ old('sikatgigi') ?? $odontogram->sikatgigi  === "Tiga Kali Sehari" ? 'checked':'' }} value="Tiga Kali Sehari"><label class="ml-1"  for="3kali"> Tiga Kali Sehari</label></td><td><input class="ml-3" type="radio" name="sikatgigi" id="tidaktentu" {{ old('sikatgigi') ?? $odontogram->sikatgigi  === "Tidak tentu" ? 'checked':'' }} value="Tidak Tentu"><label class="ml-1"  for="tidaktentu"> Tidak Tentu</label></td></tr>
            </table>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-4">
        <table>
        <tr><td class="text-center font-weight-bold text-monospace">Indeks Debris</td></tr>
        <tr><td></td><td>
            <input class="" type="radio" name="debris16" id="160" {{ old('debris16') ?? $odontogram->debris16  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="160">0</label>
            <br>
            <input class="" type="radio" name="debris16" id="161" {{ old('debris16') ?? $odontogram->debris16  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="161">1</label>
            <br>
            <input class="" type="radio" name="debris16" id="162" {{ old('debris16') ?? $odontogram->debris16  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="162">2</label>
            <br>
            <input class="" type="radio" name="debris16" id="163" {{ old('debris16') ?? $odontogram->debris16  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="163">3</label>
          </td>
          <td>
          <input class="" type="radio" name="debris11" id="110" {{ old('debris11') ?? $odontogram->debris11  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="110">0</label>
            <br>
            <input class="" type="radio" name="debris11" id="111" {{ old('debris11') ?? $odontogram->debris11  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="111">1</label>
            <br>
            <input class="" type="radio" name="debris11" id="112" {{ old('debris11') ?? $odontogram->debris11  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="112">2</label>
            <br>
            <input class="" type="radio" name="debris11" id="113" {{ old('debris11') ?? $odontogram->debris11  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="113">3</label>
          </td>
          <td>
          <input class="" type="radio" name="debris26" id="260" {{ old('debris26') ?? $odontogram->debris26  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="260">0</label>
            <br>
            <input class="" type="radio" name="debris26" id="261" {{ old('debris26') ?? $odontogram->debris26  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="261">1</label>
            <br>
            <input class="" type="radio" name="debris26" id="262" {{ old('debris26') ?? $odontogram->debris26  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="262">2</label>
            <br>
            <input class="" type="radio" name="debris26" id="263" {{ old('debris26') ?? $odontogram->debris26  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="263">3</label>
          </td></tr>
        <tr class="border-bottom border-dark"><td>Maxila</td><td class="@error('debris16') text-danger font-weight-bold @enderror" style="width:100px">Gigi 16</td><td class="@error('debris11') text-danger font-weight-bold @enderror" style="width:100px">Gigi 11</td><td class="@error('debris26') text-danger font-weight-bold @enderror" style="width:100px">Gigi 26</td></tr>
        <tr><td>Mandibula</td><td class="@error('debris46') text-danger font-weight-bold @enderror" style="width:100px">Gigi 46</td><td class="@error('debris31') text-danger font-weight-bold @enderror" style="width:100px">Gigi 31</td><td class="@error('debris36') text-danger font-weight-bold @enderror" style="width:100px">Gigi 36</td></tr>
        <tr><td></td><td>
            <input class="" type="radio" name="debris46" id="460" {{ old('debris46') ?? $odontogram->debris46  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="460">0</label>
            <br>
            <input class="" type="radio" name="debris46" id="461" {{ old('debris46') ?? $odontogram->debris46  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="461">1</label>
            <br>
            <input class="" type="radio" name="debris46" id="462" {{ old('debris46') ?? $odontogram->debris46  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="462">2</label>
            <br>
            <input class="" type="radio" name="debris46" id="463" {{ old('debris46') ?? $odontogram->debris46  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="463">3</label>
          </td>
          <td>
          <input class="" type="radio" name="debris31" id="310" {{ old('debris31') ?? $odontogram->debris31  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="310">0</label>
            <br>
            <input class="" type="radio" name="debris31" id="311" {{ old('debris31') ?? $odontogram->debris31  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="311">1</label>
            <br>
            <input class="" type="radio" name="debris31" id="312" {{ old('debris31') ?? $odontogram->debris31  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="312">2</label>
            <br>
            <input class="" type="radio" name="debris31" id="313" {{ old('debris31') ?? $odontogram->debris31  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="313">3</label>
          </td>
          <td>
          <input class="" type="radio" name="debris36" id="360" {{ old('debris36') ?? $odontogram->debris36  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="360">0</label>
            <br>
            <input class="" type="radio" name="debris36" id="361" {{ old('debris36') ?? $odontogram->debris36  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="361">1</label>
            <br>
            <input class="" type="radio" name="debris36" id="362" {{ old('debris36') ?? $odontogram->debris36  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="362">2</label>
            <br>
            <input class="" type="radio" name="debris36" id="363" {{ old('debris36') ?? $odontogram->debris36  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="363">3</label>
          </td></tr>
        </table>
        </div>
        <div class="col-lg-6">
        <table>
        <tr><td class="text-center font-weight-bold text-monospace">Indeks Kalkulus</td></tr>
        <tr><td></td><td>
            <input class="" type="radio" name="kalkulus16" id="kal160" {{ old('kalkulus16') ?? $odontogram->kalkulus16  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="kal160">0</label>
            <br>
            <input class="" type="radio" name="kalkulus16" id="kal161" {{ old('kalkulus16') ?? $odontogram->kalkulus16  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="kal161">1</label>
            <br>
            <input class="" type="radio" name="kalkulus16" id="kal162" {{ old('kalkulus16') ?? $odontogram->kalkulus16  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="kal162">2</label>
            <br>
            <input class="" type="radio" name="kalkulus16" id="kal163" {{ old('kalkulus16') ?? $odontogram->kalkulus16  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="kal163">3</label>
          </td>
          <td>
          <input class="" type="radio" name="kalkulus11" id="kal110" {{ old('kalkulus11') ?? $odontogram->kalkulus11  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="kal110">0</label>
            <br>
            <input class="" type="radio" name="kalkulus11" id="kal111" {{ old('kalkulus11') ?? $odontogram->kalkulus11  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="kal111">1</label>
            <br>
            <input class="" type="radio" name="kalkulus11" id="kal112" {{ old('kalkulus11') ?? $odontogram->kalkulus11  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="kal112">2</label>
            <br>
            <input class="" type="radio" name="kalkulus11" id="kal113" {{ old('kalkulus11') ?? $odontogram->kalkulus11  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="kal113">3</label>
          </td>
          <td>
          <input class="" type="radio" name="kalkulus26" id="kal260" {{ old('kalkulus26') ?? $odontogram->kalkulus26  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="kal260">0</label>
            <br>
            <input class="" type="radio" name="kalkulus26" id="kal261" {{ old('kalkulus26') ?? $odontogram->kalkulus26  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="kal261">1</label>
            <br>
            <input class="" type="radio" name="kalkulus26" id="kal262" {{ old('kalkulus26') ?? $odontogram->kalkulus26  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="kal262">2</label>
            <br>
            <input class="" type="radio" name="kalkulus26" id="kal263" {{ old('kalkulus26') ?? $odontogram->kalkulus26  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="kal263">3</label>
          </td></tr>
        <tr class="border-bottom border-dark"><td>Maxila</td><td class="@error('kalkulus16') text-danger font-weight-bold @enderror" style="width:100px">Gigi 16</td><td class="@error('kalkulus11') text-danger font-weight-bold @enderror" style="width:100px">Gigi 11</td><td class="@error('kalkulus26') text-danger font-weight-bold @enderror" style="width:100px">Gigi 26</td></tr>
        <tr><td>Mandibula</td><td class="@error('kalkulus46') text-danger font-weight-bold @enderror" style="width:100px">Gigi 46</td><td class="@error('kalkulus31') text-danger font-weight-bold @enderror" style="width:100px">Gigi 31</td><td class="@error('kalkulus36') text-danger font-weight-bold @enderror" style="width:100px">Gigi 36</td></tr>
        <tr><td></td><td>
            <input class="" type="radio" name="kalkulus46" id="kal460" {{ old('kalkulus46') ?? $odontogram->kalkulus46  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="kal460">0</label>
            <br>
            <input class="" type="radio" name="kalkulus46" id="kal461" {{ old('kalkulus46') ?? $odontogram->kalkulus46  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="kal461">1</label>
            <br>
            <input class="" type="radio" name="kalkulus46" id="kal462" {{ old('kalkulus46') ?? $odontogram->kalkulus46  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="kal462">2</label>
            <br>
            <input class="" type="radio" name="kalkulus46" id="kal463" {{ old('kalkulus46') ?? $odontogram->kalkulus46  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="kal463">3</label>
          </td>
          <td>
          <input class="" type="radio" name="kalkulus31" id="kal310" {{ old('kalkulus31') ?? $odontogram->kalkulus31  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="kal310">0</label>
            <br>
            <input class="" type="radio" name="kalkulus31" id="kal311" {{ old('kalkulus31') ?? $odontogram->kalkulus31  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="kal311">1</label>
            <br>
            <input class="" type="radio" name="kalkulus31" id="kal312" {{ old('kalkulus31') ?? $odontogram->kalkulus31  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="kal312">2</label>
            <br>
            <input class="" type="radio" name="kalkulus31" id="kal313" {{ old('kalkulus31') ?? $odontogram->kalkulus31  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="kal313">3</label>
          </td>
          <td>
          <input class="" type="radio" name="kalkulus36" id="kal360" {{ old('kalkulus36') ?? $odontogram->kalkulus36  === 0 ? 'checked':'' }} value='0'><label class="ml-1" for="kal360">0</label>
            <br>
            <input class="" type="radio" name="kalkulus36" id="kal361" {{ old('kalkulus36') ?? $odontogram->kalkulus36  === 1 ? 'checked':'' }} value='1'><label class="ml-1" for="kal361">1</label>
            <br>
            <input class="" type="radio" name="kalkulus36" id="kal362" {{ old('kalkulus36') ?? $odontogram->kalkulus36  === 2 ? 'checked':'' }} value='2'><label class="ml-1" for="kal362">2</label>
            <br>
            <input class="" type="radio" name="kalkulus36" id="kal363" {{ old('kalkulus36') ?? $odontogram->kalkulus36  === 3 ? 'checked':'' }} value='3'><label class="ml-1" for="kal363">3</label>
          </td></tr>
        </table>
        </div>
        </div>

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