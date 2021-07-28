<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	// if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	// 	header('Location: index.php');
	// 	exit();
	// }

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "cmd=_notify-validate&" . http_build_query($_POST));
	$response = curl_exec($ch);
	curl_close($ch);

	if ($response == "VERIFIED" ) {
		$cEmail = $_POST['payer_email'];
		$name = $_POST['first_name'] . " " . $_POST['last_name'];
		$payer_email=$_POST['payer_email'];
		$price = $_POST['mc_gross'];
		$invoice = $_POST['invoice'];
		$business = $_POST['business'];
		$currency = $_POST['mc_currency'];
		$item = $_POST['item_number'];
		$paymentStatus = $_POST['payment_status'];

		//if ($paymentStatus == "Completed" ) 
		
			try {
   
				//Server settings
				//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
				$mail->isSMTP();                                            // Send using SMTP
				$mail->Host       = ' smtp.gmail.com';                    // Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				$mail->Username   = 'bhupendrabanothe@gmail.com';                     // SMTP username
				$mail->Password   = 'pegqzsurprcbpffy';                               // SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			
				//Recipients
				$mail->setFrom($business, $business);
				$mail->addAddress($payer_email, $name);     // Add a recipient
			  
			
				// Attachments
			   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			
				// Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'Your Purchase Details Invoice Number:' + $invoice;
				$mail->Body    = '<h2>Hi, <br><br>
				// 		Thank you for purchase.' + $name + '</h2>';
			   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
				$mail->send();
			   //echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
			// 	$mail = new PHPMailer();
			
		// 	$mail->setFrom("Sidhp.09@gmail.com", "Sales");
		// //$mail->addAttachment("attachments/webfeature.zip", "Webfeature");
		// 	$mail->addAddress($cEmail, $name);
		// 	$mail->isHTML(true);
		// 	$mail->Subject = "Your Purchase Details";
		// 	$mail->Body = "
		// 		Hi, <br><br>
		// 		Thank you for purchase. In the attachment you will find my
		// 		Amazing WordPress Plugin.<br><br>
				
		// 		Kind regards,
		// 		Sid
		// 	";

		// 	$mail->send();
		}
	
?>
