<section id="main-content">
  <section class="wrapper">




    <script type="text/javascript">
    function formatarMoeda() {
    var elemento = document.getElementById('vlr');
    var valor = elemento.value;

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g,''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }

    elemento.value = valor;
    }

    function formatarComissao() {
    var elemento = document.getElementById('comissao');
    var valor = elemento.value;

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g,''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }

    elemento.value = valor;
    }

    </script>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                <li><i class="fa fa-wrench"></i>Serviços</li>
              </ol>

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

						<td>
                            <a href="<?php echo site_url('servico/edit/'.$s['idservico']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>

                        </td>
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

          <div class="col-md-8">
          <div class="form-group">
            <label for="exampleInputEmail1">Nome do Pacote</label>
            <input type="text" class="form-control" id="nomepacote" name="nomepacote" >

            <input type="hidden" class="form-control" value="2" id="tiposervico" name="tiposervico" >
            <input type="hidden" class="form-control" value="1" id="status" name="status" >
          </div>
        </div>
          <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputPassword1">Valor do Pacote</label>
            <input type="text" class="form-control"  id="vlr" onkeyup="formatarMoeda();" name="vlr" >
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
        <input type="text" class="form-control" name="servico" id="inputproduto" placeholder="Digite o nome do produto" />
      </div>

    </div>

    <div class="col-md-3">
      <label>Comissão</label>
      <input type="text" class="form-control"  name="comi" id="comi"/>
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

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>

<script>

  $( function() {


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
