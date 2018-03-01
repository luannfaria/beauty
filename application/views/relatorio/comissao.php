<section id="main-content">
  <section class="wrapper">
<link  rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" />
  <!--  <link rel="stylesheet" href="https://jquery.ui.timepicker.css?v=0.3.3" type="text/css" /> -->
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="https://fgelinas.com/code/timepicker/jquery.ui.timepicker.js?v=0.3.3"></script>
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-table"></i> Relatorio de comissões</h3>

<form class="form-inline" method="post" action="<?php echo base_url();?>relatorio/consultacomissao" >
  <div class="form-group">

      <label>Inicio  <input type="text" class="form-control" id="inicio" name="inicio"/></label>

      <label>Termino  <input type="text" class="form-control" id="termino" name="termino"/></label>
</div>

<div class="form-group">

      <label>Atendente

        <select name="atendente" class="form-control">
          <option value="">Selecione um atendente</option>
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


<script>

$( "#inicio" ).datepicker({dateFormat: 'yy-mm-dd'});

$( "#termino" ).datepicker({dateFormat: 'yy-mm-dd'});


</script>
