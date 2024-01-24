function fillModalForm(event) {
    // Get the button that has the event listener
    // var button = event.currentTarget;
    var button = event.relatedTarget;
    // var button = this;

    // Get the data attributes of the button
    var name = button.getAttribute("data-te-name");
    var code = button.getAttribute("data-te-code");
    var credit_point = button.getAttribute("data-te-cp");
    var course_nature = button.getAttribute("data-te-cn");
    var specialty = button.getAttribute("data-te-specialty");
    var level = button.getAttribute("data-te-level");
    var semester = button.getAttribute("data-te-semester");
    
    if (name) {
        // Do something if the value is not empty
        console.log("The value is " + name);
    } else {
        // Do something else if the value is empty
        console.log("The value is empty");
    }

    // Get the input fields of the modal form
    var inputName = document.getElementById("name");
    var inputCode = document.getElementById("code");
    var inputCredit_point = document.getElementById("credit_point");
    var inputCourse_nature = document.getElementById("course_nature");
    var specialty = document.getElementById("specialty");
    var level = document.getElementById("level");
    var semester = document.getElementById("semester");

    // Assign the data attributes to the input fields
    inputName.value = name;
}
// Get the modal element
var modal = document.getElementById("updateModal");
// Add an event listener to the modal
modal.addEventListener("show.te.modal", fillModalForm);


// function fillModalForm(event) {
//     // Get the button that triggered the event
//     var button = event.target;
//     // Get the data attributes of the button
//     var name = button.getAttribute("data-te-name");

//     if (name) {
//         // Do something if the value is not empty
//         console.log("The value is " + name);
//     } else {
//         // Do something else if the value is empty
//         console.log("The value is empty");
//     }

//     // Get the input fields of the modal form
//     var inputName = document.getElementById("name");

//     // Assign the data attributes to the input fields
//     inputName.value = name;
// }

// // Get the button that triggered the modal
// var button = document.getElementById("btnModal");
// // Add an event listener to the button
// button.addEventListener("click", fillModalForm);



// function fillModalForm() {
//     // Get the button that triggered the modal
//     var button = event.target;
//     // Get the data attributes of the button
//     var name = button.getAttribute("data-name");

//     if (name) {
//         // Do something if the value is not empty
//         console.log("The value is " + name);
//     } else {
//         // Do something else if the value is empty
//         console.log("The value is empty");
//     }

//     // Get the input fields of the modal form
//     var inputName = document.getElementById("name");

//     // Assign the data attributes to the input fields
//     inputName.value = name;
// }
// // Get the button that triggered the modal
// var button = event.target;
// // Add an event listener to the button
// button.addEventListener("click", fillModalForm);
// Get the modal element
// var modal = document.getElementById("updateModal");
// Add an event listener to the modal
// modal.addEventListener("show.bs.modal", fillModalForm);

// Use the click event instead of the show.bs.modal event
// var modal = document.getElementById("updateModal");
// modal.addEventListener("click", fillModalForm);


// function updateModel() {
//     // Prevent the default form submission
//     event.preventDefault();
//     // Get the input fields of the modal form
//     var inputName = document.getElementById("name");

//     // Create an object to store the data
//     var data = {
//         name: inputName.value,
//     };
//     // Create an AJAX request object
//     var xhr = new XMLHttpRequest();
//     // Set the request method and the controller URL
//     xhr.open("POST", "/ue/update");
//     // Set the request headers
//     xhr.setRequestHeader("Content-Type", "application/json");
//     xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
//     // Set the request callback function
//     xhr.onreadystatechange = function () {
//         // Check if the request is completed and successful
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             // Parse the response JSON
//             var response = JSON.parse(xhr.responseText);
//             // Check if the response has a message
//             if (response.message) {
//                 // Display the message
//                 alert(response.message);
//             }
//         }
//     };
//     // Send the request with the data
//     xhr.send(JSON.stringify(data));
// }
// // Get the modal form element
// var form = document.getElementById("updateForm");
// // Add an event listener to the form
// form.addEventListener("submit", updateModel);
