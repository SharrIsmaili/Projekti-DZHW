// ===================== REGISTER =====================
const registerForm = document.getElementById("register-form");

if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const name = document.getElementById("name").value.trim();
        const lastname = document.getElementById("lastname").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!name || !lastname || !email || !password) {
            alert("Please fill in all fields.");
            return;
        }

        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return;
        }
        console.log("Register Form Data:", { name, lastname, email, password });
        // registerForm.submit();
    });
}

// ===================== LOGIN =====================
const loginForm = document.getElementById("login-form");

if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!email || !password) {
            alert("Please fill in all fields.");
            return;
        }

        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        if (password.length < 6) {
            alert("Invalid password.");
            return;
        }
        console.log("Login Form Data:", { email, password });
        // loginForm.submit();
    });
}

// ===================== CONTACT =====================
const contactForm = document.getElementById("contact-form");

if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const name = document.getElementById("name").value.trim();
        const lastname = document.getElementById("lastname").value.trim();
        const email = document.getElementById("email").value.trim();
        const city = document.getElementById("selectCity").value;
        const message = document.getElementById("message").value.trim();

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!name || !lastname || !email || !message) {
            alert("Please fill in all fields.");
            return;
        }

        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        if (!city) {
            alert("Please select a city.");
            return;
        }

        if (message.length < 10) {
            alert("Message must be at least 10 characters long.");
            return;
        }

        alert("Message sent successfully!");
        console.log("Contact Form Data:", { name, lastname, email, city, message });
        //  contactForm.reset()
    });
}
