let count = 0;
let btn = document.getElementById("btn");
let btnp = document.getElementById("btnp");
let disp = document.getElementById("display");

btn.onclick = function () {
    if (count > 1) {
        count--;
    }
    else count = 1;
    disp.innerHTML = count;
}
btnp.onclick = function () {
    if (count => 1) {
        count++;
    }
    disp.innerHTML = count;
}



function myFunctionh() {
    var myLinksh = document.querySelector(".myLinksh");
    myLinksh.style.display = (myLinksh.style.display === "none" || myLinksh.style.display === "") ? "flex" : "none";
    var myLinkshc = document.querySelector(".myLinkshc");
    myLinkshc.style.display = (myLinkshc.style.display === "block" || myLinkshc.style.display === "") ? "none" : "block";
    
}
function mymenu(){
    var menu = document.getElementById("menu");
    menu.style.display = (menu.style.display === "none" || menu.style.display === "") ? "block" : "none";
    var myLinksh = document.querySelector(".myLinksh");
    myLinksh.style.display = (myLinksh.style.display === "none" || myLinksh.style.display === "") ? "flex" : "none";
}
var swiper = new Swiper('.mySwiper', {
    slidesPerView: 3,
    spaceBetween: 10,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
});