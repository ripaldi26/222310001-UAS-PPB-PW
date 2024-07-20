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
            <div class="card" style="margin-top: 10px">
                <div class="card-header fw-bold" style="background-color: #672968; text-align: center; color: white;">
                    {{-- {{ $data->namaSkema }} --}}Daftar Bank
                </div>
                <div class="card-body">
                    <div>
                        <h3 style="text-align: center; margin-top: 20px;">Daftar Bank</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bank</th>
                                {{-- <th>Bunga(%)</th> --}}
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $banks)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ $banks->nama_bank }}</td>
                                {{-- <td>{{ $banks->presentase_bunga }}</td> --}}
                                {{-- <td>{{ $banks->idnamaskema->namaSkema}}</td> --}}
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="/detailsbank/{{ $banks->id }}">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                        </a>
                                        <a href="/update/{{ $banks->id }}">
                                            <button type="button" class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </a>
                                        <a href="/delete/{{ $banks->id }}">
                                            <button type="button" class="btn btn-danger btn-sm">
                                                {{-- onclick="return confirm('Apakah data tersebut mau dihapus?')"> --}}
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                    <a href="/createBank">
                        <div class="text-center mt-4">
                            <button type="submit"  class="btn btn-primary">Tambah Bank</button>
                        </div>
                    </a>

                    <br>
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

