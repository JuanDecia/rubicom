$(document).ready(function () {

    // Get turns
    const getTurns = () => {

        $.ajax({
            url: 'get_turns.php',
            method: 'GET',
            success: function (response) {
                let turns = JSON.parse(response);
                let turnList = '';
    
                turns.forEach( (turn, index) => {
                    turnList += `
                        <tr>
                            <td>${turn.name}</td>
                            <td>${turn.datatime}</td>
                            <td>
                                <button 
                                    class='btn btn-danger btn-sm deleteTurn'
                                    data-id='${index}'
                                >
                                    Eliminar
                                </button>
                        </tr>
                    `;
                });
                $('#turnList').html(turnList);
            }
        });
    }

    // When load page, calls get turn
    getTurns();

    // Send new turn
    $('#turnForm').on('submit', function (e) {
        e.preventDefault();
        let name = $('#name').val();
        let datetime = $('#datetime').val();

        if (name && datetime) {
            $.ajax({
                url: 'add_turn.php',
                method: 'POST',
                data: { name: name, datetime: datetime },
                success: function (response) {
                    $('#name').val(''); // Clear field
                    $('#datetime').val('');
                    getTurns(); // refresh turns list
                }
            });
        }
    });

    // Delete turn
    $(document).on('click', '.deleteTurn', function () {
        let turnId = $(this).data('id');
        $.ajax({
            url: 'delete_turn.php',
            method: 'POST',
            data: { id: turnId },
            success: function () {
                getTurns(); // Refresh turns list
            }
        });
    });
});