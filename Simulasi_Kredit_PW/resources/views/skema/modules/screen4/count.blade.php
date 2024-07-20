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
                    Lakukan Perhitungan
                </div>
                <div class="card-body text-center" style="margin: 100px">

                    <form action="/calculate" method="POST">
                        @csrf
                        <div class="row mb-3" style="margin-top: 5px">
                            <label for="pokokpinjaman" class="col-sm-4 col-form-label">Pokok Pinjaman</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="pokokpinjaman" id="pokokpinjaman" style="max-width: 150px;" required>
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-top: 30px">
                            <label for="hitungnamabank" class="col-sm-4 col-form-label">Pilih Bank</label>
                            <div class="col-sm-8">
                                <select id="hitungnamabank" name="hitungnamabank" class="form-select" style="max-width: 150px;" required>
                                    <option value="">~Pilih~</option>
                                    @foreach ($data as $banks)
                                        <option value="{{ $banks->id }}">{{ $banks->nama_bank }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-top: 30px">
                            <label for="hitungjumlahbunga" class="col-sm-4 col-form-label">Jumlah Bunga</label>
                            <div class="col-sm-8">
                                <input type="text" id="hitungjumlahbunga" name="hitungjumlahbunga" class="form-control" style="max-width: 150px;" readonly required >
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-top: 30px">
                            <label for="pilihjangkawaktu" class="col-sm-4 col-form-label">Jangka Waktu</label>
                            <div class="col-sm-8">
                                <select id="pilihjangkawaktu" name="pilihjangkawaktu" class="form-select" style="max-width: 150px;" required>
                                    <option value="">~Pilih~</option>
                                </select>
                                {{-- <input type="hidden" id="jangkawaktu_id" name="jangkawaktu_id"> --}}
                            </div>
                        </div>

                        <div class="col-sm-11 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Hitung</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<br>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>

document.getElementById('hitungnamabank').onchange = function() {
    var id_bank = this.value;
    fetch(`/banks/${id_bank}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('hitungjumlahbunga').value = data.presentase_bunga;
            // Tambahkan logika untuk menampilkan jangka waktu
            fetch(`/jangka/${id_bank}`) // Fetch jangka waktu berdasarkan ID bank
                .then(response => response.json())
                .then(jangkaWaktuData => {
                    $('#pilihjangkawaktu').empty(); // Kosongkan pilihan sebelumnya
                    $('#pilihjangkawaktu').append('<option value="">~Pilih~</option>');
                    $.each(jangkaWaktuData, function(key, jangkaWaktu) {
                        $('#pilihjangkawaktu').append(
                            '<option value="' + jangkaWaktu.rentang_waktu + '">' +
                            jangkaWaktu.rentang_waktu + ' Bulan</option>'
                        );
                    });
                })
                .catch(error => console.error('Error:', error));
        })
        .catch(error => console.error('Error:', error));


};


</script>

@endsection
