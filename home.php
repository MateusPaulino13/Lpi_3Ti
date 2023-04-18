<?php
  //inclui a conexão
  include "conexao.php";

  //seleciona o id
  $sessao = "SELECT * FROM reg WHERE id='$_SESSION[id]'";

  //prepara pra execução do query e do select
  $qu = mysqli_query($con, $sessao);

  //retorna em tabelas ao usuario
  $f = mysqli_fetch_assoc($qu);
?>
<html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style/home.css">
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
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a class="btn btn-danger mr-3 my-2 my-sm-0 text-white" href="logoff.php" role="button">Sair</a>
        <a class="btn btn-success my-2 my-sm-0 text-white" href="login.php" role="button">Login</a>
      </form>
    </div>
  </nav>
  <!-- navbar -->
  <!-- Table -->
  <div class="table-wrapper">
    <table class="fl-table">
      <thead>
        <tr>
          <th>
            <h5>Name</h5>
          </th>
          <th>
            <h5>User</h5>
          </th>
          <th>
            <h5>Password</h5>
          </th>
          <th>
            <h5>City</h5>
          </th>
          <th>
            <h5>Gender</h5>
          </th>
          <th>
            <h5>Image</h5>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <h5>
              <?php echo $f["name"]; ?>
              <h5>
          </td>
          <td>
            <h5>
              <?php echo $f["username"]; ?>
            </h5>
          </td>
          <td>
            <h5>
              <?php echo $f["password"] . "<br>"; ?>
            </h5>
          </td>
          <td>
            <h5>
              <?php echo $f["city"] . "<br>"; ?>
            </h5>
          </td>
          <td>
            <h5>
              <?php echo $f["gender"] . "<br>"; ?> </h5>
          </td>
          <td><img style="border-radius: 50%; width: 50px; height:50px" src="<?php echo $f["image"]; ?>"></td>
        </tr>
      <tbody>
    </table>
  </div>
  <!-- Table -->
  <!-- Buttons -->
  <div class="btns">
    <a href="editar.php" class="edit">Edit</a>
    <a href="deletar.php" class="del">Delete</a>
  </div>
  <!-- Buttons -->
</body>

</html>