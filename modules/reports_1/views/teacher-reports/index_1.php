<?php
/* @var $this yii\web\View */
$exam_num = 1;
?>
<h1>Teacher Reports</h1>

<?php foreach($examswithquestions as $exam): ?>
	<div class="exam">
		<div class="exam-details container">
			<div class="exam-title col-md-6"><h3><?= $exam_num++.'- '.$exam[0]->name;?></h3></div>
			<div class="exam-est-date exam-date col-md-2"><h4><?= $exam[0]->est_date;?></h4></div>
			<div class="exam-created exam-date col-md-2"><h4><?= $exam[0]->created_at;?></h4></div>
			<div class="exam-status col-md-2"><h3><?= $exam[0]->status;?></h3></div>
		</div>
		<?php $question_num=1;?>
		<?php foreach($exam[1] as $question): ?>
			<?php $key = array_search($question, $exam[1]);?>
			<div class="exam-questions container">
				<div class="exam-question-details col-md-12">
					<div class="question-title col-sm-12"><i><b><h4><?= $question_num++.') '.$question->q_title ;?></h4></b></i></div>
					<div class="<?php if($question->correct_ans == 'a'){ print "correct " ;}?>question-ans-a question-ans col-sm-2">A: <?= $question->ans_a ;?></div>
					<div class="<?php if($question->correct_ans == 'b'){ print "correct " ;}?>question-ans-b question-ans col-sm-2">B: <?= $question->ans_b ;?></div>
					<div class="<?php if($question->correct_ans == 'c'){ print "correct " ;}?>question-ans-c question-ans col-sm-2">C: <?= $question->ans_c ;?></div>
					<div class="<?php if($question->correct_ans == 'd'){ print "correct " ;}?>question-ans-d question-ans col-sm-2">D: <?= $question->ans_d ;?></div>
					<div class="<?php if($question->correct_ans == 'e'){ print "correct " ;}?>question-ans-e question-ans col-sm-2">E: <?= $question->ans_e ;?></div>
				</div>
				<div class="question-students col-md-10">
					<table class="table table-striped">
						<thead>
						  <tr>
							<th>Student Name</th>
							<th>Answer</th>
						  </tr>
						</thead>
						<tbody>
							<?php 
							if(isset($students[$key])):
								foreach($students[$key] as $student): ?>	
									<tr>
										<td><?= $student[0]->displayname ;?></td>
										<?php if($student[1] == $question->correct_ans): ?>
											<td class="correct"><?= $student[1] ;?></td>
										<?php else : ?>
											<td class="wrong"><?= $student[1] ;?></td>
										<?php endif;?>
									</tr>
							<?php 
								endforeach;
							endif; ?>
						</tbody>
					</table>
				</div>
				<div class="exam-question-chart col-md-2">
					<canvas id="<?= $exam[0]->id.'-'.$question->id ;?>-canvas" width="150" height="150"></canvas>
					<?php
					$correct = 0;
					$total = 0;
					if(isset($students[$key])):
						foreach($students[$key] as $student): 
							if($student[1] == $question->correct_ans){
								$correct++;
							}
							$total++;
						endforeach;
					endif;
					$correct_chart = '{value: '.$correct.',color: "cornflowerblue",highlight: "lightskyblue",label: "Correct Answers"}';
					$false_chart = '{value: '.($total-$correct).',color: "gray",highlight: "#222D32",label: "Wrong Answers"}';
					$this->registerJs(
						'$(document).ready(function(){
						var ctx = $("#'.$exam[0]->id.'-'.$question->id.'-canvas").get(0).getContext("2d");

						//pie chart data
						//sum of values = 360
						var data = ['.$correct_chart.','.$false_chart.'];

						//draw
						var piechart = new Chart(ctx).Pie(data);
						});'
					);
					?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endforeach; ?> 
