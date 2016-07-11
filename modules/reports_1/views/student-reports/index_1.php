<?php
/* @var $this yii\web\View */
$exam_num = 1;
?>
<h1>Student Reports</h1>

<?php foreach($examswithquestions as $exam): ?>
	<div class="exam container">
		<?php $question_num = 1;?>
		<div class="exam-details container">
			<div class="exam-title col-md-4"><h3><?= $exam_num++.'- '.$exam[0]->name;?></h3></div>
			<div class="exam-est-date exam-date col-md-2"><h4><?= $exam[0]->est_date;?></h4></div>
			<div class="exam-created exam-date col-md-2"><h4><?= $exam[0]->created_at;?></h4></div>
			<div class="exam-status col-md-2"><h3><?= $exam[0]->status;?></h3></div>
			<div class="exam-status col-md-2"><h3><?= $exam[1]->displayname;?></h3></div>
		</div>
		<div class="exam-questions col-md-10">
			<div class="exam-question-details">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Question</th>
							<th>A</th>
							<th>B</th>
							<th>C</th>
							<th>D</th>
							<th>E</th>
							<th>My Answer</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($exam[2] as $question): ?>
							<tr>
								<td><?=  $question_num++ ;?></td>
								<td><?= $question->q_title ;?></td>
								<td class="<?php if($question->correct_ans == $question->ans_a){print 'correct ';}?>question-ans" ><?= $question->ans_a ;?></td>
								<td class="<?php if($question->correct_ans == $question->ans_b){print 'correct ';}?>question-ans" ><?= $question->ans_b ;?></td>
								<td class="<?php if($question->correct_ans == $question->ans_c){print 'correct ';}?>question-ans" ><?= $question->ans_c ;?></td>
								<td class="<?php if($question->correct_ans == $question->ans_d){print 'correct ';}?>question-ans" ><?= $question->ans_d ;?></td>
								<td class="<?php if($question->correct_ans == $question->ans_e){print 'correct ';}?>question-ans" ><?= $question->ans_e ;?></td>
								<?php if(isset($exam[3][$question->id]->answer)):?>
									<td class="<?php if($question->correct_ans == $exam[3][$question->id]->answer):print 'correct ';else:print 'wrong ';endif;?>question-ans" ><?= $exam[3][$question->id]->answer ;?></td>
								<?php else: ?>
									<td>no answer</td>
								<?php endif; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="exam-chart col-md-2">
			<canvas id="<?= $exam[0]->id ;?>-canvas" width="150" height="150"></canvas>
			<?php
			$correct = 0;
			$total = 0;
			foreach($exam[2] as $question): 
				if(isset($exam[3][$question->id]->answer) && $exam[3][$question->id]->answer == $question->correct_ans){
					$correct++;
				}
				$total++;
			endforeach;
			$correct_chart = '{value: '.$correct.',color: "cornflowerblue",highlight: "lightskyblue",label: "Correct Answers"}';
			$false_chart = '{value: '.($total-$correct).',color: "gray",highlight: "#222D32",label: "Wrong Answers"}';
			$this->registerJs(
				'$(document).ready(function(){
				var ctx = $("#'.$exam[0]->id.'-canvas").get(0).getContext("2d");

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