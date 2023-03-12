@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($libs as $lib)
                <div class="col-lg-3">
                    <div class="card mt-4">
                        <img src="{{ asset('storage/' . $lib->gambar) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lib->judul }}</h5>
                            <p class="card-text">{{ $lib->deskripsi }}</p>
                            <a href="/detail/{{ $lib->id_buku }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
