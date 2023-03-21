<?php
include 'conexao.php';

$sq = "DELETE FROM reg WHERE id='$_SESSION[id]'";

mysqli_query($con, $sq);

header('location:add_district.php');
