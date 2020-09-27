<?php
require_once 'header.php';
require_once '../assets/php/classes/classProduto.php';

$prod = new Produto();
$prod->setIdProduto($_GET['idProduto']);
$produto = $prod->view();
?>
<div class="content-wrapper">
  <div id="main" class="container-fluid">
    <form action="produtos.php" method="post">
      <!-- general form elements disabled -->
      <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
        <div class="box-header with-border">
          <h3 class="box-title">Atualizar Produto</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form">
            <!-- text input -->
                <!-- <div class="form-group">
                  <label>Código</label>
                  <input type="text" class="form-control" >
                </div> -->
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" name="nome" class="form-control" value="<?php echo $produto->nome ?>">
                </div>
                <div class="form-group">
                  <label>Quantidade</label>
                  <input type="number" name="quantidade" class="form-control" value="<?php echo $produto->quantidade ?>">
                </div>
                <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" name="descricao" rows="3"><?php echo $produto->descricao ?></textarea>
                </div>
                <label>Preço de Custo</label>
                <div class="input-group">  
                  <span class="input-group-addon">R$</span>
                  <input type="text" class="form-control" name="precoCusto" value="<?php echo $produto->precoCusto ?>" onkeyup="moeda(this);">
                </div>
                <label>Preço de Venda</label>
                <div class="input-group">
                  <span class="input-group-addon">R$</span>
                  <input type="text" class="form-control" name="precoVenda" value="<?php echo $produto->precoVenda ?>" onkeyup="moeda(this);">
                </div>

              </div>
              <div class="box-footer">
                <input type="hidden" name="idProduto" value="<?php echo $produto->idProduto ?>">
                <button type="submit" name="edit" class="btn btn-success">Atualizar</button>
                <a href="./produtos.php">
                  <button type="submit" class="btn btn-danger">Cancelar</button>
                </a>
              </form>
            </div>
            <!-- /.box-body -->
          </form>
        </div>
      </div>


    </div>

    <script type="application/javascript">
      var active = document.getElementById("produtos");
      active.classList.add("active");
    </script>


    <script type="application/javascript">
      var active = document.getElementById("produtosvisualizar");
      active.classList.add("active");
    </script>

    <script type="text/javascript">
      function moeda(z) {
        v = z.value;
        v = v.replace(/\D/g, "") // permite digitar apenas numero
        v = v.replace(/(\d{1})(\d{14})$/, "$1.$2") // coloca ponto antes dos ultimos digitos
        v = v.replace(/(\d{1})(\d{11})$/, "$1.$2") // coloca ponto antes dos ultimos 11 digitos
        v = v.replace(/(\d{1})(\d{8})$/, "$1.$2") // coloca ponto antes dos ultimos 8 digitos
        v = v.replace(/(\d{1})(\d{5})$/, "$1.$2") // coloca ponto antes dos ultimos 5 digitos
        v = v.replace(/(\d{1})(\d{1,2})$/, "$1,$2") // coloca virgula antes dos ultimos 2 digitos
        z.value = v;
    }
    </script>



    <?php
    require_once 'footer.php';
    ?>