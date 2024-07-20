@extends('Skema.layouts.index')

@section('main-content')

<div class="mt-3">
    <a href="/listbank" class="text-decoration-none">
        <i class="bi bi-arrow-left"></i>
        <span>Kembali</span>
    </a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 10px">
                <div class="card-header fw-bold" style="background-color: #672968; text-align: center; color: white;">
                    Tambah Bank
                </div>
                <div class="card-body text-center" style="margin: 100px">
                    <form action="/store" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="tambahNamaBank" class="col-sm-3 col-form-label">Nama Bank</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="tambahNamaBank" name="nama_bank" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tambahPresentaseBunga" class="col-sm-3 col-form-label">Jumlah Bunga</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" id="tambahPresentaseBunga" name="presentase_bunga" required>
                                <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>

                @if (session()->has('warning'))
                <div class="alert alert-warning" role="alert">
                {{ session('warning') }}
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
