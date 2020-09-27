<?php
	require_once 'header.php';
  require_once '../assets/php/classes/classFornecedor.php';

$forne = new Fornecedor();
$forne->setIdFornecedor($_GET['idFornecedor']);
$fornecedor = $forne->view();

?>
	 <div class="content-wrapper">
		<div id="main" class="container-fluid">
          <!-- general form elements disabled -->
          <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Dados do Fornecedor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Nome da Empresa</label>
                  <input type="text" name="nomeEmpresa" class="form-control" value="<?php echo $fornecedor->nomeEmpresa ?> ">
                </div>
                <div class="form-group">
                  <label>Nome do Representante</label>
                  <input type="text" name="nomeRepresentante" class="form-control" value="<?php echo $fornecedor->nomeRepresentante ?> ">
                </div>
                <div class="form-group">
                  <label>CNPJ</label>
                  <input type="text" name="cnpj" class="form-control" maxlength="14" value="<?php echo $fornecedor->cnpj ?> ">
                </div>
                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" name="endereco" class="form-control" value="<?php echo $fornecedor->endereco ?> ">
                </div>
                 <div class="form-group">
                  <label>Telefone da Empresa</label>
                  <input type="text" name="telefoneEmpresa" class="form-control" value="<?php echo $fornecedor->telefoneEmpresa ?> ">
                </div>
                 <div class="form-group">
                  <label>Telefone do Representante</label>
                  <input type="text" name="telefoneRepresentante" class="form-control" value="<?php echo $fornecedor->telefoneRepresentante ?> ">
                </div>
                <div class="form-group">
                  <label>Email da Empresa</label>
                  <input type="email" name="emailEmpresa" class="form-control" value="<?php echo $fornecedor->emailEmpresa ?> ">
                </div>
                <div class="form-group">
                  <label>Email do Representante</label>
                  <input type="email" name="emailRepresentante" class="form-control" value="<?php echo $fornecedor->emailRepresentante ?> ">
                </div>
            </div>
           <div class="box-footer">
            <a href="./fornecedores.php">
            <button type="submit" class="btn btn-danger">Voltar</button>
          </a>
          </div>
            <!-- /.box-body -->
          </div>
         </div>


         </div>

         <script type="application/javascript">
    var active = document.getElementById("fornecedores");
    active.classList.add("active");
</script>


<script type="application/javascript">
    var active = document.getElementById("fornecedoresvisualizar");
    active.classList.add("active");
</script>



<?php
    require_once 'footer.php';
?>