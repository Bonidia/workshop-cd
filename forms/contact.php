<?php

if (isset($_POST['send'])) {
 
//Variaveis de POST, Alterar somente se necessário 
//====================================================
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject']; 
    $message = $_POST['message'];
    $agree = $_POST['concordo'];
//====================================================
 
//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
//==================================================== 
    $email_remetente = "contato@newprivacy.com.br"; // deve ser uma conta de email do seu dominio 
//====================================================
 
//Configurações do email, ajustar conforme necessidade
//==================================================== 
    $email_destinatario = "contato@newprivacy.com.br"; // pode ser qualquer email que receberá as mensagens
    $email_reply = "$email"; 
    $email_assunto = "Contato"; // Este será o assunto da mensagem
//====================================================
 
//Monta o Corpo da Mensagem
//====================================================
    $email_conteudo = "Nome = $name \n"; 
    $email_conteudo .= "Email = $email \n";
    $email_conteudo .= "Assunto = $subject \n"; 
    $email_conteudo .= "Mensagem = $message \n";
    $email_conteudo .= "Termo = $$agree \n"; 
//====================================================
 
//Seta os Headers (Alterar somente caso necessario) 
//==================================================== 
    $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
//$email_headers = "Content-Type:text/html; charset=UTF-8\n";
//$email_headers .= "From: $email\n";
//$email_headers .= "X-Sender: $email\n";
//$email_headers .= "X-Mailer: PHP  v".phpversion()."\n";
//$email_headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
//$email_headers .= "Return-Path: $email\n";
//$email_headers .= "MIME-Version: 1.0\n";
//====================================================
 
//Enviando o email 
//==================================================== 
    if (mail($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
        echo "<script type='javascript'>alert('Email enviado com Sucesso!')</script>";
        header('location: ../index.html');
    }
//====================================================
} 
?>
 