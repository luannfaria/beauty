<section id="main-content">
  <section class="wrapper">
  <link  rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" />
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-table"></i> Relatorio de comissões</h3>

<form class="form-inline" method="post" action="<?php echo base_url();?>relatorio/consultacomissao" >
  <div class="form-group">

    <div class="form-group">
      <label class="control-label">De</label>

        <input class="form-control" id="inicio"   type="text" name="inicio"  />

    </div>
    <div class="form-group">
      <label class="control-label">Até</label>

        <input class="form-control" id="termino"   type="text" name="termino"  />

    </div>

<div class="form-group">

      <label>Atendente

        <select name="atendente" class="form-control">
          <option value="">Selecione um atendente</option>
          <option value="todos">TODOS</option>
          <?php
          foreach($all_atendentes as $atendente)
          {
            $selected = ($atendente['idatendente'] == $this->input->post('idatendente')) ? ' selected="selected"' : "";

            echo '<option   value="'.$atendente['idatendente'].'" '.$selected.'>'.$atendente['nome'].'</option>';
          }
          ?>
        </select></label>


</div>
<div class="form-group">

    <button class="btn btn-primary">PESQUISAR</button>

</div>

</form>
      </div>
      <br>
    </div>
<br>
<?php
if(!$relatorio){?>
  <section class="panel">
<table class="table table-striped">
  <thead>
    <tr>

<th>Atendente</th>
<th>Vales</th>

<th>Comissão</th>


<th>Saldo</th>
<th>Ações</th>
</tr>
</thead>

<tbody>
</tbody>

</table>
</section>
<?php } else{?>

<section class="panel">
  <table class="table table-striped">
    <thead>
      <tr>

        <th>Atendente</th>
        <th>Vales</th>

        <th>Comissão</th>


        <th>Saldo</th>
        <th>Ações</th>

  </tr>
  </thead>

  <tbody >
<?php $saldo=0;
    $entrada=0;
    $saida=0;
 ?>

    <?php foreach ($relatorio as $r) {
      if($r['tipomov']==2){
              $entrada += $r['valor'];
      }

      if($r['tipomov']==1){
              $saida += $r['valor'];
      }


  }
$saldo = ($entrada-$saida);
  echo '<tr>';
        echo '<td>'.$r['nomefunc'].'</td>';
        echo '<td><strong>R$'.$saida.',00</strong></td>';
        echo '<td><strong>R$ '.$entrada.',00</strong></td>';

        echo '<td><strong>R$ '.$saldo.',00</strong></td>';
          echo '<td><a href="#detalhes" data-toggle="modal" class="btn btn-success">DETALHES</a></td>';
        echo '</tr>';

 }?>
  </tbody>
  <!-- SELECT nomefunc, idfunc, sum(valor) from salario where tipomov='2' GROUP BY nomefunc -->
  </table>
</section>

<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>


<script src="<?php echo base_url()?>assets/js/validate.js"></script>



  <script src="<?php echo base_url()?>assets/js/maskmoney.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.hotkeys.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap-wysiwyg.js"></script>

  <script src="<?php echo base_url()?>assets/js/moment.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap-colorpicker.js"></script>
  <script src="<?php echo base_url()?>assets/js/daterangepicker.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.timepicker.min.js"></script>
<script>
$( function() {
  $( "#inicio" ).datepicker({ dateFormat: 'dd/mm/yy' });
    $( "#termino" ).datepicker({ dateFormat: 'dd/mm/yy' });

});

</script>


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detalhes" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Relatorio comissão - Detalhes</h4>
      </div>
      <div class="modal-body">
          <div class=box-body>

            <section class="panel">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <td>Data</td>
                    <td>Descrição</td>
                    <td>Valor</td>
                    <td>Tipo mov</td>
                  </tr>
                </thead>
              <tbody>
              <?php foreach ($relatorio as $r) {

                echo '<tr>';
                      echo '<td><strong>'.$r['data'].'</strong></td>';
                      echo '<td>'.$r['descricao'].'</td>';
                      echo '<td><strong>R$ '.$r['valor'].',00</strong></td>';
if($r['tipomov']==1){
                      echo '<td><strong>VALE</strong></td>';
}
if($r['tipomov']==2){
                      echo '<td><strong>COMISSÃO</strong></td>';
}
                      echo '</tr>';

                    } ?>
            </tbody>
              </table>
            </section>
          </div>






      </div>
    </div>
  </div>
</div>
