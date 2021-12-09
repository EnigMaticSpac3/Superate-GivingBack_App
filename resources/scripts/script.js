// Mostrar/Ocultar contraseña
// document.querySelector('.campo span').addEventListener('click', e => {
//     const passwordInput = document.querySelector('#pass');
//     if (e.target.classList.contains('show')) {
//         e.target.classList.remove('show');
//         e.target.textContent = 'Ocultar';
//         passwordInput.type = 'text';
//     } else {
//         e.target.classList.add('show');
//         e.target.textContent = 'Mostrar';
//         passwordInput.type = 'password';
//     }
// });

// document.querySelector('.campo2 span').addEventListener('click', e => {
//     const passwordInput = document.querySelector('#pass2');
//     if (e.target.classList.contains('show')) {
//         e.target.classList.remove('show');
//         e.target.textContent = 'Ocultar';
//         passwordInput.type = 'text';
//     } else {
//         e.target.classList.add('show');
//         e.target.textContent = 'Mostrar';
//         passwordInput.type = 'password';
//     }
// });

// Evalua si la contraseña es debil, media, fuerte y si necesita más carácteres.
$('#pass').keyup(function(e) {
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
    var enoughRegex = new RegExp("(?=.{6,}).*", "g");
    if (false == enoughRegex.test($(this).val())) {
            $('#passstrength').html('Más caracteres.');
    } else if (strongRegex.test($(this).val())) {
            $('#passstrength').className = 'ok';
            $('#passstrength').html('Fuerte!');
    } else if (mediumRegex.test($(this).val())) {
            $('#passstrength').className = 'alert';
            $('#passstrength').html('Media!');
    } else {
            $('#passstrength').className = 'error';
            $('#passstrength').html('Débil!');
    }
    return true;
});

