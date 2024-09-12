$(document).ready(() => {

    $('#factorial-form').submit( function(e) {

        e.preventDefault();
        let formData = $(this).serialize();

        $.post('processForm.php', formData).done((response) => {

            console.log('Respuesta', response);
            const objetcResponse = JSON.parse(response);

            console.log('Numero Ingresado: ', objetcResponse.userNumber);

            // Data Process

            const esPrimo = (number) => {

                if (number < 2) {
                    return false;
                }

                for (let i = 2; i < number; i++) {
                    if (number % i == 0) {
                        return false;
                    }
                }

                return true;
            }

            if (esPrimo(objetcResponse.userNumber)) {

                console.log('Es primo');

                $('.response').text(`
                    El número ${objetcResponse.userNumber} es primo.
                `)

            } else {

                console.log('No es primo');
                
                $('.response').text(`
                    El número ${objetcResponse.userNumber} es primo.
                `)
            }
        }).fail((response) => {

            console.log(response);
            
            const responseObject = JSON.parse(response.responseText);

            $('.response').text('Error. ' + responseObject.errorMsg);

        }).always(() => {

            $('.cont-response').removeClass('d-none').hide().fadeIn();

        });
    });
});