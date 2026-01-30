//=============================Back Button=========================================================================

document.addEventListener("DOMContentLoaded", function(){
    const backBtn = document.getElementById("backArrow");

    if(backBtn){
        backBtn.addEventListener("click", function(){
            if(window.history.length > 1){
                window.history.back();
            }else{
                window.location.href = "home.php";
            }
        });
    }
});

// ========================== REGISTER ===================================================================================

const registerForm = document.getElementById("register-form");

if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const name = document.getElementById("register-name");
        const lastname = document.getElementById("register-lastname");
        const email = document.getElementById("register-email");
        const number = document.getElementById("register-number");
        const password = document.getElementById("register-password");
        const confirmPassword = document.getElementById("register-confirmPassword");

        const nameRegex = /^[a-zA-Z0-9._-]{3,20}$/;
        const lastnameRegex = /^[a-zA-Z0-9._-]{3,20}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
        const numberRegex = /^(?:$|(?:\+383[- ]?44[- ]?\d{3}[- ]?\d{3}|044[- ]?\d{3}[- ]?\d{3}))$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

        const nameError = document.getElementById('nameError');
        const lastNameError = document.getElementById('lastNameError');
        const emailError = document.getElementById('emailError');
        const numberError = document.getElementById('numberError');
        const passwordError = document.getElementById('passwordError');
        const confirmError = document.getElementById('confirmError');
        const formSuccess = document.getElementById('formSuccess');

        function clearErrors() {
            [nameError, lastNameError, emailError, numberError, passwordError, confirmError, formSuccess].forEach(el => el.textContent = "");
        }

        function validateRegister() {
            let valid = true;
            clearErrors();

            if (!nameRegex.test(name.value.trim())) {
                nameError.textContent = "Invalid name (3-20 characters).";
                valid = false;
            }
            if (!lastnameRegex.test(lastname.value.trim())) {
                lastNameError.textContent = "Invalid lastname (3-20 characters).";
                valid = false;
            }
            if (!emailRegex.test(email.value.trim())) {
                emailError.textContent = "Invalid email address!";
                valid = false;
            }
            if(!numberRegex.test(number.value.trim())){
                numberError.textContent = "Invalid phone number!";
                valid = false;
            }
            if (!passwordRegex.test(password.value.trim())) {
                passwordError.textContent = "Invalid password! (0-9, Az, $..)";
                valid = false;
            }
            if (confirmPassword.value === "" || password.value !== confirmPassword.value) {
                confirmError.textContent = "Passwords do not match.";
                valid = false;
            }
            return valid;

        }

        if (validateRegister()) {
            registerForm.submit();
        }
    });

}

// =============================================== LOGIN ==============================================================

const loginForm = document.getElementById("login-form");

if (loginForm) {
    const email = document.getElementById("login-email");
    const password = document.getElementById("login-password");

    const emailError = document.getElementById("loginEmailError"); //loginEmailError
    const passwordError = document.getElementById("loginPasswordError");

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

    function clearErrors() {
        [emailError, passwordError].forEach(el => el.textContent = "");
    }

    function validateLogin() {
        let valid = true;
        clearErrors();

        if (!emailRegex.test(email.value.trim())) {
            emailError.textContent = "Invalid email.";
            valid = false;
        }

        if (!passwordRegex.test(password.value)) {
            passwordError.textContent = "Invalid password! (0-9, Az, $..)";
            valid = false;
        }

        return valid;
    }

    loginForm.addEventListener("submit", (e) => {
        e.preventDefault();

        if (validateLogin()) {
            loginForm.submit();
        }
    });
}

// ==================================== CONTACT ==================================================================

const inputs = document.getElementById("inputs");

if (inputs) {
    const name = document.getElementById("contact-name");
    const lastname = document.getElementById("contact-lastname");
    const email = document.getElementById("contact-email");
    const city = document.getElementById("selectCity");
    const message = document.getElementById("message");

    const emailError = document.getElementById("contactEmailError");
    const cityError = document.getElementById("cityError");
    const msgError = document.getElementById("msgError");
    const success = document.getElementById("msgSuccess");

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

    inputs.addEventListener("submit", (e) => {
        e.preventDefault();

        [emailError, cityError, msgError, success].forEach(el => el.textContent = "");

        if (!emailRegex.test(email.value.trim())) {
            emailError.textContent = "Invalid email.";
            return;
        }

        if (!city.value) {
            cityError.textContent = "Please select a city.";
            return;
        }

        if (message.value.trim().length < 10) {
            msgError.textContent = "Message must be at least 10 characters.";
            return;
        }

        success.textContent = "Message sent successfully!";
        inputs.reset();
    });
}

//-------------------------------Hamburger Menu-------------------------------------------------------------------------------------

const hamburger = document.getElementById("hamburger");
const links = document.querySelector(".links");
const rightSide = document.querySelector(".right-side");

if(hamburger && links && rightSide){
    hamburger.addEventListener("click", () => {
        links.classList.toggle("active");
        rightSide.classList.toggle("active");
    });
}

//---------------------------------Suggestions box--------------------------------------------------------------------

const searchBar = document.getElementById("searchBar");
const suggestionsBox = document.getElementById("searchSuggestions");

if(searchBar && suggestionsBox){
    const siteSearchIndex = [
        { id: "whoCanDonate", page:"home.php", title: "Who Can Donate Blood" },
        { id: "donationProcess", page:"home.php", title: "The donation Process & What to Expect" },
        { id: "preparation", page:"home.php", title: "Preparation" },
        { id: "procedure", page:"home.php", title: "The procedure" },
        { id: "postDonation", page:"home.php", title: "Post Donation Care" },
        { id: "bloodTypes", page:"home.php", title: "Blood Types" },
        { id: "address", page:"home.php", title: "Address" },
        { id: "ourStory", page: "aboutUs.php", title: "Our Story"},
        { id: "founders", page: "aboutUs.php", title: "The Founders"},
        { id: "staff", page: "aboutUs.php", title: "Medical Staff"},
        { id: "doctors", page: "aboutUs.php", title: "Doctors"},
        { id: "nurses", page: "aboutUs.php", title: "Nurses"},
        { id: "comments", page: "aboutUs.php", title: "Comments"},
        { id: "usNow", page: "aboutUs.php", title: "Where We Are Now"},
        { id: "prishtine", page: "our-locations.php", title: "Prishtine"},
        { id: "mitrovice", page: "our-locations.php", title: "Mitrovice"},
        { id: "peje", page: "our-locations.php", title: "Peje"},
        { id: "prizren", page: "our-locations.php", title: "Prizren"},
        { id: "ferizaj", page: "our-locations.php", title: "Ferizaj"},
        { id: "gjilan", page: "our-locations.php", title: "Gjilan"},
        { id: "gjakove", page: "our-locations.php", title: "Gjakove"}
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