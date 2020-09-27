<?php
require_once 'header.php';
require_once '../assets/php/classes/classProntuario.php';
require_once '../assets/php/classes/classVacina.php';

$pront = new Prontuario();
$pront->setcpf($_POST['cpfPaciente']);
$prontuario = $pront->viewCPF();
$vac = new Vacina();
$vac->setIdProntuario($prontuario->idprontuario);
$vacinas = $vac->view();

if (isset($_POST['edit'])) {
	$pront->setidprontuario($_POST['idprontuario']);
	$pront->setaltura($_POST['altura']);
	$pront->setpeso($_POST['peso']);
	$pront->setIMC($_POST['IMC']);
	$pront->setalergias($_POST['alergias']);
	$pront->setmedicamentos($_POST['medicamentos']);
	$pront->setultimos_exames($_POST['ultimos_exames']);

	if ($pront->edit() == 1) {
		$result = "Prontuário editado com sucesso!";
	} else {
		$error = "Erro ao editar";
	}

}

if (isset($_POST['delete'])) {
	$pront->setidprontuario($_POST['idprontuario']);

	if ($pront->delete() == 1) {
		$result = "Prontuário deletado com sucesso!";
	} else {
		$error = "Erro ao deletar";
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
} else if (isset($error)) {
	?>
			<div class="alert alert-danger">
				<?php echo $error; ?>
			</div>
			<?php
}
?>
		<div id="top" class="row">
			<div class="col-md-12">
				<h1 align="center">Prontuário</h1>
			</div>
			<div class="col-sm-6">

				<!-- <div class="input-group h2">
					<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div> -->

			</div>
		</div> <!-- /#top -->


		<hr />
		<div id="list" class="row">

			<div class="table-responsive col-md-12">


          <!-- general form elements disabled -->
	          <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
	            <div class="box-header with-border">
	              <h3 class="box-title">Prontuário</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	                <!-- text input -->
	                <div class="form-group col-md-3">
	                  <label>Nome do Paciente</label>
	                  <input type="text" name="nomePaciente" class="form-control" value="<?php echo $prontuario->nome ?> " readonly>
	                  <label>Idade</label>
	                  <input type="text" name="idadePaciente" class="form-control" value="<?php echo $prontuario->idade ?> " readonly>
	                  <label>Altura</label>
	                  <input type="text" name="alturaPaciente" class="form-control" maxlength="14" value="<?php echo $prontuario->altura ?> ">
	                  <label>Peso</label>
	                  <input type="text" name="pesoPaciente" class="form-control" maxlength="14" value="<?php echo $prontuario->peso ?> ">
	                  <label>IMC</label>
	                  <input type="text" name="imcPaciente" class="form-control" value="<?php echo $prontuario->IMC ?> ">
	                  <label>Tipo sanguíneo</label>
	                  <input type="text" name="tipoSanguePaciente" class="form-control" value="<?php echo $prontuario->tipoSanguineo ?> " readonly >
	                </div>

	                <div class="form-group col-md-3">
	                  <label>Alergias</label>
	                  <input type="text" name="alergiaPaciente" class="form-control" value="<?php echo $prontuario->alergias ?> ">
	                  <label>Medicamentos</label>
	                  <input type="text" name="medicamentoPaciente" class="form-control" value="<?php echo $prontuario->medicamentos ?> ">

	                </div>

	                <div class="form-group col-md-6">
	                  <label>Ultimos exames</label>
	                  <input type="text" name="alergiaPaciente" class="form-control" value="<?php echo $prontuario->ultimos_exames ?> ">

	                </div>


	            </div>

	             <div class="box-body">

	              <table class="table table-bordered">
	              	<h2>Cartão de Vacina</h2>
	                <thead>
	                  <tr>
	                    <th>Vacina</th>
	                    <th>Dose</th>
	                    <th>Data</th>
	                    <th>Lote</th>
	                    <th>Unidade</th>
	                    <th>Profissional</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($vacinas as $vacina) {?>

		                  <tr>
		                    <td><?=$vacina['nomeVacina']?></td>
		                    <td><?=$vacina['dose']?></td>
		                    <td><?=$vacina['data']?></td>
		                    <td><?=$vacina['lote']?></td>
		                    <td><?=$vacina['unidade']?></td>
		                    <td><?=$vacina['profissional']?></td>
    	                  </tr>
	                  	<?php }?>
	                </tbody>
	              </table>

	          </div>




	            </div>
	           <div class="box-footer">
	            <input type="hidden" name="idprontuario" value="<?php echo $prontuario->idprontuario ?>">
	            <button type="submit" name="edit" class="btn btn-success">Editar</button>

	          </div>
		</form>

	<!--			<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Empresa</th>
							<th>Representante</th>
							<th>CNPJ</th>
							<th>Endereço</th>
							<th class="actions">Ações</th>
						</tr>
						<?php
$stmt = $pront->index();
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	?>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $row->nome ?></td>
								<td><?php echo $row->idade ?></td>
								<td><?php echo $row->cnpj ?></td>
								<td><?php echo $row->endereco ?></td>
								<td class="actions">
									<a class="btn btn-success btn-xs" href="visualizarProntuário.php?idprontuario=<?php echo $row->idprontuario ?>">Visualizar</a>
									<a class="btn btn-warning btn-xs" href="editarProntuário.php?idprontuario=<?php echo $row->idprontuario ?>">Editar</a>
									<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal<?php echo $row->idprontuario ?>">Excluir</a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table> -->
				</div>

			</div> <!-- /#list -->


		</div> <!-- /#main -->
		<?php
$stmt = $pront->index();
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	?>
			<form action="Prontuário.php" method="post">
				<!-- Modal -->
				<div class="modal fade" id="delete-modal<?php echo $row->idprontuario ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
							</div>
							<div class="modal-body">
								Deseja realmente excluir o Prontuário <?php echo $row->nome ?>?
							</div>
							<div class="modal-footer">
								<input type="hidden" name="idprontuario" value="<?php echo $row->idprontuario ?>">
								<button type="submit" name="delete" class="btn btn-primary">Sim</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
							</div>
						</div>
					</div>
				</div>
			</form>

			<?php }?>
			</div>

			<script type="application/javascript">
				var active = document.getElementById("Prontuário");
				active.classList.add("active");
			</script>


			<script type="application/javascript">
				var active = document.getElementById("Prontuáriovisualizar");
				active.classList.add("active");
			</script>




			<?php
require_once 'footer.php';
?>