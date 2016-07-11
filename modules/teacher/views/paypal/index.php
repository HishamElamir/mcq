

<div class="row">
    <div class="col-lg-12>">
        <div style="width: 600px; margin: 0px auto; border: 1px solid #ccc; padding: 30px;">

            <h2>Payment</h2>
            <div class="row">
                <div class="col-lg-12">
                    <div >
                        <img src="images/payment.jpg" class="img-responsive img-bordered img-thumbnail" style="width: 100%; height: 200px;" alt="group Image">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info" role="alert">
                        <strong>Express Checkout is a fast, easy way for buyers to pay with PayPal. Express Checkout eliminates one of the major causes of checkout abandonment by giving buyers all the transaction details at once, including order details, shipping options, insurance choices, and tax totals.
                            Studies show that adding the Express Checkout button to your website can increase your sales up to 18 percent..</strong>  
                    </div>

                    <?php echo \yii\helpers\Html::a('<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" />', ['/teacher/paypal/buy'], ['data-method' => 'post']); ?>
                </div>
            </div >
        </div>
    </div>
</div>

