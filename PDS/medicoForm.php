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
        $id         = filter_input(INPUT_GET, 'id');
        $cpf        = filter_input(INPUT_GET, 'cpf');
        $nome       = filter_input(INPUT_GET, 'nome');
        $endereco   = filter_input(INPUT_GET, 'endereco');
        $cidade     = filter_input(INPUT_GET, 'cidade');
        $telefone   = filter_input(INPUT_GET, 'telefone');
        $tipo       = filter_input(INPUT_GET, 'tipo');
        $sexo       = filter_input(INPUT_GET, 'sexo');
        $metodo     = 'CADASTRAR MEDICO';
        
        if($id > 0){
            $paranetro = filter_input(INPUT_GET, "parametro");
            $mysqllink = mysqli_connect("localhost","root","","pdshospital");
            
            $dados = mysqli_query($mysqllink,"select * from medico where id = '$id'");
            
            $linha = mysqli_fetch_assoc($dados);
           // $total = mysql_num_rows($dados);
            if (1 == 1){
                $cpf        = $linha['cpf'];
                $nome       = $linha['nome'];
                $endereco   = $linha['endereco'];
                $cidade     = $linha['cidade'];
                $telefone   = $linha['telefone'];
                $tipo       = $linha['tipo'];
                $sexo       = $linha['sexo'];
                $metodo     = 'EDITAR MEDICO';
            } else {
                die('Erro ao buscar produto');
                header("Location: medico.php");
            }
        } 
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

    <div id="Corpo"  class="container"> 
        <h1>Cadastro de Medico </h1>
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

                Cpf:<br>
                <input type="text" class="form-control form-control" name="cpf" value="<?php echo $cpf ?>"/> <br>
                Nome:<br>
                <input type="text" class="form-control form-control" name="nome" value="<?php echo $nome ?>"/> <br>
                Endereco:<br>
                <input type="text" class="form-control form-control" name="endereco" value="<?php echo $endereco ?>"/> <br>
                Cidade:<br>
                <input type="text" class="form-control form-control" name="cidade" value="<?php echo $cidade ?>"/> <br>
                Telefone:<br>
                <input type="text" class="form-control form-control" name="telefone" value="<?php echo $telefone ?>"/> <br>
                Tipo:<br>
                <input type="text" class="form-control form-control" name="tipo" value="<?php echo $tipo ?>"/> <br>
                Sexo:<br>
                <input type="text" class="form-control form-control" name="sexo" value="<?php echo $sexo ?>"/> <br><br>
                <input type="submit" class="btn btn-success btn-xs" value="GRAVAR" /> <br> 

            </form>

        </p>

    </div>

</div>
</div>
    
</body>
</html>