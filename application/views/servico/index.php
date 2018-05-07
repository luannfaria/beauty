<section id="main-content">
  <section class="wrapper">






<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                <li><i class="fa fa-wrench"></i>Serviços</li>
              </ol>

              <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success fade in">

                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                                    <i class="icon-remove"></i>
                                                </button>
                                         <?PHP echo $this->session->flashdata('success') ?>
                                </div>
                                <?php } ?>
            	<div class="box-tools">
                    <a href="<?php echo site_url('servico/add'); ?>" class="btn btn-success">NOVO SERVIÇO</a>

                    <a href="#pacote" data-toggle="modal" class="btn btn-success">NOVO PACOTE</a>
                </div>
                <br>
            </div>
            <div class="box-body">
              <section class="panel">
                <table class="table table-striped">
                    <tr>


						<th><i class="fa fa-circle"></i> Nome Serviço</th>
						<th><i class="fa fa-dollar"></i> Valor de venda</th>

						<th><i class="fa fa-dollar"></i> Comissão</th>
<th><i class="fa fa-wrench"></i> Tipo serviço</th>
<th><i class="fa fa-check"></i> Status</th>
						<th><i class="fa fa-cogs"></i> Ações</th>
                    </tr>
                    <?php foreach($servicos as $s){ ?>
                    <tr>


						<td><?php echo $s['nomeservico']; ?></td>
						<td>R$ <?php echo $s['valorserv']; ?></td>
            <?php if($s['tiposervico']=='2') { ?>
              <td> # </td>
          <?php   }else { ?>
            <td>R$ <?php echo $s['comissao']; ?></td>
    <?php      } ?>




            <td><?php if($s['tiposervico']== '1'){ ?>INDIVIDUAL <?php }elseif($s['tiposervico']== '2') { ?> PACOTE <?php } ?></td>
            <td><?php if($s['status']== '1'){ ?> <span class="label label-success"> ATIVO </span> <?php }elseif($s['status']== '2') { ?> <span class="label label-danger"> INATIVO </span> <?php } ?></td>
<?php if($s['tiposervico']=='1') { ?>
						<td>
                            <a href="<?php echo site_url('servico/edit/'.$s['idservico']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>

                        </td>
                        <?php   }else { ?>

                          <td>
                          <a href="<?php echo site_url('servico/editpacote/'.$s['idservico']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>
</td>
                              <?php      } ?>
                    </tr>
                    <?php } ?>
                </table>
</section>
            </div>
        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="pacote" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Novo Pacote</h4>
      </div>
      <div class="modal-body">

<form action="" method="post" id="form_prepare">

          <div class="col-md-5">
          <div class="form-group">
            <label for="exampleInputEmail1">Nome do Pacote</label>
            <input type="text" class="form-control required" id="nomepacote" name="nomepacote" required>

            <input type="hidden" class="form-control" value="2" id="tiposervico" name="tiposervico" >
            <input type="hidden" class="form-control" value="1" id="status" name="status" >
          </div>
        </div>
          <div class="col-md-3">
          <div class="form-group">
            <label for="exampleInputPassword1">Valor do Pacote</label>
            <input type="text" class="form-control required"  id="vlr"  name="vlr" required>
          </div>
        </div>
        <div class="col-md-4">
          <label for="idcategoria" class="control-label"><span class="text-danger">*</span>Categorias</label>
          <div class="form-group">
            <select name="idcategoria" class="form-control m-bot15">
              <option value="">Selecione uma categoria</option>
              <?php
              foreach($all_categoria_prod_servs as $categoria_prod_serv)
              {
                $selected = ($categoria_prod_serv['idcategoria_prod_serv'] == $this->input->post('idcategoria')) ? ' selected="selected"' : "";

                echo '<option value="'.$categoria_prod_serv['idcategoria_prod_serv'].'" '.$selected.'>'.$categoria_prod_serv['nome'].'</option>';
              }
              ?>
            </select>
            <span class="text-danger"><?php echo form_error('idcategoria');?></span>
          </div>
        </div>

         <fieldset class="scheduler-border">
    <legend class="scheduler-border">Itens do Pacote</legend>

    <div class="col-md-6">
      <label>Nome do item</label>

         <div class="form-group">
          <!--  <label>Adicione um serviço</label>-->
            <input type="hidden" name="idservico" id="idservico" />



            <input type="hidden" name="valorserv" id="valorserv" value="" />
            <input type="hidden" name="comissao" id="comissao" value=""/>
              <input type="hidden" name="nomeservico" id="nomeservico" value=""/>
        <input type="text" class="form-control" name="servico" id="inputproduto" placeholder="Digite o nome do produto" onfocus="this.value=''";/>
      </div>

    </div>

    <div class="col-md-3">
      <label>Comissão</label>
      <input type="text" class="form-control"  name="comi" id="comi" onfocus="this.value=''";/>
    </div>

    <div class="col-md-3">
      <BR>
      <label><input type="submit" class="btn btn-success" name="ok" value="ADICIONAR" /></label>
    </div>
