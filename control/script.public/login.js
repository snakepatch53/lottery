const $formLogin = document.getElementById("element-form-login");
const $msgLogin = document.getElementById("element-msg-login");

$formLogin.onsubmit = function (event) {
    event.preventDefault();
    const usuario_cedula = this.usuario_cedula.value;
    const usuario_pass = this.usuario_pass.value;
    if (!usuario_cedula) return showMsg("Ingrese el numero de cédula");
    if (!usuario_pass) return showMsg("Ingrese su contraseña");
    const formData = new FormData(this);
    fetch_query(formData, "usuario", "login").then((res) => {
        if (res) return (location.href = root_url);
        showMsg("Credenciales incorrectos o usuario no autorizado!");
    });
};

function showMsg(text) {
    $msgLogin.innerText = text;
    setTimeout(() => {
        $msgLogin.innerText = "";
    }, 2000);
}
