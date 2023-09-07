const page = document.querySelector('.page');
const themeButton = document.querySelector('.toggle');

if (localStorage.getItem('style') == 'dark') {
    page.classList.toggle('dark-theme');
    page.classList.toggle('light-theme');
} 

themeButton.onclick = function (){
    page.classList.toggle('dark-theme');
    page.classList.toggle('light-theme');
    if (document.body.getAttribute('class') == 'page dark-theme') {
        localStorage.setItem('style', 'dark');
    } else {
        localStorage.setItem('style', 'light');
    }
}

