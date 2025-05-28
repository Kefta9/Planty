document.addEventListener("DOMContentLoaded", function () {
    const adminLink = document.querySelector('.menu-admin');
    const mobileMenu = document.getElementById('ast-hf-mobile-menu');

    if (adminLink && mobileMenu) {
        const clone = adminLink.cloneNode(true);
        mobileMenu.insertBefore(clone, mobileMenu.children[1]);
    }
});
// This script clones the admin link and inserts it into the mobile menu