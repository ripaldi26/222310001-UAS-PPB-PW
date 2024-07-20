{{-- <nav class="navbar" style="background-color: #672968;">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1, text-white">
            <h3 style="display: inline-block; margin-right: 10px;">Simulasi Kredit</h3>
            <a class="navbar-brand text-white" href="/home" style="text-decoration: none;">Beranda</a>
        </span>
    </div>
</nav> --}}

<nav class="navbar" style="background-color: #672968;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <span class="navbar-brand mb-0 text-white">
            <h3 style="display: inline-block; margin-right: 10px;">Simulasi Kredit</h3>
            <a class="navbar-brand text-white" href="/home" style="text-decoration: none;">Beranda</a>
        </span>
        <div>
            <a class="navbar-brand text-white" onclick="confirmLogout()" style="text-decoration: none;">
                Keluar
            </a>
        </div>
    </div>
</nav>

<script>
    function confirmLogout() {
        if (confirm("Apakah Anda yakin ingin keluar?")) {
            window.location.href = '/';
        } else {
        }
    }
</script>
