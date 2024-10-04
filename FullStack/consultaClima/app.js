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

                        // Get temperature in C°
                        let tempCelsius = (data.main.temp - 273.15).toFixed(1);
                        let condition = data.weather[0].main.toLowerCase();  // Main conditions
                        let icon;

                        // Switch icon according to temperature
                        if (tempCelsius < 10) {
                            icon = '<i class="bi bi-snow me-2"></i>';  // Cold
                        } else if (tempCelsius >= 10 && tempCelsius < 25) {
                            icon = '<i class="bi bi-cloud-sun me-2"></i>';  // Temperate
                        } else {
                            icon = '<i class="bi bi-sun me-2"></i>';  // Warm
                        }

                        // Switch icon according the weather
                        if (condition.includes('rain')) {
                            icon = '<i class="bi bi-cloud-rain me-2"></i>';  // Rain
                        } else if (condition.includes('snow')) {
                            icon = '<i class="bi bi-snow me-2"></i>';  // Snow
                        } else if (condition.includes('clear')) {
                            icon = '<i class="bi bi-sun me-2"></i>';  // Sunny
                        } else if (condition.includes('cloud')) {
                            icon = '<i class="bi bi-cloud me-2"></i>';  // Clouldy
                        }

                        $('#weatherResult')
                            .html(`
                                <h3>Clima en ${data.name}, ${data.sys.country}</h3>
                                <p>${icon}Temperatura: ${tempCelsius}°C</p>
                                <p><i class="bi bi-cloud-sun me-2"></i>Condiciones: ${data.weather[0].description}</p>
                                <p><i class="bi bi-droplet me-2"></i>Humedad: ${data.main.humidity}%</p>
                                <p><i class="bi bi-wind me-2"></i>Viento: ${data.wind.speed}m/s</p>
                           `)
                            .removeClass('d-none')
                            .hide()  
                            .fadeIn('slow');
                    } else {
                        $('#weatherResult')
                            .html(`<p class='text-danger'>Ciudad no encontrada.</p>`)
                            .removeClass('d-none')
                            .hide()
                            .fadeIn('slow');
                    }
                }
            });
        }
    });
});