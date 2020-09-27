<?php
require_once 'header.php';
require_once '../assets/php/classes/classProntuario.php';

?>

	 <div class="content-wrapper">
		<div id="main" class="container-fluid">
      <form action="prontuario.php" method="post">
        <div class="form-group ">
          <label>CPF do paciente:</label>
          <input type="text" name="cpfPaciente" class="form-control" >
          <button type="submit" class="btn btn-danger">Pesquisar</button>
        </div>
      </form>


            <!-- /.box-body -->
          </div>
         </div>


         </div>

         <script type="application/javascript">
    var active = document.getElementById("prontuario");
    active.classList.add("active");
</script>


<script type="application/javascript">
    var active = document.getElementById("prontuariovisualizar");
    active.classList.add("active");
</script>



<?php
require_once 'footer.php';
?>