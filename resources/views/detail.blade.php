@extends('master')
 
<!-- memberikan judul di tab sesuai dengan judul artikel yang sedang dibaca -->
{{-- @section('title')
{{ $article->judul }}
@endsection --}}
 
<!-- menampilkan gambar, judul, dan isi artikel -->
@section('main')
<div class="col-md-7 col-sm-12 mb-5 mt-5 bg-white p-0">
    <img src="{{ asset('storage/gambar-artikel/'.$article->gambar) }}" class="card-img-top w-50" alt="gambar">
    <hr>
    <div class="p-4" >
        <h2>{{ $article->judul }}</h2>
        <p class="mt-5">{!! $article->deskripsi !!}</p>
    </div>
    <hr>

    <!-- Button trigger modal -->
    {{-- melakukan pengecekan autentifikasi/login --}}
    @auth
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #1abc9c">
            Masukkan Komentar
        </button>
    @else
        <a href="/login" class="btn btn-primary" style="background-color: #1abc9c">
            Masukkan Komentar
        </a>
    @endauth

    {{-- menampilkan nama user ketika login dan comment body(isi) nya --}}
    {{-- melakukan pengecekan jika masuk menggunakan akun admin 
        akan memunculkan tombol delete komentar --}}
    @foreach ($komens as $komen)
        <div class="p-4">
            <h4>
                @php
                    $user = DB::table('users')->where('id', $komen->user_id)->first();
                    echo $user->name;
                @endphp
            </h4>
            <p>{{ $komen->comment_body }}</p>
            @if (Auth::check() && Auth::user()->is_admin == 1)
                <form action="{{ route('komen.delete', $komen->id) }}" method="POST">
                    @csrf
                    <button type="submit">Hapus</button>
                </form>
            @endif
        </div>
        <hr>
    @endforeach
</div>
@endsection
 
<!-- menampilkan tombol kembali ke halaman utama -->
@section('sidebar')
<div class="col-md-4 offset-md-1 col-sm-12 mt-5 bg-white p-4 h-100">
   <center> 
        <a href="/"> 
            <button class="btn btn-info text-white w-100" style="background-color: #1abc9c">Kembali</button> 
        </a>
    </center>
</div>

 <!-- Modal -->
 <form action="{{ route('komen.store') }}" method="POST">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Masukkan komentar</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <input type="hidden" value="{{ $article->id }}" name="artikel_id">

                    <label for="comment_body" class="mb-2">Masukkan komentar</label>
                    <textarea name="comment_body" id="comment_body" class="w-100"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #1abc9c">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection