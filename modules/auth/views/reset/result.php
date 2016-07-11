<?php
use yii\bootstrap\Alert;
$this->title = "reset success";
Alert::begin([
    'options' => [
        'class' => 'alert-info',
    ],
]);

echo 'Hello [' . $user->username. '] we want to inform you that we have reset your password and forward your Key to this email : ' . $user->email;
echo ' Plz check your mail';
Alert::end();


