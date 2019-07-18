<?php

if ($_POST["Metodo"] == "CADASTRAR CLIENTE") {
    $pb = new BuilderCLIENTE;
    $pb->create();
}elseif($_POST["Metodo"] == 'EDITAR CLIENTE'){
    $pb = new BuilderCLIENTE;
    $pb->update();
}elseif($_POST["Metodo"] == 'EXCLUIR CLIENTE'){
    $pb = new BuilderCLIENTE;
    $pb->deletar();
}elseif ($_POST["Metodo"] == "CADASTRAR MEDICO") {
    $pb = new BuilderMedico;
    $pb->create();
}elseif($_POST["Metodo"] == 'EDITAR MEDICO'){
    $pb = new BuilderMedico;
    $pb->update();
}elseif($_POST["Metodo"] == 'EXCLUIR MEDICO'){
    $pb = new BuilderMedico;
    $pb->deletar();
}elseif ($_POST["Metodo"] == "CADASTRAR Enfermeiro") {
    $pb = new BuilderEnfermeiro;
    $pb->create();
}elseif($_POST["Metodo"] == 'EDITAR Enfermeiro'){
    $pb = new BuilderEnfermeiro;
    $pb->update();
}elseif($_POST["Metodo"] == 'EXCLUIR Enfermeiro'){
    $pb = new BuilderEnfermeiro;
    $pb->deletar();
}


class PessoaBuilder{

    private $id;
    private $cpf;
    private $nome;
    private $endereco;
    private $cidade;
    private $telefone;
    private $tipo;
    private $sexo;
    
    public function create(){
         
    }   
    public function read(){
        
    }   
    public function update(){
        
    }   
    public function deletar(){
        
    }   

}


class BuilderMedico extends PessoaBuilder{
    public function create(){

        $link = mysqli_connect("localhost","root","", "pdshospital");

        $this->id       = $_POST["id"];
        $this->cpf      = $_POST["cpf"];
        $this->nome     = $_POST["nome"];
        $this->endereco = $_POST["endereco"];
        $this->cidade   = $_POST["cidade"];
        $this->telefone = $_POST["telefone"];
        $this->tipo     = $_POST["tipo"];
        $this->sexo     = $_POST["sexo"];
        
        if($link){
            $query = mysqli_query($link, "INSERT INTO medico(id, nome, cpf, endereco, cidade, telefone, sexo,tipo) VALUES ('', '$this->nome', '$this->cpf', '$this->endereco', '$this->cidade', '$this->telefone', '$this->sexo', '$this->tipo')");
                if($query){
                    header("Location: medico.php");    
                }else{
                    die("Erro: ".mysqli_error($link));
                }
        }else{
            die("Erro: ".mysqli_error($link));
        }

    }   
    public function read(){
        //esta sendo aplicado na view    
    }   
    public function update(){

        $link = mysqli_connect("localhost","root","", "pdshospital");

        $this->id       = $_POST["id"];
        $this->cpf      = $_POST["cpf"];
        $this->nome     = $_POST["nome"];
        $this->endereco = $_POST["endereco"];
        $this->cidade   = $_POST["cidade"];
        $this->telefone = $_POST["telefone"];
        $this->tipo     = $_POST["tipo"];
        $this->sexo     = $_POST["sexo"];
        
        if($link){
            $query = mysqli_query($link, "UPDATE medico SET nome='$this->nome',cpf='$this->cpf',endereco='$this->endereco',cidade='$this->cidade',tipo='$this->tipo',telefone='$this->telefone',sexo='$this->sexo' WHERE id='$this->id' ");
                if($query){
                    header("Location: medico.php");    
                }else{
                    die("Erro: ".mysqli_error($link));
                }
        }else{
            die("Erro: ".mysqli_error($link));
        }

    } 
          
    public function deletar(){
        
        $link = mysqli_connect("localhost","root","", "pdshospital");

        $this->id  = filter_input(INPUT_GET, 'id');
        
        if($link){
            $query = mysqli_query($link, "DELETE FROM medico WHERE id='$this->id' ");
                if($query){
                    header("Location: medico.php");    
                }else{
                    die("Erro: ".mysqli_error($link));
                }
        }else{
            die("Erro: ".mysqli_error($link));
        }

    } 
   
}

