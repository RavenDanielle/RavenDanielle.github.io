document.addEventListener('DOMContentLoaded', function () {
    const menuIcon = document.querySelector('.menu-icon');
    const navList = document.querySelector('.nav-list');

    menuIcon.addEventListener('click', function () {
        menuIcon.classList.toggle('active');
        navList.classList.toggle('active');
    });
});