</form>
        </div>


        <table id="table" class="table table-bordered">
                  <thead>
                    <tr>
                      <td>Item</td>

                    <td>Comissão</td>
                    <td>Ações</td>

                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
        </fieldset>
        <div class="modal-footer">

          <form action="<?php echo base_url();?>servico/addpacote" method="post" id="form_insert">
          			<fieldset style="display: none;"></fieldset>
          			<label><input type="submit" class="btn btn-success" name="cadastrar" value="SALVAR" /></label>
          		</form>

          <!--<button  onclick="Add()"class="btn btn-success"><i class="fa fa-clock-o"> AGENDAR</button> -->


        </div>

      </div>
    </div>
  </div>
</div>

      <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/validate.js"></script>


          <script src="<?php echo base_url()?>assets/js/maskmoney.js"></script>

<script type="text/javascript">
$('#comi').maskMoney();
$('#vlr').maskMoney();

  $(function() {


    RemoveTableRow = function(handler) {
      var tr = $(handler).closest('tr');

      tr.fadeOut(400, function(){
        tr.remove();
      });

      return false;
    };

    $('#form_prepare').submit(function(){
      var $this = $( this );

        var nomeservico= $this.find("input[name='nomeservico']").val();
        var comissao = $this.find("input[name='comi']").val();
        var nomepacote = $this.find("input[name='nomepacote']").val();
        var idservico = $this.find("input[name='idservico']").val();
        var status = $this.find("input[name='status']").val();
        var vlr = $this.find("input[name='vlr']").val();
        var tip = $this.find("input[name='tiposervico']").val();







      var tr = '<tr>'+
        '<td>'+nomeservico+'</td>'+
        '<td>'+comissao+'</td>'+


      '<td>  <button class="btn btn-danger" onclick="RemoveTableRow(this)" type="button">REMOVER</button> </td>'
        '</tr>'
      $('#table').find('tbody').append( tr );


      var hiddens = '<input type="hidden" name="item[]" value="'+nomeservico+'" />'+
      '<input type="hidden" name="pacotenome" value="'+nomepacote+'" />'+
      '<input type="hidden" name="valorpacote" value="'+vlr+'" />'+
      '<input type="hidden" name="statuspacote" value="'+status+'" />'+
      '<input type="hidden" name="idservico[]" value="'+idservico+'" />'+
      '<input type="hidden" name="tiposerv" value="'+tip+'" />'+
      '<input type="hidden" name="comissao[]" value="'+comissao+'" />';
;

  $('#form_insert').find('fieldset').append( hiddens );

      return false;
    });


$("#inputproduto").autocomplete({

  source: "<?php echo base_url(); ?>calendar/autoCompleteServico",

  minLength: 2,

  select: function(event, ui) {



      $("#idservico").val(ui.item.idservico);

      $("#valorserv").val(ui.item.valorserv);
        $("#com").val(ui.item.comissao);

          $("#nomeservico").val(ui.item.nomeservico);







  }

});
});

</script>


</section>
</section>
