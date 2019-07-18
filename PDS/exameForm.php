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
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="cliente.php">Paciente</a>
        <a class="navbar-brand" href="medico.php">Medico</a>
        <a class="navbar-brand" href="enfermeiro.php">Enfermeiro</a>
        <a class="navbar-brand" href="exame.php">Exames</a>
    </nav>
    <br><br>
    <?php 
        $id             = filter_input(INPUT_GET, 'id');
        $FK_MEDICO      = filter_input(INPUT_GET, 'FK_MEDICO');
        $nomeMe         = filter_input(INPUT_GET, 'nomeMe');
        $FK_ENFERMEIRO  = filter_input(INPUT_GET, 'FK_ENFERMEIRO');
        $nomeEnf        = filter_input(INPUT_GET, 'nomeEnf');
        $DT_ENTRADA     = filter_input(INPUT_GET, 'DT_ENTRADA');
        $DT_RETORNO     = filter_input(INPUT_GET, 'DT_RETORNO');
        $OBSERVACAO     = filter_input(INPUT_GET, 'OBSERVACAO');
        $fk_cliente     = filter_input(INPUT_GET, 'fk_cliente');
        $noneCli        = filter_input(INPUT_GET, 'noneCli');
        $metodo         = 'CADASTRAR EXAME';
        
        if($id > 0){
            $paranetro = filter_input(INPUT_GET, "parametro");
            $mysqllink = mysqli_connect("localhost","root","","pdshospital");
            
            $dados = mysqli_query($mysqllink,"select e.id as id,e.DT_ENTRADA,e.DT_RETORNO,E.OBSERVACAO,e.fk_cliente,c.nome as noneCli,e.FK_MEDICO ,m.nome as nomeMe, e.FK_ENFERMEIRO,m.nome as nomeEnf FROM exame e inner join cliente c on (c.id = e.fk_cliente) inner join medico m on (m.id = e.FK_MEDICO) inner join enfermeiro f on (f.id = e.FK_ENFERMEIRO)  where e.id = '$id'");
            
            $linha = mysqli_fetch_assoc($dados);
            // $total = mysql_num_rows($dados);
            if (1 == 1){
              
                $FK_MEDICO      =  $linha['FK_MEDICO'];
                $nomeMe         =  $linha['nomeMe'];
                $FK_ENFERMEIRO  =  $linha['FK_ENFERMEIRO'];
                $nomeEnf        =  $linha['nomeEnf'];
                $DT_ENTRADA     =  $linha['DT_ENTRADA'];
                $DT_RETORNO     =  $linha['DT_RETORNO'];
                $OBSERVACAO     =  $linha['OBSERVACAO'];
                $fk_cliente     =  $linha['fk_cliente'];
                $noneCli        =  $linha['noneCli'];
               
                $metodo     = 'EDITAR EXAME';
            } else {
                die('Erro ao buscar produto');
                header("Location: Enfermeiro.php");
            }
        } 
    ?>
</head>
<body>


    <div id="Corpo"  class="container"> 
        <h1>Cadastro de Enfermeiro </h1>
        <p>
            <form action="BuilderInterface.php" method="POST">
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col">
                    <!-- Default input -->
                    ID:
                    <input type="text" class="form-control" readonly="true" name="id" value="<?php echo $id ?>">
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col">
                    <!-- Default input -->
                    Metodo:
                    <input type="text" class="form-control" readonly="True" value="<?php echo $metodo ?>" name="Metodo">
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->

                Cod. Medico:<br>
                <input type="number" class="form-control form-control" name="fk_medico" value="<?php echo $fk_medico ?>"/> <br>
                Nome Medico:<br>
                <input type="text" class="form-control form-control" name="nomeMe" value="<?php echo $nomeMe ?>"/> <br>
                
                Cod. Cliente:<br>
                <input type="number" class="form-control form-control" name="fh_cliente" value="<?php echo $fk_cliente ?>"/> <br>
                Nome Cliente:<br>
                <input type="text" class="form-control form-control" name="noneCli" value="<?php echo $noneCli ?>"/> <br>

                Cod. Enfermeiro:<br>
                <input type="number" class="form-control form-control" name="fk_enfermeiro" value="<?php echo $FK_ENFERMEIRO ?>"/> <br>
                Nome Enfermeiro:<br>
                <input type="text" class="form-control form-control" name="nomeEnf" value="<?php echo $nomeEnf ?>"/> <br>

                Data de Entrada:<br>
                <input type="date" class="form-control form-control" name="DT_ENTRADA" value="<?php echo $DT_ENTRADA ?>"/> <br>
                Data de Retorno:<br>
                <input type="date" class="form-control form-control" name="DT_RETORNO" value="<?php echo $DT_RETORNO ?>"/> <br>
                
                RELATORIO:<br>
                <input type="text" class="form-control form-control" name="OBSERVACAO" value="<?php echo $OBSERVACAO ?>"/> <br><br>
                <input type="submit" class="btn btn-success btn-xs" value="GRAVAR" /> <br> 

            </form>

        </p>

    </div>

</div>
</div>
    
</body>
</html>