<section id="main-content">
  <section class="wrapper">




<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                <li><i class="fa fa-user"></i>Clientes</li>
              </ol>
<?php if ($this->session->flashdata('success')) { ?>
                  <div class="alert alert-success fade in">

                    <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                           <?PHP echo $this->session->flashdata('success') ?>
                  </div>
                  <?php } ?>
                  <div class="row">
                      <div class="col-md-12">
            	<div class="box-tools">
                <div class="col-md-6">
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){ ?>
                    <a href="<?php echo site_url('cliente/add'); ?>" class="btn btn-success">NOVO CLIENTE</a>
                  <?php } ?>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control"/>
                </div>
                </div>
              </div>
            </div>


          </div><br/>
            <div class="box-body">


              <section class="panel">
                  <?php if (isset($results)) { ?>
                <table class="table table-striped">
                    <tr>


						<th><i class="fa fa-user"></i> Nome</th>

						<th><i class="fa fa-calendar"></i> Data cadastro</th>
						<th><i class="fa fa-phone"></i> Telefone fixo</th>
						<th><i class="fa fa-mobile"></i> Celular</th>

						<th>Obs</th>
            <th>Status</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($results as $c){ ?>
                    <tr>


						<td><?php echo $c->nome; ?> <?php echo $c->sobrenome; ?></td>

						<td><?php echo $c->datacadastro; ?></td>
						<td><?php echo $c->telefonefixo; ?></td>
						<td><?php echo $c->telefonecelular; ?></td>

						<td><?php echo $c->obs; ?></td>
            <?php if( $c->status =='1'){ ?>
          <td><span class="label label-success">ATIVO</span></td>
          <?php } ?>
          <?php if( $c->status =='2'){ ?>
          <td><span class="label label-danger">INATIVO</span></td>
          <?php } ?>
						<td>
                            <a href="<?php echo site_url('cliente/edit/'.$c->idcliente); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>

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
            </div>

        </div>


    </div>
</div>

</section>
</section>
