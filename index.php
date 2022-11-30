<?php 
  require_once('src/PHPMailer.php');
  require_once('src/SMTP.php');
  require_once('src/Exception.php');

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $mail= new PHPMailer(true);

  try{
   //Habilitando o modo debug (nao é obrigatorio)
    $mail->SMTPDebug=SMTP::DEBUG_SERVER;
  //Estamos trabalhando com smtp
    $mail->isSMTP();
  //Host do smtp  
    $mail->Host='smtp.gmail.com';
  //Habilitando autenticacao via smtp  
    $mail->SMTPAuth= true;
  //usuario   
    $mail->Username='exemplo@exmplo.com';
  //senha  
    $mail->Password='passoword';
  //Encriptando envio
    $mail->SMPTSecure=PHPMailer::ENCRYPTION_SMTPS;
  //porta que iremos trabalhar
    $mail->Port=587;

    //congfigura email
    //de quem esta vindo
    $mail->setFrom('exemplo@exmplo.com','DevJhs');
    //para quem sera enviado
    $mail->addAddress('exemplo@exmplo.com', 'DevJhs');
    //Habilitando o uso de HTML  
    $mail->isHTML(true);
    //o assunto do email
    $mail->Subject='tentando enviar email !';
    //usando html
    $mail->Body='<strong>Email:</strong> de teste ! <br> <strong>Funcionou !!!</strong>';
    //mensagem substituta para emails que nao consegue carregar html
    $mail->AltBody='Email: de teste ! Funcionou !!!';

    //validacao se o email foi enviado
    if($mail->send()){
         echo 'Email enviado com sucesso !';
    }else{
        echo 'Erro email não enviado !';
    }

  }catch(Exception $e){
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
  }
  
?>