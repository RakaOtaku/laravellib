@extends('layout.template')
       <!-- START FORM -->
       @section('Library')

       <form action='{{ url('lib/'.$data->id_buku) }}' method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('lib') }}' class="m-3 btn btn-secondary"><< Back </a>
            <div class="mb-3 row">
                <label for="id_buku" class="col-sm-2 col-form-label">Id Buku</label>
                <div class="col-sm-10">
                    {{ $data->id_buku }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='judul' value="{{ $data->judul }}" id="judul">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='deskripsi' value="{{ $data->deskripsi }}" id="deskripsi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='pengarang' value="{{ $data->pengarang }}" id="pengarang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='penerbit' value="{{ $data->penerbit }}" id="penerbit">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                             
                        <input type="file" class="form-control" name='gambar' value="{{ Session::get('gambar') }}" id="gambar">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="submit" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" >SIMPAN</button></div>
            </div>
        </div>
        </form>
        <!-- AKHIR FORM -->
       @endsection
       