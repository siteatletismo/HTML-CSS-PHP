<!DOCTYPE html>
<html>
<head>
    <title>TCC - Atletismo</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"> 
    <link rel="stylesheet" type="text/css" href="cadastro.css">

</head>

<body style="background: #9DC2D1;">



<?php

if($_POST){
// include da conexao com o BD
include "config/conexao.php";
try{


// insert query
$query = "INSERT INTO cad_usuario SET nome_completo=:nome_completo, cpf=:cpf, rg=:rg, email=:email, endereco=:endereco, 
cel=:cel, nome_usuario=:nome_usuario, senha=:senha";

// prepare query for execution
$stmt = $con->prepare($query);

// posted values
$nome_completo 			= htmlspecialchars(strip_tags($_POST['nome_completo']));
$cpf					= htmlspecialchars(strip_tags($_POST['cpf']));
$rg						= htmlspecialchars(strip_tags($_POST['rg']));
$email 					= htmlspecialchars(strip_tags($_POST['email']));
$endereco 				= htmlspecialchars(strip_tags($_POST['endereco']));
$cel					= htmlspecialchars(strip_tags($_POST['cel']));
$nome_usuario 			= htmlspecialchars(strip_tags($_POST['nome_usuario']));
$senha					= htmlspecialchars(sha1($_POST['senha']));

//echo $nome_usuario;
//echo $nome_completo;
//echo $telefone;
//echo $email;
//echo $endereco;
//echo $senha;


// bind the parameters

$stmt->bindParam(':nome_completo', $nome_completo);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':rg', $rg);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':cel', $cel);
$stmt->bindParam(':nome_usuario', $nome_usuario);
$stmt->bindParam(':senha', $senha);


// specify when this record was inserted to the database
//$data_criacao = date('Y-m-d H:i:s');
//$stmt->bindParam(':data_criacao', $data_criacao);


// Execute the query
if($stmt->execute()){
echo "<div class='alert alert-success'>Registro foi salvo.</div>";
}else{
echo "<div class='alert alert-danger'>Não foi possível salvar o
registro.</div>";
}
}


// show error
catch(PDOException $exception){
die('ERROR: ' . $exception->getMessage());
}
}

?>



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<table class='table table-hover table-responsive table-bordered'>

    <div class="loginbox" style="width: 800px; height: 985px; margin-top: 350px;">
    <h1 style="font-family: Montserrat; font-size: 30px; border-radius: 10px;">Cadastro de Usuário</h1>

</br>
</br>
</br>

        <p style="font-size: 20px;">Nome Completo</p>
        <input type="text" name="nome_completo" placeholder="Digite seu nome completo" required="">

        <p style="font-size: 20px;">CPF</p>
        <input type="text" name="cpf" placeholder="Digite seu CPF" required="">

        <p style="font-size: 20px;">RG</p>
        <input type="text" name="rg" placeholder="Digite seu RG" required="">
        
        <p style="font-size: 20px;">E-mail</p>
        <input type="email" name="email" placeholder="@gmail.com" required="">
        
        <p style="font-size: 20px;">Endereço</p>
        <input type="text" name="endereco" placeholder="Digite seu endereço" required="">

        <p style="font-size: 20px;">Telefone para contato</p>
        <input type="tel" name="cel" placeholder="Formato: (xx) xxxxx-xxxx" required="">

        <p style="font-size: 20px;">Nome de usuário</p>
        <input type="text" name="nome_usuario" placeholder="Digite seu nome de usuário" required="">
        
        <p style="font-size: 20px;">Senha</p>
        <input type="password" name="senha" placeholder="Digite sua senha" required=""> 
        

           
            <a href="login.html" style="font-size: 20px;">Já possui uma conta?</a>
            <br>           
            <br>

         </br>

        <input type='submit' value='Cadastrar' class='btn btn-primary' style="width: 300px;height: 40px; margin-left: 210px; font-size: 18px; " />
    </br>
   
        <a href='index.php' class='btn btn-danger' style="width: 300px; margin-top: -17px; height: 40px; font-size: 18px; margin-left: 210px; "> Voltar </a>


    </form>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</br>
</br>
</br>



  </div>
  </div>
  </div>





</body>
</html>