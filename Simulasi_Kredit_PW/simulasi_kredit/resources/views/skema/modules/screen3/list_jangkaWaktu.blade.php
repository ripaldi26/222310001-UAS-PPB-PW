<!-- resources/views/jangka_waktus/index.blade.php -->

@extends('Skema.layouts.index')

@section('main-content')

<div class="mt-3">
    <a href="/home" class="text-decoration-none">
        <i class="bi bi-arrow-left"></i>
        <span>Kembali</span>
    </a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 80px">
                <div class="card-header fw-bold" style="background-color: #672968; text-align: center; color: white;">
                    Daftar jangka waktu
                </div>
                <div class="card-body text-center" style="margin: 100px">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Bank</th> <!-- Tambahkan kolom Nama Bank -->
                            <th scope="col">Bunga</th>
                            <th scope="col">Jangka Waktu</th>
                            <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $jangka_waktus)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ $jangka_waktus->bank->nama_bank }}</td> <!-- Akses nama bank -->
                                <td>{{ $jangka_waktus->bank->presentase_bunga}}</td> <!-- Akses bunga bank -->
                                {{-- <td>{{ $jangka_waktus->batas_awal }}</td>
                                <td>{{ $jangka_waktus->batas_akhir }}</td> --}}
                                <td>{{ $jangka_waktus->rentang_waktu }}</td>
                                <td><a href="/deleteJW/{{ $jangka_waktus->id }}">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        {{-- onclick="return confirm('Apakah data tersebut mau dihapus?')"> --}}
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                    </a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
