<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBlog = Blog::latest()->with('Users')->paginate(20);
        return view('pengguna.home',['data_blog' => $dataBlog]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $cekBlog = Blog::where('slug', $slug)->with('Users')->first();
        if (!$cekBlog) {
            return redirect()->route('home.index');
        }
        $dataBlog = Blog::where('slug', $slug)->with('Users')->first();
        return view('pengguna.single-blog', ['data_blog' => $dataBlog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
