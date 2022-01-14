// Trigger Tombol Enter
trigger(document.getElementById("inuser"), "klik");
trigger(document.getElementById("inpass"), "klik");
trigger(document.getElementById("sandi1"), "reset");
trigger(document.getElementById("sandi2"), "reset");

function trigger(input, id) {
    input.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById(id).click();
        }
    });
}

function login() {
    //SIMPAN SANDI DENGAN CHECKBOX
    var username = "Admin";
    var password = "";
    var name = document.getElementById("inuser").value;
    var pass = document.getElementById("inpass").value;
    if (name == username && pass == password) {
        window.location.href = "../dashboard";
    } else if (name == "") {
        document.getElementById("alert").innerHTML = "Silahkan Isi Username !!!";
    } else if (pass == "") {
        document.getElementById("alert").innerHTML = "Silahkan Isi Password !!!";
    } else {
        document.getElementById("alert").innerHTML = "Username Dan Password Salah!!";
    }
}

// FUNGSI MENAMPILKAN PASSWORD KETIKA CHECKBOX TRUE
function show_pass() {
    var x = document.getElementById("inpass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

//FUNGSI RESET USERNAME DAN PASSWORD
function reset() {
    document.getElementById("inuser").value = "";
    document.getElementById("alert").innerHTML = "";
    var x = document.getElementById("save-sandi");
    if (x.checked == true) {
        var sandi = document.getElementById("inpass").value;
    } else {
        document.getElementById("inpass").value = "";
    }
}


// FUNGSI SIMPAN DATA PADA FORM DAFTAR