@extends('admin.app')

@push('styles.admin')
    <style>
        .avatar {
            display: block;
            width: 3rem;
            height: 3rem;
            border-radius: 100%;
            border: 2px solid #000000;
            overflow: hidden;
            background-image: url("{{ asset( '/storage/'.$data_blog->Users->foto) }}");
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        @media (min-width: 576px) {
            .avatar{
                width: 4rem;
                height: 4rem;
            }
        }

        .content-container {
            overflow: hidden;
            word-wrap: break-word; /* Untuk memaksa kata-kata panjang agar terbungkus */
        }

 
    </style>
@endpush
@section('admin.content')
    <div class="row overflow-hidden justify-content-center">
        <img src="{{ asset('/storage/' . $data_blog->foto) }}" alt="" class="img-fluid  col-lg-8 ">
        <h3 class="title col-lg-8 fs-1 my-4">{{ $data_blog->title }}</h3>
        <div class="col-lg-8 d-flex items-center gap-3 border-b-2">
            <div class="avatar"></div>
            <div class="">
                <p class="fs-4 m-0 p-0">{{ $data_blog->Users->username }}</p>
                <p class="">{{ date('d F Y', strtotime($data_blog->created_at)) }}</p>
            </div>
        </div>

        <div class="col-lg-8 my-4 content-container">
            {!!  $data_blog->content !!}
        </div>

    </div>
@endsection
