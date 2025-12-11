//---------slider----------
const slide = document.querySelector('.slide');
const images = document.querySelectorAll('.sliderImg');
const container = document.querySelector('.container');

const nextBtn = document.querySelector('#nextBtn');
const prevBtn = document.querySelector('#prevBtn');

let count = 1;
let size = container.clientWidth;
let autoSlide;

slide.style.transform = 'translateX(' + (-size * count) + 'px)';

function startAutoSlide() {
    autoSlide = setInterval(function () {
        moveNext();
    }, 10000);
}

function resetTimer() {
    clearInterval(autoSlide);
    startAutoSlide();
}

function moveNext() {
    if (count >= images.length - 1) return;
    slide.style.transition = "transform 0.4s ease-in-out";
    count++;
    slide.style.transform = 'translateX(' + (-size * count) + 'px)';
}

function movePrev() {
    if (count <= 0) return;
    slide.style.transition = "transform 0.4s ease-in-out";
    count--;
    slide.style.transform = 'translateX(' + (-size * count) + 'px)';
}

nextBtn.addEventListener('click', function () {
    moveNext();
    resetTimer();
});

prevBtn.addEventListener('click', function () {
    movePrev();
    resetTimer();
});

slide.addEventListener('transitionend', function () {
    if (images[count].id === "last") {
        slide.style.transition = "none";
        count = images.length - 2;
        slide.style.transform = 'translateX(' + (-size * count) + 'px)';
    }

    if (images[count].id === "first") {
        slide.style.transition = "none";
        count = 1;
        slide.style.transform = 'translateX(' + (-size * count) + 'px)';
    }
});

window.addEventListener("resize", function () {
    size = container.clientWidth;
    slide.style.transform = 'translateX(' + (-size * count) + 'px)';
});

startAutoSlide();

function updateMinusHeight() {
    const navHeight = document.querySelector('#header').offsetHeight;
    const aboutHeight = document.querySelector('#aboutUs').offsetHeight;

    const minus = navHeight + aboutHeight;

    document.documentElement.style.setProperty('--minus', minus + 'px');
}

updateMinusHeight();

window.addEventListener('load', updateMinusHeight);
window.addEventListener('resize', updateMinusHeight);

//---------search bar------------

const searchBar = document.getElementById("searchBar");
const suggestionsBox = document.getElementById("searchSuggestions");

const sectionTitles = [
    { id: "whoCanDonate", title: "Who Can Donate Blood" },
    { id: "donationProcess", title: "The donation Process & What to Expect" },
    { id: "preparation", title: "Preparation" },
    { id: "procedure", title: "The procedure" },
    { id: "postDonation", title: "Post Donation Care" },
    { id: "bloodTypes", title: "Blood Types" },
    { id: "address", title: "Address" }
];

searchBar.addEventListener("input", () => {
    const query = searchBar.value.toLowerCase().trim();
    suggestionsBox.innerHTML = "";
    suggestionsBox.style.display = "none";

    if (query.length < 1) return;

    const matches = sectionTitles.filter(item =>
        item.title.toLowerCase().includes(query)
    );

    if (matches.length === 0) return;

    suggestionsBox.style.display = "block";

    matches.forEach(match => {
        const div = document.createElement("div");
        div.textContent = match.title;
        div.addEventListener("click", () => scrollToSection(match.id));
        suggestionsBox.appendChild(div);
    });
});

function scrollToSection(id) {
    suggestionsBox.style.display = "none";
    const section = document.getElementById(id);
    if (!section) return;
    section.scrollIntoView({ behavior: "smooth" });
}

searchBar.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
        const query = searchBar.value.toLowerCase().trim();

        const match = sectionTitles.find(item =>
            item.title.toLowerCase().includes(query)
        );

        if (match) {
            scrollToSection(match.id);
        } else {
            alert("No results found!");
        }
    }
});

//-------blood types videos---------

const typeButtons = document.querySelectorAll("#bloodTypes .type");
const videos = document.querySelectorAll("#bloodTypes video");

let autoResetTimer;

function startAutoReset() {
    autoResetTimer = setTimeout(() => {
        videos.forEach(video => {
            video.pause();
            video.classList.remove("active");
            video.classList.add("hidden");
        });

        const firstVideo = videos[0];
        firstVideo.classList.remove("hidden");
        firstVideo.classList.add("active");
        firstVideo.currentTime = 0;
        firstVideo.play();
    }, 15000);
}

function resetTimer() {
    clearTimeout(autoResetTimer);
    startAutoReset();
}

startAutoReset();

typeButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
        resetTimer();

        videos.forEach(video => {
            video.pause();
            video.classList.remove("active");
            video.classList.add("hidden");
        });

        const selectedVideo = videos[index + 1];
        selectedVideo.currentTime = 0;
        selectedVideo.play();

        selectedVideo.classList.remove("hidden");
        selectedVideo.classList.add("active");
    });
});

//------------------read more button-------------------

const readMore = document.querySelectorAll(".readMore");
readMore.forEach((readMore) => {
    const text = readMore.previousElementSibling;
    text.style.maxHeight = "90px";
    text.style.overflow = "hidden";
    readMore.addEventListener("click", () => {
        if (text.style.maxHeight === "90px") {
            text.style.maxHeight = text.scrollHeight + "px";
            text.style.overflow = "visible";
            readMore.textContent = "Read Less";
            text.style.position = "static";
        } else {
            text.style.maxHeight = "90px"
            text.style.overflow = "hidden";
            readMore.textContent = "Read More";
            text.style.position = "relative";
        }
    });
});