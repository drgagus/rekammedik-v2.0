
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="/admin">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/poli">Daftar Poli</a>
          <a class="dropdown-item" href="/admin/diagnosa">Daftar Diagnosa</a>
          <a class="dropdown-item" href="/admin/desa">Daftar Desa</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/user">Daftar Akun</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kunjungan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/poliumum">{{$poli1->room}}</a>
          <a class="dropdown-item" href="/admin/poligigi">{{$poli2->room}}</a>
          <a class="dropdown-item" href="/admin/polikia">{{$poli3->room}}</a>
          <a class="dropdown-item" href="/admin/igd">{{$poli10->room}}</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/laboratorium">Laboratorium</a>
          <a class="dropdown-item" href="/admin/apotek">Apotek</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/tentang" tabindex="-1" aria-disabled="true">Tentang</a>
      </li>
    </ul>
  </div>
</div>
</nav>
