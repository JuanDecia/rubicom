$(document).ready(() => {

    $('#bill-form').submit(function(e) {

        e.preventDefault();

        let formData = $(this).serialize();

        $.post('processForm.php', formData).done((response) => {

            console.log(response);

            // Se inserta respuesta en el div '.cont-response'
            const responseObject = JSON.parse(response);

            const valorPropina = (responseObject.monto * responseObject.propina) / 100;
            const valorTotal = valorPropina + parseFloat(responseObject.monto);
            
            $('.cont-response').text("El total de su cuenta es: " + valorTotal);
        }).fail((response) =>{
            console.log(response);
            const responseObject = JSON.parse(response.responseText);
            $('.response').text('Error. ' + responseObject.errorMsg); 
        }).always(() => {
            $('.cont-response').fadeIn();
        });
    })
})