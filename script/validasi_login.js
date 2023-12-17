function validateLogin() {
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();

    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');

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

    // Jika tidak ada pesan error, form akan dikirim
    if (email === '' || password === '' || !validateEmail(email)) {
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
