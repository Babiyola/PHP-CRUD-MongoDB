<?php

require_once __DIR__ . '/vendor/autoload.php';
$con = new MongoDB\Client('mongodb://127.0.0.1:27017');
$person = $con->php_crud->person;

function getIncrement($con)
{
    $person_increment = $con->php_crud->person_increment;
    $increment = $person_increment->findOneAndUpdate(['_id' => 'auto_increment'], ['$inc' =>  ['value' => +1]], ['returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER]);
    if ($increment == null) {
        $increment = $person_increment->insertOne([
            '_id' => 'auto_increment',
            'value' => 1
        ]);
        if ($increment->getInsertedId() == 'auto_increment') {
            $increment = new stdClass();
            $increment->value = 1;
        }
    }
    return $increment->value;
}
