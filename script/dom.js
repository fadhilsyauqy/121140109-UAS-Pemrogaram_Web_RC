document.addEventListener("DOMContentLoaded", function() {
    // Mendapatkan referensi elemen container
    var container = document.getElementById("myContainer");
    
    // Menambah atau mengubah properti style untuk elemen container
    container.style.display = "flex";
    container.style.justifyContent = "center";
    container.style.alignItems = "center";
    container.style.marginTop = "1.5rem ";
    container.style.marginBottom = "1.5rem";

    // Mendapatkan referensi elemen box
    var box = document.getElementById("myBox");

    // Menambah atau mengubah properti style untuk elemen box
    box.style.width = "60%";
    box.style.border = "1px solid #000";
    box.style.borderRadius = "0.3rem";
    box.style.padding = "1.5rem";
    box.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.3)";
    box.style.backgroundColor = "rgba(217, 112, 147, 0.7)";
});

