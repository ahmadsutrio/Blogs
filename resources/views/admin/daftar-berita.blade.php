@extends('admin.app')
@section('admin.content')
    <section class="mx-lg-3">
        <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Add Blogs</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Status</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_berita as $index => $item)
                        <tr>
                            <th scope="row">{{ $data_berita->firstItem() + $index }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->Users->username }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->KategoriBlog->kategori }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('admin.show', ['slug' => $item->slug]) }}" class="btn btn-primary">Detail</a>
                                <a href="" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $data_berita->links() }}
        </div>
    </section>
@endsection
