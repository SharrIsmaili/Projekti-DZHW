const slide = document.querySelector('.slide');
const images = document.querySelectorAll('.sliderImg');
const container = document.querySelector('.container');

const nextBtn = document.querySelector('#nextBtn');
const prevBtn = document.querySelector('#prevBtn');

let count = 1;
let size = container.clientWidth;
let autoSlide;

slide.style.transform = 'translateX(' + (-size * count ) +'px)';

function startAutoSlide() {
    autoSlide = setInterval(function(){
        moveNext();
    }, 10000);
}

function resetTimer() {
    clearInterval(autoSlide);
    startAutoSlide();
}

function moveNext(){
    if(count >= images.length - 1) return;
    slide.style.transition = "transform 0.4s ease-in-out";
    count++;
    slide.style.transform = 'translateX(' + (-size * count ) +'px)';
}

function movePrev(){
    if(count <= 0) return;
    slide.style.transition = "transform 0.4s ease-in-out";
    count--;
    slide.style.transform = 'translateX(' + (-size * count ) +'px)';
}

nextBtn.addEventListener('click', function(){
    moveNext();
    resetTimer();
});

prevBtn.addEventListener('click', function(){
    movePrev();
    resetTimer();
});

slide.addEventListener('transitionend', function(){
    if(images[count].id === "last"){
        slide.style.transition = "none";
        count = images.length - 2;
        slide.style.transform = 'translateX(' + (-size * count ) +'px)';
    }

    if(images[count].id === "first"){
        slide.style.transition = "none";
        count = 1;
        slide.style.transform = 'translateX(' + (-size * count ) +'px)';
    }
});

window.addEventListener("resize", function(){
    size = container.clientWidth;
    slide.style.transform = 'translateX(' + (-size * count) + 'px)';
});

startAutoSlide();

function updateMinusHeight(){
    const navHeight = document.querySelector('#header').offsetHeight;
    const aboutHeight = document.querySelector('#aboutUs').offsetHeight;
    
    const minus = navHeight + aboutHeight;

    document.documentElement.style.setProperty('--minus', minus + 'px');
}

updateMinusHeight();

window.addEventListener('load', updateMinusHeight);
window.addEventListener('resize', updateMinusHeight);