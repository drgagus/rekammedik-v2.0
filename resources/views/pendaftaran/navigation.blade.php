
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href={{url("/")}}>{{ config('app.name', 'Laravel') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href={{url("/pendaftaran")}}>Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pasien
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href={{url("/pendaftaran/anggotakeluarga")}}>Data Pasien</a>
          <a class="dropdown-item" href={{url("/pendaftaran/kepalakeluarga")}}>Data Kepala Keluarga</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href={{url("/pendaftaran/kepalakeluarga/create")}}>+pasien</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href={{url("/tentang")}} tabindex="-1" aria-disabled="true">Tentang</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </form>
    
  </div>
</div>
</nav>
