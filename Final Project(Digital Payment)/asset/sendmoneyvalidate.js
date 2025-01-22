function validateForm() {
    var amount = document.getElementById('amount').value;
    var recipient_id = document.getElementById('recipient_id').value;
    if (amount <= 0) {
        alert('Please enter a valid amount.');
        return false;
    }
    if (recipient_id.trim() === "") {
        alert('Please enter a valid recipient ID.');
        return false;
    }
    return true;
}