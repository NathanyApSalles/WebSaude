<?php
require_once 'header.php';
require_once '../assets/php/classes/classRelatorio.php';

?>

   <div class="content-wrapper">
    <div id="main" class="container-fluid">
      <form action="relatorios.php" method="post">
        <div class="form-group ">
          <label>Unidade de atendimento:</label>
          <select class="form-control" name="unidadeAtendimento">
            <option></option>
            <option>Hospital Municipal</option>
            <option>Hospital ABC</option>
            <option>PSF Bairro</option>
            <option>PSF Centro</option>
          </select>
          <button type="submit" class="btn btn-danger">Visualizar</button>
        </div>
      </form>


            <!-- /.box-body -->
          </div>
         </div>


         </div>

         <script type="application/javascript">
    var active = document.getElementById("relatorios");
    active.classList.add("active");
</script>


<script type="application/javascript">
    var active = document.getElementById("relatoriosvisualizar");
    active.classList.add("active");
</script>



<?php
require_once 'footer.php';
?>