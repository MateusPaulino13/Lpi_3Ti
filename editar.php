<?php
include 'conexao.php';

if (isset($_POST['sub'])) {
    $t = $_POST['text'];
    $u = $_POST['user'];
    $p = $_POST['pass'];
    $c = $_POST['city'];
    $g = $_POST['gen'];

    if ($_FILES['f1']['name']) {
        move_uploaded_file($_FILES['f1']['tmp_name'], "image/" . $_FILES['f1']['name']);
        $img = "image/" . $_FILES['f1']['name'];
    } else {
        $img = $_POST['img1'];
    }

    $i = "update reg set name='$t',username='$u',password='$p',city='$c',gender='$g',image='$img' where id='$_SESSION[id]'";

    mysqli_query($con, $i);
    header('location:home.php');
}

$s = "SELECT * FROM reg WHERE id='$_SESSION[id]'";
$qu = mysqli_query($con, $s);
$f = mysqli_fetch_assoc($qu);
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="style/reg.css">
            <title>Edit</title>
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
                    <input type="text" class="form-control" name="text" value="<?php echo $f['name'] ?>">
                </div>

                <div class="form-group col-md-6">
                    <Label for="user">Usuário :</Label>
                    <input class="form-control" type="text" name="user" value="<?php echo $f['username'] ?>">
                </div>

                <div class="form-group col-md-6">
                    <Label for="pass">Senha :</Label>
                    <input class="form-control" type="password" name="pass" value="<?php echo $f['password'] ?>">
                </div>

                <div class="form-group col-md-2 mt-3">
                    <label for="city">Cidade :</label>

                    <select name="city" class="custom-select mr-sm-2">
                    <option value="">Selecione</option>
                        <option value="Hortolândia" <?php if ($f['city'] == 'Hortolândia') {echo "selected='selected'";} ?>>Hortolândia</option>
                        <option value="Campinas" <?php if ($f['city'] == 'Campinas') {echo "selected='selected'";} ?>>Campinas</option>
                        <option value="Sumaré" <?php if ($f['city'] == 'Sumaré') {echo "selected='selected'";} ?>>Sumaré</option>
                        <option value="Monte Mor" <?php if ($f['city'] == 'Monte Mor') {echo "selected='selected'";} ?>>Monte Mor</option>
                        <option value="Nova Odesa" <?php if ($f['city'] == 'Nova Odesa') {echo "selected='selected'";} ?>>Nova Odesa</option>
                        <option value="Americana" <?php if ($f['city'] == 'Americana') {echo "selected='selected'";} ?>>Americana</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <p class="h5 mt-3">Gênero</p>

                    <?php 
                            if ($f['gender'] == 'male') {
                            ?>
                                <input class="form-check-input" type="radio" name="gen" id="gen" value="masculino" checked>
                            <?php
                            } else {
                            ?>
                                <input class="form-check-input" type="radio" name="gen" id="gen" value="masculino">
                            <?php 
                            } 
                            ?> 
                            <label class="form-check-label mr-3" for="exampleRadios2">
                                Masculino
                            </label>
                            <?php 
                            if ($f['gender'] == 'female') {
                            ?>
                                <input class="form-check-input" type="radio" name="gen" id="gen" value="feminino" checked>
                            <?php
                            } else {
                            ?>
                                <input class="form-check-input" type="radio" name="gen" id="gen" value="feminino">
                            <?php 
                            } 
                            ?> 
                            <label class="form-check-label" for="exampleRadios2">
                                Feminino
                            </label>
                </div>
            </div>

            <p class="h5">Imagem de Perfil : </p>

            <div class="custom-file">
                <input type="file"  id="f1" name="f1">
                <img src="<?php echo $f['image'] ?>" width="100px" height="100px">
                <input type="hidden" name="img1" value="<?php echo $f['image'] ?>">
            </div>

            <br>

            <input class="btn btn-outline-success btn-lg btn-block mt-5" type="submit" name="sub" value="Editar">
        </div>
    
        </body>
    </html>