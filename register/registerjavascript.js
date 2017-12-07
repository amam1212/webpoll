var myInput = document.getElementById("txtPassword");
var rePasswordInput = document.getElementById("txtRepassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var repasswordtext = document.getElementById("repasswordtext");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

rePasswordInput.onfocus = function() {
    document.getElementById("checkPassword").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
rePasswordInput.onblur = function() {
    document.getElementById("checkPassword").style.display = "none";
}

// When the user starts to type something inside the password field

rePasswordInput.onkeyup = function () {

    if(rePasswordInput.value == myInput.value){
        console.log(rePasswordInput.value);
        console.log(myInput.value);
        repasswordtext.classList.remove("invalid");
        repasswordtext.classList.add("valid");
    }
    else{
        repasswordtext.classList.remove("valid");
        repasswordtext.classList.add("invalid");
    }

}

myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }