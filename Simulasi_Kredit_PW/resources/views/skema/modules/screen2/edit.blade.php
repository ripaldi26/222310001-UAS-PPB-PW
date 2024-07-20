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
                    Edit Bank
                </div>
                <div class="card-body text-center" style="margin: 100px">
                    <form action="/update/{{ $data->id }}/edit" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="editnamabank" class="col-sm-3 col-form-label">Nama Bank</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="editnamabank" name="nama_bank" value="{{ $data->nama_bank }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editbungabank" class="col-sm-3 col-form-label">Jumlah Bunga</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" id="editbungabank" name="presentase_bunga" value="{{ $data->presentase_bunga }}" required>
                                <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
