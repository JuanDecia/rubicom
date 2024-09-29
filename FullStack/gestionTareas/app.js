$(document).ready(() => {
  // Función para obtener todas las tareas
  const getTasks = () => {
    $.ajax({
      url: "get_tasks.php",
      method: "GET",
      success: function (response) {
        let tasks = JSON.parse(response);
        let taskList = "";
        tasks.forEach((task, index) => {
          taskList += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${task.name}</td>
                            <td>
                                <button 
                                    class="btn btn-primary btn-sm editTask" 
                                    data-id="${index}" 
                                    data-name="${task.name}"
                                >
                                    Editar
                                </button>

                                <button 
                                    class="btn btn-danger btn-sm deleteTask" 
                                    data-id="${index}"
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
        });
        $("#taskList").html(taskList);
      },
    });
  };

  // Call getTask when the page loads
  getTasks();

  // Send new task
  $("#taskForm").on("submit", function (e) {
    e.preventDefault();
    let task = $("#task").val();
    if (task) {
      $.ajax({
        url: "add_task.php",
        method: "POST",
        data: { task: task },
        success: function (response) {
          $("#task").val(""); // Clear field
          getTasks(); // refresh task list
        },
      });
    }
  });

  // Show modal and edit task
  $(document).on("click", ".editTask", function () {
    let editModal = new bootstrap.Modal(
      document.getElementById("editTaskModal")
    );

    let taskId = $(this).data("id"); // Get id task
    let taskName = $(this).data("name"); // Get name task

    // take values from modal form
    $("#editTaskInput").val(taskName);
    $("#editTaskId").val(taskId);

    // show modal
    editModal.show();
  });

  // Save changes from edit task
  $("#saveEditTask").on("click", function () {
    let taskId = $("#editTaskId").val();
    let newTaskName = $("#editTaskInput").val();

    if (newTaskName) {
      $.ajax({
        url: "edit_task.php",
        method: "POST",
        data: { id: taskId, new_name: newTaskName }, // send new name
        success: function (response) {
          getTasks(); // refresh task list
          $("#editTaskModal").modal("hide"); // close modal
        },
      });
    } else {
      alert("El nombre de la tarea no puede estar vacío");
    }
  });

  // Eliminar una tarea
  $(document).on("click", ".deleteTask", function () {
    let taskId = $(this).data("id");
    $.ajax({
      url: "delete_task.php",
      method: "POST",
      data: { id: taskId },
      success: function (response) {
        getTasks(); // Refrescar la lista de tareas
      },
    });
  });
});
