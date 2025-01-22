
    function validateForm() {
        var fields = ["view_profile", "edit_profile", "latest_block", "mine_block", "verify_block", "change_profile", "notification"];
        for (var i = 0; i < fields.length; i++) {
            var field = document.forms["dashboardForm"][fields[i]].value;
            if (field == "") {
                alert("All fields must be filled out");
                return false;
            }
        }
        return true;
    }
    