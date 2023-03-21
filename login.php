<?php
//inclui a conexão
include 'conexao.php';

//Verifica se ha alguma informação vazia 
if (isset($_POST['sub'])) {
    $user = $_POST['user'];
    $password = $_POST['pass'];

    //se ter o user e a senha, se não cai no else
    $login = "SELECT * FROM reg WHERE username='$user' AND password= '$password'";
    $qu = mysqli_query($con, $login);

    //se houser algum registro maior que 0, redirecionará para a home
    if (mysqli_num_rows($qu) > 0) {
        $f = mysqli_fetch_assoc($qu);

        //cria a sessão com o ID do usuario
        $_SESSION['id'] = $f['id'];

        //direciona para a pagina home com os dados do usuário
        header('location:home.php');
    } else {
        echo '<p class="text-lowercase text-white">Usuário ou senha não existentes</p>';
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style/login.css">
</head>

<body>
    <!-- <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="login.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="reg.php">Cadastrar-se</a>
        </li>
    </ul> -->


    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <input type="text" name="user" placeholder="Usuário" required="required" />
            <input type="password" name="pass" placeholder="Senha" required="required" />
            <input type="submit" name="sub" value="Login" class="btn btn-primary btn-block btn-large">
        </form>
    </div>
</body>

</html>