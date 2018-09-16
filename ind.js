function injectionSQL() {
    var chaine = "''"
    document.getElementById("user_login").value = chaine;
    document.getElementById("user_pass").value = chaine;
    document.getElementById("user_login1").value = chaine;
    document.getElementById("user_pass1").value = chaine;
}

function failleXSS() {
    var chaine = "'<script>alert('Il y a une faille XSS')</script>'";
    document.getElementById("user_login").value = chaine;
    document.getElementById("user_login1").value = chaine;
}

function bruteForce() {

}