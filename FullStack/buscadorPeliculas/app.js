$(document).ready(function () {
  // Función para obtener el historial de búsquedas
  function getHistory() {
    $.ajax({
      url: "get_history.php",
      method: "GET",
      success: function (response) {
        let history = JSON.parse(response);
        let historyList = "";
        history.forEach(function (movie) {
          historyList += `<li class="list-group-item">${movie.title} (${movie.year})</li>`;
        });
        $("#historyList").html(historyList);
      },
    });
  }
  // Cargar el historial cuando se carga la página
  getHistory();
  // Manejar la búsqueda de película
  $("#movieForm").on("submit", function (e) {
    e.preventDefault();
    let title = $("#title").val();
    if (title) {
      $.ajax({
        url: "get_movie.php",
        method: "POST",
        data: { title: title },
        success: function (response) {
          let movie = JSON.parse(response);
          if (movie.Response === "True") {
            $("#movieResult").html(`
                <h3>${movie.Title} (${movie.Year})</h3>
                <p><strong>Director:</strong> ${movie.Director}</p>
                <p><strong>Actores:</strong> ${movie.Actors}</p>
                <p><strong>Sinopsis:</strong> ${movie.Plot}</p>
            `);

            getHistory();
            
          } else {
            $("#movieResult").html(`
                <p class="text-danger">Película noencontrada.</p>`
            );
          }
        },
      });
    }
  });
});
