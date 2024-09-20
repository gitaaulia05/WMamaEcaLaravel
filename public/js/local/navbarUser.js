
const hamburger = document.getElementById('hamburger-click');
const nav = document.getElementById('navbar');
const main = document.getElementById('main');
const footer = document.getElementById('footer-start');
const li = document.querySelectorAll('.li');
li.forEach(item => {
    item.addEventListener('click', () => {
        document.querySelector('.font-semibold')?.classList.remove('font-semibold');
        item.classList.add('font-semibold');
    });
  });

function closeMenu(){
    nav.classList.toggle('hidden');
    main.classList.remove("opacity-50");
   footer.classList.remove("opacity-50");
}

hamburger.addEventListener('click', ()=>{
   hamburger.classList.toggle("flip");
   navbar.classList.toggle("hidden");
   main.classList.toggle("opacity-50");
   footer.classList.toggle("opacity-50");

   li.forEach(item => {
    item.addEventListener('click', closeMenu);
  });

});




document.addEventListener("DOMContentLoaded", function() {
const links = document.querySelectorAll('.tab-link');
const contents= document.querySelectorAll('.pro-slider-desain-content, .pro-slider-app hidden');

links.forEach(link =>{
    link.addEventListener('click', function(event) {
        event.preventDefault();
  
    contents.forEach(content=>{
        content.classList.add('hidden');
    });
    const targetContent = document.getElementById(link.getAttribute('data-target'));
    if (targetContent) {
    targetContent.classList.remove('hidden');   
    }
    });
});
});