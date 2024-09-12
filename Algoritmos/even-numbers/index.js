$(document).ready(() => {

    $('#even-form').submit( function(e) {

        e.preventDefault();
        const formData = $(this).serialize();

        $.post('processForm.php', formData).done( (response) => {

            console.log(response);
            const responseObject = JSON.parse(response);

            console.log('Numero ingresado: ', responseObject.userNumber);
            
            // Data process

            const evenSearch = (number) => {
                let evenNumbers = [1];

                for (let i = 0; i < number; i++) {
                    if ( i % 2 == 0) {
                        evenNumbers.push(i);
                    }
                }

                return evenNumbers;
            }
            
            const addEvenNumbers = (evenNumber) => {
                return evenNumber.reduce((total, num) => total + num, 0);
            }

            let getEvenNumbers = evenSearch(responseObject.userNumber);
            let resultAddEvenNumbers = addEvenNumbers(getEvenNumbers);

            console.log(resultAddEvenNumbers);

            $('.response').text(`
                Los pares que están en el número ingresado (${responseObject.userNumber})
                son: ${getEvenNumbers.join(', ')}, 
                la suma de los números pares es: ${addEvenNumbers(getEvenNumbers)}
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