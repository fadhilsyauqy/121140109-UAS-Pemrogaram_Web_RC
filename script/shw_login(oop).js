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
    constructor(passwordFieldId, eyeIconId) {
        this.passwordField = document.getElementById(passwordFieldId);
        this.eyeIcon = document.getElementById(eyeIconId);
    }

    init() {
        const passwordToggle = new PasswordToggle(this.passwordField, this.eyeIcon);
    }
}

// Usage
document.addEventListener('DOMContentLoaded', function () {
    const passwordUI = new PasswordUI('password', 'eye');
    passwordUI.init();
});
