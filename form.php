

 <?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  
 $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'carlosjensen.mktg@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Thynkk@2021'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('arunprashad1281@gmail.com', 'Prime connectz Landing Page'); // Gmail address which you used as SMTP server
    $mail->addAddress('arunprashad1281@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Primeconnectz langing page)';
    $mail->Body = "<h3><h3>Name : $name <br>Email: $email <br>Phone Number : $phone<br>Message : $message</h3></h3>";

    if ($mail->send()) {
      echo "<script type='text/javascript'> document.location = 'error'; </script>";
    }
    echo '';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
