<?php

class Task2 {
    private $power_on_field = [6, 3, 2, 1, 4, 3, 1, 2];
    private $jump_power;
    private $direction = 'right';
    private $rabbit_position = 0;
    private $steps = 0; 
    private $max_steps;

    function __construct($max_steps) {
        $this->max_steps = $max_steps;
    }

    function rabbit_jump() {
        $this->jump_power += $this->power_on_field[$this->rabbit_position];
        $this->power_on_field[$this->rabbit_position] = 0; 


        $next_position = $this->direction === 'right'
            ? $this->rabbit_position + $this->jump_power
            : $this->rabbit_position - $this->jump_power;

        if ($next_position >= count($this->power_on_field)) {
            $this->direction = 'left';
            $next_position = count($this->power_on_field) - 2 - ($next_position - count($this->power_on_field));
        }

        elseif ($next_position < 0) {
            $this->direction = 'right';
            $next_position = abs($next_position) % count($this->power_on_field);
        }


        $this->rabbit_position = $next_position;
    }

    function play_game() {
        while (array_sum($this->power_on_field) > 0 && $this->steps < $this->max_steps) {
            $this->rabbit_jump();
            $this->steps++;
        }

        if (array_sum($this->power_on_field) === 0) {
            echo "Кролик з'їв усі кавові зерна!<br>";
        } else {
            echo "Кролик не зміг з'їсти всі кавові зерна за {$this->max_steps} кроків.<br>";
        }


        echo "Фінальний стан поля: <br>";
        print_r($this->power_on_field);
    }
}

$start_game = new Task2(100);
$start_game->play_game();
