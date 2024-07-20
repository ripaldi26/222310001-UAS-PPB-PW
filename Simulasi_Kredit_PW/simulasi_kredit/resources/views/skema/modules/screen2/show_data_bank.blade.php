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
                    Informasi Bank
                </div>
                <div class="card-body text-center" style="margin: 100px">

                        <div class="mb-3 row">
                            <label for="shownamabank" class="col-sm-3 col-form-label">Nama Bank</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="namabank"  value="{{ $data->nama_bank }}" readonly>
                            </div>
                            {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" style="width: 300px">
                            </div> --}}
                        </div>
                        <div class="mb-3 row">
                            <label for="showbungabank" class="col-sm-3 col-form-label">Jumlah Bunga</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" id="bungabank" value="{{ $data->presentase_bunga }}" readonly>
                                <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
