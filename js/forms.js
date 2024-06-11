document.addEventListener("DOMContentLoaded", function () {

    var networkSelect = document.getElementById("network");
    var studentIdInput = document.querySelector("#std-id input");
    var studentNrcInput = document.querySelector("#std-nrc input");
    var passwordInput = document.querySelector("#password input");

    var errorText = document.querySelector(".error-text");
    
    
    networkSelect.onchange = function showNrc() {
        var sId = document.querySelector("#std-id");
        var sNrc = document.querySelector("#std-nrc");
        if (networkSelect.value === "fyear") {
            console.log("first year");
            sId.style.display="none";	
            sNrc.style.display="block";
        }
        else{
        sId.style.display="block";	
            sNrc.style.display="none";
        }
        
    }

    document.querySelector("form").addEventListener("submit", function (event) {

        if (networkSelect.value === "") {
            showError("Please select First year or Already enrolled");
            event.preventDefault();
        } 
        else if (networkSelect.value !== "fyear" && studentIdInput.value === ""){
            showError("Please enter Student Id");
            event.preventDefault();
        }
        else if (networkSelect.value === "fyear" && studentNrcInput.value === "") {
            showError("Please enter Student NRC");
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
