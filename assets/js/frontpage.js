// JavaScript for Front Page Interactivity

document.addEventListener("DOMContentLoaded", () => {
    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll("nav a");
    navLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            const targetId = link.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                event.preventDefault();
                window.scrollTo({
                    top: targetElement.offsetTop - 70,
                    behavior: "smooth",
                });
            }
        });
    });

    // Scroll reveal animation for feature cards
    const featureCards = document.querySelectorAll(".feature-card");
    const revealOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target);
            }
        });
    }, revealOptions);

    featureCards.forEach(card => {
        card.classList.add("hidden");
        revealObserver.observe(card);
    });

    // Add button interactivity
    const heroButton = document.querySelector(".hero button");
    if (heroButton) {
        heroButton.addEventListener("click", () => {
            alert("Selamat Datang di Sistem Informasi Kampus!");
        });
    }
});
