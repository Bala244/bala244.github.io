

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
    $mail->Host = 'localhost';
    $mail->Port = 25;
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->SMTPSecure = false;
    $mail->SMTPAutoTLS = false;
    $mail->SMTPAuth = false;  
     $mail->SMTPDebug    = 2; 
    $mail->Username = 'rooneymaraa@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Aeiou@2020'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->setFrom('balanagendrakumar244@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('balanagendrakumar244@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Portfolio)';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Phone Number : $phone<br>Message : $message</h3>";

    if ($mail->send()) {
      header('location:index');
    }
    echo '';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>