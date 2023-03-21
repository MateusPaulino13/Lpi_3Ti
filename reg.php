<?php
include 'conexao.php';

if (isset($_POST['sub'])) {
    $nome = $_POST['text'];
    $usuario = $_POST['user'];
    $senha = $_POST['pass'];
    $cidade = $_POST['city'];
    $g = $_POST['gen'];

    if ($_FILES['f1']['name']) {
        move_uploaded_file($_FILES['f1']['tmp_name'], "image/" . $_FILES['f1']['name']);
        $img = "image/" . $_FILES['f1']['name'];
    }

    //não coloquei no produto final pois não funcionou completamente

    // $verificacao = "SELECT * FROM reg WHERE username = '$usuario' AND password = '$senha'";
    // $resultado = mysqli_query($con, $verificacao);
    // if (mysqli_num_rows($resultado) > 0) {
    //     echo "já existe";
    // } else {
    //     echo "registra ai po";
    // }

    // mysqli_close($con);

    $i = "INSERT INTO reg(name, username, password, city, image, gender) VALUES('$nome','$usuario','$senha','$cidade','$img','$g')";

    mysqli_query($con, $i);
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="#">Lumany</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Register <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a class="btn btn-success my-2 my-sm-0 text-white" href="login.php" role="button">Login</a>
            </form>
        </div>
    </nav>
    <!-- navbar -->

    <form method="POST" enctype="multipart/form-data">

        <div class="container">
            <div class="row mt-3">
                <div class="form-group col-md-6">
                    <Label for="user">Nome :</Label>
                    <input class="form-control" type="text" name="text">
                </div>

                <div class="form-group col-md-6">
                    <Label for="user">Usuário :</Label>
                    <input class="form-control" type="text" name="user">
                </div>

                <div class="form-group col-md-6">
                    <Label for="pass">Senha :</Label>
                    <input class="form-control" type="password" name="pass">
                </div>

                <div class="form-group col-md-2 mt-3">
                    <label for="city">Cidade :</label>

                    <select name="city" class="custom-select mr-sm-2">
                        <option selected>Selecione</option>
                        <option value="Hortolandia">Hortolândia</option>
                        <option value="Campinas">Campinas</option>
                        <option value="Sumare">Sumaré</option>
                        <option value="Monte Mor">Monte Mor</option>
                        <option value="Nova Odesa">Nova Odesa</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <p class="h5 mt-3">Gênero</p>

                    <div class="row">
                        <div class="form-check col-md-7">
                            <input class="form-check-input" type="radio" name="gen" id="gen" value="male">
                            <label class="form-check-label" for="exampleRadios2">
                                Masculino
                            </label>
                        </div>

                        <div class="form-check col-md-3">
                            <input class="form-check-input" type="radio" name="gen" id="gen" value="female">
                            <label class="form-check-label" for="exampleRadios2">
                                Feminino
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <p class="h5">Imagem de Perfil : </p>

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="f1" name="f1">
            </div>

            <br>

            <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="sub" value="Cadastrar">
        </div>
    </form>
</body>

</html>