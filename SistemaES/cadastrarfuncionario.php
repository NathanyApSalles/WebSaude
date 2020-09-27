<?php
require_once 'header.php';
require_once '../assets/php/classes/classProfissional.php';

$profSaude = new ProfissionalSaude();

if (isset($_POST['insert'])) {
	$profSaude->setNome($_POST['nome']);
	$profSaude->setCpf($_POST['cpf']);
	$profSaude->setFuncao($_POST['funcao']);
	$profSaude->setTelefone($_POST['telefone']);
	$profSaude->setEmail($_POST['email']);
	$profSaude->setNum_registro($_POST['num_registro']);
	$profSaude->setProcedimento($_POST['procedimento']);
	$profSaude->setEspecialidades($_POST['especialidades']);

	if ($profSaude->insert() == 1) {
		$result = "Profissional cadastrado com sucesso!";
	} else {
		$error = "Erro ao cadastrar";
	}
}

if (isset($_POST['cancel'])) {
	header("Location: cadastrarFuncionario.php");
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


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <form action="cadastrarFuncionario.php" method="post">
      <!-- general form elements disabled -->
      <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
        <div class="box-header with-border">
          <h3 class="box-title">Cadastrar Profissional da Saúde</h3>
        </div>

      <div class="row">
      <div class="form-group col-md-4">
        <label>Nome do profissional</label>
        <input type="text" class="form-control" name="nome" placeholder="Informe o nome" required>
      </div>
    <div class="form-group col-md-4">
        <label>Função</label>
          <select class="form-control" name="funcao">
            <option></option>
            <option>Enfermeiro(a)</option>
            <option>Fisioterapeuta</option>
            <option>Médico(a)</option>
            <option>Psicólogo(a)</option>
          </select>
      </div>
    <div class="form-group col-md-4">
        <label>CPF</label>
        <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00" maxlength="11" required>
      </div>
  </div>

  <div class="row">
      <div class="form-group col-md-3">
        <label>Telefone</label>
        <input type="text" class="form-control" name="telefone" placeholder="(00) 00000-0000" maxlength="20" required>
      </div>
    <div class="form-group col-md-3">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Informe o email" required>
      </div>
    <div class="form-group col-md-3">
        <label>Número do Registro no CR</label>
        <input type="text" class="form-control" name="num_registro" placeholder="Informe o número no CR" required>
      </div>
    <div class="form-group col-md-3">
        <label>Procedimento</label>
          <select class="form-control" name="procedimento">
            <option></option>
            <option>Consulta</option>
            <option>Exame</option>
          </select>
      </div>
  </div>

  <div class="row">
      <div class="form-group col-md-6">
        <label>Especialidades</label>
          <div class="checkbox">
              <label><input type="checkbox" value="" name="especialidades">Alergia e Imunologia</label>
          </div>
          <div class="checkbox">
              <label><input type="checkbox" value="">Cardiologia</label>
          </div>
          <div class="checkbox">
              <label><input type="checkbox" value="">Clínico geral</label>
          </div>
          <div class="checkbox">
              <label><input type="checkbox" value="">Fisioterapia</label>
          </div>
          <div class="checkbox">
              <label><input type="checkbox" value="">Geriatria</label>
          </div>
          <div class="checkbox">
              <label><input type="checkbox" value="">Ginecologia e Obstetrícia</label>
          </div>
      </div>
    <div class="form-group col-md-6">
        <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
        class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar" style="width:200px">
        <div class="btn btn-mdb-color btn-rounded float-left">
        <input type="file">
      </div>
  </div>

 <div class="row">
      <div class="form-group col-md-3">
        <label>Dias da semana</label>
        <select class="form-control" id="diasSemana">
            <option></option>
            <option>Segunda-feira</option>
            <option>Terça-feira</option>
            <option>Quarta-feira</option>
            <option>Quinta-feira</option>
            <option>Sexta-feira</option>
            <option>Sábado</option>
        </select>
      </div>

    <div class="form-group col-md-3">
        <label>Período de atendimento</label>
        <select class="form-control" name="periodo">
            <option></option>
            <option>Dia inteiro</option>
            <option>Manhã (07:00 - 12:00)</option>
            <option>Tarde (13:00 - 16:00)</option>
            <option>Noite (17:00 - 20:00)</option>
        </select>
      </div>

    <div class="form-group col-md-3">
        <label>Unidadade de atendimento</label>
          <select class="form-control" name="unidade">
            <option></option>
            <option>Hospital Municipal</option>
            <option>Hospital ABC</option>
            <option>PSF Bairro</option>
            <option>PSF Centro</option>
          </select>
      </div>
      <div class="form-group col-md-3">
        <br/>
        <button type="button" class="btn btn-success" id="add-campo">+</button>
       </div>
  </div>

  <div class="row">

      <div class="form-group col-md-3" id="disponibilidade" style="display:none; ">
       </div>
       <div class="form-group col-md-3" id="periodo" style="display:none; ">
       </div>
       <div class="form-group col-md-3" id="unidade" style="display:none; ">
       </div>

  </div>

        <script>
          $( "#add-campo" ).click(function() {
            $("#disponibilidade").show();
            $("#disponibilidade").append('<select class="form-control"><option></option><option>Segunda-feira</option><option>Terça-feira</option><option>Quarta-feira</option><option>Quinta-feira</option><option>Sexta-feira</option><option>Sábado</option></select>');
            $("#periodo").show();
            $("#periodo").append('<select class="form-control"><option></option><option>Segunda-feira</option><option>Terça-feira</option><option>Quarta-feira</option><option>Quinta-feira</option><option>Sexta-feira</option><option>Sábado</option></select>');
            $("#unidade").show();
            $("#unidade").append('<select class="form-control"><option></option><option>Segunda-feira</option><option>Terça-feira</option><option>Quarta-feira</option><option>Quinta-feira</option><option>Sexta-feira</option><option>Sábado</option></select>');

          });


        </script>




  <hr />

  <div class="row">
    <div class="col-md-12">
      <button type="submit" name="insert" class="btn btn-success">Salvar</button>
    <a href="template.html" class="btn btn-danger">Cancelar</a>
    </div>
  </div>

  </form>
 </div>






      </div>
  </form>




<script type="application/javascript">
  var active = document.getElementById("funcionarios");
  active.classList.add("active");
</script>


<script type="application/javascript">
  var active = document.getElementById("funcionariocadastrar");
  active.classList.add("active");
</script>


<?php
require_once 'footer.php';
?>