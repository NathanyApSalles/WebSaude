<?php 
require_once 'header.php';
require_once '../assets/php/classes/classProduto.php';

$prod = new Produto();

if(isset($_POST['edit'])){
	echo "id=" .$_POST['idProduto'];
	$prod->setIdProduto($_POST['idProduto']);
	$prod->setNome($_POST['nome']);
	$prod->setQuantidade($_POST['quantidade']);
	$prod->setDescricao($_POST['descricao']);
	$prod->setPrecoCusto($_POST['precoCusto']);
	$prod->setPrecoVenda($_POST['precoVenda']);


	if($prod->edit() == 1){
		$result = "Produto editado com sucesso!";
	}else{
		$error = "Erro ao editar";
	}

}

if(isset($_POST['delete'])){
	$prod->setIdProduto($_POST['idProduto']);

	if($prod->delete() == 1){
		$result = "Produto deletado com sucesso!";
	}else{
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
		}else if(isset($error)){
			?>
			<div class="alert alert-danger">
				<?php echo $error; ?>
			</div>
			<?php
		}
		?>
		<div id="top" class="row">
			<div class="col-md-12">
				<h1 align="center">Produtos</h1>
			</div>
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6">

				<!-- <form action="produtos.php" method="get">
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
							<th>Nome</th>
							<th>Descrição</th>
							<th>Quantidade</th>
							<th>Pço. Custo</th>
							<th>Pço. Venda</th>
							<th class="actions">Ações</th>
						</tr>
						<?php 
						$stmt = $prod->index();
						while($row = $stmt->fetch(PDO::FETCH_OBJ)){
							?>
						</thead>
						<tbody>
							<tr>
								<!-- <td>01</td> -->
								<td><?php echo $row->nome ?></td>
								<td><?php echo $row->descricao ?></td>
								<td><?php echo $row->quantidade ?></td>
								<td><?php echo $row->precoCusto ?></td>
								<td><?php echo $row->precoVenda ?></td>
								<td class="actions">
									<a class="btn btn-warning btn-xs" href="editarProduto.php?idProduto=<?php echo $row->idProduto ?>">Editar</a>
									<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal<?php echo $row->idProduto ?>">Excluir</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div> <!-- /#list -->

		</div> <!-- /#main -->
		<?php 
		$stmt = $prod->index();
		while($row = $stmt->fetch(PDO::FETCH_OBJ)){
			?>
			<form action="produtos.php" method="post">
				<!-- Modal -->
				<div class="modal fade" id="delete-modal<?php echo $row->idProduto ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
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
								<input type="hidden" name="idProduto" value="<?php echo $row->idProduto ?>">
								<button type="submit" name="delete" class="btn btn-primary">Sim</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
			<?php } ?>

			<script type="application/javascript">
				var active = document.getElementById("produtos");
				active.classList.add("active");
			</script>


			<script type="application/javascript">
				var active = document.getElementById("produtosvisualizar");
				active.classList.add("active");
			</script>



			<?php
			require_once 'footer.php';
			?>