import './bootstrap';

import 'bootstrap';

import './dark_light_mode.js';

let navbar = document.querySelector('#navbar');
let toggle = document.querySelector('#toggle');

window.addEventListener('scroll', ()=>{
    let scrolled = window.scrollY
    if(scrolled > 100){
     navbar.classList.add('navbarScroll');
    }else{
     navbar.classList.remove('navbarScroll');
    }
 });
