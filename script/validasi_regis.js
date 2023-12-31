function validateRegis() {
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();
    var password2 = document.getElementById('password2').value.trim();

    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');
    var password2Error = document.getElementById('password2Error');

    // Validasi Email
    if (email === '') {
        emailError.innerHTML = 'Email harus diisi';
    } else if (!validateEmail(email)) {
        emailError.innerHTML = 'Email tidak valid';
    } else {
        emailError.innerHTML = '';
    }

    // Validasi Password
    if (password === '') {
        passwordError.innerHTML = 'Password harus diisi';
    } else {
        passwordError.innerHTML = '';
    }

    // Validasi Konfirmasi Password
    if (password2 === '') {
        password2Error.innerHTML = 'Konfirmasi Password harus diisi';
    } else if (password !== password2) {
        password2Error.innerHTML = 'Konfirmasi Password tidak cocok dengan Password';
    } else {
        password2Error.innerHTML = '';
    }

    // Jika ada setidaknya satu pesan error, form tidak akan dikirim
    if (email === '' || password === '' || password2 === '' || !validateEmail(email) || password !== password2) {
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
