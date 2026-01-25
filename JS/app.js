//-----------------------------Slider-------------------------------------------------------------------------------

const slide = document.querySelector('.slide');
const images = document.querySelectorAll('.sliderImg');
const container = document.querySelector('.container');

const nextBtn = document.querySelector('#nextBtn');
const prevBtn = document.querySelector('#prevBtn');

if (slide && container && images.length) {
    let count = 1;
    let size = container.clientWidth;
    let autoSlide;

    slide.style.transform = 'translateX(' + (-size * count) + 'px)';

    function startAutoSlide() {
        autoSlide = setInterval(function () {
            moveNext();
        }, 10000);
    }

    function resetSliderTimer() {
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
        resetSliderTimer();
    });

    prevBtn.addEventListener('click', function () {
        movePrev();
        resetSliderTimer();
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
}

//----------------------------Search Bar-------------------------------------------------------------------------------

const searchBar = document.getElementById("searchBar");
const suggestionsBox = document.getElementById("searchSuggestions");

if(searchBar && suggestionsBox){
    const siteSearchIndex = [
        { id: "whoCanDonate", page:"home.html", title: "Who Can Donate Blood" },
        { id: "donationProcess", page:"home.html", title: "The donation Process & What to Expect" },
        { id: "preparation", page:"home.html", title: "Preparation" },
        { id: "procedure", page:"home.html", title: "The procedure" },
        { id: "postDonation", page:"home.html", title: "Post Donation Care" },
        { id: "bloodTypes", page:"home.html", title: "Blood Types" },
        { id: "address", page:"home.html", title: "Address" },
        { id: "ourStory", page: "aboutUs.html", title: "Our Story"},
        { id: "founders", page: "aboutUs.html", title: "The Founders"},
        { id: "staff", page: "aboutUs.html", title: "Medical Staff"},
        { id: "doctors", page: "aboutUs.html", title: "Doctors"},
        { id: "nurses", page: "aboutUs.html", title: "Nurses"},
        { id: "comments", page: "aboutUs.html", title: "Comments"},
        { id: "usNow", page: "aboutUs.html", title: "Where We Are Now"},
        { id: "prishtine", page: "our-locations.html", title: "Prishtine"},
        { id: "mitrovice", page: "our-locations.html", title: "Mitrovice"},
        { id: "peje", page: "our-locations.html", title: "Peje"},
        { id: "prizren", page: "our-locations.html", title: "Prizren"},
        { id: "ferizaj", page: "our-locations.html", title: "Ferizaj"},
        { id: "gjilan", page: "our-locations.html", title: "Gjilan"},
        { id: "gjakove", page: "our-locations.html", title: "Gjakove"}
    ];

    searchBar.addEventListener("input", () => {
        const query = searchBar.value.toLowerCase().trim();
        suggestionsBox.innerHTML = "";
        suggestionsBox.style.display = "none";

        if (!query) return;

        const matches = siteSearchIndex.filter(item =>
            item.title.toLowerCase().includes(query)
        );

        if (!matches.length) return;

        suggestionsBox.style.display = "block";

        matches.forEach(match => {
            const div = document.createElement("div");
            div.textContent = match.title;

            div.addEventListener("click", () => {
                goToResult(match);
            });

            suggestionsBox.appendChild(div);
        });
    });

    searchBar.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            const query = searchBar.value.toLowerCase().trim();
            const match = siteSearchIndex.find(item => 
                item.title.toLowerCase().includes(query)
            );

            if (match) {
                goToResult(match);
            } else {
                alert("No results found!");
            }
        }
    });

    function goToResult(result){
        suggestionsBox.style.display = "none";

        let url = result.page;

        if(result.id){
            url += "#" + result.id;
        }

        window.location.href = url;
    }
}

//--------------------------Blood Types Videos--------------------------------------------------------------------------------

const typeButtons = document.querySelectorAll("#bloodTypes .type");
const videos = document.querySelectorAll("#bloodTypes video");

if(typeButtons && videos){
    let autoResetTimer;

    function startAutoReset() {
        autoResetTimer = setTimeout(() => {
            videos.forEach(video => {
                video.pause();
                video.classList.remove("active");
                video.classList.add("hidden");
            });

            const firstVideo = videos[0];

            if(firstVideo){
                firstVideo.classList.remove("hidden");
                firstVideo.classList.add("active");
                firstVideo.currentTime = 0;
                firstVideo.play();
            }
        }, 15000);
    }

    function resetVideoTimer() {
        clearTimeout(autoResetTimer);
        startAutoReset();
    }

    startAutoReset();

    typeButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            resetVideoTimer();

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
}

//----------------------------Read More Button--------------------------------------------------------------------------------

const readMore = document.querySelectorAll(".readMore");

if(readMore){
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
}

//-------------------------------Comments Slider-------------------------------------------------------------------------------------

const carousel = document.querySelector(".carousel");
const arrowBtns = document.querySelectorAll(".buttons");
const firstCard = document.querySelector(".comment");

if(carousel && arrowBtns.length === 0 && firstCard){
    const firstCardWidth = firstCard.offsetWidth + 16;
    let commentPerView = Math.round(carousel.offsetWidth / firstCardWidth);
    
    arrowBtns.forEach(btn =>{
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.id === "previousButton" ? -firstCardWidth : firstCardWidth;
        })
    });
}

//-------------------------------Hamburger Menu-------------------------------------------------------------------------------------

  const hamburger = document.getElementById("hamburger");
  const links = document.querySelector(".links");
  const rightSide = document.querySelector(".right-side")

  hamburger.addEventListener("click", () => {
    links.classList.toggle("active");
    rightSide.classList.toggle("active");
  });
