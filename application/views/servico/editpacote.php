<section id="main-content">
  <section class="wrapper">


    <div class="row">

          <div class="col-md-12">
                      <section class="panel">
                        <header class="panel-heading">
                          Editar pacote


                        </header>
                        <div class="panel-body">

    			<?php echo form_open('servico/edit/'.$servico['idservico']); ?>
    			<div class="box-body">
    				<div class="row clearfix">

    					<div class="col-md-4">
    						<label for="nomeservico" class="control-label"><span class="text-danger">*</span>Nome pacote</label>
    						<div class="form-group">
    							<input type="text" name="nomeservico" value="<?php echo ($this->input->post('nomeservico') ? $this->input->post('nomeservico') : $servico['nomeservico']); ?>" class="form-control" id="nomeservico" />
    							<span class="text-danger"><?php echo form_error('nomeservico');?></span>
    						</div>
    					</div>
    					<div class="col-md-2">
    						<label for="valorserv" class="control-label"><span class="text-danger">*</span>Valor pacote</label>
    						<div class="form-group">
    							<input type="text" name="valorserv" value="<?php echo ($this->input->post('valorserv') ? $this->input->post('valorserv') : $servico['valorserv']); ?>" class="form-control money" onkeyup="formatarMoeda();" id="valorserv" />
    							<span class="text-danger"><?php echo form_error('valorserv');?></span>
    						</div>
    					</div>



              <div class="col-md-2">
                <label for="idcategoria" class="control-label"><span class="text-danger">*</span>Categoria</label>
                <div class="form-group">
                  <select name="idcategoria" class="form-control">
                    <option value="">Selecione uma categoria</option>
                    <?php
                    foreach($all_categoria_prod_servs as $categoria_prod_serv)
                    {
                      $selected = ($categoria_prod_serv['idcategoria_prod_serv'] == $servico['idcategoria']) ? ' selected="selected"' : "";

                      echo '<option value="'.$categoria_prod_serv['idcategoria_prod_serv'].'" '.$selected.'>'.$categoria_prod_serv['nome'].'</option>';
                    }
                    ?>
                  </select>
                  <span class="text-danger"><?php echo form_error('idcategoria');?></span>
                </div>
              </div>

              <div class="col-md-2">
                <label for="status" class="control-label">Status</label>
                <div class="form-group">
                  <select name="status" class="form-control">
                    <option value="">Selecione</option>
                    <?php
                    $status_values = array(
                      '1'=>'ATIVO',
                      '2'=>'INATIVO',
                    );

                    foreach($status_values as $value => $display_text)
                    {
                      $selected = ($value == $servico['status']) ? ' selected="selected"' : "";

                      echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              	<?php echo form_close(); ?>

</div>
	<div class="row clearfix">

                  <form id="formServicos" action="<?php echo base_url() ?>servico/additempacote" method="post">

           <div class="col-md-6">
             <label>Nome do item</label>

                <div class="form-group">
                 <!--  <label>Adicione um serviço</label>-->
                   <input type="hidden" name="idservico" id="idservico" />


                    <input type="hidden" name="idpacote" id="idpacote" value="<?php echo $servico['idservico'];?>"/>

                   <input type="hidden" name="comissao" id="comissao" value=""/>
                     <input type="hidden" name="nomeitem" id="nomeitem" value=""/>
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


         <div class="span12" id="divServicos">


                <table class="table table-striped">

                <tr>


        <th><i class="fa fa-circle"></i> Nome Serviço</th>


        <th><i class="fa fa-dollar"></i> Comissão</th>




        <th><i class="fa fa-cogs"></i> Ações</th>


                </tr>


                <?php foreach($itenspacote as $i){ ?>
                  <tr>

                    <td><?php echo $i['nomeserv']; ?></td>
                    <td>R$ <?php echo $i['comissao']; ?></td>
                    <td> <span idAcao="<?php echo $i['iditem_serv']; ?>" title="Excluir Serviço" class="btn btn-danger"><i class="icon-remove icon-white">EXCLUIR</i></span>
                  </td>
            <?php      } ?>

                  </tr>

              </table>

</div>

</div>


    							<input type="hidden" name="tiposervico" value="1" class="form-control" id="tiposervico" />



    			<div class="box-footer">
                	<button type="submit" class="btn btn-success">
    					<i class="fa fa-check"></i> SALVAR
    				</button>
    	        </div>

    		</div>
      </section>
      </div>
        </div>


        <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <script src="<?php echo base_url()?>assets/js/validate.js"></script>






        <script type="text/javascript">



          $(document).on('click', 'span', function(event) {
                      var $iditem = $(this).attr('idAcao');
                      if(($iditem % 1) == 0){
                          $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                          $.ajax({
                            type: "POST",
                            url: "<?php echo base_url();?>servico/removeitem",
                            data: "iditem="+$iditem,
                            dataType: 'json',
                            success: function(data)
                            {
                              if(data.result == true){

                                  $("#divServicos").load("<?php echo current_url();?> #divServicos" );

}
else{

    alert('Ocorreu um erro ao tentar excluir serviço.');
}
                            }
                            });
                            return false;
                      }

                 });


                 $("#inputproduto").autocomplete({

                   source: "<?php echo base_url(); ?>calendar/autoCompleteServico",

                   minLength: 2,

                   select: function(event, ui) {



                       $("#idservico").val(ui.item.idservico);


                         $("#com").val(ui.item.comissao);

                           $("#nomeitem").val(ui.item.nomeservico);







                   }

                 });

                 $("#formServicos").validate({
          rules:{
             nomeitem: {required:true}
          },
          messages:{
             nomeitem: {required: 'Insira um serviço'}
          },
          submitHandler: function( form ){
                 var dados = $( form ).serialize();

                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>servico/additempacote",
                  data: dados,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $( "#divServicos" ).load("<?php echo current_url();?> #divServicos" );

                    }
                    else{
                        alert('Ocorreu um erro ao tentar adicionar serviço.');
                    }
                  }
                  });

                  return false;
                }

       });






</script>
