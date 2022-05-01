function showAvailability(str) {
    if (str.length == 0) {
        document.getElementById("id-availability-message").innerHTML = "";
        return;
    } 
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var msg = document.getElementById("id-availability-message");
                msg.innerHTML = this.responseText;
                if (msg.innerText == "" || msg.innerText == null) {
                    document.getElementById('submit').disabled = false;
                }
                else {
                    document.getElementById('submit').disabled = true;
                }
            }
        };
        xmlhttp.open("GET", "php_scripts/id_availability_check.php?id=" + str, true);
        xmlhttp.send();
    }
}

function validatePasswordMatch() {
    var passOne = document.getElementById("password");
    var passTwo = document.getElementById("confirm-password");
    var msg = document.getElementById('password-validation-message');
    var submit = document.getElementById('submit');

    if (passOne.value == passTwo.value) {
        msg.className = "text-success";
        msg.innerHTML = "Passwords match.";
        submit.disabled = false;
    }
    else {
        msg.className = "text-danger";
        msg.innerHTML = "Passwords do not match.";
        submit.disabled = true;
    }
}