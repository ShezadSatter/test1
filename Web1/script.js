function toggleMenu() {
    const sideMenu = document.querySelector('.side-menu');
    const menuToggle = document.querySelector('.menu-toggle');
    sideMenu.classList.toggle('show');

    // Toggle event listener for closing the menu
    if (sideMenu.classList.contains('show')) {
        document.addEventListener('click', handleClickOutside);
    } else {
        document.removeEventListener('click', handleClickOutside);
    }

    function handleClickOutside(event) {
        if (!sideMenu.contains(event.target) && !menuToggle.contains(event.target)) {
            sideMenu.classList.remove('show');
            document.removeEventListener('click', handleClickOutside);
        }
    }
}