class BuilderCliente extends PessoaBuilder{
    public function create(){

        $link = mysqli_connect("localhost","root","", "pdshospital");

        $this->id       = $_POST["id"];
        $this->cpf      = $_POST["cpf"];
        $this->nome     = $_POST["nome"];
        $this->endereco = $_POST["endereco"];
        $this->cidade   = $_POST["cidade"];
        $this->telefone = $_POST["telefone"];
        $this->tipo     = $_POST["tipo"];
        $this->sexo     = $_POST["sexo"];
        
        if($link){
            $query = mysqli_query($link, "INSERT INTO CLIENTE(id, nome, cpf, endereco, cidade, telefone, sexo,tipo) VALUES ('', '$this->nome', '$this->cpf', '$this->endereco', '$this->cidade', '$this->telefone', '$this->sexo', '$this->tipo')");
                if($query){
                    header("Location: CLIENTE.php");    
                }else{
                    die("Erro: ".mysqli_error($link));
                }
        }else{
            die("Erro: ".mysqli_error($link));
        }

    }   
    public function read(){
        //esta sendo aplicado na view    
    }   
    public function update(){

        $link = mysqli_connect("localhost","root","", "pdshospital");

        $this->id       = $_POST["id"];
        $this->cpf      = $_POST["cpf"];
        $this->nome     = $_POST["nome"];
        $this->endereco = $_POST["endereco"];
        $this->cidade   = $_POST["cidade"];
        $this->telefone = $_POST["telefone"];
        $this->tipo     = $_POST["tipo"];
        $this->sexo     = $_POST["sexo"];
        
        if($link){
            $query = mysqli_query($link, "UPDATE CLIENTE SET nome='$this->nome',cpf='$this->cpf',endereco='$this->endereco',cidade='$this->cidade',tipo='$this->tipo',telefone='$this->telefone',sexo='$this->sexo' WHERE id='$this->id' ");
                if($query){
                    header("Location: CLIENTE.php");    
                }else{
                    die("Erro: ".mysqli_error($link));
                }
        }else{
            die("Erro: ".mysqli_error($link));
        }

    } 
          
    public function deletar(){
        
        $link = mysqli_connect("localhost","root","", "pdshospital");

        $this->id  = filter_input(INPUT_GET, 'id');
        
        if($link){
            $query = mysqli_query($link, "DELETE FROM CLIENTE WHERE id='$this->id' ");
                if($query){
                    header("Location: CLIENTE.php");    
                }else{
                    die("Erro: ".mysqli_error($link));
                }
        }else{
            die("Erro: ".mysqli_error($link));
        }

    } 
   
}

class BuilderEnfermeiro extends PessoaBuilder{
    public function create(){

        $link = mysqli_connect("localhost","root","", "pdshospital");

        $this->id       = $_POST["id"];
        $this->cpf      = $_POST["cpf"];
        $this->nome     = $_POST["nome"];
        $this->endereco = $_POST["endereco"];
        $this->cidade   = $_POST["cidade"];
        $this->telefone = $_POST["telefone"];
        $this->tipo     = $_POST["tipo"];
        $this->sexo     = $_POST["sexo"];
        
        if($link){
            $query = mysqli_query($link, "INSERT INTO Enfermeiro(id, nome, cpf, endereco, cidade, telefone, sexo,tipo) VALUES ('', '$this->nome', '$this->cpf', '$this->endereco', '$this->cidade', '$this->telefone', '$this->sexo', '$this->tipo')");
                if($query){
                    header("Location: Enfermeiro.php");    
                }else{
                    die("Erro: ".mysqli_error($link));
                }
        }else{
            die("Erro: ".mysqli_error($link));
        }

    }   
    public function read(){
        //esta sendo aplicado na view    
    }   
    public function update(){

        $link = mysqli_connect("localhost","root","", "pdshospital");

        $this->id       = $_POST["id"];
        $this->cpf      = $_POST["cpf"];
        $this->nome     = $_POST["nome"];
        $this->endereco = $_POST["endereco"];
        $this->cidade   = $_POST["cidade"];
        $this->telefone = $_POST["telefone"];
        $this->tipo     = $_POST["tipo"];
        $this->sexo     = $_POST["sexo"];
        
        if($link){
            $query = mysqli_query($link, "UPDATE Enfermeiro SET nome='$this->nome',cpf='$this->cpf',endereco='$this->endereco',cidade='$this->cidade',tipo='$this->tipo',telefone='$this->telefone',sexo='$this->sexo' WHERE id='$this->id' ");
                if($query){
                    header("Location: Enfermeiro.php");    
                }else{
                    die("Erro: ".mysqli_error($link));
                }
        }else{
            die("Erro: ".mysqli_error($link));
        }

    } 
          
    public function deletar(){
        
        $link = mysqli_connect("localhost","root","", "pdshospital");

        $this->id  = filter_input(INPUT_GET, 'id');
        
        if($link){
            $query = mysqli_query($link, "DELETE FROM Enfermeiro WHERE id='$this->id' ");
                if($query){
                    header("Location: Enfermeiro.php");    
                }else{
                    die("Erro: ".mysqli_error($link));
                }
        }else{
            die("Erro: ".mysqli_error($link));
        }

    } 
   
}
  
?>