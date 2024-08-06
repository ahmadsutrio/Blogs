<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBlogs;
use App\Http\Requests\AddBeritaRequest;
use App\Http\Requests\EditBeritaRequest;
use Illuminate\Support\Facades\Auth;

class AdminBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Implementasi untuk mengambil data berita dengan relasi 
        // dengan user dan kategori blog
        $berita_all = Blog::latest()->with(['Users','KategoriBlog'])->paginate(10);

        // Return view dengan membawa data berita
        return view('admin.daftar-berita', [
            'data_berita' => $berita_all,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getKategori = KategoriBlogs::get(['id','kategori']);
        
        return view('admin.add-berita',[
            'getKategori' => $getKategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddBeritaRequest $request)
    {
        $validate = $request->validated();
        
        $user = User::where('id', Auth::user()->id)->first();
        if(!$user || !$user->role === 'administrator'){
            return redirect()->route('admin.index');
        
        }

        $validate['slug'] = Str::slug($request->title);
        $validate['id_users'] = Auth::user()->id;

        $file = $request->file('foto');
        $title = date('Y-m-d')."-".$request->title.".".$file->getClientOriginalExtension();
        $path_foto = $file->storeAs('public/blogs', $title,'public');
        $validate['foto'] = $path_foto;
        
        Blog::create($validate);
        return redirect()->route('admin.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $dataBlog = Blog::where('slug', $slug)->with(['Users','KategoriBlog'])->first();
        $getKategori = KategoriBlogs::get(['id', 'kategori']);

        if(!$dataBlog){
            return redirect()->route('admin.index');
        }


        return view('admin.show-detail-berita',['data_blog'=>$dataBlog]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {

        $dataBlog = Blog::where('slug', $slug)->first();
        $getKategori = KategoriBlogs::get(['id', 'kategori']);

        if (!$dataBlog) {
            return redirect()->route('admin.index');
        }


        return view('admin.show-detail-berita', ['data_blog' => $dataBlog, 'getKategori' => $getKategori]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
