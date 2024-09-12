$(document).ready(() => {

    $('#unity-form').submit( function(e) {

        e.preventDefault();
        let formData = $(this).serialize();

        $.post('processForm.php', formData).done((response) => {

            console.log('Respuesta: ', response);
            const objectResponse = JSON.parse(response);

            console.log("Número ingresado: ", objectResponse.meter);

            // Procesamiento de datos

            let result;
            let text;

            switch (objectResponse.unityConverter) {

                case 'pulgadas':
                    result = (objectResponse.meter * 39.3701).toFixed(2);
                    break;

                case 'centimetros':
                    result = objectResponse.meter * 100;
                    break;

                case 'pies':
                    result = (objectResponse.meter * 3.28084).toFixed(2);
                    break;

                default:
                    result = 0;
                    text = '';
                    break;
            }

            console.log('Metros: ', objectResponse.meter, ' medida: ', objectResponse.unityConverter, '. Resultado: ', result);

            $('.response').text(`
                Se escogió la unidad ${objectResponse.unityConverter} 
                para convertir la cantidad de ${objectResponse.meter} metros. 
                El resultado es: ${result}
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