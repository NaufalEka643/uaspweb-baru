<!-- menggunakan kerangka dari halaman master.blade.php --> 
@extends('master')
 
<!-- membuat komponen title sebagai judul halaman -->
@section('title', 'IAGROW')
 
<!-- membuat header dan tombol tambah artikel di atas -->
@section('header')
    <center>
        <h2>Berita Agriculture Terbaru</h2>
        {{-- <a href="/add"><button class="btn btn-success">Tambah Artikel</button></a> --}}
    </center>
@endsection
 
<!-- membuat komponen main yang berisi form untuk mengisi judul dan isi artikel -->
@section('main')
    @foreach ($articles as $article)
    <div class="col-md-4 col-sm-12 mt-5 mb-5">
        <div class="card">
            {{-- storage link laravel 10 --}}
            <img src="{{ asset('storage/gambar-artikel/'.$article->gambar) }}" class="card-img-top" alt="gambar" >
            <div class="card-body">
                <h5 class="card-title">{{ $article->judul }}</h5>
                <a href="/detail/{{ $article->id }}" class="btn btn-secondary" style="background-color: #1abc9c">Baca Artikel</a>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Lokasi</h4>
                    <p class="lead mb-0">
                        Jember
                        <br />
                        Universitas Jember
                    </p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">IAGROW</h4>
                </div>
            </div>
        </div>
    </footer>
   @endforeach
@endsection