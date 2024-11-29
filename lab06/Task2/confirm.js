/**
 * Author: M Anzor Yousuf
 * Target: confirm.html
 * Purpose: Load data from session storage and submit to server
 * Credits: J.R. Tolkein
 */
"use strict";

/* Validate function to check the rules */
function validate() {
	var errMsg = ""; // Stores the error message
	var result = true; // Assumes no errors

	// Add any custom validation rules here

	return result; // If false, the information will not be sent to the server
}

// Function to calculate cost based on trips and party size
function calcCost(trips, partySize) {
	var cost = 0;
	if (trips.includes("1 Day Tour")) cost += 200;
	if (trips.includes("4 Day Tour")) cost += 1500;
	if (trips.includes("10 Day Tour")) cost += 3000;
	return cost * partySize;
}

// Function to get booking details from session storage
function getBooking() {
	var cost = 0;
	if (sessionStorage.firstname != undefined) { // If sessionStorage for firstname is not empty
		// Confirmation text
		document.getElementById("confirm_name").textContent = sessionStorage.firstname + " " + sessionStorage.lastname;
		document.getElementById("confirm_age").textContent = sessionStorage.age;
		document.getElementById("confirm_trip").textContent = sessionStorage.trip;
		document.getElementById("confirm_species").textContent = sessionStorage.species;
		document.getElementById("confirm_food").textContent = sessionStorage.food;
		document.getElementById("confirm_partySize").textContent = sessionStorage.partySize;
		cost = calcCost(sessionStorage.trip, parseInt(sessionStorage.partySize));
		document.getElementById("confirm_cost").textContent = cost;
		
		// Fill hidden fields
		document.getElementById("firstname").value = sessionStorage.firstname;
		document.getElementById("lastname").value = sessionStorage.lastname;
		document.getElementById("age").value = sessionStorage.age;
		document.getElementById("species").value = sessionStorage.species;
		document.getElementById("food").value = sessionStorage.food;
		document.getElementById("partySize").value = sessionStorage.partySize;
		document.getElementById("trip").value = sessionStorage.trip;
		document.getElementById("cost").value = cost;
	}
}

// Function to cancel booking and clear session storage
function cancelBooking() {
	sessionStorage.clear();
	window.location.href = "register.html";
}

function init() {
	var bookForm = document.getElementById("bookform");
	bookForm.onsubmit = validate; // Assigns functions to corresponding events
	document.getElementById("cancelButton").onclick = cancelBooking; // Set event listener for the cancel button

	getBooking(); // Load booking details when the page is loaded
}

window.onload = init;