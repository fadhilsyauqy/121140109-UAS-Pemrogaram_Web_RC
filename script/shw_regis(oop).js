class PasswordToggle {
    constructor(field, icon) {
        this.field = field;
        this.icon = icon;

        this.icon.addEventListener('click', () => this.togglePasswordFieldVisibility());
    }

    togglePasswordFieldVisibility() {
        if (this.field.type === 'password') {
            this.field.type = 'text';
            this.icon.innerHTML = '<i class="bi bi-eye-fill" style="color: #d87093;"></i>';
        } else {
            this.field.type = 'password';
            this.icon.innerHTML = '<i class="bi bi-eye-slash-fill" style="color: #d87093;"></i>';
        }
    }
}

class PasswordUI {
    constructor(passwordFieldId, eyeIconId, passwordFieldId2, eyeIconId2) {
        this.passwordField = document.getElementById(passwordFieldId);
        this.eyeIcon = document.getElementById(eyeIconId);

        this.passwordField2 = document.getElementById(passwordFieldId2);
        this.eyeIcon2 = document.getElementById(eyeIconId2);
    }

    init() {
        const passwordToggle = new PasswordToggle(this.passwordField, this.eyeIcon);
        const passwordToggle2 = new PasswordToggle(this.passwordField2, this.eyeIcon2);
    }
}

// Usage
document.addEventListener('DOMContentLoaded', function () {
    const passwordUI = new PasswordUI('password', 'eye', 'password2', 'eyeConfirm');
    passwordUI.init();
});
