// JavaScript untuk meningkatkan fungsionalitas (opsional)
// Fungsi ini hanya diperlukan jika Anda ingin menambahkan fitur lain seperti tombol kembali ke atas atau pengaturan interaktivitas lain

document.addEventListener("DOMContentLoaded", () => {
    // Menambahkan konfirmasi saat menghapus data
    const deleteLinks = document.querySelectorAll('a[href*="delete"]');
    deleteLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            const confirmDelete = confirm("Apakah Anda yakin ingin menghapus data ini? Proses ini tidak dapat dibatalkan.");
            if (!confirmDelete) {
                event.preventDefault();
            }
        });
    });

    // Highlight menu aktif
    const currentPath = window.location.pathname.split("/").pop();
    const navLinks = document.querySelectorAll("nav a");
    navLinks.forEach(link => {
        if (link.href.includes(currentPath)) {
            link.style.backgroundColor = "#003865";
            link.style.color = "#ffffff";
            link.style.fontWeight = "bold";
        }
    });

    // Tombol kembali ke atas
    const backToTopBtn = document.createElement("button");
    backToTopBtn.innerText = "⬆ Kembali ke Atas";
    backToTopBtn.style.position = "fixed";
    backToTopBtn.style.bottom = "20px";
    backToTopBtn.style.right = "20px";
    backToTopBtn.style.backgroundColor = "#00509e";
    backToTopBtn.style.color = "#fff";
    backToTopBtn.style.border = "none";
    backToTopBtn.style.padding = "10px 15px";
    backToTopBtn.style.borderRadius = "50px";
    backToTopBtn.style.cursor = "pointer";
    backToTopBtn.style.boxShadow = "0px 4px 8px rgba(0, 0, 0, 0.2)";
    backToTopBtn.style.display = "none";
    backToTopBtn.style.zIndex = "1000";

    document.body.appendChild(backToTopBtn);

    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            backToTopBtn.style.display = "block";
        } else {
            backToTopBtn.style.display = "none";
        }
    });

    backToTopBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const togglePasswordIcons = document.querySelectorAll('.toggle-password');

    togglePasswordIcons.forEach((icon) => {
        icon.addEventListener('click', () => {
            const passwordField = icon.previousElementSibling; // Get the span holding the password
            const isHidden = passwordField.textContent.includes('•');

            if (isHidden) {
                // Show password
                passwordField.textContent = icon.dataset.password;
                icon.querySelector('img').src = '../assets/icons/buka.svg'; // Change icon to eye-off
            } else {
                // Hide password
                passwordField.textContent = '•'.repeat(icon.dataset.password.length);
                icon.querySelector('img').src = '../assets/icons/tutup.svg'; // Change icon back to eye
            }
        });
    });
});
