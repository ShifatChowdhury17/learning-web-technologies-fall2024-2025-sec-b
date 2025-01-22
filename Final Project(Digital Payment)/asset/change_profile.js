
        function validateForm() {
            var fullName = document.forms["profileForm"]["full_name"].value;
            var phone = document.forms["profileForm"]["phone"].value;
            var dob = document.forms["profileForm"]["dob"].value;
            var gender = document.forms["profileForm"]["gender"].value;
            var userType = document.forms["profileForm"]["user_type"].value;

            if (fullName == "" || phone == "" || dob == "" || gender == "" || userType == "") {
                alert("All fields must be filled out");
                return false;
            }
            if (!/^\d{10}$/.test(phone)) {
                alert("Phone number must be 10 digits");
                return false;
            }
            return true;
        }
    