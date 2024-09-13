$(document).ready(() => {

    $('#currency-form').submit( function(e) {

        e.preventDefault()
        let dataForm = $(this).serialize();

        $.post('processForm.php', dataForm).done((response) => {

            console.log('Respuesta: ', response);
            const responseObject = JSON.parse(response);

            console.log('Monto: ', responseObject.monto);
            console.log('Origen: ', responseObject.origen);
            console.log('Destino: ', responseObject.destino);
        
            // Process data

            let monto;
            monto = responseObject.monto;

            let origen;
            origen = responseObject.origen;

            let destino;
            destino = responseObject.destino;
            
            let tasasCambio = {
                "USD": 1.00,    // Dólar Estadounidense
                "EUR": 0.85,    // Euro
                "GBP": 0.75,    // Libra Esterlina
                "JPY": 110.00,  // Yen Japonés
                "ARS": 350.00   // Peso Argentino
            };
            
            let montoConvertido = (monto / tasasCambio[origen]) * tasasCambio[destino];

            console.log('Monto convertido: ', montoConvertido);
            

            $('.response').text(`
                Monto a convertir: ${responseObject.monto} ${responseObject.origen}
                a ${responseObject.destino}.
                El total de su conversión es: ${montoConvertido}.
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