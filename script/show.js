document.addEventListener('DOMContentLoaded', function () {
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('password2');
    const eyeIcon = document.getElementById('eye');
    const eyeConfirmIcon = document.getElementById('eyeConfirm');

    eyeIcon.addEventListener('click', function () {
        togglePasswordFieldVisibility(passwordField, eyeIcon);
    });

    eyeConfirmIcon.addEventListener('click', function () {
        togglePasswordFieldVisibility(confirmPasswordField, eyeConfirmIcon);
    });

    function togglePasswordFieldVisibility(field, icon) {
        if (field.type === 'password') {
            field.type = 'text';
            icon.innerHTML = '<i class="bi bi-eye-fill" style="color: #d87093;"></i>';
        } else {
            field.type = 'password';
            icon.innerHTML = '<i class="bi bi-eye-slash-fill" style="color: #d87093;"></i>';
        }
    }
});
