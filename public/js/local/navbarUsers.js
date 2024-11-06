const hamburger = document.getElementById('ham');
const navLink = document.querySelectorAll('.nav-link');
const header = document.getElementsByClassName('navbar-header');



// BUAT BUKA MENU 
hamburger.onclick= function(){
    navBar = document.querySelector('.nav-list');
  navBar.classList.toggle("active");
}

// BUAT NUTUP LIST NAV
for(let i=0; i<navLink.length; i++){
  navLink[i].addEventListener('click' , () =>{
    navBar.classList.toggle("active");
  })
}

// BUAT BIKIN LIST NAV FOCUS
navLink.forEach(navlink =>{
  navlink.addEventListener('click', () =>{
    document.querySelector(".focus")?.classList.remove("focus");
    navlink.classList.toggle("focus");
  })
});


// START NAVBAR SCROLL

window.onscroll = function(){
    const navbars = document.querySelector('.navbar-header');
    const fixednav = navbars.offsetTop;
    
    // MENAMBAHKAN CLASS NAVBAR-FIXED KETIKA SCROLL
    if(window.pageYOffset > fixednav){
        navbars.classList.add('navbar-fixed');
    }else{
        navbars.classList.remove('navbar-fixed');
    }

    // MENAMBAHKAN CLASS KE LINK FOCUS KETIKA NAVBAR SCROLL

    let currentSection = 'beranda'
    const divSec = document.querySelectorAll('.utama');

    divSec.forEach(divsec =>{
      if(window.scrollY >= divsec.offsetTop){
        currentSection = divsec.id;
      }
    });

    navLink.forEach(navlink =>{
      if(navlink.href.includes(currentSection)) {
        document.querySelector(".focus")?.classList.remove("focus");
        navlink.classList.toggle("focus");
      }
    });
}

// END NAVBAR SCROLL