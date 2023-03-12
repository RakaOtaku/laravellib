@extends('layout.template')
       <!-- START FORM -->
       @section('Library')

       <form action='{{ url('lib') }}' method='post' enctype="multipart/form-data">
     
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('lib') }}' class="m-3 btn btn-secondary"><< Back </a>
            <div class="mb-3 row">
                <label for="id_buku" class="col-sm-2 col-form-label">Id Buku</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='id_buku' value="{{ Session::get('id_buku') }}" id="id_buku">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='judul' value="{{ Session::get('judul') }}" id="judul">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='deskripsi' value="{{ Session::get('deskripsi') }}" id="deskripsi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='pengarang' value="{{ Session::get('pengarang') }}" id="pengarang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='penerbit' value="{{ Session::get('penerbit') }}" id="penerbit">
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
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
        </form>
        <!-- AKHIR FORM -->
       @endsection
       