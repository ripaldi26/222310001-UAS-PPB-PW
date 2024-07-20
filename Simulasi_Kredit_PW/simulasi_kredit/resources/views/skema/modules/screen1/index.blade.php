@extends('Skema.layouts.index')

@section('main-content')
<div class="row mt-5">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header fw-bold" style="background-color: #672968; text-align: center; color: white">
                Tambah Jangka Waktu
            </div>
            <div class="card-body">
                <form class="row g-3" action="/store2" method="POST" >
                    @csrf

                    <div class="row mb-3" style="margin-top: 30px">
                        <label for="pilihnamabank" class="col-sm-4 col-form-label">Pilih nama bank</label>
                        <div class="col-sm-8">
                            <select id="pilihnamabank" name="id_bank" class="form-select" style="max-width: 150px;" required>
                                <option value="">~Pilih~</option>
                                @foreach ($data as $banks)
                                <option value="{{ $banks->id }}">{{ $banks->nama_bank }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3" style="margin-top: 5px">
                        <label for="jumlahbunga" class="col-sm-4 col-form-label">Jumlah Bunga</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="jumlahbunga" style="max-width: 150px;" readonly required>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="rentang_waktu" class="col-sm-4 col-form-label">Jangka Waktu per Bulan</label>
                        <div class="col-sm-4">
                            <input type="number" id="rentang_waktu" name="rentang_waktu" style="max-width: 150px;" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-11 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>


                </form>
                <br>
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                {{ session('success') }}
                </div>
                @endif

                @if (session()->has('warning'))
                <div class="alert alert-warning" role="alert">
                {{ session('warning') }}
                </div>
                @endif


            </div>
        </div>
        <div class="mt-3">
            {{-- {{ $data->links() }} --}}
        </div>
    </div>
    <div class="col-lg-4">
        @include('skema.modules.screen1.list_skema')
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    document.getElementById('pilihnamabank').onchange = function() {
        var id_bank = this.value;
        fetch(`/banks/${id_bank}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('jumlahbunga').value = data.presentase_bunga;
            })
            .catch(error => console.error('Error:', error));
    };
</script>

@endsection
