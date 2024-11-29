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
    // Prefill the form if data exists in sessionStorage
    prefill_form();
    
    var regForm = document.getElementById("regform");

    // Register the validate() function as the event handler for the form's onsubmit event
    regForm.onsubmit = validate;
}

// Function to validate form inputs
function validate(event) {
    // Prevent the form from submitting by default
    event.preventDefault();

    // Initialize error message variable
    var errMsg = "";

    // Get form input values
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var age = document.getElementById('age').value;
    var species = document.querySelector('input[name="species"]:checked');
    var food = document.getElementById('food').value;
    var partySize = document.getElementById('partySize').value;
    
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

    // Validate species: Ensure a species is selected
    if (species === null) {
        errMsg += "Please select a species.\n";
    }

    // Validate booking: Ensure at least one trip is selected
    if (!document.getElementById("1day").checked &&
        !document.getElementById("4day").checked &&
        !document.getElementById("10day").checked) {
        errMsg += "Please select at least one trip.\n";
    }

    // Validate menu: Ensure a valid menu option is selected
    if (food === "none") {
        errMsg += "Please select a menu preference.\n";
    }

    // Validate number of travelers: Ensure the number is between 1 and 100
    if (!/^\d+$/.test(partySize) || partySize < 1 || partySize > 100) {
        errMsg += "Number of travelers must be between 1 and 100.\n";
    }

    // If there are any error messages, alert them to the user
    if (errMsg !== "") {
        alert(errMsg); 
        return false; 
    }

    // If validation is successful, store the data
    storeBooking();
    alert('Form data saved. Redirecting to confirmation page.');
    window.location.href = "confirm.html"; // Redirect to the confirmation page
    return true;
}

// Function to store form data in session storage
function storeBooking() {
    // Store form data in sessionStorage
    sessionStorage.setItem("firstname", document.getElementById("firstname").value);
    sessionStorage.setItem("lastname", document.getElementById("lastname").value);
    sessionStorage.setItem("age", document.getElementById("age").value);
    sessionStorage.setItem("species", document.querySelector('input[name="species"]:checked').value);
    sessionStorage.setItem("beard", document.getElementById("beard").value);
    sessionStorage.setItem("food", document.getElementById("food").value);
    sessionStorage.setItem("partySize", document.getElementById("partySize").value);
    
    // Store selected trip options
    let trips = [];
    if (document.getElementById("1day").checked) trips.push("1 Day Tour");
    if (document.getElementById("4day").checked) trips.push("4 Day Tour");
    if (document.getElementById("10day").checked) trips.push("10 Day Tour");
    sessionStorage.setItem("trip", trips.join(", "));
}

// Function to prefill the form with data from session storage
function prefill_form() {
    // Check if session data exists and prefill the form
    if (sessionStorage.firstname !== undefined) {
        document.getElementById("firstname").value = sessionStorage.firstname;
        document.getElementById("lastname").value = sessionStorage.lastname;
        document.getElementById("age").value = sessionStorage.age;
        document.getElementById("beard").value = sessionStorage.beard;
        document.getElementById("food").value = sessionStorage.food;
        document.getElementById("partySize").value = sessionStorage.partySize;

        // Prefill the species radio button
        switch (sessionStorage.species) {
            case "Human":
                document.getElementById("human").checked = true;
                break;
            case "Dwarf":
                document.getElementById("dwarf").checked = true;
                break;
            case "Hobbit":
                document.getElementById("hobbit").checked = true;
                break;
            case "Elf":
                document.getElementById("elf").checked = true;
                break;
        }

        // Prefill checkboxes for trips
        let trips = sessionStorage.trip.split(", ");
        trips.forEach(function(trip) {
            switch (trip) {
                case "1 Day Tour":
                    document.getElementById("1day").checked = true;
                    break;
                case "4 Day Tour":
                    document.getElementById("4day").checked = true;
                    break;
                case "10 Day Tour":
                    document.getElementById("10day").checked = true;
                    break;
            }
        });
    }
}

window.onload = init;