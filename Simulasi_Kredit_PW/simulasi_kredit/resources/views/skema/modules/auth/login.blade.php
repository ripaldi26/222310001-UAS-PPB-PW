<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simulasi Kredit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: white;
        }

        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 600px;
        }

        .card {
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }

        .form-label {
            text-align: center;
        }
    </style>
</head>

<body>

    {{-- <nav class="navbar" style="background-color: #672968; ">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">
                <h3 style="display: inline-block; margin-right: 10px;">Simulasi Kredit</h3>
                <a class="navbar-brand text-white" href="/">Kembali</a>
            </span>
        </div>
    </nav> --}}

    <nav class="navbar" style="background-color: #672968;">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">
                <h3 style="display: inline-block; margin-right: 10px;">Simulasi Kredit</h3>
                <a class="navbar-brand text-white" href="/">Kembali</a>
            </span>
        </div>
    </nav>




    <div class="card-container">
        <div class="card">
            <h3 class="card-header text-center">Masuk</h3>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="inputEmail3" class="form-label">ID Pengguna</label>
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Masukkan ID Pengguna">
                        <small class="text-danger error-email"></small>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword3" class="form-label">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="inputPassword3"
                                placeholder="Masukkan Kata Sandi">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()">
                                <i id="togglePasswordIcon" class="bi bi-eye"></i>
                            </button>
                        </div>
                        <small class="text-danger error-password"></small>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" onclick="handleSignIn(event)">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let textEmail = document.getElementById('inputEmail3');
        let textPassword = document.getElementById('inputPassword3');
        let togglePasswordIcon = document.getElementById('togglePasswordIcon');

        const handleSignIn = (event) => {
            event.preventDefault();
            let email = textEmail.value.trim();
            let password = textPassword.value.trim();

            let errorEmail = document.querySelector('.error-email');
            let errorPassword = document.querySelector('.error-password');

            errorEmail.textContent = '';
            errorPassword.textContent = '';

            if (email === "") {
                errorEmail.textContent = "Email tidak boleh kosong";
            } else if (password === "") {
                errorPassword.textContent = "Kata sandi tidak boleh kosong";
            } else {
                if (email === "222310008@student.ibik.ac.id" && password === "222310008") {
                    alert("Selamat datang");
                    window.location.href = "/home"; // Arahkan ke halaman beranda setelah berhasil login
                } else {
                    alert("Kombinasi email dan kata sandi salah");
                }
            }
        };

        function togglePasswordVisibility() {
            let password = textPassword.type;
            if (password === "password") {
                textPassword.type = "text";
                togglePasswordIcon.classList.remove("bi-eye");
                togglePasswordIcon.classList.add("bi-eye");
            } else {
                textPassword.type = "password";
                togglePasswordIcon.classList.remove("bi-eye");
                togglePasswordIcon.classList.add("bi-eye-slash");
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>

</html>
