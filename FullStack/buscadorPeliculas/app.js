$(document).ready(function () {
  // Get History Search
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
  // Load Histori when page refreshs
  getHistory();

  // Handler movie search
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
                <img src="${movie.Poster}" alt="Poster de ${movie.Title}" class="img-fluid" />
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
