@extends('layouts.app')
@section('tittle')
    Home
@endsection
@section('content')
    <section class="max-w-7xl mx-auto w-full">
        <img src="{{ asset('/storage/'.$data_blog->foto) }}"
            alt="" srcset="" class="w-full lg:h-[28rem] h-80">
        <section class="content mx-6 md:mx-20">
            <h3 class="title text-3xl font-bold mt-10">{{ $data_blog->title }}</h3>
            <div class="profile flex items-center gap-4 mt-6">
              <img src="https://images.unsplash.com/photo-1722755417806-10e4c449e01d?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"  alt="" srcset="" class="size-12  rounded-full">
              <div class="user">
                <p class="text-xl font-semibold m-0 p-0">{{ $data_blog->Users->username }}</p>
                <p class="m-0 p-0 text-base">{{ date('d F Y', strtotime($data_blog->created_at)) }}</p>
              </div>
            </div>

            <div class="content mt-8 break-words text-justify">
            {!!  $data_blog->content !!}
            </div>
        </section>
    </section>
@overwrite
