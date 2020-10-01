<?php
require_once 'header.php';
require_once '../assets/php/classes/classRelatorio.php';

$relat = new Relatorio();
$relat->setunidadeAtendimento($_POST['unidadeAtendimento']);

if (isset($_POST['edit'])) {
	echo "id=" . $_POST['idRelatorio'];
	$relat->setIdRelatorio($_POST['idRelatorio']);
	$relat->setunidadeAtendimento($_POST['nome']);
	$relat->setQuantidade($_POST['quantidade']);
	$relat->setDescricao($_POST['descricao']);
	$relat->setPrecoCusto($_POST['precoCusto']);
	$relat->setPrecoVenda($_POST['precoVenda']);

	if ($relat->edit() == 1) {
		$result = "Relatorio editado com sucesso!";
	} else {
		$error = "Erro ao editar";
	}

}

if (isset($_POST['delete'])) {
	$relat->setIdRelatorio($_POST['idRelatorio']);

	if ($relat->delete() == 1) {
		$result = "Relatorio deletado com sucesso!";
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
				<h1 align="center">Relatorios</h1>
			</div>
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6">

				<!-- <form action="Relatorios.php" method="get">
				<div class="input-group h2">
					<input name="nome" class="form-control" id="nome" type="text" placeholder="Pesquisar Itens">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit" name="pesquisa" id="pesquisa">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
				</form> -->
			</div>
		</div> <!-- /#top -->


		<hr />
		<div id="list" class="row">

			<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<!-- <th>Código</th> -->
							<th>Unidade de Atendimento</th>
							<th>Especialidade</th>
							<th>Profissional</th>
							<th>Data</th>
							<th>Leito/Sala</th>
						</tr>
						<?php
$stmt = $relat->viewUnidade();
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	?>
						</thead>
						<tbody>
							<tr>
								<!-- <td>01</td> -->
								<td><?php echo $row->unidadeAtendimento ?></td>
								<td><?php echo $row->especialidade ?></td>
								<td><?php echo $row->profissional ?></td>
								<td><?php echo $row->data ?></td>
								<td><?php echo $row->leito ?></td>

							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>

			</div> <!-- /#list -->
			<form action="gerarPDF.php" method="post">
			<button type="submit" class="btn btn-warning">Gerar PDF</button>
			</form>
		</div> <!-- /#main -->
		<?php
$stmt = $relat->index();
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	?>
			<form action="Relatorios.php" method="post">
				<!-- Modal -->
				<div class="modal fade" id="delete-modal<?php echo $row->idRelatorio ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
							</div>
							<div class="modal-body">
								Deseja realmente excluir o item <?php echo $row->nome ?>?
							</div>
							<div class="modal-footer">
								<input type="hidden" name="idRelatorio" value="<?php echo $row->idRelatorio ?>">
								<button type="submit" name="delete" class="btn btn-primary">Sim</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
			<?php }?>

			<script type="application/javascript">
				var active = document.getElementById("Relatorios");
				active.classList.add("active");
			</script>


			<script type="application/javascript">
				var active = document.getElementById("Relatoriosvisualizar");
				active.classList.add("active");
			</script>



			<?php
require_once 'footer.php';
?>