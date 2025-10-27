// Theme Management
class ThemeManager {
    constructor() {
        this.currentTheme = localStorage.getItem('theme') || 'light';
        this.init();
    }

    init() {
        this.applyTheme(this.currentTheme);
        this.createThemeToggle();
    }

    applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        this.currentTheme = theme;
    }

    toggleTheme() {
        const newTheme = this.currentTheme === 'light' ? 'dark' : 'light';
        this.applyTheme(newTheme);
        this.updateToggleIcon();
    }

    createThemeToggle() {
        // Create theme toggle button
        const toggleButton = document.createElement('button');
        toggleButton.id = 'themeToggle';
        toggleButton.className = 'p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors';
        toggleButton.innerHTML = this.currentTheme === 'light' ? 
            '<i class="fas fa-moon text-gray-600 dark:text-gray-300 text-xl"></i>' : 
            '<i class="fas fa-sun text-gray-600 dark:text-gray-300 text-xl"></i>';
        
        toggleButton.addEventListener('click', () => this.toggleTheme());
        
        // Add to header
        const header = document.querySelector('header .flex.items-center.justify-between .flex.items-center.space-x-4');
        if (header) {
            header.appendChild(toggleButton);
        }
    }

    updateToggleIcon() {
        const toggleButton = document.getElementById('themeToggle');
        if (toggleButton) {
            toggleButton.innerHTML = this.currentTheme === 'light' ? 
                '<i class="fas fa-moon text-gray-600 dark:text-gray-300 text-xl"></i>' : 
                '<i class="fas fa-sun text-gray-600 dark:text-gray-300 text-xl"></i>';
        }
    }
}

// Initialize theme manager when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new ThemeManager();
});
