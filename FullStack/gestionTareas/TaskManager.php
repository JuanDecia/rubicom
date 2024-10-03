<?php

// Class to get, edit, add & delete tasks
class TaskManager {
    private $file;

    public function __construct($filename) {
        $this->file = $filename;
    }

    public function getTasks() {
        return json_decode(file_get_contents($this->file), true);
    }


    public function addTask($task) {
        $tasks = $this->getTasks();
        
        $tasks[] = [
            "name" => $task
        ];

        file_put_contents($this->file, json_encode($tasks));
    }

    public function editTask($id, $task) {
        $tasks = $this->getTasks();
        $tasks[$id]['name'] = $task;
        file_put_contents($this->file, json_encode($tasks));
    }

    public function deleteTask($id) {
        $tasks = $this->getTasks();
        unset($tasks[$id]);
        $tasks = array_values($tasks); // Array reindex
        file_put_contents($this->file, json_encode($tasks));
    }
}
?>
