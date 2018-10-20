<?php

$lokal=0; // hodeian 0, lokalean gauedenean 1


if ($lokal) {
   $server="localhost";
   $user="root";   // lokalean erabiltzailea root izan ohi da
   $pass="";               // eta ez da pasahitzarik jartzen
   $database="quiz";
} else {
   $server="localhost";
   $user="";
   $pass="";  // GitHub-en eremu hau EZABATU
   $database="id7132351_quizz";        // hodeiko db izena: hodeiko aurrizkia + zuek adierazitako db izena atzizki moduan
}
?>