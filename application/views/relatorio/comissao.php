<section id="main-content">
  <section class="wrapper">
    <link href="<?php echo base_url();?>assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/daterangepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.css" rel="stylesheet" />
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
<table class="table table-striped">
  <thead>
    <tr>

<th>Data </th>
<th>Atendente</th>

<th>Serviço</th>


<th>Comissão</th>

</tr>
</thead>

<tbody>
</tbody>

</table>
<?php } else{?>


  <table class="table table-striped">
    <thead>
      <tr>

  <th>Data </th>
  <th>Atendente</th>

  <th>Serviço</th>


  <th>Comissão</th>

  </tr>
  </thead>

  <tbody >
<?php $total=0; ?>
    <?php foreach ($relatorio as $r) {
      echo '<tr>';
            echo '<td>'.$r['start'].'</td>';
            echo '<td>'.$r['idatendente'].'</td>';
            echo '<td>'.$r['nomeservico'].'</td>';

            echo '<td>R$ '.$r['comissao'].',00</td>';
            echo '</tr>';
              $total += $r['comissao'];
  }?>

  <tr>
                                             <td colspan="3" style="text-align: right"><strong>Total comissão:</strong></td>
                                             <td><strong>R$ <?php echo number_format($total,2,',','.');?><input type="hidden" id="total-venda" value="<?php echo number_format($total,2); ?>"></strong></td>
                                         </tr>
<?php }?>
  </tbody>

  </table>
</section>

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

<script>

  $( "#inicio" ).datepicker({ format: 'dd/mm/yyyy' });
    $( "#termino" ).datepicker({ format: 'dd/mm/yyyy' });



</script>
