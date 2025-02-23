document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contactForm").addEventListener("submit", function (e) {
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let message = document.getElementById("message").value.trim();
        let honeypot = document.getElementById("honeypot").value.trim();
        let errorMessage = "";

        if (honeypot !== "") {
            e.preventDefault();
            return; // Stop spam bots
        }

        if (name === "" || email === "" || message === "") {
            errorMessage = "All fields are required.";
        } else if (!/^[a-zA-Z ]+$/.test(name)) {
            errorMessage = "Name should contain only letters.";
        } else if (!/^\S+@\S+\.\S+$/.test(email)) {
            errorMessage = "Invalid email format.";
        }

        if (errorMessage) {
            e.preventDefault();
            document.getElementById("formMessage").textContent = errorMessage;
            document.getElementById("formMessage").style.color = "red";
        }
    });
});
