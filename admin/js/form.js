document.addEventListener("DOMContentLoaded", function () {

    var adminInput = document.querySelector("#adm-eml input");
var passwordInput = document.querySelector("#password input");
var errorText = document.querySelector(".error-text");
     
 
     document.querySelector("form").addEventListener("submit", function (event) {
 
          if (adminInput.value == ""){
             showError("Email  cannot be empty");
             event.preventDefault();
         }
         else if (passwordInput.value === "") {
             showError("Please password field cannont be empty!");
             event.preventDefault();
         } 
         else if (!validatePassword(passwordInput.value)) {
             showError("Password must be at least 6-8 characters and include at least one uppercase letter, one lowercase letter, and one digit.");
             event.preventDefault();
         }
         else if (adminInput.value ==="admin@gmail.com" && passwordInput.value === "123456") {
           alert("Login successifully");
           window.location.href="register.html";
        } 
        else{
            alert("Login failed! This could be you entered Wrong Credentials!");
           window.location.href="login.html";
        }
     });
 
     function showError(message) {
         var errorText = document.querySelector(".error-text");
         errorText.innerHTML = "<p>" + message + "</p>";
         errorText.style.display = "block";
     }
 
     function validatePassword(password) {
 
         var passwordRegex = /^[a-zA-Z0-9]{6,8}$/;
         return passwordRegex.test(password);
     }
 });



//  this is for registration form
document.addEventListener("DOMContentLoaded", function () {

    var fNameInput = document.querySelector("#fname input");
    var lNameInput = document.querySelector("#lname input");
    var adminInput = document.querySelector("#adm-eml input");
    var phone = document.querySelector("#phone input");
    var passwordInput = document.querySelector("#password input");
    var errorText = document.querySelector(".error-text");
         
     
         document.querySelector("#btn-id button").addEventListener("submit", function (event) {
     
              if (fNameInput.value == ""){
                 showError("First name cannot be empty");
                 event.preventDefault();
             }
             else if (lNameInput.value == ""){
                showError("Last name  cannot be empty");
                event.preventDefault();
            }
            else if (adminInput.value == ""){
                showError("Email  cannot be empty");
                event.preventDefault();
            }
            else if (phone.value == ""){
                showError("phone  cannot be empty");
                event.preventDefault();
            }
             else if (passwordInput.value === "") {
                 showError("Please password field cannont be empty!");
                 event.preventDefault();
             } 
             else if (!validatePassword(passwordInput.value)) {
                 showError("Password must be at least 6-8 characters and include at least one uppercase letter, one lowercase letter, and one digit.");
                 event.preventDefault();
             }
         });
     
         function showError(message) {
             var errorText = document.querySelector(".error-text");
             errorText.innerHTML = "<p>" + message + "</p>";
             errorText.style.display = "block";
         }
     
         function validatePassword(password) {
     
             var passwordRegex = /^[a-zA-Z0-9]{6,8}$/;
             return passwordRegex.test(password);
         }
     });