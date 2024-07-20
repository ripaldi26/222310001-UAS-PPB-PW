<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="navbar" style="background-color: #672968;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="navbar-brand mb-0 h1 text-white">
                <h3 style="display: inline-block; margin-right: 10px;">Simulasi Kredit</h3>
                <a class="navbar-brand text-white" href="/">Kembali</a>
            </span>
            <div>
                <a class="navbar-brand text-white" href="/login" style="text-decoration: none;">
                    <i class="bi bi-person-circle text-white" style="font-size: 2rem;"></i>
                </a>
            </div>
        </div>
    </nav>

    <main class="container">
            <div class="row" style="margin-top: 80px">
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

        </main>
        </body>

        </html>
