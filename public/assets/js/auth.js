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
