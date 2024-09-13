$(document).ready(() => {

    $('#calcular-costo').submit( function(e) {

        e.preventDefault()
        let dataForm = $(this).serialize();

        $.post('processForm.php', dataForm).done((response) => {

            console.log('Respuesta: ', response);
            const responseObject = JSON.parse(response);

            console.log('Monto: ', responseObject.monto);
            console.log('Propina: ', responseObject.propina);
            
            // Process data
            
            let totalPropina = (responseObject.monto * responseObject.propina) / 100;
            console.log('Propina: ', totalPropina);
            
            let totalCuenta = (responseObject.monto + totalPropina);
            console.log('Total: ', totalCuenta);
            
            $('.response').text(`
                El monto neto de su cuenta es ${responseObject.monto}
                El porcentaje de su propina es de ${responseObject.propina}%
                es equivalente a ${totalPropina} del valor de su cuenta.
                El monto total a abonar es de ${totalCuenta}.
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