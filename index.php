!DOCTYPE html>
<html lang="pt-br" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/favicon.png"/>
  <title>WebSaúde</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>
  <div class="container">
    <div id="login" class="login">
      <div id="conteudo">
        <div class="header">
         <p id="titulo">WebSaúde</p>
       </div>
       <form action="assets/php/validaLogin.php" method="post">
         <div class="login-form">
          <div class="email">
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="E-mail" required>
          </div>
          <div class="senha">
           <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
         </div>
       </div>
       <div class="call-to-action">
        <button id="login-button" type="submit" name="login">Log In</button>
      <!--   <p>Esqueceu a senha? <a>Recupere aqui!</a></p> -->
      </div>
    </div>
  </div>
</div>
</div>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.js"></script>
</body>
</html>