<?php
include 'conexao.php';
?>
<table border='1'>
    <tr>
        <th>
            Nome
        </th>
        <th>
            Usuário
        </th>
    </tr>

    <?php
    $sql = "SELECT * FROM reg";
    $qu = mysqli_query($con, $sql);
    while ($f =  mysqli_fetch_assoc($qul)) {
    ?>
        <tr>
            <td>
                <?php echo $f['name'] ?>
            </td>
            <td>
                <?php echo $f['username'] ?>
            </td>
        </tr>
    <?php
    }
    ?>