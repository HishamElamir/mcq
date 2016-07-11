<?php
use yii\helpers\Html;
?>
<footer>
	<div class="container footerWrap">
			<div class="row">
				<div class="col-sm-3">
					<h4>BootstrapBay</h4>
					<hr>
						<ul class="list-unstyled">
							<li><a href="/sell">Sell Your Themes</a></li>
							<li><a href="/affiliate">Affiliates</a></li>
							<li><a href="/about">About Us</a></li>
							<li><a href="/feed">RSS Feed</a></li>
						</ul>
				</div>
				<div class="col-sm-3">
					<h4>Help &amp; Support</h4>
					<hr>
					<ul class="list-unstyled">
						<li><a href="/faq">FAQ</a></li>
						<li><a href="/submission-guidelines">Submission Guidelines</a></li>
						<li><a href="/payment-rates">Payment Rates</a></li>
						<li><a href="/contact-support">Contact &amp; Support</a></li>
					</ul>
				</div>
				<div class="col-sm-3">
					<h4>Resources</h4>
					<hr>
					<ul class="list-unstyled">
						<li><a href="/blog">Blog</a></li>
						<li><a href="/blog/bootstrap-resources/">Resource List</a></li>
						<li><a href="https://stocksnap.io" target="_blank">Free Stock Photos</a></li>
						<li><a href="https://snappa.io" target="_blank">Graphic Design Tool</a></li>
					</ul>
				</div>
				<div class="col-sm-3">
					 <?= Html::img('@web/images/logo.PNG', ['alt'=>'some', 'class'=>'img-responsive']);?>
				</div>
			</div>
		</div>

		<div class="subFooter">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="pull-left">
						© 2016 <a href="http://noscomedia.com/" target="_blank">Nosco Media Inc.</a> / 
						<a href="/licenses">Licenses</a> / 
						<a href="/terms">Terms &amp; Conditions</a> / 
						<a href="/privacy">Privacy Policy</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	       <!--  This is language configuration  -->
  <div  id="language-selector" class="pull-right">
      <?php //echo \app\components\widgets\LanguageSelector::widget(); ?>
    </div>
       <!--  End language configuration  -->
               

</footer>
		