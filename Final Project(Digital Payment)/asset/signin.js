
        function validateForm() {
            var email = document.forms["signinForm"]["email"].value;
            var password = document.forms["signinForm"]["password"].value;

            if (email == "" || password == "") {
                alert("All fields must be filled out");
                return false;
            }
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Invalid email format");
                return false;
            }
            return true;
        }
    