<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="./CSS/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./CSS/estilo.css">
    <script src="./CSS/node_modules/jquery/dist/jquery.js"></script>
    <script src="./CSS/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="./CSS/node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <?php 
        $paranetro = filter_input(INPUT_GET, "parametro");
        $mysqllink = mysql_connect("localhost","root","");
        mysql_select_db("pdshospital");

        if($paranetro){
            $dados = mysql_query("select * from Enfermeiro where like nome '$parametro'");

        } else {
            $dados = mysql_query("select * from Enfermeiro "); 
        }

        $linha = mysql_fetch_assoc($dados);
        $total = mysql_num_rows($dados);
    ?>
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="cliente.php">Paciente</a>
        <a class="navbar-brand" href="medico.php">Medico</a>
        <a class="navbar-brand" href="enfermeiro.php">Enfermeiro</a>
        <a class="navbar-brand" href="exame.php">Exames</a>
    </nav>
    <br><br>


    <div>
        <h1>Cadastro de Enfermeiro </h1>

    </div>

    <div id="list" class="row">

    <div class="table-responsive col-md-12">
    <table class="table table-striped" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>CPF</td>              
                <th class="actions">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($total) do {
            ?>

            <tr>
                <td><?php echo $linha['id'] ?> </td>
                <td><?php echo $linha['nome'] ?></td>
                <td><?php echo $linha['cpf'] ?></td>
            
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo "EnfermeiroForm.php?id=". $linha['id']  ?>">Editar</a>                
                    <a class="btn btn-danger btn-xs" href="#" data-toggle="modal"  href="<?php echo "BuilderEnfermeiro.php?id=". $linha['id']  ?>">Excluir</a>
                </td>
            </tr>
            <?php 
               } while($linha = mysql_fetch_assoc($dados));
               mysql_free_result($dados);
               mysql_close($mysqllink);
            ?>

        </tbody>
    </table>

</div>
</div>
    
</body>
</html>