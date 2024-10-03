<?php

class TurnManager {
    private $file;

    public function __construct($filename) {
        $this->file = $filename;
    }

    // Function to get current turns
    public function getTurns() {
        return json_decode(file_get_contents($this->file), true);
    }

    public function addTurn($name, $datetime) {
        $turns = $this->getTurns();

        $turns[] = [
            'name' => $name,
            'datetime' => $datetime,
        ];

        file_put_contents($this->file, json_encode($turns));
    }

    public function editTurn($id, $name, $datetime) {
        $turns = $this->getTurns();

        // Check ID after it edits
        if (isset($turns[$id])) {
            $turns[$id]['name'] = $name;
            $turns[$id]['datetime'] = $datetime;

            // Save changes into json file
            file_put_contents($this->file, json_encode($turns));
        }
    }

    public function deleteTurn($id) {
        $turns = $this->getTurns();
        unset($turns[$id]);
        $turns = array_values($turns);
        file_put_contents($this->file, json_encode($turns));
    }
}

?>