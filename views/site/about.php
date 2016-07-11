<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Guide';
$this->params['breadcrumbs'][] = $this->title;

?>
<div id="site-guide">
    <h1><?= Html::encode($this->title) ?> - <span class="label label-danger"> How to use </span></h1>
    <div class="col-sm-8">
      <div id="gitting-started" class="section">
        <p>Multiple choice test questions, also known as items, can be an effective and efficient way to assess learning outcomes. Multiple choice test items have several potential advantages:</p>
        <ul>
            <li><p><span class="hlights">Versatility:</span> Multiple choice test items can be written to assess various levels of learning outcomes, from basic recall to application, analysis, and evaluation.  Because students are choosing from a set of potential answers, however, there are obvious limits on what can be tested with multiple choice items. For example, they are not an effective way to test students’ ability to organize thoughts or articulate explanations or creative ideas.</p></li>
            <li><p><span class="hlights">Reliability:</span> Reliability is defined as the degree to which a test consistently measures a learning outcome. Multiple choice test items are less susceptible to guessing than true/false questions, making them a more reliable means of assessment. The reliability is enhanced when the number of MC items focused on a single learning objective is increased.  In addition, the objective scoring associated with multiple choice test items frees them from problems with scorer inconsistency that can plague scoring of essay questions.</p></li>
            <li><p><span class="hlights">Validity:</span> Validity is the degree to which a test measures the learning outcomes it purports to measure. Because students can typically answer a multiple choice item much more quickly than an essay question, tests based on multiple choice items can typically focus on a relatively broad representation of course material, thus increasing the validity of the assessment.</p></li>
        </ul>
        <p>The key to taking advantage of these strengths, however, is construction of good multiple choice items.</p>
        <p>A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives. The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.</p>
        <div class="container">
            <div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/stem-alt.png" ?> " ></div>
        </div>
    </div>
    <div id="Stem" class="section">
        <h2>Constructing an Effective Stem</h2>
        <p>1. <strong><span class="hlights">The stem should be meaningful by itself</span></strong> and should present a definite problem. A stem that presents a definite problem allows a focus on the learning outcome. A stem that does not present a clear problem, however, may test students’ ability to draw inferences from vague descriptions rather serving as a more direct test of students’ achievement of the learning outcome.</p>
        <div class="container">
            <div class="col-md-6"><img src="<?= Url::base()."/images/guide/stem-not-meaningful.png" ?>"></div>
            <div class="col-md-6"><img src="<?= Url::base()."/images/guide/better-stem2.png" ?> "></div>
        </div>
        <p>2. <strong><span class="hlights">The stem should not contain irrelevant material</span></strong>, which can decrease the reliability and the validity of the test scores (Haldyna and Downing 1989).</p>
        <div class="container">
            <div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/index.png"?>"></div>
        </div>
        <p>3. <strong><span class="hlights">The stem should be negatively stated only when significant learning outcomes require it.</span></strong> Students often have difficulty understanding items with negative phrasing (Rodriguez 1997). If a significant learning outcome requires negative phrasing, such as identification of dangerous laboratory or clinical practices, the negative element should be emphasized with italics or capitalization.</p>
        <div class="container">
            <div class="col-md-6"><img src="<?= Url::base()."/images/guide/neg-phrase1.png" ?> "></div>
            <div class="col-md-6"><img src="<?= Url::base()."/images/guide/negative2.png" ?> "></div>
            <div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/Better-neg-phrase.png" ?> "></div>
        </div>
        <p>4. <strong><span class="hlights">The stem should be a question or a partial sentence.</span></strong> A question stem is preferable because it allows the student to focus on answering the question rather than holding the partial sentence in working memory and sequentially completing it with each alternative (Statman 1988). The cognitive load is increased when the stem is constructed with an initial or interior blank, so this construction should be avoided.</p>
        <div class="container">
            <div class="col-md-6"><img src="<?= Url::base()."/images/guide/blanks1.png" ?> "></div>
            <div class="col-md-6"><img src="<?= Url::base()."/images/guide/blanks3.jpg" ?> "></div>
        </div>
    </div>
    <div id="Effective" class="section">
        <h2>Constructing Effective Alternatives</h2>
        <p>1. <strong><span class="hlights">All alternatives should be plausible.</span></strong> The function of the incorrect alternatives is to serve as distractors,which should be selected by students who did not achieve the learning outcome but ignored by students who did achieve the learning outcome. Alternatives that are implausible don’t serve as functional distractors and thus should not be used. Common student errors provide the best source of distractors.</p>
        <div class="container">
            <div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/implausable.png" ?> "></div>
        </div>
        <p>2. <strong><span class="hlights">Alternatives should be stated clearly and concisely.</span></strong> Items that are excessively wordy assess students’ reading ability rather than their attainment of the learning objective</p>
        <div class="container">
            <div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/wordy.png" ?> " ></div>
        </div>
        <p>3. <strong><span class="hlights">Alternatives should be mutually exclusive.</span></strong> Alternatives with overlapping content may be considered “trick” items by test-takers, excessive use of which can erode trust and respect for the testing process.</p>
        <div class="container">
            <div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/overlap.png" ?> "></div>
        </div>
        <p>4. <strong><span class="hlights">Alternatives should be homogenous in content.</span></strong> Alternatives that are heterogeneous in content can provide cues to student about the correct answer.</p>
        <div class="container">
            <div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/hetero.png" ?> "></div>
        </div>
        <p>5. <strong><span class="hlights">Alternatives should be free from clues about which response is correct.</span></strong> Sophisticated test-takers are alert to inadvertent clues to the correct answer, such differences in grammar, length, formatting, and language choice in the alternatives. It’s therefore important that alternatives</p>
        <ul>
            <li>have grammar consistent with the stem.</li>
            <li>are parallel in form.</li>
            <li>are similar in length.</li>
            <li>use similar language (e.g., all unlike textbook language or all like textbook language).</li>
        </ul>
        <p>6. <strong><span class="hlights">The alternatives “all of the above” and “none of the above” should not be used.</span></strong> When “all of the above” is used as an answer, test-takers who can identify more than one alternative as correct can select the correct answer even if unsure about other alternative(s). When “none of the above” is used as an alternative, test-takers who can eliminate a single option can thereby eliminate a second option. In either case, students can use partial knowledge to arrive at a correct answer.</p>
        <p>7. <strong><span class="hlights">The alternatives should be presented in a logical order</span></strong> (e.g., alphabetical or numerical) to avoid a bias toward certain positions.</p>
        <div class="container">
            <div class="col-md-6"><img src="<?= Url::base()."/images/guide/alpha.png" ?> "></div>
            <div class="col-md-6"><img src="<?= Url::base()."/images/guide/logic.png" ?> "></div>
        </div>
    </div>
    <div id="Guidelines" class="section">
        <h2>Additional Guidelines for Multiple Choice Questions</h2>
        <p>1. <strong><span class="hlights">Avoid complex multiple choice items</span></strong>, in which some or all of the alternatives consist of different combinations of options. As with “all of the above” answers, a sophisticated test-taker can use partial knowledge to achieve a correct answer.</p>
        <div class="container">
            <div class="col-md-6 col-sm-12 solo-img center-block">
            <img src="<?= Url::base()."/images/guide/complex.png" ?> " ></div>
        </div>
        <p>2. <strong><span class="hlights">Keep the specific content of items independent of one another.</span></strong> Savvy test-takers can use information in one question to answer another question, reducing the validity of the test.</p>
    </div>
    <div id="Considerations" class="section">
        <h2>Considerations for Writing Multiple Choice Items that Test Higher-order Thinking</h2>
        <p>When writing multiple choice items to test higher-order thinking, design questions that focus on higher levels of cognition as defined by Bloom’s taxonomy. A stem that presents a problem that requires application of course principles, analysis of a problem, or evaluation of alternatives is focused on higher-order thinking and thus tests students’ ability to do such thinking. In constructing multiple choice items to test higher order thinking, it can also be helpful to design problems that require multilogical thinking, where multilogical thinking is defined as “thinking that requires knowledge of more than one fact to logically and systematically apply concepts to a …problem” (Morrison and Free, 2001, page 20). Finally, designing alternatives that require a high level of discrimination can also contribute to multiple choice items that test higher-order thinking.</p>
        <div class="container">
            <div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/higher-order.png" ?> " ></div>
            <div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/higher-order2.png" ?> "></div>
        </div>
    </div>
    <div id="Resources" class="section">
        <h2>Additional Resources</h2>
        <ul>
            <li><p>Burton, Steven J., Sudweeks, Richard R., Merrill, Paul F., and Wood, Bud. How to Prepare Better Multiple Choice Test Items: Guidelines for University Faculty, 1991.</p></li>
            <li><p>Cheung, Derek and Bucat, Robert. How can we construct good multiple-choice items?  Presented at the Science and Technology Education Conference, Hong Kong, June 20-21, 2002.</p></li>
            <li><p>Haladyna, Thomas M. Developing and validating multiple-choice test items, 2nd edition. Lawrence Erlbaum Associates, 1999.</p></li>
            <li><p>Haladyna, Thomas M. and Downing, S. M.. Validity of a taxonomy of multiple-choice item-writing rules. Applied Measurement in Education, 2(1), 51-78, 1989.</p></li>
            <li><p>Morrison, Susan and Free, Kathleen. Writing multiple-choice test items that promote and measure critical thinking. Journal of Nursing Education 40: 17-24, 2001.</p></li>
        </ul>
    </div>
	<div id="Reports" class="section">
        <h2>Reports</h2>
        <p><span class="hlights">Teacher Reports: </span>Teachers can find all the reports about the exams what they assigned to the student groups and also for each question in every exam and each student who solved that exam, the picture bellow showing a good example about the reports for teacher. also there is a chart for each question that giving the number of all students who answerd that exam and who solved it right and who solved it wrong. this way the teachers can easy know the average knowledge for the students about the question or they can know if that question was easy for the students or hard, the blue section giving the number of correct answers and the gray one showing the wronge ones</p>
		<div class="container">
		<div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/teacher-reports.png" ?> " ></div>
		</div>
		<p><span class="hlights">Student Reports: </span>Students with the reports module can view the exams that they registered in for each course thay have,if the exam is still active, so students can't find anything about that exam. once the exam closed and finished so they can view a full reports about all the questions in all the exams they solved, reports showing the exam name and some details about the teacher name , exam starting date and exam close date. students will view the answers and the answer will have the blue color if it was a correct answer, otherwise it will appear with gray if it was wrong and white if the student didn't solve that question, also the same as teacher with small differences, the chart here about the hole exam not only a question. this way the student can view the number of his correct answers in that exam and ofcorse the unsolved questions are targeted as WRONG answers</p>
		<div class="container">
		<div class="col-md-6 col-sm-12 solo-img center-block"><img src="<?= Url::base()."/images/guide/student-reports.png" ?> " ></div>
		</div>
		<p>All rights reserved, MCQ System 2016&copy;</p>
    </div>
</div>
</div>

   <div class="col-sm-4">
            <div id="table-of-content" class="section">
            <h2>Table of content</h2>
            <ul>
                <li><a href="#Stem">Constructing an Effective Stem</a></li>
                <li><a href="#Effective">Constructing Effective Alternatives</a></li>
                <li><a href="#Guidelines">Additional Guidelines for Multiple Choice Questions</a></li>
                <li><a href="#Considerations">Considerations for Writing Multiple Choice Items that Test Higher-order Thinking</a></li>
                <li><a href="#Resources">Additional Resources</a></li>
				<li><a href="#Reports">Reports</a></li>
            </ul>
        </div>
    </div>

    
 