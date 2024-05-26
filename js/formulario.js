const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');


const expresiones = {
    Nombre: /^[a-zA-ZÀ-ÿ]{3,12}$/, // Letras, numeros, guion y guion_bajo
    Apellido: /^[a-zA-ZÀ-ÿ]{3,12}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    password2: /^.{4,12}$/,
    DNI: /^[0-9]{8}/,
    Direccion: /^[a-zA-ZÀ-ÿ\0-9]{4,20}$/,
    Telefono: /^[0-9]{6,10}$/
}
const validarformulario = (e) => {
    switch (e.target.name) {
        case "Nombre":
            ValidarCampo(expresiones.Nombre, e.target, 'Nombre');
            break;
        case "Apellido":
            ValidarCampo(expresiones.Apellido, e.target, 'Apellido');

            break;
        case "password":
            ValidarCampo(expresiones.password, e.target, 'password');
            ValidarPassword2();
            break;
        case "password2":
            ValidarPassword2();
            break;
        case "DNI":
            ValidarCampo(expresiones.DNI, e.target, 'DNI');

            break;
        case "Direccion":
            ValidarCampo(expresiones.Direccion, e.target, 'Direccion');

            break;
        case "Telefono":
            ValidarCampo(expresiones.Telefono, e.target, 'Telefono');
            break;
    }
}


const ValidarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = false;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = true;

    }
}

const ValidarPassword2 = () => {
    const inputPassword1 = document.getElementById('password');
    const inputPassword2 = document.getElementById('password2');

    if(inputPassword1.value !== inputPassword2.value){
        document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[password] = false;
    } else {
        document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[password] = true;

    }
}
const campos = {
    Nombre: false,
    Apellido: false,
    password: false,
    password2: false,
    DNI: false,
    Direccion: false,
}
inputs.forEach((input) => {
    input.addEventListener('keyup', validarformulario);
    input.addEventListener('blur', validarformulario);
});


formulario.addEventListener('submit', (e) => {
    const terminos = document.getElementById('terminos');
    if(campos.Nombre && campos.Apellido && campos.password && campos.password2 && campos.DNI && campos.Direccion && terminos.checked){
        formulario.reset();
        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
        }, 5000);
    
    } else {
    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }
});
