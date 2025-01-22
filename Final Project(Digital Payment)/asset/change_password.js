
        function validateEmailForm() {
            let email = document.forms["emailForm"]["email"].value;
            if (email == "") {
                alert("Email must be filled out");
                return false;
            }
            return true;
        }

        function validatePasswordForm() {
            let code = document.forms["passwordForm"]["code"].value;
            let newPassword = document.forms["passwordForm"]["new_password"].value;
            let confirmPassword = document.forms["passwordForm"]["confirm_password"].value;

            if (code == "" || newPassword == "" || confirmPassword == "") {
                alert("All fields must be filled out");
                return false;
            }

            if (newPassword !== confirmPassword) {
                alert("Passwords do not match");
                return false;
            }

            if (newPassword.length < 8 || !/[^a-zA-Z\d]/.test(newPassword)) {
                alert("Password must be at least 8 characters long and contain at least one special character");
                return false;
            }

            return true;
        }
    