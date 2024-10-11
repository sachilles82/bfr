document.addEventListener('livewire:load', function () {
    function initThemeToggle() {
        var themeToggleBtn = document.getElementById("theme-toggle");
        if (themeToggleBtn) {
            themeToggleBtn.addEventListener("click", function() {
                document.documentElement.classList.toggle("dark");
                localStorage.theme = document.documentElement.classList.contains("dark") ? "dark" : "light";
            });
        }
    }

    initThemeToggle();

    Livewire.hook('element.updated', function (el, component) {
        initThemeToggle();
    });
});
