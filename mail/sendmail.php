<?php 

include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/SMTP.php";
include "PHPMailer/src/POP3.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer{
    public function send_mail($tieude, $noidung, $maildathang){
        $mail = new PHPMailer();
        try {
            $mail->SMTPDebug = 1;                    
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                              
            $mail->Username   = "phuochuy.smlll@gmail.com";              
            $mail->Password   = "huyvo2020";                            
            $mail->SMTPSecure = 'ssl';          
            $mail->Port       = 587;                                
        
            $mail->setFrom("phuochuy.smlll@gmail.com", 'H Store');   
            $mail->addAddress($maildathang);               

            $mail->isHTML(true);                             
            $mail->Subject = $tieude;
            $mail->Body    = $noidung;
        
            $mail->send();
        } catch (Exception $e) {
            echo "Mail không thể gửi. Mail thất bại: {$mail->ErrorInfo}";
        }
    }
}