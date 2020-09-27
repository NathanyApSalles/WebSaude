<?php
require_once 'header.php';
require_once '../assets/php/classes/classProfissional.php';

$profSaude = new ProfissionalSaude();
$profSaude->setIdProfissional($_GET['idProfissional']);
$funcionario = $profSaude->view();
?>
	 <div class="content-wrapper">
		<div id="main" class="container-fluid">
          <!-- general form elements disabled -->
          <form action="funcionarios.php" method="post">
          <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Atualizar Profissional</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" name="nome" class="form-control" value="<?php echo $funcionario->nome ?>" required>
                </div>
                <div class="form-group">
                  <label>CPF</label>
                  <input type="text" name="cpf" class="form-control" value="<?php echo $funcionario->cpf ?>" maxlength="11" required>
                </div>
                <div class="form-group">
                  <label>Telefone</label>
                  <input type="text" name="telefone" class="form-control" value="<?php echo $funcionario->telefone ?>" required>
                </div>
                <div class="form-group">
                  <label>Número do registro</label>
                  <input type="text" name="num_registro" class="form-control" value="<?php echo $funcionario->num_registro ?>" required>
                </div>
            </div>
           <div class="box-footer">
            <input type="hidden" name="idProfissional" value="<?php echo $funcionario->idProfissional ?>">
            <button type="submit" name="edit" class="btn btn-success">Atualizar</button>
            <a href="./funcionarios.php">
            <button type="submit" class="btn btn-danger">Cancelar</button>
          </a>
          </div>
            <!-- /.box-body -->
          </div>
        </form>
         </div>
         </div>


<script type="application/javascript">
    var active = document.getElementById("funcionarios");
    active.classList.add("active");
</script>


<script type="application/javascript">
    var active = document.getElementById("funcionariovisualizar");
    active.classList.add("active");
</script>


<?php
require_once 'footer.php';
?>