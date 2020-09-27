<?php
require_once 'header.php';
require_once '../assets/php/classes/classProfissional.php';

$profSaude = new ProfissionalSaude();

if (isset($_POST['edit'])) {
	$profSaude->setNome($_POST['nome']);
	$profSaude->setCpf($_POST['cpf']);
	$profSaude->setFuncao($_POST['funcao']);
	$profSaude->setTelefone($_POST['telefone']);
	$profSaude->setEmail($_POST['email']);
	$profSaude->setNum_registro($_POST['num_registro']);
	$profSaude->setProcedimento($_POST['procedimento']);
	$profSaude->setEspecialidades($_POST['especialidades']);

	if ($profSaude->edit() == 1) {
		$result = "Profissional editado com sucesso!";
	} else {
		$error = "Erro ao editar";
	}

}

if (isset($_POST['delete'])) {
	$profSaude->setidProfissional($_POST['idProfissional']);

	if ($profSaude->delete() == 1) {
		$result = "Profissional deletado com sucesso!";
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
				<h1 align="center">Profissionais da Saúde</h1>
			</div>
			<div class="col-sm-3">
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
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Nome</th>
							<th>CPF</th>
							<th>Função</th>
							<th>Telefone</th>
							<th>Email</th>
							<th>Número de Registro</th>
							<th>Procedimento</th>
							<th>Especialidades</th>
							<th class="actions">Ações</th>
						</tr>
						<?php
$stmt = $profSaude->index();
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	?>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $row->nome ?></td>
								<td><?php echo $row->cpf ?></td>
								<td><?php echo $row->funcao ?></td>
								<td><?php echo $row->telefone ?></td>
								<td><?php echo $row->email ?></td>
								<td><?php echo $row->num_registro ?></td>
								<td><?php echo $row->procedimento ?></td>
								<td><?php echo $row->especialidades ?></td>
								<td class="actions">
									 <a class="btn btn-warning btn-xs" href="./editarFuncionario.php?idProfissional=<?php echo $row->idProfissional ?>">Editar</a>
									<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal<?php echo $row->idProfissional ?>">Excluir</a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>

			</div> <!-- /#list -->

		</div> <!-- /#main -->
		<?php
$stmt = $profSaude->index();
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	?>
			<form action="funcionarios.php" method="post">
			<!-- Modal -->
			<div class="modal fade" id="delete-modal<?php echo $row->idProfissional ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
						</div>
						<div class="modal-body">
							Deseja realmente excluir o profissional <?php echo $row->nome ?>?
						</div>
						<div class="modal-footer">
							<input type="hidden" name="idProfissional" value="<?php echo $row->idProfissional ?>">
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