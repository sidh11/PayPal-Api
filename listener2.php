<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 require 'vendor/autoload.php';
 $mail = new PHPMailer(true);
header('HTTP/1.1 200 OK');

$resp = 'cmd=_notify-validate';
foreach ($_POST as $parm => $var) 
	{
	$var = urlencode(stripslashes($var));
	$resp .= "&$parm=$var";
	}
	

  $item_name        = $_POST['item_name'];
  $item_number      = $_POST['item_number'];
  $payment_status   = $_POST['payment_status'];
  $payment_amount   = $_POST['mc_gross'];
  $payment_currency = $_POST['mc_currency'];
  $txn_id           = $_POST['txn_id'];
  $receiver_email   = $_POST['receiver_email'];
  $payer_email      = $_POST['payer_email'];
  $record_id	 	= $_POST['custom'];
  


$httphead = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$httphead .= "Content-Type: application/x-www-form-urlencoded\r\n";
$httphead .= "Content-Length: " . strlen($resp) . "\r\n\r\n";
 


$errno ='';
$errstr='';
 
$fh = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);


 
 if (!$fh) {
 

           } 
		   
	   
else 	{
           fputs ($fh, $httphead . $resp);
		   while (!feof($fh))
				{
				$readresp = fgets ($fh, 1024);
				if (strcmp ($readresp, "VERIFIED") == 0) 
					{
                        try {
   
                            //Server settings
                            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                            $mail->isSMTP();                                            // Send using SMTP
                            $mail->Host       = ' smtp.gmail.com';                    // Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $mail->Username   = 'Nottysid@gmail.com';                     // SMTP username
                            $mail->Password   = 'wgnkzqevgcfuspya';                               // SMTP password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                        
                            //Recipients
                            $mail->setFrom("Sidhp.09@gmail.com", "sid");
                            $mail->addAddress($payer_email, "user");     // Add a recipient
                          
                        
                            
                        
                            // Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = 'Your Purchase Details Invoice Number:' + $txn_id;
                            $mail->Body    = '<h2>Hi, <br><br>
                            // 		Thank you for purchase.' + $payer_email + '</h2>';
                           // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        
                            $mail->send();
                           //echo 'Message has been sent';
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }   

					}
 
				else if (strcmp ($readresp, "INVALID") == 0) 
					{
 

 
					}
				}
fclose ($fh);
		}
    

?>