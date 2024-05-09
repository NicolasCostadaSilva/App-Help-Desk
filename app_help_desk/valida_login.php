<?php

    //session
    session_start();

    //variavel q verifica autenticacao
    $usuario_autenticado = false;

    $usuarios_app = array(
        array('email' => 'adm@teste.com', 'senha' => '123456'),
        array('email' => 'user@teste.com', 'senha' => 'abcd'),
    );

    $email = $_POST['email'];
    $senha = $_POST['senha'];
   
    foreach ($usuarios_app as $user) {
        $email_db = $user['email'];
        $senha_db = $user['senha'];

        if($email_db == $email && $senha_db == $senha) {
            $usuario_autenticado = true;
        }
    }

    if($usuario_autenticado) {
        header('Location: home.php');
        $_SESSION['autenticado'] = 'SIM';
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }
?>