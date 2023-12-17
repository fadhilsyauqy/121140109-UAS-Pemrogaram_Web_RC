function validateForm() {
    var nama = document.getElementById('nama').value;
    var nim = document.getElementById('nim').value;
    var prodi = document.getElementById('prodi').value;
    var alamat = document.getElementById('alamat').value;
    var gambarInput = document.getElementById('gambar');
    var gambar = gambarInput.value;

    document.getElementById('namaError').innerHTML = nama === '' ? 'Nama harus diisi' : '';
    document.getElementById('nimError').innerHTML = nim === '' ? 'NIM harus diisi' : '';
    document.getElementById('prodiError').innerHTML = prodi === '' ? 'Program Studi harus diisi' : '';
    document.getElementById('alamatError').innerHTML = alamat === '' ? 'Alamat harus diisi' : '';

    // Validasi gambar
    if (gambar === '') {
        document.getElementById('gambarError').innerHTML = 'Gambar harus dipilih';
        return false;
    }

    // Pemeriksaan ekstensi file gambar (contoh: jpg, jpeg, png)
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(gambar)) {
        document.getElementById('gambarError').innerHTML = 'Format gambar tidak valid. Gunakan format jpg, jpeg, atau png.';
        return false;
    } else {
        document.getElementById('gambarError').innerHTML = '';
    }

    // Jika ada setidaknya satu pesan error, form tidak akan dikirim
    return !(nama === '' || nim === '' || prodi === '' || alamat === '');
}
