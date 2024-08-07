@extends('admin.app')
@section('admin.content')
    <section class="mx-lg-3">

        {{-- modal --}}
        @foreach ($data_berita as $item)
            <!-- Modal -->
            <div class="modal fade" id="blog-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" action="{{ route('admin.destroy', ['slug' => $item->slug]) }}" class="modal-content">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="fs-5">Apakah anda yakin akan menghapus data <span class="text-danger fw-bold">{{ $item->title }}</span> ini ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Ya, Saya setuju</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
        {{-- endmodal --}}
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
                                <a href="{{ route('admin.show', ['slug' => $item->slug]) }}"
                                    class="btn btn-primary">Detail</a>
                                <a href="{{ route('admin.edit', ['slug' => $item->slug]) }}" class="btn btn-success">Edit</a>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#blog-{{ $item->id }}">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $data_berita->links() }}
        </div>
    </section>
@endsection
