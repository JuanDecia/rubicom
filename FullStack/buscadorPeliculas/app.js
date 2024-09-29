$(document).ready(function () {
    //get history search
    const getHistory = () => {
        $.ajax({
            url: 'get_history.php',
            method: 'GET',
            success: function (response) {
                let history = JSON.parse(response);
                let historyList = '';

                history.forEach( (movie) => {
                    historyList += `
                        <li class='list-group-item'>${movie.title} (${movie.year})</li>
                    `;
                });
                $('#historyList').html(historyList);
            }
        });
    }

    // Load history when page loads
    getHistory();

    // Handler movie search
    $('#movieForm').on('submit', function (e) {
        e.preventDefault();

        let title = $('#title').val();
        if (title) {
            $.ajax({
                url: 'get_movie.php',
                method: 'POST',
                data: { title: title },
                success: function (response) {
                    let movie = JSON.parse(response);
                    if (movie.response === 'true') {
                        $('#movieResult').html(`
                            <h3>${movie.title} (${movie.year})</h3>
                            <p><strong>Director:</strong> ${movie.Director}</p>
                            <p><strong>Actores:</strong> ${movie.Actors}</p>
                            <p><strong>Sinopsis:</strong> ${movie.Plot}</p>
                        `);
                        getHistory();
                    } else {
                        $('#movieResult').html(`
                            <p class=''text-danger'>Pelicula no encontrada</p>
                        `);
                    }
                }
            });
        }
    });
});