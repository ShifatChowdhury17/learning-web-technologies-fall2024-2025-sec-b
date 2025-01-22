function validateForm() {
    var amount = document.getElementById('amount').value;
    if (amount <= 0) {
        alert('Please enter a valid amount.');
        return false;
    }
    return true;
}