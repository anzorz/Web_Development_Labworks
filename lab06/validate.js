/**
 * Author: M Anzor Yousuf (Student ID: 102849043)
 * Target: register.html
 * Purpose: This file is for validating form data input by users.
 * Created: 01/09/2024
 * Last updated: 01/09/2024
 */

"use strict"; 

// Function to initialize the form validation
function init() {
    var regForm = document.getElementById("regform");

    // Register the validate() function as the event handler for the form's onsubmit event
    regForm.onsubmit = validate;
}

// Function to validate form inputs
function validate() {
    // Initialize error message variable
    var errMsg = "";

    // Get form input values
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var age = document.getElementById('age').value;

    // Validate first name: not empty and contains only alphabetic characters
    if (!/^[A-Za-z]+$/.test(firstname)) {
        errMsg += "First name must contain only letters.\n";
    }

    // Validate last name: not empty and contains only alphabetic characters or hyphens
    if (!/^[A-Za-z\-]+$/.test(lastname)) {
        errMsg += "Last name must contain only letters or hyphens.\n";
    }

    // Validate age: must be an integer between 18 and 10,000
    if (!/^\d+$/.test(age) || age < 18 || age > 10000) {
        errMsg += "Age must be a number between 18 and 10,000.\n";
    }

    // If there are any error messages, alert them to the user
    if (errMsg !== "") {
        alert(errMsg); 
        return false; 
    }

    // If no errors, proceed with form submission
    return true;
}

window.onload = init;
