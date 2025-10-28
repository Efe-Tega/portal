// Sidebar Toggle
const sidebar = document.getElementById("sidebar");
const hamburger = document.getElementById("hamburger");

hamburger.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
});

// Close sidebar when clicking outside on mobile
document.addEventListener("click", (e) => {
    if (window.innerWidth < 768) {
        if (!sidebar.contains(e.target) && !hamburger.contains(e.target)) {
            sidebar.classList.add("-translate-x-full");
        }
    }
});

// Dark Mode Toggle
const themeToggle = document.getElementById("themeToggle");
const htmlElement = document.documentElement;

// Check for saved theme preference or default to 'light' mode
const currentTheme = localStorage.getItem("theme") || "light";
if (currentTheme === "dark") {
    htmlElement.classList.add("dark");
}

themeToggle.addEventListener("click", () => {
    htmlElement.classList.toggle("dark");
    const theme = htmlElement.classList.contains("dark") ? "dark" : "light";
    localStorage.setItem("theme", theme);
});

// Notification Dropdown Toggle
const notificationBtn = document.getElementById("notificationBtn");
const notificationDropdown = document.getElementById("notificationDropdown");

notificationBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    notificationDropdown.classList.toggle("hidden");
    profileDropdown.classList.add("hidden");
});

// Profile Dropdown Toggle
const profileBtn = document.getElementById("profileBtn");
const profileDropdown = document.getElementById("profileDropdown");

profileBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    profileDropdown.classList.toggle("hidden");
    notificationDropdown.classList.add("hidden");
});

// Close dropdowns when clicking outside
document.addEventListener("click", () => {
    notificationDropdown.classList.add("hidden");
    profileDropdown.classList.add("hidden");
});
