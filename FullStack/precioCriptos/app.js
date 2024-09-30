$(document).ready(function () {
  // Manejar la solicitud de precio de criptomoneda
  $("#cryptoForm").on("submit", function (e) {
    e.preventDefault();
    let crypto = $("#crypto").val();
    if (crypto) {
      $.ajax({
        url: "get_crypto.php",
        method: "POST",
        data: { crypto: crypto },
        success: function (response) {
          let data = JSON.parse(response);
          if (data) {
            $("#cryptoResult").html(`
                <h3>Precio de ${data.name} (${data.symbol.toUpperCase()})</h3>
                <p>Precio actual: $${data.market_data.current_price.usd}</p>
                <p>Variación en 24h: ${data.market_data.price_change_percentage_24h}%</p>
            `);
          } else {
            $("#cryptoResult").html(`<p class="text-danger">Error al obtener los datos.</p>`);
          }
        },
      });
    }
  });
});
