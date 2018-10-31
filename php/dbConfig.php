<?php

$lokal=1; // hodeian 0, lokalean gauedenean 1


if ($lokal) {
   $server="localhost";
   $user="root";   // lokalean erabiltzailea root izan ohi da
   $pass="";               // eta ez da pasahitzarik jartzen
   $database="quizz";
} else {
   $server="localhost";
   $user="***********";
   $pass="**********";  // GitHub-en eremu hau EZABATU
   $database="**********";        // hodeiko db izena: hodeiko aurrizkia + zuek adierazitako db izena atzizki moduan
}
?>
