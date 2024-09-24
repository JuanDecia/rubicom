$(document).ready(() => {

    // Get Tasks
    const getTasks = () => {

        $.ajax({
            url: 'get_tasks.php',
            method: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                let taskList = '';

                tasks.forEach((task, index) => {
                    taskList += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${task.name}</td>
                            <td>
                                <button
                                    class='btn btn-primary btn-sm editTask'
                                    data-id='${index}'
                                >
                                    Editar
                                </button>
                                <button 
                                    class='btn btn-danger btn-sm deleteTask'
                                    data-id='${index}'
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                });
                $('#taskList').html(taskList);
            }
        });
    }

    // Call getTasks when load page
    getTasks();

    // Function send new task
    $('#taskForm').on('submit', function (e) {
        e.preventDefault();
        let task = $('#task').val();
        if (task) {
            $.ajax({
                url: 'add_task.php',
                method: 'POST',
                data: { task: task },
                success: function(response) {
                    $('#task').val(''); // Clear field
                    getTasks(); // refresh task list
                }
            });
        }
    });

    // Delete Task
    $(document).on('click', '.deleteTask', function () {
        let taskId = $(this).data('id');
        $.ajax({
            url: 'delete_task.php',
            method: 'POST',
            data: { id: taskId },
            success: function (response) {
                getTasks()
            }
        });
    });
});

