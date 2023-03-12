@extends('layout.template')
<!-- START DATA -->
@section('Library')
    @include('topbar.topbar')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('lib') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('lib/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>



        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Id</th>
                    <th class="col-md-2">Judul</th>
                    <th class="col-md-2">Deskripsi</th>
                    <th class="col-md-2">Pengarang</th>
                    <th class="col-md-2">Penerbit</th>
                    <th class="col-md-2">Cover</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem(); ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->id_buku }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->pengarang }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->gambar }}" height="200",
                                width="150" </td>
                        <td>
                            <a href='{{ url('lib/' . $item->id_buku . '/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Delete this data?')" class="d-inline"
                                action="{{ url('lib/' . $item->id_buku) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
        <div class="pb-3">
            <a href='{{ route('export') }}' class="btn btn-success">Export Data</a>
        </div>
    </div>
    <!-- AKHIR DATA -->
@endsection
