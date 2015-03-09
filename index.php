<?php

require "src/Traits/Sorter.php";
require "src/Interfaces/BoardingInterface.php";
require "src/Boarding.php";
require "src/Trip.php";

$trip = new src\Trip('12345', 'GTFYJUGDHGSDIII', 'boardings.json');
$trip->render();


