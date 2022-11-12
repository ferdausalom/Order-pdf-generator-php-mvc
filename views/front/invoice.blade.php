<?php

$html ='<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Invoice</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Google fonts-->
   
	<style>
		body, html{
		margin: 0;
		padding: 0;
		font: 400 .875rem "Open Sans", sans-serif;
		color: #bcd0f7;
		background: #1A233A;
		position: relative;
		height: 100%;
	}
    h2{text-align:center}
	.container{
    width:850px;
	margin: 0 auto;
}
.address-area{
width:100%;
}
.date-area{
    width:100%;
}
	.invoice-container {
		padding: 1rem;
	}
	.invoice-container .invoice-header .invoice-logo {
		margin: 0.8rem 0 0 0;
		display: inline-block;
		font-size: 1.6rem;
		font-weight: 700;
		color: #bcd0f7;
	}
	.invoice-container .invoice-header .invoice-logo img {
		max-width: 130px;
	}
	.invoice-container .invoice-header address {
		font-size: 1rem;
		color: #8a99b5;
		margin: 0;
	}
	.invoice-container .invoice-details {
		margin: 1rem 0 0 0;
		padding: 1rem;
		line-height: 180%;
		background: #1a233a;
	}
	.invoice-container .invoice-details .invoice-num {
		text-align: right;
		font-size: 1rem;
	}
	.invoice-container .invoice-body {
		padding: 1rem 0 0 0;
	}
	.invoice-container .invoice-footer {
		text-align: center;
		font-size: 0.7rem;
		margin: 13px 0 0 0;
	}
	
	.invoice-status {
		text-align: center;
		padding: 1rem;
		background: #272e48;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
		margin-bottom: 1rem;
	}
	.invoice-status h2.status {
		margin: 0 0 0.8rem 0;
	}
	.invoice-status h5.status-title {
		margin: 0 0 0.8rem 0;
		color: #8a99b5;
	}
	.invoice-status p.status-type {
		margin: 0.5rem 0 0 0;
		padding: 0;
		line-height: 150%;
	}
	.invoice-status i {
		font-size: 1.5rem;
		margin: 0 0 1rem 0;
		display: inline-block;
		padding: 1rem;
		background: #1a233a;
		-webkit-border-radius: 50px;
		-moz-border-radius: 50px;
		border-radius: 50px;
	}
	.invoice-status .badge {
		text-transform: uppercase;
	}
	
	@media (max-width: 767px) {
		.invoice-container {
			padding: 1rem;
		}
	}
	
	.card {
		background: #272E48;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		border: 0;
		margin-bottom: 1rem;
	}
	
	.custom-table {
		border: 1px solid #2b3958;
	}
	.custom-table thead {
		background: #2f71c1;
	}
	.custom-table thead th {
		border: 0;
		color: #ffffff;
	}
	.custom-table > tbody tr:hover {
		background: #172033;
	}
	.custom-table > tbody tr:nth-of-type(even) {
		background-color: #1a243a;
	}
	.custom-table > tbody td {
		border: 1px solid #2e3d5f;
	}
	
	.table tr td{
        padding:10px;
    }
	.table {
		background: #1a243a;
		color: #bcd0f7;
		font-size: .95rem;
	}
	.text-success {
		color: #c0d64a !important;
	}
	.custom-actions-btns {
		margin-left: auto;
		justify-content: flex-end;
	}
	.custom-actions-btns .btn {
		margin: .3rem 0 .3rem .3rem;
	}
	
	</style>
  </head>
  <body>
	<div class="container">
		<div class="row gutters" style="margin-top:10px ">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
					<div class="card-body p-0">
						<div class="invoice-container">
							<div class="invoice-header">
                                <div class="row gutters">
									<div class="col-xl-12 d-flex col-lg-12 col-md-12 col-sm-12">
										<div>
											<h2>INVOICE</h2>
										</div>
									</div>
								</div>
								<!-- Row start -->
								<div class="row gutters" style="display: flex;">
									<div class="address-area">
										<div class="invoice-details">
											<address>
                                                '.$address->username.'<br>
												'.$address->city.' 
												'.$address->phone.'
												'.$address->address.'
											</address>
										</div>
									</div>
									<div class="date-area">
										<div class="invoice-details">
											<div class="invoice-num">
												<div>Invoice - #01</div>
												<div>
													'.$date.'
												</div>
											</div>
										</div>													
									</div>
								</div>
								<!-- Row end -->
		
							</div>
		
							<div class="invoice-body">
		
								<!-- Row start -->
								<div class="row gutters">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="table-responsive">
											<table class="table custom-table m-0" style="width:820px;">
												<thead>
													<tr>
														<th>Items</th>
														<th>Product ID</th>
														<th>Quantity</th>
														<th>Sub Total</th>
													</tr>
												</thead>
												<tbody>';
												
														$shipping = 0;
														$tax = 0;
														$subTotal = 0;
														$grandTotal = 0;
														
													
													 foreach ($invoiceData as $item):
													
															$subTotal += ($item->price)/100 *  $item->quantity;
															
													$html .='
                                                    <tr>
														<td>
															'.$item->name.'
														</td>
														<td>'.$item->product_id.'</td>
														<td>'.$item->quantity.'</td>
														<td>$'.($item->price)/100 *  $item->quantity.'.00</td>
													</tr>';

													endforeach;

													$html .='
                                                    <tr style="line-height: 22px;">
														<td>&nbsp;</td>
														<td colspan="2">
															<p>
																Subtotal<br>
																Shipping &amp; Handling<br>
																Tax<br>
															</p>
															<h5 class="text-success"><strong>Grand Total</strong></h5>
														</td>			
														<td>
															<p>
																$'.$subTotal.'.00<br>
																$'.$shipping.'.00<br>
																$'.$tax.'.00<br>
															</p>
															<h5 class="text-success"><strong>$'.($subTotal+$shipping+$tax).'.00</strong></h5>
														</td>
													</tr>
                                                </tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- Row end -->
		
							</div>
		
							<div class="invoice-footer">
								Thank you for your Business.
							</div>
		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('invoice.pdf', ['Attachment' => 0]);

												