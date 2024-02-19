function fillModalForm(event) {
    // Get the button that has the event listener
    // var button = event.currentTarget;
    var button = event.relatedTarget;
    // var button = this;

    // Get the data attributes of the button
    var id = button.getAttribute("data-te-id");
    var name = button.getAttribute("data-te-name");
    var code = button.getAttribute("data-te-code");
    var credit_point = button.getAttribute("data-te-cp");
    var course_nature = button.getAttribute("data-te-cn");
    var specialty = button.getAttribute("data-te-specialty");
    var level = button.getAttribute("data-te-level");
    var semester = button.getAttribute("data-te-semester");

    //student
    var email = button.getAttribute("data-te-email");
    var phone = button.getAttribute("data-te-phone");
    var pob = button.getAttribute("data-te-pob");
    var dob = button.getAttribute("data-te-dob");

    if (id) {
        // Do something if the value is not empty
        console.log("The value is " + id);
        console.log(email);
    } else {
        // Do something else if the value is empty
        console.log("The value is empty");
    }

    // Get the input fields of the modal form
    var inputId = document.getElementById("id");
    var inputName = document.getElementById("name");
    var inputCode = document.getElementById("code");
    var inputCredit_point = document.getElementById("credit_point");
    var inputCourse_nature = document.getElementById("course_nature");
    var inputSpecialty = document.getElementById("specialty");
    var inputLevel = document.getElementById("level");
    var inputSemester = document.getElementById("semester");

    //student
    var inputEmail = document.getElementById("email");
    var inputPhone = document.getElementById("phone");
    var inputPob = document.getElementById("pob");
    var inputDob = document.getElementById("dob");

    // Assign the data attributes to the input fields
    inputId.value = id;
    inputName.value = name;
    if (code) {
        inputCode.value = code;
        inputCredit_point.value = credit_point;
        inputCourse_nature.value = course_nature;
        inputSpecialty.value = specialty;
        inputLevel.value = level;
        inputSemester.value = semester;
    }


    //student
    inputEmail.value = email;
    inputPhone.value = phone;
    inputPob.value = pob;
    inputDob.value = dob;

    if (id) {
        // Do something if the value is not empty
        console.log("The value is " + id);
        console.log(email);
    } else {
        // Do something else if the value is empty
        console.log("The value is empty");
    }
}
// Get the modal element
var modal = document.getElementById("updateModal");
// Add an event listener to the modal
modal.addEventListener("show.te.modal", fillModalForm);


// function updateModel(event) {
//     // Prevent the default form submission
//     event.preventDefault();
//     // Get the input fields of the modal form
//     var inputId = document.getElementById("id");
//     var inputName = document.getElementById("name");
//     var inputCode = document.getElementById("code");
//     var inputCredit_point = document.getElementById("credit_point");
//     var inputCourse_nature = document.getElementById("course_nature");
//     var inputSpecialty = document.getElementById("specialty");
//     var inputLevel = document.getElementById("level");
//     var inputSemester = document.getElementById("semester");
//     var inputDescription = document.getElementById("description");

//     // Create an object to store the data
//     var data = {
//         id: inputId,
//         name: inputName.value,
//         code: inputCode.value,
//         credit_point: inputCredit_point.value,
//         course_nature: inputCourse_nature.value,
//         specialty: inputSpecialty.value,
//         semester: inputSemester.value,
//         level: inputLevel.value,
//         description: inputDescription.value,
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
