document.addEventListener("DOMContentLoaded", function() {
    //Mengambil elemen dengan id "container"
    const container = document.getElementById("container");
    //Menambah properti gaya menggunakan style
    container.style.display = "flex";
    container.style.justifyContent = "center";
    container.style.alignItems = "center";
    container.style.minHeight = "100vh";

    // Mengambil elemen dengan id "login-container"
    const loginContainer = document.getElementById("login-container");
    //Menambah properti gaya untuk border, rounded, dan lainnya
    loginContainer.style.border = "2px solid #d87093";
    loginContainer.style.borderRadius = "0.3rem";
    loginContainer.style.padding = "1.5rem";
    loginContainer.style.backgroundColor = "#fff";
    loginContainer.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.3)";
});
