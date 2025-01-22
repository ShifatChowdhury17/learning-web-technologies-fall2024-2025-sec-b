
        function validateForm() {
            var blockNo = document.forms["mineBlockForm"]["block_no"].value;
            var data = document.forms["mineBlockForm"]["data"].value;

            if (blockNo == "" || data == "") {
                alert("All fields must be filled out");
                return false;
            }
            return true;
        }
    