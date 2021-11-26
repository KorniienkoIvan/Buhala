var $ = jQuery;

document.getElementById('burger').onclick = function() {
    document.getElementById('burger').classList.toggle('active');
    document.getElementById('header-nav').classList.toggle('active');
}


$(document).ready(function() {
    $('.orderby').select2({
    });
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});