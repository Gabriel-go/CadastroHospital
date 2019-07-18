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

       
        $dados = mysql_query("SELECT e.id as id,e.DT_ENTRADA,e.DT_RETORNO, c.id as Cli,c.nome as noneCli, m.id as Me,m.nome as nomeMe, f.id as Enf,m.nome as nomeEnf FROM exame e inner join cliente c on (c.id = e.fk_cliente) inner join medico m on (m.id = e.FK_MEDICO) inner join enfermeiro f on (f.id = e.FK_ENFERMEIRO) where 1");

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
        <h1>Tela de Exames</h1>

    </div>

    <div id="list" class="row">

    <div class="table-responsive col-md-12">
    <table class="table table-striped" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Data Consulta</td>   
                <td>Data Retorno</td>              
                <th class="actions">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($total) do {
            ?>

            <tr>
                <td><?php echo $linha['id'] ?> </td>
                <td><?php echo $linha['noneCli'] ?></td>
                <td><?php echo $linha['DT_ENTRADA'] ?></td>
                <td><?php echo $linha['DT_RETORNO'] ?></td>
            
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo "ExameForm.php?id=". $linha['id']  ?>">Consultar</a>                
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