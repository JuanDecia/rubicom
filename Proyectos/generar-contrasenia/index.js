$(document).ready(() => {

    $('#password-form').submit( function(e) {

        e.preventDefault()
        let dataForm = $(this).serialize();

        $.post('processForm.php', dataForm).done((response) => {

            console.log('Respuesta: ', response);
            const responseObject = JSON.parse(response);

            console.log('longitud: ', responseObject.longitud);
            
            // Process data
            
            // Definir los caracteres básicos
            let caracteres = 'abcdefghijklmnopqrstuvwxyz';

            // Agregar mayúsculas si es necesario
            if (responseObject.incluirMayuscula) {
                caracteres += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }

            // Agregar números si es necesario
            if (responseObject.incluirMinuscula) {
                caracteres += '0123456789';
            }

            // Agregar caracteres especiales si es necesario
            if (responseObject.caracteresEspeciales) {
                caracteres += '!@#$%^&*()-_=+[]{}|;:,.<>?';
            }

            // Generar la contraseña
            let password = '';

            for ( let i = 0; i < responseObject.longitud; i++ ) {
                // Generar un índice aleatorio
                const randomIndex = Math.floor(Math.random() * caracteres.length);
                // Seleccionar un carácter al azar
                password += caracteres[randomIndex];
            }

            // Mostrar la contraseña generada
            console.log('Contraseña generada:', password);

            
            $('.response').text(`
                Contraseña generada: ${password}
            `);

        }).fail((response) => {

            console.log(response);
            const responseObject = JSON.parse(response.responseText);

            $('.response').text('Error. ' + responseObject.errorMsg);
            
        }).always(() => {

            $('.cont-response').removeClass('d-none').hide().fadeIn();

        });
    })

})