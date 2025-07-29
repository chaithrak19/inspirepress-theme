window.onload = () => {
    // ✅ Scroll to Top Button Logic
    const scrollBtn = document.getElementById("scrollTopBtn");
    if (scrollBtn) {
        window.onscroll = () => {
            scrollBtn.style.display = (window.scrollY > 300) ? "block" : "none";
        };

        scrollBtn.onclick = () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        };
    }

    // ✅ Dark Mode Toggle Logic
    const darkBtn = document.getElementById("darkModeToggle");
    if (darkBtn) {
        darkBtn.onclick = () => {
            document.body.classList.toggle("dark-mode");
            localStorage.setItem(
                "theme",
                document.body.classList.contains("dark-mode") ? "dark" : "light"
            );
        };
    }

    // ✅ Load saved theme
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
    }

    // ✅ Page Reveal Door Animation
    const pageReveal = document.querySelector(".page-reveal");
    if (pageReveal) {
        setTimeout(() => {
            pageReveal.classList.add("revealed");
        }, 200); // Delay adds a smooth entrance effect
    }
};
