<?php

//
if (isset($_POST['pays']) && strtolower($_POST['pays']) == 'france') {
    echo '<option>Paris</option>';
    echo '<option>Lyon</option>';
    echo '<option>Bordeaux</option>';
    echo '<option>Nantes</option>';
} elseif (isset($_POST['pays']) && strtolower($_POST['pays']) == 'angleterre') {
    echo '<option>Londres</option>';
    echo '<option>Manchester</option>';
    echo '<option>Bristol</option>';
    echo '<option>Brighton</option>';
} elseif (isset($_POST['pays']) && strtolower($_POST['pays']) == 'espagne') {
    echo '<option>Madrid</option>';
    echo '<option>Barcelonne</option>';
    echo '<option>Valencia</option>';
    echo '<option>Seville</option>';
} else {
    echo ' <option style="border:1px solid red;">Veuillez choisir un pays...</option>';
}
