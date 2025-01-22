function validateForm() {
    var amount = document.getElementById('amount').value;
    var bill_id = document.getElementById('bill_id').value;
    if (amount <= 0) {
        alert('Please enter a valid amount.');
        return false;
    }
    if (bill_id.trim() === "") {
        alert('Please enter a valid bill ID.');
        return false;
    }
    return true;
}