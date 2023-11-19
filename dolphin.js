document.addEventListener("DOMContentLoaded", function() {

    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); //Prevent default action

        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        //Sanitize input for increased security
        const saniEmail = sanitizeInput(emailInput.value);
        const saniPassword = sanitizeInput(passwordInput.value);

        //Create XMLHttpRequest object and open a GET request for php
        const req = new XMLHttpRequest();
        let link = `dolphin.php?email=${saniEmail}&password=${saniPassword}`;
        
        req.open("GET", link, true);

        //Set onload event handler
        req.onload = function() {
            //If request is successfull
            if (req.status === 200) {
                //Get response text
                if (req.responseText === "Login successful!") {
                    //Redirect to dashboard on sucessfull login
                    window.location.href = 'dash.html';
                } else {
                    console.log(req.responseText);
                }
            }
        };
        //Send request
        req.send();
    });

    //Function to sanitize user input - Alphanumeric and whitespace only
    function sanitizeInput(input) {
        return input.replace(/[^a-zA-Z0-9\s]/g, '').trim();
    }
});
