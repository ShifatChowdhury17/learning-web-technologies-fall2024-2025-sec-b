
        function validateForm() {
            var blockNo = document.forms["blockDetail'sForm"]["block_no"].value;
            var data = document.forms["blockDetail'sForm"]["data"].value;

            if (blockNo == "" || data == "") {
                alert("All fields must be filled out");
                return false;
            }
            return true;
        }
