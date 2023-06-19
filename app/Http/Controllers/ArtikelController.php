<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mime\MimeTypes;

class ArtikelController extends Controller
{
    public function show()
    {
        $articles = DB::table('artikel')->orderby('id', 'desc')->get();
        return view('show', ['articles'=>$articles]);
    }


    public function add_process(Request $article)
    {
        $gambar     = $article->file('gambar');
        $filename   = date('Y-m-d').$gambar->getClientOriginalName();
        $path       = 'gambar-artikel/'.$filename;
        
        
        DB::table('artikel')->insert([
            
            'judul'     =>  $article->judul,
            'deskripsi' =>  $article->deskripsi,
            'gambar'    => $filename

        ]);

        Storage::disk('public')->put($path,file_get_contents($gambar));

        return redirect()->route('artikel.show');
    }

    public function detail($id)
    {
        $article = DB::table('artikel')->where('id', $id)->first();
        $komens = Komen::where('artikel_id', $id)->get();
        return view('detail', [
            'article' => $article,
            'komens' => $komens
        ]);
    }

    public function show_by_admin()
    {
        $articles = DB::table('artikel')->orderby('id', 'desc')->get();
        return view('adminshow', ['articles'=>$articles]);
    }

    public function edit($id)
    {
        $article = DB::table('artikel')->where('id', $id)->first();
        return view('edit', ['article'=>$article]);
    }

    public function edit_process(Request $article)
    {
        $id = $article->id;
        $judul = $article->judul;
        $deskripsi = $article->deskripsi;
        DB::table('artikel')->where('id', $id)
                            ->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        session()->flash('success', 'Artikel berhasil diedit');
        return redirect()->route('show.admin');
    }

    public function delete($id)
    {
        //menghapus artikel dengan ID sesuai pada URL
        DB::table('artikel')->where('id', $id)
                            ->delete();
 
        //membuat pesan yang akan ditampilkan ketika artikel berhasil dihapus
        session()->flash('success', 'Artikel berhasil dihapus');
        return redirect()->route('show.admin');
    }
}
