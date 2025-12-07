import './bootstrap';
document.addEventListener("DOMContentLoaded", () => {
    const themeSwitch = document.getElementById("themeSwitch");
    const themeIcon = document.getElementById("themeIcon");

    if (!themeSwitch || !themeIcon) return;

    // Load saved theme
    let savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        document.body.classList.add("dark-theme");
        themeIcon.classList.replace("fa-moon", "fa-sun");
    }

    // Toggle theme
    themeSwitch.addEventListener("click", () => {
        document.body.classList.toggle("dark-theme");

        if (document.body.classList.contains("dark-theme")) {
            localStorage.setItem("theme", "dark");
            themeIcon.classList.replace("fa-moon", "fa-sun");
        } else {
            localStorage.setItem("theme", "light");
            themeIcon.classList.replace("fa-sun", "fa-moon");
        }
    });
});

