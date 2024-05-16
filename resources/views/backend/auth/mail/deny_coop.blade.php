<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/templatemo-lugx-gaming.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/format.css') }}">
<link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>


<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;

if(!class_exists('PHPMailer\PHPMailer\Exception')){
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$htmlContent = '
<!DOCTYPE html>
<html lang="en" class="miro" style="background-color: #007cf8; font-size: 0; line-height: 0;">
  <head xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" style="font-family: Helvetica,Arial,sans-serif;">
    <meta charset="UTF-8" style="font-family: Helvetica,Arial,sans-serif;" />
    <title style="font-family: Helvetica,Arial,sans-serif;">Deny Your Co-Op Request</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" style="font-family: Helvetica,Arial,sans-serif;" />
    <meta name="viewport" content="width=device-width" style="font-family: Helvetica,Arial,sans-serif;" />
  </head>
  <body style="-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; background-color: #007cf8; box-sizing: border-box; color: #0a0a0a; font-family: Helvetica,Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 1.43; min-width: 600px; text-align: left; width: 100% !important; margin: 0; padding: 0;" bgcolor="#f3f4f8">
    <div style="display: none; max-height: 0px; overflow: hidden; mso-hide:all;">Make your concepts click with your team, visualize your ideas like a pro</div>
    <div style="display: none; max-height: 0px; overflow: hidden; mso-hide:all;"></div>
    <table class="miro__container" align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; font-family: Helvetica,Arial,sans-serif; max-width: 600px; min-width: 600px; text-align: left; vertical-align: top; padding: 0;">
      <tbody>
        <tr style="font-family: Helvetica,Arial,sans-serif; text-align: left; vertical-align: top; padding: 0;" align="left">
          <td class="miro__content-wrapper" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica,Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 1.43; text-align: left; vertical-align: top; word-wrap: break-word; margin: 0; padding: 43px 0 0;" align="left" valign="top">
            <div class="miro__content border-radius-8" style="background-color: #fff; font-family: Helvetica,Arial,sans-serif; border-radius: 8px;">
              <div class="miro__header" style="font-family: Helvetica,Arial,sans-serif; height: 100%; min-height: 100px; padding: 0 40px;">
                <h1 style="text-align: center; line-height: 100px; color: #007cf8;">Hopi Steam</h1>
              </div>
              <div class="miro__content-body" style="font-family: Helvetica,Arial,sans-serif;">

                <div class="miro-template" style="font-family: Helvetica,Arial,sans-serif; margin-bottom: 64px; padding: 0 40px;">

                  <div class="miro-template__title" style="color: #050038; font-family: Helvetica,Arial,sans-serif; font-size: 32px; font-stretch: normal; font-style: normal; font-weight: 700; letter-spacing: normal; line-height: 1.25; margin-bottom: 16px;">
                    Im so sorry to say but you are not suitable. See you in a next season. May be we will need your cooperation in the future !!!
                  </div>
                  <div class="miro-template__subtitle" style="color: #050038; font-family: Helvetica,Arial,sans-serif; font-size: 20px; font-stretch: normal; font-style: normal; font-weight: 400; letter-spacing: normal; line-height: 1.4; margin-bottom: 24px; opacity: .7;">
                  </div>

                </div>

                <table class="spacer" style="border-collapse: collapse; border-spacing: 0; font-family: Helvetica,Arial,sans-serif; text-align: left; vertical-align: top; width: 100%; padding: 0;">
                  <tbody style="font-family: Helvetica,Arial,sans-serif;">
                    <tr style="font-family: Helvetica,Arial,sans-serif; text-align: left; vertical-align: top; padding: 0;" align="left">
                      <td height="16px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #fff; font-family: Helvetica,Arial,sans-serif; font-size: 16px; font-weight: 400; hyphens: auto; line-height: 16px; mso-line-height-rule: exactly; text-align: left; vertical-align: top; word-wrap: break-word; margin: 0; padding: 0;" align="left" valign="top">
                         </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="miro__footer" style="font-family: Helvetica,Arial,sans-serif; padding-bottom: 72px; padding-top: 42px;">
              <table align="center" style="border-collapse: collapse; border-spacing: 0; font-family: Helvetica,Arial,sans-serif; text-align: left; vertical-align: top; padding: 0;">
                <tbody>
                  <tr style="font-family: Helvetica,Arial,sans-serif; text-align: left; vertical-align: top; padding: 0;" align="left">
                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #fff; font-family: Helvetica,Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 1.43; text-align: left; vertical-align: top; word-wrap: break-word; margin: 0; padding: 0 0 16px;" align="left" valign="top">
                      <a href="https://email.info.miro.com/e/c/eyJlbWFpbF9pZCI6IlJNRF9Bd0FBQVhKbVFkRDRtYzVrczZtS2ROYzBBZz09IiwiaHJlZiI6Imh0dHBzOi8vbWlyby5jb20vYmxvZy8_dHJhY2s9dHJ1ZVx1MDAyNnV0bV9zb3VyY2U9b25ib2FyZGluZyUyMGZsb3dcdTAwMjZ1dG1fbWVkaXVtPWVtYWlsXHUwMDI2dXRtX2NhbXBhaWduPWFycmFuZ2UlMjBjb250ZW50XHUwMDI2dXRtX2NvbnRlbnQ9QmxvZ1x1MDAyNnV0bV9jYW1wYWlnbj1PbmJvYXJkaW5nXHUwMDI2dXRtX2NvbnRlbnQ9MTArd2F5cyt0byt2aXN1YWxpemUreW91citpZGVhc1x1MDAyNnV0bV9tZWRpdW09ZW1haWxfYWN0aW9uXHUwMDI2dXRtX3NvdXJjZT1jdXN0b21lci5pbyIsImxpbmtfaWQiOjg3MzY0NDUsInBvc2l0aW9uIjo0fQ/ff76150220edc57388a4c9fbed04beb74189055426f9dab12ac457b4029a5a09" style="color: #fff; font-family: Helvetica; font-size: 14px; font-weight: 400; line-height: 24px; opacity: .9; text-align: left; text-decoration: none; margin: 0; padding: 0;">Blog</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table align="center" class="miro__footer-ico-group" style="border-collapse: collapse; border-spacing: 0; font-family: Helvetica,Arial,sans-serif; text-align: left; vertical-align: top; padding: 0;">
                <tbody>
                  <tr style="font-family: Helvetica,Arial,sans-serif; text-align: left; vertical-align: top; padding: 0;" align="left">
                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #fff; font-family: Helvetica,Arial,sans-serif; font-size: 14px; font-weight: 400; height: 56px; hyphens: auto; line-height: 1.43; text-align: left; vertical-align: middle; width: 56px; word-wrap: break-word; margin: 0; padding: 0;" align="left" valign="middle">
                      <a href="https://email.info.miro.com/e/c/eyJlbWFpbF9pZCI6IlJNRF9Bd0FBQVhKbVFkRDRtYzVrczZtS2ROYzBBZz09IiwiaHJlZiI6Imh0dHBzOi8vZmFjZWJvb2suY29tL2dldG1pcm8vP3RyYWNrPXRydWVcdTAwMjZ1dG1fc291cmNlPW9uYm9hcmRpbmclMjBmbG93XHUwMDI2dXRtX21lZGl1bT1lbWFpbFx1MDAyNnV0bV9jYW1wYWlnbj1hcnJhbmdlJTIwY29udGVudFx1MDAyNnV0bV9jb250ZW50PUZhY2Vib29rXHUwMDI2dXRtX2NhbXBhaWduPU9uYm9hcmRpbmdcdTAwMjZ1dG1fY29udGVudD0xMCt3YXlzK3RvK3Zpc3VhbGl6ZSt5b3VyK2lkZWFzXHUwMDI2dXRtX21lZGl1bT1lbWFpbF9hY3Rpb25cdTAwMjZ1dG1fc291cmNlPWN1c3RvbWVyLmlvIiwibGlua19pZCI6ODczNjM3OSwicG9zaXRpb24iOjV9/4639f2f22985ac93e1ac66fbc3530782541a63d5e924924f3922db5b19a88043" target="_blank" style="color: #2a79ff; font-family: Helvetica,Arial,sans-serif; font-weight: 400; line-height: 1.43; text-align: left; text-decoration: none; margin: 0; padding: 0;"><img src="https://rtb-production-eu-mail.s3.eu-west-1.amazonaws.com/miro/images/facebook.png" style="-ms-interpolation-mode: bicubic; clear: both; display: block; font-family: Helvetica,Arial,sans-serif; height: auto; max-height: 100%; max-width: 100%; outline: 0; text-decoration: none; width: auto; border: none;" /></a>
                    </td>
                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #fff; font-family: Helvetica,Arial,sans-serif; font-size: 14px; font-weight: 400; height: 56px; hyphens: auto; line-height: 1.43; text-align: left; vertical-align: middle; width: 56px; word-wrap: break-word; margin: 0; padding: 0;" align="left" valign="middle">
                      <a href="https://email.info.miro.com/e/c/eyJlbWFpbF9pZCI6IlJNRF9Bd0FBQVhKbVFkRDRtYzVrczZtS2ROYzBBZz09IiwiaHJlZiI6Imh0dHBzOi8vdHdpdHRlci5jb20vbWlyb2hxP3RyYWNrPXRydWVcdTAwMjZ1dG1fc291cmNlPW9uYm9hcmRpbmclMjBmbG93XHUwMDI2dXRtX21lZGl1bT1lbWFpbFx1MDAyNnV0bV9jYW1wYWlnbj1hcnJhbmdlJTIwY29udGVudFx1MDAyNnV0bV9jb250ZW50PUZhY2Vib29rdHJhY2s9dHJ1ZVx1MDAyNnV0bV9zb3VyY2U9b25ib2FyZGluZyUyMGZsb3dcdTAwMjZ1dG1fbWVkaXVtPWVtYWlsXHUwMDI2dXRtX2NhbXBhaWduPWFycmFuZ2UlMjBjb250ZW50XHUwMDI2dXRtX2NvbnRlbnQ9VHdpdHRlclx1MDAyNnV0bV9jYW1wYWlnbj1PbmJvYXJkaW5nXHUwMDI2dXRtX2NvbnRlbnQ9MTArd2F5cyt0byt2aXN1YWxpemUreW91citpZGVhc1x1MDAyNnV0bV9tZWRpdW09ZW1haWxfYWN0aW9uXHUwMDI2dXRtX3NvdXJjZT1jdXN0b21lci5pbyIsImxpbmtfaWQiOjg3MzYzODAsInBvc2l0aW9uIjo2fQ/2943b2d16cc810e97c478a8b26df324b0d60d3efe6318c5e7db7000c0acd40b7" target="_blank" style="color: #2a79ff; font-family: Helvetica,Arial,sans-serif; font-weight: 400; line-height: 1.43; text-align: left; text-decoration: none; margin: 0; padding: 0;"><img src="https://rtb-production-eu-mail.s3.eu-west-1.amazonaws.com/miro/images/twitter.png" style="-ms-interpolation-mode: bicubic; clear: both; display:
 block; font-family: Helvetica,Arial,sans-serif; height: auto; max-height: 100%; max-width: 100%; outline: 0; text-decoration: none; width: auto; border: none;" /></a>
                    </td>
                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #fff; font-family: Helvetica,Arial,sans-serif; font-size: 14px; font-weight: 400; height: 56px; hyphens: auto; line-height: 1.43; text-align: left; vertical-align: middle; width: 56px; word-wrap: break-word; margin: 0; padding: 0;" align="left" valign="middle">
                      <a href="https://email.info.miro.com/e/c/eyJlbWFpbF9pZCI6IlJNRF9Bd0FBQVhKbVFkRDRtYzVrczZtS2ROYzBBZz09IiwiaHJlZiI6Imh0dHBzOi8vd3d3LmxpbmtlZGluLmNvbS9jb21wYW55L21pcm9ocS8_dHJhY2s9dHJ1ZVx1MDAyNnV0bV9zb3VyY2U9b25ib2FyZGluZyUyMGZsb3dcdTAwMjZ1dG1fbWVkaXVtPWVtYWlsXHUwMDI2dXRtX2NhbXBhaWduPWFycmFuZ2UlMjBjb250ZW50XHUwMDI2dXRtX2NvbnRlbnQ9TGlua2VkSW5cdTAwMjZ1dG1fY2FtcGFpZ249T25ib2FyZGluZ1x1MDAyNnV0bV9jb250ZW50PTEwK3dheXMrdG8rdmlzdWFsaXplK3lvdXIraWRlYXNcdTAwMjZ1dG1fbWVkaXVtPWVtYWlsX2FjdGlvblx1MDAyNnV0bV9zb3VyY2U9Y3VzdG9tZXIuaW8iLCJsaW5rX2lkIjo4NzM3NDA4LCJwb3NpdGlvbiI6N30/b66c02ff738c40884704396010917a1026e1a48e42c6bada25f02d53a1311653" target="_blank" style="color: #2a79ff; font-family: Helvetica,Arial,sans-serif; font-weight: 400; line-height: 1.43; text-align: left; text-decoration: none; margin: 0; padding: 0;"><img src="https://rtb-production-eu-mail.s3.eu-west-1.amazonaws.com/miro/images/in.png" style="-ms-interpolation-mode: bicubic; clear: both; display: block; font-family: Helvetica,Arial,sans-serif; height: auto; max-height: 100%; max-width: 100%; outline: 0; text-decoration: none; width: auto; border: none;" /></a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="miro__footer-title" style="color: #fff; font-family: Helvetica,Arial,sans-serif; font-size: 16px; font-stretch: normal; font-style: normal; font-weight: 400; letter-spacing: normal; line-height: 1.38; margin-top: 40px; opacity: .7; text-align: center;" align="center">
                You have received this notification because you have signed up<br style="font-family: Helvetica,Arial,sans-serif;" />for <a href="https://email.info.miro.com/e/c/eyJlbWFpbF9pZCI6IlJNRF9Bd0FBQVhKbVFkRDRtYzVrczZtS2ROYzBBZz09IiwiaHJlZiI6Imh0dHBzOi8vbWlyby5jb20vaW5kZXgvP3RyYWNrPXRydWVcdTAwMjZ1dG1fc291cmNlPW9uYm9hcmRpbmclMjBmbG93XHUwMDI2dXRtX21lZGl1bT1lbWFpbFx1MDAyNnV0bV9jYW1wYWlnbj1hcnJhbmdlJTIwY29udGVudFx1MDAyNnV0bV9jb250ZW50PU1pcm9cdTAwMjZ1dG1fY2FtcGFpZ249T25ib2FyZGluZ1x1MDAyNnV0bV9jb250ZW50PTEwK3dheXMrdG8rdmlzdWFsaXplK3lvdXIraWRlYXNcdTAwMjZ1dG1fbWVkaXVtPWVtYWlsX2FjdGlvblx1MDAyNnV0bV9zb3VyY2U9Y3VzdG9tZXIuaW8iLCJsaW5rX2lkIjo4NzM2NDQ2LCJwb3NpdGlvbiI6OH0/2c58b5db75c5a0eaf432e0b5f44687fb0a86aa555ad8018607969b18044ad89d" target="_blank" style="color: inherit; font-family: Helvetica,Arial,sans-serif; font-weight: 400; line-height: 1.43; text-align: left; text-decoration: none; margin: 0; padding: 0;">Hopi Steam</a>
                — endless online whiteboard for team collaboration.
              </div>
              <div class="miro__footer-subtitle" style="color: #fff; font-family: Helvetica,Arial,sans-serif; font-size: 14px; font-stretch: normal; font-style: normal; font-weight: 300; letter-spacing: normal; line-height: 1.43; margin-top: 16px; opacity: .6; text-align: center;" align="center">
                <a href="#" target="_blank" style="color: inherit; font-family: Helvetica,Arial,sans-serif; font-weight: 400; line-height: 1.43; text-align: left; margin: 0; padding: 0;">Customize</a>
                your updates from Hopi Steam or <a href="#" target="_blank" style="color: inherit; font-family: Helvetica,Arial,sans-serif; font-weight: 400; line-height: 1.43; text-align: left; margin: 0; padding: 0;">unsubscribe</a>.
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- prevent Gmail on iOS font size manipulation -->
    <div style="display: none; white-space: nowrap; font: 15px courier;">
    </div>
  </body>
</html>
';
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'thanht43069@gmail.com';                     //SMTP username
    $mail->Password   = 'kkpu kubo zllt ycli';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('thanht43069@gmail.com', 'Hopi Steam');
    $mail->addAddress($email);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML

    //include content here
    $mail->Subject = 'Confirm Your Email';
    $mail->Body    = $htmlContent;

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}