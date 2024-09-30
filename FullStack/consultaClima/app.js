$(document).ready(function () {

    $('#weatherForm').on('submit', function (e) {
        e.preventDefault();

        let city = $('#city').val();
        if (city) {
            $.ajax({
                url: 'get_weather.php',
                method: 'POST',
                data: { city: city },
                success: function (response) {
                    let data = JSON.parse(response);
                    if (data.cod === 200) {
                        $('#weatherResult').html(`
                            <h3>Clima en ${data.name}, ${data.sys.country}</h3>
                            <p><i class="bi bi-thermometer-half"></i>Temperatura: ${(data.main.temp - 273.15).toFixed(1)}°C</p>
                            <p>Condiciones: ${data.weather[0].description}</p>
                            <p>Humedad: ${data.main.humidity}%</p>
                            <p>Viento: ${data.wind.speed}m/s</p>
                        `);
                    } else {
                        $('#weatherResult').html(`
                            <p class='text-danger'>Ciudad no encontrada.</p>
                        `);
                    }
                }
            });
        }
    });
});