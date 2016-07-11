<?php

use app\modules\teacher\controllers\modelsFactory;




$examsAttend;
$questionInExams;
$ExamsName;
$questionsGrade;
$allExams;

?>


<h3>Number of Exams in you groups</h3><p><?= count($allExams) ?></p><hr>
<h3>Exam Names</h3><p><?php
    foreach ($ExamsName as $name){
        echo $name;
    }
?></p><hr>
<h3>percent of Exams you attend/all exams</h3><p><?= count($examsAttend)/count($allExams ) ?></p><hr>
<h3>all Question you answered</h3><p><?= count($questionInExams) ?></p><hr>
<h3>Your total grade</h3><p>
    <?php 
    $totalGrades = 0;
    foreach ( $questionsGrade as $grade ){
        if($grade == 1)
            $totalGrades++;
        }?>
<?= $totalGrades ?>
</p><hr>