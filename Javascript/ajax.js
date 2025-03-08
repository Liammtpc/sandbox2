function send() {
    var user = document.getElementById("name").value;
    var pass = document.getElementById("pass").value;
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").textContent = "در حال پردازش...";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let ok = this.responseText;
            console.log(ok);
            if (ok == '1') {
                window.location.assign("panel.php");
            }
            document.getElementById("btn").disabled = false;
            document.getElementById("btn").textContent = "ورود";
        }

    };
    xmlhttp.open("GET", "ajax.php?user=" + user + "&pass=" + pass, true);
    xmlhttp.send();
}