<section id="main-content">

  <section class="wrapper">


    <div class="row">
      <div class="col-lg-5">

        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
          <li><i class="fa fa-calendar"></i> Faturar Agendamentos</li>

        </ol>



      </div>
            <div class="col-lg-7">

              <form id="formpesquisar"class="form-inline" method="post" action="#" >

<span class="label label-success">PESQUISAR</span>
                  <label><strong> Nome do cliente</strong>
                <div class="form-group">


</label>
                     <input type="text" class="form-control required" name="cliente" id="cliente" placeholder="Digite o nome do cliente"  onfocus="this.value=''" required/>

                     <input type="hidden" class="form-control" name="idcliente" id="idcliente" />
                     <input type="hidden" class="form-control" name="nome" id="nome" />





</div>


              <button class="btn btn-primary">PESQUISAR</button>
              </form>
            </div>

    </div>
<?php if (isset($results)) { ?>
<section class="panel">

<table class="table table-striped">
    <tr>

<th><i class="fa fa-sort-numeric-desc"> </i> Numero </th>
<th><i class="fa fa-user"> </i> Cliente</th>
<th><i class="icon_calendar"> </i> Data</th>
<th><i class="fa fa-clock-o"> </i> Hora</th>
<th><i class="fa fa-dollar"> </i> Valor</th>
<th><i class="fa fa-user"> </i> Atendente</th>

<th><i class="fa fa-check"> </i> Status</th>
<th><i class="fa fa-cogs"> </i> Ações</th>
    </tr>
    <?php foreach($results as $i){ ?>
    <tr>

<td><?php echo $i->idagenda; ?></td>
<td><?php echo $i->nomecliente ?></td>
<td><?php echo $i->data; ?></td>
<td><?php echo $i->hora; ?></td>



<td>R$<?php echo $i->subtotal; ?></td>
<td><?php echo $i->nomeatend; ?></td>

  <?php if( $i->status=='1'){ ?>
<td><span class="label label-warning"> ABERTO </span></td>
<?php } ?>
<?php if( $i->status=='2'){ ?>
<td><span class="label label-success">FINALIZADO </span></td>
<?php } ?>
<td>
          <?php if( $i->status=='1'){ ?>

              <a href="<?php echo site_url('calendar/agendavenda/'.$i->idagenda); ?>" class="btn btn-success"><span class="fa fa-pencil"></span> VISUALIZAR</a>
<?php } ?>

<?php if( $i->status=='2'){ ?>
  <a href="#" class="btn btn-info"><span class="fa fa-pencil"></span> VISUALIZAR</a>
<?php } ?>
        </td>
    </tr>
<?php } ?>
</table>
<?php } else { ?>
              <div>No user(s) found.</div>
          <?php } ?>

</section>
<?php if (isset($links)) { ?>
    <?php echo $links ?>
<?php } ?>


<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>

<script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/js/validate.js"></script>



  <script src="<?php echo base_url()?>assets/js/maskmoney.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.hotkeys.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap-wysiwyg.js"></script>

  <script src="<?php echo base_url()?>assets/js/moment.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap-colorpicker.js"></script>
  <script src="<?php echo base_url()?>assets/js/daterangepicker.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.timepicker.min.js"></script>


<script type="text/javascript">
$( function() {

$("#cliente").autocomplete({

    source: "<?php echo base_url(); ?>calendar/autoCompleteCliente",

    minLength: 2,

    select: function(event, ui) {



        $("#idcliente").val(ui.item.idcliente);
        $("#nome").val(ui.item.nome);





    }

});

$("#formpesquisar").validate({
rules:{
nomeproduto: {required:true}
},
messages:{
nomeproduto: {required: 'Insira um produto'}
},
submitHandler: function( form ){
var dados = $( form ).serialize();


$.ajax({
 type: "POST",
 url: "<?php echo base_url();?>calendar/buscacliente",
 data: dados,
 dataType: 'json',
 success: function(data)
 {
   if(data.result == true){

   }
   else{
       alert('Ocorreu um erro ao tentar adicionar produto.');
   }
 }
 });

 return false;
}

});



});
</script>

</section>

</section>
