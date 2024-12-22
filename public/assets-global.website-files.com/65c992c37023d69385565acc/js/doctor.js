function showError(message) {
    const errorMessageElement = document.getElementById("error-message");
    errorMessageElement.textContent = message;
    errorMessageElement.classList.add("show");
}

document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent form submission for validation

    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;

    // Simple validation for email and password (replace with actual validation)
    if (email !== "correct@example.com" || password !== "correctpassword") {
        showError("Incorrect email or password.");
    } else {
        // Submit form or handle success
        this.submit();
    }
});
