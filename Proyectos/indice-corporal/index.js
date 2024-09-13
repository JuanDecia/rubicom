$(document).ready(() => {

    $('#imc-form').submit( function(e) {

        e.preventDefault()
        let dataForm = $(this).serialize();

        $.post('processForm.php', dataForm).done((response) => {

            console.log('Respuesta: ', response);
            const responseObject = JSON.parse(response);

            console.log('Peso: ', responseObject.peso);
            console.log('Altura: ', responseObject.altura);
            
            // Process data
            
            let imc = responseObject.peso / (responseObject.altura * responseObject.altura);
            imc = imc.toFixed(2); // Redondear a 2 decimales

            let categoria = '';
            let barraClase = '';

            if ( imc < 18.5 ) {
                categoria = 'Bajo peso';
                barraClase = 'bg-warning';
            } else if ( imc >= 18.5 && imc <= 24.9 ) {
                categoria = 'Normal';
                barraClase = 'bg-success';
            } else if ( imc >= 25 && imc <= 29.9 ) {
                categoria = 'Sobrepeso';
                barraClase = 'bg-warning';
            } else {
                categoria = 'Obesidad';
                barraClase = 'bg-danger';
            }
            
            $('.response').html(`
                <p>IMC: ${imc}</p>
                <p>Categoría: ${categoria}</p>
                <div class="progress">
                    <div class="progress-bar ${barraClase}" role="progressbar" style="width: ${imc}%" aria-valuenow="${imc}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
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