<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    	<title>Welcome!</title>
    	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	</head>


	<?php
	  $customer_name = field_get_items('node', $node, 'field_customer_name');
	  $customer_street = field_get_items('node', $node, 'field_customer_street');
	  $customer_city = field_get_items('node', $node, 'field_customer_city');
	  $customer_country = field_get_items('node', $node, 'field_customer_country');
	  $customer_vat = field_get_items('node', $node, 'field_customer_vat');
	  $customer_contact_name = field_get_items('node', $node, 'field_customer_contact_name');
	  $customer_contact_email = field_get_items('node', $node, 'field_customer_contact_email');
	  $customer_contact_phone = field_get_items('node', $node, 'field_customer_contact_phone');
	  $date_pdf_created = date("d.m.Y");
	  $customer_id = field_get_items('node', $node, 'field_customer_id');
	  $invoice_label = field_get_items('node', $node, 'field_invoice_label');
	  $invoice_id = field_get_items('node', $node, 'field_invoice_id');
	  $invoice_id_title = field_get_items('node', $node, 'field_invoice_id_title');
	  $product_title = field_get_items('node', $node, 'field_product_title');
	  $product_description = field_get_items('node', $node, 'field_product_description');
	  $total_price = field_get_items('node', $node, 'field_total_price');

	  $options = array();
	  foreach(field_get_items('node', $node, 'field_options') as $field) {
	    $field_collection = field_collection_item_revision_load(($field['revision_id']));
	    $name = field_get_items('field_collection_item', $field_collection, 'field_option_name');
	    $price = field_get_items('field_collection_item', $field_collection, 'field_option_price');
	    $options[] = array('name' => $name[0]['value'], 'price' => $price[0]['value']);
	  }

	  $total_price_excl_vat = field_get_items('node', $node, 'field_total_price_excl_vat');
	  $coupon_code = field_get_items('node', $node, 'field_coupon_code');
	  $vat = field_get_items('node', $node, 'field_vat');
	  $total_payed_text = field_get_items('node', $node, 'field_total_payed_text_');
	  $total_payed_price = field_get_items('node', $node, 'field_total_payed_price_');
	  $thank_message = field_get_items('node', $node, 'field_thank_message');
	  $invoice_url = field_get_items('node', $node, 'field_invoice_url');



	?>
	<body>
		<!-- Branding/Contact Info -->
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="500" style="border-bottom:1px solid #d1d0d1; border-collapse:collapse; margin-bottom:40px; font-family:Arial,Helvetica,sans-serif; font-size:14px; line-height:20px;">
			<tr>
				<td align="left" width="75" style="padding:20px 0;">
					<a href="http://www.easybranding.be">
						<img src="logo.jpg" alt="EasyBranding" width="50" height="51" style="border:0;"/></a>
				</td>
				<td align="left" valign="middle" style="padding:20px 0;">
					<b>EasyBranding.be</b>, Gaston Crommenlaan 4/ bus 0501, BE-9050 Gent, <span style="color:#cc0000;">T: 09 000 000</span><br/>
					<a href="http://www.easybranding.be" style="text-decoration:none; color:#000000;">www.easybranding.be</a>,
					<a href="mailto:support@easybranding.be" style="text-decoration:none; color:#000000;">support@easybranding.be</a>
				</td>
			</tr>
		</table>


		<!-- Invoice To -->
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="500" style="border-collapse:collapse; font-family:Arial,Helvetica,sans-serif; font-size:14px; line-height:20px;">
			<tr>
				<td align="left" valign="bottom" width="30%">
					<b><?php echo check_plain($customer_name[0]['value']); ?></b><br/>
					<?php echo check_plain($customer_street[0]['value']); ?><br/>
					<?php echo check_plain($customer_city[0]['value']); ?><br/>
					<?php echo check_plain($customer_country[0]['value']); ?><br/>
					BTW n° <?php echo check_plain($customer_vat[0]['value']); ?>
				</td>
				<td align="left" valign="bottom" width="40%">
					<?php echo check_plain($customer_contact_name[0]['value']); ?><br/>
					<a href="mailto:<?php echo check_plain($customer_contact_email[0]['value']); ?>" style="text-decoration:none; color:#000000;"><?php echo check_plain($customer_contact_email[0]['value']); ?></a><br/>
					<?php echo check_plain($customer_contact_phone[0]['value']); ?>
				</td>
				<td align="left" valign="bottom" width="30%">
					<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; font-family:Arial,Helvetica,sans-serif; font-size:14px; line-height:20px;">
						<tr>
							<td style="padding-right:5px;">Datum:</td>
							<td align="right"><?php echo check_plain($date_pdf_created); ?></td>
						</tr>
						<tr>
							<td style="padding-right:5px;">Klant Id:</td>
							<td align="right"><?php echo check_plain($customer_id[0]['value']); ?></td>
						</tr>
						<tr>
							<td style="padding-right:5px;"><?php echo check_plain($invoice_label[0]['value']); ?>:</td>
							<td align="right"><?php echo check_plain($invoice_id[0]['value']); ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>


		<!-- Invoice Details -->
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="500" style="border-collapse:collapse; font-family:Arial,Helvetica,sans-serif; font-size:14px; line-height:20px;">
			<tr>
				<td colspan="2" style="font-size:24px; font-weight:bold; line-height:28px; padding:10px 0;">
					<?php echo check_plain($invoice_id_title[0]['value']); ?>
				</td>
			</tr>
			<tr>
				<td align="left" style="font-size:15px; font-weight:bold; padding:5px 0; border-top:1px solid #d1d0d1; border-bottom:1px solid #d1d0d1;">
					OMSCHRIJVING
				</td>
				<td align="center" style="border-left:1px solid #d1d0d1; font-size:15px; font-weight:bold; padding:5px 10px; border-top:1px solid #d1d0d1; border-bottom:1px solid #d1d0d1;">
					SUBTOTAAL
				</td>
			</tr>
			<tr>
				<td align="left" style="font-weight:bold; padding:5px 0;">
					<?php echo check_plain($product_title[0]['value']); ?></td>
				<td style="border-left:1px solid #d1d0d1; padding:5px 20px; text-align:right;">&nbsp;</td>
			</tr>
			<tr>
				<td style="padding:5px 0;">
					<?php echo check_plain($product_description[0]['value']); ?>
				</td>
				<td style="border-left:1px solid #d1d0d1; padding:5px 20px; text-align:right;">
					<?php echo check_plain($total_price[0]['value']); ?>
				</td>
			</tr>
			<?php
			  foreach($options as $option) {
                echo '<tr>';
                echo '<td style="padding:5px 0;">' . check_plain($option['name']) . '</td>';
                echo '<td style="border-left:1px solid #d1d0d1; padding:5px 20px; text-align:right;">' . check_plain($option['price']) . '</td>';
                echo '</tr>';
              }
			?>
			<tr>
				<td style="padding:5px 0;">
					<br/><br/>
					<p><b>Betalingsoverzicht</b><br/>
					Transactie ID: # 00000000 - Betalingsmethode: creditcard øøøø øøøø øøø<br/>
					Betaling: Dag, Datum, Uur, Tijdzone - Status: betaling succesvol ontvangen</p>
					<br/><br/><br/>
				</td>
				<td style="border-left:1px solid #d1d0d1; padding:5px 20px; text-align:right;">&nbsp;</td>
			</tr>

			<!-- Totals -->
			<tr>
				<td style="padding:5px 20px 5px 435px;">
					Subtotaal (btw excl.)
				</td>
				<td style="border-bottom:1px solid #d1d0d1; border-left:1px solid #d1d0d1; padding:5px 20px; text-align:right;">
					<?php echo check_plain($total_price_excl_vat[0]['value']); ?>
				</td>
			</tr>
			<tr>
				<td style="padding:5px 20px 5px 435px;">
					Coupon code
				</td>
				<td style="border-bottom:1px solid #d1d0d1; border-left:1px solid #d1d0d1; padding:5px 20px; text-align:right;">
					<?php echo check_plain($coupon_code[0]['value']); ?>
				</td>
			</tr>
			<tr>
				<td style="padding:5px 20px 5px 435px;">
					BTW 21%
				</td>
				<td style="border-bottom:1px solid #d1d0d1; border-left:1px solid #d1d0d1; padding:5px 20px; text-align:right;">
					<?php echo check_plain($vat[0]['value']); ?>
				</td>
			</tr>
			<tr>
				<td style="font-weight:bold; padding:5px 20px 5px 435px;">
					<?php echo check_plain($total_payed_text[0]['value']); ?>
				</td>
				<td style="border-left:1px solid #d1d0d1; font-weight:bold; padding:5px 20px; text-align:right;">
					<?php echo check_plain($total_payed_price[0]['value']); ?>
				</td>
			</tr>
			<tr>
				<td align="right" colspan="2" style="color:#f05815; padding:10px 20px;">
					<?php echo check_plain($thank_message[0]['value']); ?>
				</td>
			</tr>
		</table>


		<!-- Smallprint -->
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="500" style="border-collapse:collapse; margin-top:40px; font-family:Arial,Helvetica,sans-serif; font-size:11px; line-height:15px;">
			<tr>
				<td align="left" style="border-bottom:1px solid #d1d0d1; padding-bottom:15px;">
					Bekijk deze factuur ook op uw account:
					<a href="<?php echo check_plain($invoice_url[0]['value']); ?>" style="color:#000000;"><?php echo check_plain($invoice_url[0]['value']); ?></a><br/>
					Bij vragen over deze factuur, aarzel niet om contact op te nemen met onze klantendienst via
					<a href="mailto:support@easybranding.be" style="color:#000000;">support@easybranding.be</a>
				</td>
			</tr>
			<tr>
				<td align="left" style="padding-top:15px;">
					Elke klacht m.b.t deze factuur dient binnen 8 dagen schriftelijk meegedeeld te worden. Algemene voorwaarden zie
					<a href="www.easybranding.be/gebruikersvoorwaarden" style="color:#cc0000; text-decoration:none;">
						www.easybranding.be/gebruikersvoorwaarden</a>.<br/>
					EasyBranding maakt deel uit van TC Link BVBA, BTW BE 0849.403.363, RPR Kortrijk<br/>
					Maatschappelijke zetel: Avelgemstraat 250, BE-8550 Zwevegem, BNP 377-0209053-55, IBAN BE33 0016 7840 5346, BIC GEBABEBB
				</td>
			</tr>
		</table>
	</body>
</html>
