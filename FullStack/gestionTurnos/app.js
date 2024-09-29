$(document).ready(function () {

    // Get turns
    const getTurns = () => {

        $.ajax({
            url: 'get_turns.php',
            method: 'GET',
            success: function (response) {
                let turns = JSON.parse(response);
                let turnList = '';
    
                turns.forEach( function (turn, index) {
                    turnList += `
                        <tr>
                            <td>${turn.name}</td>
                            <td>${turn.datetime}</td>
                            <td>
                                <button
                                    class='btn btn-primary btn-sm editTurn'
                                    data-id='${index}'
                                    data-name='${turn.name}'
                                    data-datetime='${turn.datetime}'
                                >
                                    Editar
                                </button>
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
                    console.log(response);
                }
            });
        }
    });

    $(document).on('click', '.editTurn', function() {
        let editModal = new bootstrap.Modal(document.getElementById('editTurnModal'));
    
        let turnId = $(this).data('id'); // Obtener ID
        let turnName = $(this).data('name'); // Obtener Nombre
        let turnDatetime = $(this).data('datetime'); // Obtener fecha y hora
    
        // Asignar valores al formulario del modal
        $('#editTurnId').val(turnId);
        $('#editTurnName').val(turnName);
        $('#editTurnDatetime').val(turnDatetime);
    
        editModal.show();
    });
    
    // Guardar cambios y cerrar el modal
    $('#saveEditTurn').on('click', function() {
        let turnId = $('#editTurnId').val();
        let newTurnName = $('#editTurnName').val();
        let newDatetime = $('#editTurnDatetime').val();
    
        if (newTurnName && newDatetime) {
            $.ajax({
                url: 'edit_turn.php',
                method: 'POST',
                data: {
                    id: turnId,
                    new_name: newTurnName,
                    new_datetime: newDatetime
                },
                success: function(response) {
                    console.log(response);
                    getTurns(); // Llama a tu función para actualizar la lista de turnos
                    $('#editTurnModal').modal('hide');
                },
                error: function() {
                    alert('Error al editar el turno. Inténtalo de nuevo.');
                }
            });
        } else {
            alert('El nombre, la fecha y la hora no pueden estar vacíos.');
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