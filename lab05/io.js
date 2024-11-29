/**
 * Author: M Anzor Yousuf (Student ID: 102849043)
 * Target: clickme.html
 * Purpose: Dynamic User Interaction
 * Created: 01/09/2024
 * Last updated: 01/09/2024
 */

"use strict"; // Prevents creation of global variables in functions

// This function is called when the browser window loads
// It will register functions that will respond to browser events
function init() {
    var clickButton = document.getElementById("clickme");
    clickButton.onclick = promptName;  // Register event handler

    var heading = document.querySelector('h1');
    heading.onclick = writeNewMessage;  // Register event handler for <h1> element
}

// Display a prompt and alert
function promptName() {
    var userName = prompt("Please enter your name:", "Your name here");
    if (userName) {
        alert("Hello, " + userName + "!");
        rewriteParagraph(userName);
    }
}

// Change the content of the paragraph
function rewriteParagraph(userName) {
    var message = document.getElementById("message");
    message.innerHTML = "Welcome, " + userName + "!";
}

// Write a new message in a span element
function writeNewMessage() {
    var spanElement = document.getElementById("newMessage");
    spanElement.textContent = "You have now finished Task 1!";
}

// Run init function when window loads
window.onload = init;
