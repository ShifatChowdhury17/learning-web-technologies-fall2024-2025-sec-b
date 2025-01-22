
function showHint(str) {
    if(str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
    } else {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
    }
}
function validateForm() 
{
    var fullName = document.forms["signupForm"]["full_name"].value;
    var email = document.forms["signupForm"]["email"].value;
    var mobileNumber = document.forms["signupForm"]["mobile_number"].value;
    var password = document.forms["signupForm"]["password"].value;
    var confirmPassword = document.forms["signupForm"]["confirm_password"].value;
    var accountType = document.forms["signupForm"]["account_type"].value;

    if (fullName == "" || email == "" || mobileNumber == "" || password == "" || confirmPassword == "" || accountType == "") {
        alert("All fields must be filled out");
        return false;
    }
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Invalid email format");
        return false;
    }
    if (password.length < 8 || !/[^a-zA-Z\d]/.test(password)) {
        alert("Invalid password. It must be at least 8 characters long and include at least one special character.");
        return false;
    }
    if (password !== confirmPassword) {
        alert("Passwords do not match. Please re-enter.");
        return false;
    }
    return true;
}
