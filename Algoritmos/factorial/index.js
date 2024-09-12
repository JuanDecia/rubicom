$(document).ready(() => {

    $('#factorial-form').submit(function(e) {

        e.preventDefault();

        let formData = $(this).serialize();

        $.post('processForm.php', formData).done((response) => {

            console.log('Respuesta: ', response);

            const responseObject = JSON.parse(response);

            const isFactorial = (number) => {
                let result = 1;
                for (let i = 2; i <= number; i++) {
                    result *= i;
                }

                return result;
            }

            console.log('Numero usuario: ', responseObject.userNumber);
            console.log('Factorial del número: ', isFactorial(responseObject.userNumber));

            $('.response').text(`
                El factorial de ${responseObject.userNumber}
                es: ${isFactorial(responseObject.userNumber)}
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