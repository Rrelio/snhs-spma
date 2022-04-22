<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require '../PHPMailer/Exception.php';
  require '../PHPMailer/PHPMailer.php';
  require '../PHPMailer/SMTP.php';

  date_default_timezone_set("Asia/Manila");
  $data = json_decode($_GET['obj'], true);
  $to =  $data['email'];

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tsl";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "snhs.spma@gmail.com";
  $mail->Password   = "spma3.14";

  $mail->IsHTML(true);
  $mail->SetFrom("snhs.spma@gmail.com", "Student Performance Monitoring Application");
  $mail->AddAddress(address:$to);
  $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";

  $message = "<html>";
  $message .= '</style>';
  $message .= '<body style="font-family: Arial, Helvetica, sans-serif;">';
  $message .= '';
  $message .= '<div style="background-color: #ffffff; width: 100%; min-width: 600px; font-family: sans-serif;">';
  $message .= '<img src="https://lh3.googleusercontent.com/MOeBDze4BXdAwR8_VfwI6xiCIE-ucSbCKTUoNEnfKpN-EDueKIyqRbCeq7E96o_RptuAnu3omw49lvHJ7BTIKScNTjm__Nb9lGC7HrKjQyaXx3idYjPl-eggGie5bXzi8UetKx0whTSpnlg2ul6SW-nee3JiYw-96WEzijZN4pz3zRfeLXGIGFZgr9CaXxUww1uouFPKNwTTUkj6Fpz0IHKceNH5EkS8HsXpZwgNy367-xCBKIlxsvqqDars9qMGKk3Rfh2U2nCxSBXdYgKHG9AxdpzjK4q5MFY7WSPj5Lo5UAGI796XrEmQbzfAswahEaxxCs6ZymhdfFgs_hdia-9_r8ttE2kvQBFEilUk-AfJfuWfIbaOshnND1ewHWvUKrFVApOp13aG3OH95bBaB7sI07-mE0um1FK4K1-fVb2OdKjLDGykbrH3a97or_XoV_SYYqbr17x4i0qmuc0STp3CIVZ-KtHxokUc4c8L9bEj3f1EUoHQzmPKSHqlaDfzCwSQRSazaqmx4X-isVG8BbVEi8f5Y0C1PZeJYH2p4eYwLR3ZLvXr-WvZKcg-ovdnreutj1dDYNO81ub4APqz0TTuC6m-l_a5fzS52cO3TJs84YoB09w8IUqnBMnBCFVJefexGkOgFIPwEn8tXKSXcBkueCXXWx8zGb2Qsz1Y1kZOTu4FCQpjNA1FXN1yrOjXpXygJET_fYntJyETu-nOqYzCorQ8XB8Kp6y5FAox2Yp9rn9QVRUTASXZQOh8hIVYAm5AAvNI5rxYe0YxiyeS_63sieAiaCVN5QDARtBt0aOs7uVy5MjNncvwy6PANgQINSWguZ18IbgI5ZdCRY-DDTXcQYkWin9bSJSa-W8FNnw=w663-h303-no?authuser=2" alt="" style="display: block; min-height: 50px; height: 90px; width: auto; align-self: center; margin: auto;">';
  $message .= '<div style="font-size: 26px; margin: 30px 0; letter-spacing: 2px; color: #202020; text-align: center;">';
  $message .= '    <div style="margin-bottom: 25px;">Your administrator sign in code</div>';
  $message .= '    <div>'.$data["code"].'</div>';
  $message .= '</div>';
  $message .= '<div style="width:50%; margin: 50px auto;letter-spacing: 1px;  background-color: #20508A; color: #f7f7f7; padding: 0 10px 20px 10px; border-radius: 5px;">';
  $message .= '    <div style="text-align: end; padding-top: 10px;">';
  $message .= '        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">';
  $message .= '            <circle cx="8" cy="8" r="8"/>';
  $message .= '        </svg>';
  $message .= '        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">';
  $message .= '            <circle cx="8" cy="8" r="8"/>';
  $message .= '        </svg>';
  $message .= '    </div>';
  $message .= '    <p style="margin-top: 0;">Hello Admin,</p>';
  $message .= '    <p>You have recently used your email address to log in to the Student Performance Monitoring Application. We have sent the verification code for you log in.</p>';
  $message .= '    <p>If you did not request a verification code, please ignore this email</p>';
  $message .= '</div>';
  $message .= '</div>';
  $message .= '</body>';
  $message .= '</html>';

  $mail->MsgHTML($message); 
  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    )
  );
  if(filter_var($to, FILTER_VALIDATE_EMAIL)){
    if(!$mail->Send()) {
      echo "Not Sent";
      var_dump($mail);
    } else {
      echo "Sent";
    }
  }else{
   echo "Invalid Email";
  }
?>