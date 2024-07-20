@extends('Skema.layouts.index')

@section('main-content')

<div class="mt-3">
    <a href="/count" class="text-decoration-none">
        <i class="bi bi-arrow-left"></i>
        <span>Kembali</span>
    </a>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 80px">
                <div class="card-header fw-bold" style="background-color: #672968; text-align: center; color: white;">
                    Daftar jangka waktu
                </div>
                <div class="card-body text-center" style="margin: 100px">



                </div>
            </div>
        </div>
    </div>
</div> --}}


            <div class="row" style="margin-top: 10px">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-header fw-bold" style="background-color: #672968; text-align: center; color: white;">
                        Informasi Pinjaman
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="PokokPinjaman" class="col-sm-3 col-form-label">Pokok Pinjaman</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ number_format($pokok_pinjaman, 0, ',', '.') }}" id="PokokPinjaman" readonly>
                                <span class="input-group-text">IDR</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="namabank" class="col-sm-3 col-form-label">Nama Bank</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value=" {{ $nama_bank }}" id="namabank" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="JangkaWaktu" class="col-sm-3 col-form-label">Jangka Waktu Angsuran</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $rentang_waktu }}" id="JangkaWaktu" readonly>
                                <span class="input-group-text">Bulan</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="BungaBank" class="col-sm-3 col-form-label">Bunga</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $jumlah_bunga }}" id="BungaBank" readonly>
                                <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header fw-bold" style="background-color: #672968; text-align: center; color: white;">
                            Informasi angsuran
                        </div>
                        <div class="card-body">

                            <!-- output.blade.php -->

                            <div class="mb-3 row">
                                <label for="Angsuran" class="col-sm-3 col-form-label">Angsuran</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value=" {{ number_format($angsuran, 0, ',', '.') }}" id="Angsuran" readonly>
                                        <span class="input-group-text">IDR</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="TotalPeriode" class="col-sm-3 col-form-label">Total Periode</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="{{ $rentang_waktu }}" id="TotalPeriode" readonly>
                                        <span class="input-group-text">Bulan</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="TotalBunga<" class="col-sm-3 col-form-label">Total Bunga</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="{{ number_format($total_bunga, 0, ',', '.') }}" id="TotalBunga<" readonly>
                                        <span class="input-group-text">IDR</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="TotalDibayarkan" class="col-sm-3 col-form-label">Total yang Dibayarkan</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value=" {{ number_format($total_dibayarkan, 0, ',', '.') }}" id="TotalDibayarkan" readonly>
                                        <span class="input-group-text">IDR</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



@endsection


