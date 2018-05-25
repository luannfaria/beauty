<section id="main-content">
  <section class="wrapper">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/owl.carousel.css" type="text/css">
    <link href="<?php echo base_url()?>assets/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->

    <link href="<?php echo base_url()?>assets/css/widgets.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
      <link href="<?php echo base_url()?>assets/css/theme.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/xcharts.min.css" rel=" stylesheet">
    <link href="<?php echo base_url()?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style-responsive.css" rel="stylesheet">


    <div class="row">


      <div class="col-lg-12">
        <div class="box">
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

      <label class="control-label">Atendente</label>

        <select name="atendente" class="form-control">
          <option value="">Selecione um atendente</option>
          <option value="0">TODOS</option>
          <?php
          foreach($all_atendentes as $atendente)
          {
            $selected = ($atendente['idatendente'] == $this->input->post('idatendente')) ? ' selected="selected"' : "";

            echo '<option   value="'.$atendente['idatendente'].'" '.$selected.'>'.$atendente['nome'].'</option>';
          }
          ?>
        </select>


</div>
<div class="form-group">

    <label for="">&nbsp</label>
    <br />
    <button class="btn btn-primary">PESQUISAR</button>

</div>

</form>
      </div>
      <br>
    </div>
<br>
<?php
if(!$relatoriotodos){?>
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

    <?php foreach ($relatoriotodos as $r) {



                $i1 =+ $r['idfunc'];

              if($r['idfunc']==$i1){
                if($r['tipomov']==2){
                        $entrada += $r['valor'];
                }

                if($r['tipomov']==1){
                        $saida += $r['valor'];
                }

              }

              if($r['idfunc']!=$i1){
                $saldo = ($entrada-$saida);
                echo '<tr>';
                      echo '<td>'.$r['nomefunc'].'</td>';
                      echo '<td><strong>R$'.$saida.',00</strong></td>';
                      echo '<td><strong>R$ '.$entrada.',00</strong></td>';

                      echo '<td><strong>R$ '.$saldo.',00</strong></td>';
                        echo '<td><a href="#modal-lg" data-toggle="modal" class="btn btn-success">DETALHES</a></td>';
                      echo '</tr>';

                      $saldo=0;
                      $entrada=0;
                      $saida=0;

              }





  }



 }?>
  </tbody>
  <!-- SELECT nomefunc, idfunc, sum(valor) from salario where tipomov='2' GROUP BY nomefunc

  Select sum(CASE WHEN ex_type='Debit' THEN `sum` ELSE 0 END) as Debit,
  sum(CASE WHEN ex_type='Credit' THEN `sum` ELSE 0 END) as Credit FROM



-->
  </table>

  <div class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h4 class="modal-title" id="myModalLabel">Relatorio comissão</h4>

                </div>
                <div class="modal-body">


                    <section class="panel">
                      <table class="table table-striped">
                        <h4><strong>Profissional: </strong> <?php echo $r['nomefunc'];?> </h4>
                        <thead>
                          <tr>
                            <td>Data</td>
                            <td>Descrição</td>
                            <td>Valor</td>
                            <td>Tipo mov</td>
                          </tr>
                        </thead>
                      <tbody>
                      <?php foreach ($relatoriotodos as $r) {

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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">IMPRIMIR</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

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




</section>
</section>
