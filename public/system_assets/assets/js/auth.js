document.addEventListener("DOMContentLoaded", function () {
    // Dark Mode Toggle
    const themeToggle = document.getElementById("themeToggle");
    const html = document.documentElement;
    const currentTheme = localStorage.getItem("theme") || "light";
    if (currentTheme === "dark") html.classList.add("dark");
    themeToggle.addEventListener("click", () => {
        html.classList.toggle("dark");
        localStorage.setItem(
            "theme",
            html.classList.contains("dark") ? "dark" : "light"
        );
    });

    // Auto-check every 1 minute
    setInterval(function () {
        fetch(window.location.href, {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        }).then(response => {
            // 419 means session expired → reload page
            if (response.status === 419) {
                window.location.reload();
            }
        }).catch(() => {});
    }, 60000); // check every 60 seconds
});
