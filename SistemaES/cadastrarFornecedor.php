<?php
	require_once 'header.php'; 
  require_once '../assets/php/classes/classFornecedor.php';

$forne = new Fornecedor();

if(isset($_POST['insert'])){
  $forne->setNomeEmpresa($_POST['nomeEmpresa']);
  $forne->setNomeRepresentante($_POST['nomeRepresentante']);
  $forne->setCnpj($_POST['cnpj']);
  $forne->setEndereco($_POST['endereco']);
  $forne->setTelefoneEmpresa($_POST['telefoneEmpresa']);
  $forne->setTelefoneRepresentante($_POST['telefoneRepresentante']);
  $forne->setEmailEmpresa($_POST['emailEmpresa']);
  $forne->setEmailRepresentante($_POST['emailRepresentante']);

  if($forne->insert() == 1){
    $result = "Fornecedor inserido com sucesso!";
  }else{
    $error = "Erro ao inserir";
  }
}
?>
	 <div class="content-wrapper">
		<div id="main" class="container-fluid">
      <?php
  if (isset($result)) {
    ?>
    <div class="alert alert-success">
      <?php echo $result; ?>
    </div>
    <?php
  }else if(isset($error)){
    ?>
    <div class="alert alert-danger">
      <?php echo $error; ?>
    </div>
    <?php
  }
  ?>
      <form action="cadastrarFornecedor.php" method="post">
          <!-- general form elements disabled -->
          <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastrar Fornecedor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Nome da Empresa</label>
                  <input type="text" name="nomeEmpresa" class="form-control" placeholder="Digite o nome da empresa">
                </div>
                <div class="form-group">
                  <label>Nome do Representante</label>
                  <input type="text" name="nomeRepresentante" class="form-control" placeholder="Digite o nome do representante" >
                </div>
                <div class="form-group">
                  <label>CNPJ</label>
                  <input type="text" name="cnpj" class="form-control" placeholder="Digite o CNPJ" maxlength="14">
                </div>
                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" name="endereco" class="form-control" placeholder="Digite o endereço" >
                </div>
                 <div class="form-group">
                  <label>Telefone da Empresa</label>
                  <input type="text" name="telefoneEmpresa" class="form-control" placeholder="Digite o telefone da empresa" maxlength="10">
                </div>
                 <div class="form-group">
                  <label>Telefone do Representante</label>
                  <input type="text" name="telefoneRepresentante" class="form-control" placeholder="Digite o telefone do representante" maxlength="10">
                </div>
                <div class="form-group">
                  <label>Email da Empresa</label>
                  <input type="email" name="emailEmpresa" class="form-control" placeholder="Digite o email da empresa" >
                </div>
                <div class="form-group">
                  <label>Email do Representante</label>
                  <input type="email" name="emailRepresentante" class="form-control" placeholder="Digite o email do representante" >
                </div>
              </form>
            </div>
           <div class="box-footer">
            <button type="submit" name="insert" class="btn btn-success">Enviar</button>
            <a href="./fornecedores.php">
            <button type="button" class="btn btn-danger">Cancelar</button>
          </a>
          </div>
            <!-- /.box-body -->
          </div>
         </div>
       </form>

         </div>

         <script type="application/javascript">
    var active = document.getElementById("fornecedores");
    active.classList.add("active");
</script>


<script type="application/javascript">
    var active = document.getElementById("fornecedorescadastrar");
    active.classList.add("active");
</script>



<?php
    require_once 'footer.php';
?>