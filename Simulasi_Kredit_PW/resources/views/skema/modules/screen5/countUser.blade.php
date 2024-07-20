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
            </span>
            <div>
                <a class="navbar-brand text-white" href="/login" style="text-decoration: none;">
                    <i class="bi bi-person-circle text-white" style="font-size: 2rem;"></i>
                </a>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 50px">
                    <div class="card-header fw-bold" style="background-color: #672968; text-align: center; color: white;">
                        Lakukan Perhitungan
                    </div>
                    <div class="card-body text-center" style="margin: 100px">

                        <form action="/calculateUser" method="POST">
                            @csrf

                            {{-- <div class="row mb-3" style="margin-top: 5px">
                                <label for="pokokpinjaman" class="col-sm-4 col-form-label">Pokok Pinjaman</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="pokokpinjaman" id="pokokpinjaman" style="max-width: 150px;" required>
                                    <div class="invalid-feedback">
                                        Harap masukkan pokok pinjaman.
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row mb-3" style="margin-top: 5px">
                                <label for="pokokpinjaman" class="col-sm-4 col-form-label">Pokok Pinjaman</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="pokokpinjaman" id="pokokpinjaman" required style="max-width: 150px;">
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
                                    <div class="invalid-feedback">
                                        Harap pilih bank.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3" style="margin-top: 30px">
                                <label for="hitungjumlahbunga" class="col-sm-4 col-form-label">Jumlah Bunga</label>
                                <div class="col-sm-8">
                                    <input type="text" id="hitungjumlahbunga" name="hitungjumlahbunga" class="form-control" style="max-width: 150px;" readonly  required>
                                    <div class="invalid-feedback">
                                        Harap masukkan jumlah bunga.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3" style="margin-top: 30px">
                                <label for="pilihjangkawaktu" class="col-sm-4 col-form-label">Jangka Waktu</label>
                                <div class="col-sm-8">
                                    <select id="pilihjangkawaktu" name="pilihjangkawaktu" class="form-select" style="max-width: 150px;" required>
                                        <option value="">~Pilih~</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Harap pilih jangka waktu.
                                    </div>
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
    </main>

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

//     function formatNumber(value) {
//     return value.replace(/\D/g, "")
//                 .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
// }

//     document.getElementById('pokokpinjaman').addEventListener('input', function() {
//     var value = this.value;
//     this.value = formatNumber(value);});
    </script>

</body>

</html>

