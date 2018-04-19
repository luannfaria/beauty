<section id="main-content">
  <section class="wrapper">
<link  rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" />
  <!--  <link rel="stylesheet" href="https://jquery.ui.timepicker.css?v=0.3.3" type="text/css" /> -->
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="https://fgelinas.com/code/timepicker/jquery.ui.timepicker.js?v=0.3.3"></script>
    <div class="row">
      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
          <li><i class="fa fa-dollar"></i>Fluxo de caixa</li>
        </ol>
<form class="form-inline" method="post" action="<?php echo base_url();?>fluxo/buscafluxo" >
  <div class="form-group">

      <label>Data  <input type="text" class="form-control" id="data" name="data"/></label>


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
if (!$result) {
    ?>
    <section class="panel">
<table class="table table-striped">
  <thead>
    <tr>

<th>Data </th>
<th>Tipo Movimentação</th>

<th>Descrição</th>


<th>Valor</th>
<th>Forma</th>

</tr>
</thead>

<tbody>
</tbody>

</table>

</section>
<?php
} else {
        ?>

  <section class="panel">
  <table class="table table-striped">
    <thead>
      <tr>

  <th>Data </th>
  <th>Tipo Movimentação</th>

  <th>Descrição</th>


  <th>Valor</th>
  <th>Forma pgto/rec</th>

  </tr>
  </thead>

  <tbody >
<?php $totalentrada=0;
        $totalsaida=0;
        $saldofinal=0; ?>
    <?php foreach ($result as $r) {
            echo '<tr>';
            echo '<td>'.$r['data'].'</td>';
            if ($r['tipomov']==1) {
                echo '<td> ENTRADA</td>';
                $totalentrada += $r['valor'];
            }
            if ($r['tipomov']==2) {
                $totalsaida += $r['valor'];
                echo '<td> SAIDA</td>';
            }
            echo '<td>'.$r['descricao'].'</td>';
            echo '<td>R$ '.$r['valor'].'</td>';
            echo '<td>'.$r['forma'].'</td>';


            echo '</tr>';
        }
        $saldofinal = ($totalentrada-$totalsaida); ?>

  <tr>
                                            <td colspan="4" style="text-align: right"><font color="green"><strong>Total Entrada:</font></strong></td>
                                             <td><font color="green"><strong>R$ <?php echo number_format($totalentrada, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($totalentrada, 2); ?>"></font></strong></td>
                                         </tr>

                                         <tr>
                                                                                   <td colspan="4" style="text-align: right"><font color="red"><strong>Total Saida:</strong></font></td>
                                                                                    <td><font color="red"><strong>R$ <?php echo number_format($totalsaida, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($totalentrada, 2); ?>"></strong></font></td>
                                                                                </tr>

                                                                                <tr>
                                                                                                                          <td colspan="4" style="text-align: right"><strong>Saldo Final:</strong></td>
                                                                                                                           <td><strong>R$ <?php echo number_format($saldofinal, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($totalentrada, 2); ?>"></strong></td>
                                                                                                                       </tr>
<?php
    }?>
  </tbody>

  </table>

</section>
</section>

</section>


<script>

$( "#data" ).datepicker({dateFormat: 'dd/mm/yy'});

$( "#termino" ).datepicker({dateFormat: 'dd/mm/yy'});


</script>
