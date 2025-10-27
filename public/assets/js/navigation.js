// Navigation Management
class NavigationManager {
    constructor() {
        this.init();
    }

    init() {
        this.setupSubMenuToggles();
        this.setupActiveStates();
        this.setupResponsiveBehavior();
    }

    setupSubMenuToggles() {
        const subMenuToggles = document.querySelectorAll('.sub-menu-toggle');
        
        subMenuToggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                const subMenu = toggle.nextElementSibling;
                const icon = toggle.querySelector('.sub-menu-icon');
                
                if (subMenu) {
                    const isExpanded = subMenu.classList.contains('block');
                    
                    // Close all other sub-menus
                    document.querySelectorAll('.sub-menu').forEach(menu => {
                        menu.classList.add('hidden');
                        menu.classList.remove('block');
                    });
                    
                    // Reset all icons
                    document.querySelectorAll('.sub-menu-icon').forEach(icon => {
                        icon.classList.remove('rotate-180');
                    });
                    
                    // Toggle current sub-menu
                    if (!isExpanded) {
                        subMenu.classList.remove('hidden');
                        subMenu.classList.add('block');
                        icon.classList.add('rotate-180');
                    }
                }
            });
        });
    }

    setupActiveStates() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href && currentPath.includes(href)) {
                // Remove active class from all links
                navLinks.forEach(l => l.classList.remove('bg-blue-50', 'text-blue-600'));
                
                // Add active class to current link
                link.classList.add('bg-blue-50', 'text-blue-600');
                
                // Expand parent sub-menu if it exists
                const subMenu = link.closest('.sub-menu');
                if (subMenu) {
                    const toggle = subMenu.previousElementSibling;
                    const icon = toggle.querySelector('.sub-menu-icon');
                    
                    subMenu.classList.remove('hidden');
                    subMenu.classList.add('block');
                    icon.classList.add('rotate-180');
                }
            }
        });
    }

    setupResponsiveBehavior() {
        // Close sub-menus on mobile when clicking outside
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 1024) {
                const sidebar = document.getElementById('sidebar');
                if (sidebar && !sidebar.contains(e.target)) {
                    document.querySelectorAll('.sub-menu').forEach(menu => {
                        menu.classList.add('hidden');
                        menu.classList.remove('block');
                    });
                    document.querySelectorAll('.sub-menu-icon').forEach(icon => {
                        icon.classList.remove('rotate-180');
                    });
                }
            }
        });
    }
}

// Initialize navigation manager when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new NavigationManager();
});
