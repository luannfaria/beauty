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

        <input class="form-control" id="inicio" value=" "  type="text" name="inicio"  />

    </div>
    <div class="form-group">
      <label class="control-label">Até</label>

        <input class="form-control" id="termino"  value=" " type="text" name="termino"  />

    </div>

<div class="form-group">

      <label class="control-label">Atendente</label>

        <select name="atendente" class="form-control">
          <option value="">Selecione um atendente</option>
          <option value="0">Todos</option>
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

    <?php
    $all = $relatorio;


    foreach ($relatorio as $r) {
$next = next($all);








  if($r['tipomov']==2){
          $entrada += $r['valor'];
  }

  if($r['tipomov']==1){
          $saida += $r['valor'];
  }
if($r['idfunc']!=$next['idfunc']){
    $saldo = ($entrada-$saida);
      echo '<tr>';

      $i=$r['idfunc'];

      $d = $i;
            echo '<td>'.$r['nomefunc'].'</td>';
            echo '<td><strong>R$'.$saida.',00</strong></td>';
            echo '<td><strong>R$ '.$entrada.',00</strong></td>';

            echo '<td><strong>R$ '.$saldo.',00</strong></td>';
            // echo '<td><span idAcao="'.$r['idfunc'].'" title="'.$r['idfunc'].'" class="btn btn-success">DETALHES</span></td>';
echo '<td><a data-toggle="modal" data-target="#modal-lg'.$r['idfunc'].'" class="btn btn-success" value="'.$d.'"><span class="btn-label"></span>DETALHES'.$d.'</a></td>';
            echo '</tr>'; ?>



        <?php    $saldo=0;
                $entrada=0;
                $saida=0;
  }


}}?>
  </tbody>
  <!-- SELECT nomefunc, idfunc, sum(valor) from salario where tipomov='2' GROUP BY nomefunc

  Select sum(CASE WHEN ex_type='Debit' THEN `sum` ELSE 0 END) as Debit,
  sum(CASE WHEN ex_type='Credit' THEN `sum` ELSE 0 END) as Credit FROM



-->
  </table>


</div>
</div>

</section>

<?php for($i=0;$i<$r['idfunc'];$i++){?>
<div class="modal fade" id="modal-lg<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Detalhe comissão </h4>
                      </div>
                      <div class="modal-body">
                        <table class="table table-striped">
                          <thead>
                            <tr>

                              <th>Data</th>
                              <th>Descrição</th>

                              <th>Valor</th>


                              <th>Tipo</th>


                        </tr>
                        </thead>

                        <tbody>


                            <?php   foreach ($relatorio as $r) {

                              if($i==$r['idfunc']){
                                echo '<tr>';
                                  echo '<td>'.$r['data'].'</td>';
                                  echo'<td>'.$r['descricao'].'</td>';
                                  echo'<td>R$ '.$r['valor'].',00</td>';
                                  if($r['tipomov']==2){
                                  echo'<td>COMISSÃO</td>';
                                }
                                  else{
                                    echo'<td>VALE</td>';
                              }
                                  echo '</tr>';
                              }
}?>

</tbody>
</table>

                      </div>
                      <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="button">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>
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

  //  $(document).on('click', 'span', function(event) {
    //            var idfunc = $(this).attr('idAcao');
//
      //          document.getElementById('funcionario').value= idfunc;


              //  if(($idserv % 1) == 0){

    //                $.ajax({
      //                type: "POST",
        //              url: "<?php echo base_url();?>calendar/removeservicoagenda",
          //            data: "idserv="+$idserv,
            //          dataType: 'json',
              //        success: function(data)
                //      {
                  //      if(data.result == true){

                    //        $("#divServicos").load("<?php echo current_url();?> #divServicos" );
                      //        $("#divFinanceiro").load("<?php echo current_url();?> #divFinanceiro" );

  //  }
    //else{

  //  alert(idfunc);
    //}
      //                }
        //             });
          //            return false;
            //    }

  //         });


});



</script>




</section>
</section>
