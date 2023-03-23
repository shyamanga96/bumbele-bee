<div style="width:60%;margin: 0 auto;">
	<div style="text-align:center;">
		<a href="<?php echo base_url(); ?>">
			<img src="<?php echo base_url(); ?>application_res/images/logo/logo.png" alt="Brand Logo">
		</a>
	</div>



	<div class="checkout-page-wrapper section-padding" style="padding-top: 30px;" id="print_section">
		<div class="container">
			<div><h4 style="display: inline;">Purchase Receipt </h4></div>
			<br><br><br>  
			<table style="width: 100%;">
				<tr>

					<td>
						<h5>Billing Details</h5>
						<span><?php echo $customer_data['f_name'].' '.$customer_data['l_name']; ?></span><br>
						<span><?php echo $customer_data['contact_nu']; ?></span><br>
						<span><?php echo $order_data['address1']; ?>,<?php echo $order_data['address2']; ?></span><br>
						<span><?php echo $order_data['city'].', '.$order_data['country']; ?></span><br>
						<span><?php echo $order_data['notes']; ?></span><br>
					</td>

					<td>
						<h5>Order Details</h5>
						<span><?php echo "Order Id : ".$order_id; ?></span><br>
						<span><?php echo "Order Date : ".$order_data['d_date']; ?></span><br>
						<h5>Payment Details</h5>
						<span><?php echo "Payment Type : ".$order_data['type']; ?></span><br>
						<span><?php if ($order_data['type']=='installment') {
							echo "Installment Amount : ".number_format($order_data['installment']);
						} ?></span><br>
						<span><?php if ($order_data['type']=='installment') {
							echo "Next Installment Date : ".$order_data['next_pay_date'];
						} ?></span><br>
						<span style="color: green;font-size: 18px;"> Payment Success </span>
					</td>
				</tr>
			</table>

			<br><br><br>
			<div class="col-lg-12">
				<div class="order-summary-details">

					<div class="order-summary-content">
						<!-- Order Summary Table -->
						<div class="order-summary-table table-responsive text-center" style="background-color: #fff;">
							<table class="table" style="width: 100%;">
								<tbody>
									<tr style="background: #298ffa;height: 30px;">
										<td style="border-top:none;"></td>
										<td style="border-top:none;"><b>Item</b></td>
										<td style="border-top:none;"><b>Qty</b></td>
										<td style="border-top:none;"><b>Sub Total</b></td>
									</tr>

									<?php	foreach($order_items as $product ) { ?>
										<tr>
											<td style="vertical-align:middle;text-align: center;">
												<img src="<?php echo base_url(); ?><?php echo $product['image']; ?>" height="60">
											</td>

											<td style="vertical-align:middle;">
												<?php echo $product['name']; ?>
											</td>
											<td style="vertical-align:middle;">
												<?php echo $product['qty']; ?>
											</td>

											<td style="vertical-align:middle;">Rs.  <?php echo number_format($product['price']*$product['qty']); ?></td>
										</tr>
									<?php	} ?>

								</tbody>
								<tfoot>
									<tr>
										<td></td>
										<td style="text-align: right;"><h4 style="font-size: 25px;">Total Amount</h4></td>
										<td style="text-align: right;"><h4 style="font-size: 25px;">LKR <?php echo number_format($order_data['total']); ?></h4></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>