$(document).ready(() => {

    $('#sequence-form').submit( function(e) {

        e.preventDefault();
        let formData = $(this).serialize();

        $.post('processForm.php', formData).done((response) => {

            console.log(response);
            const objetcResponse = JSON.parse(response);

            console.log('Numero ingresado: ', objetcResponse.userNumber);

            // Data Process

            let sequence = '';
            let alphabetArray = [...'abcdefghijklmnopqrstuvwxyz'];

            for (let i = 0; i < objetcResponse.userNumber; i++) {
                sequence += alphabetArray[i % alphabetArray.length];
            }

            console.log('Secuencia: ', sequence);
            
            $('.response').text(`
                La secuencia del alfabeto hasta el número ${objetcResponse.userNumber}
                es: ${sequence}.
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