$(document).ready(() => {
    $('#searchNumber-form').submit(function(e) {
        e.preventDefault();

        let formData = $(this).serialize();

        $.post('processForm.php', formData).done((response) => {

            console.log('Respuesta recibida: ', response);

            const responseObject = JSON.parse(response);

            console.log('Numero ingresado: ', responseObject.userNumber);

            let numberArray = [...Array(10).keys()].map(i => i + 1);

            let index = numberArray.indexOf(responseObject.userNumber);

            console.log('Indice encontrado: ', index);
            $('.response').text('El número ' + responseObject.userNumber + ' se encuentra en la posición: ' + index);

        }).fail((response) => {
            
            console.log(response);
            const responseObject = JSON.parse(response.responseText);

            $('.response').text('Error. ' + responseObject.errorMsg);

        }).always(() => {

            $('.cont-response').removeClass('d-none').hide().fadeIn();

        });


    })
})