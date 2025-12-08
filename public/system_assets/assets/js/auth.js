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

    function setupPasswordToggle(name) {
        const input = document.getElementById(`${name}_input`);
        const toggle = document.getElementById(`${name}_toggle`);
        const eyeOpen = document.getElementById(`${name}_eyeOpen`);
        const eyeClosed = document.getElementById(`${name}_eyeClosed`);

        if (!input || !toggle) return; // Prevent errors

        toggle.addEventListener('click', () => {
            const newType = input.type === "password" ? "text" : "password";
            input.type = newType;
            eyeOpen.classList.toggle("hidden");
            eyeClosed.classList.toggle("hidden");
        });
    }

    // call for your field
    setupPasswordToggle("password");

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
