<section id="main-content">
  <section class="wrapper">




<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                  <h3 class="page-header"><i class="fa fa-user"></i>CLIENTES</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('cliente/add'); ?>" class="btn btn-primary">NOVO CLIENTE</a>
                </div>
                <br>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>


						<th>Nome</th>
						<th>Sobrenome</th>
						<th>Data cadastro</th>
						<th>Telefone fixo</th>
						<th>Telefone celular</th>

						<th>Obs</th>
            <th>Status</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($clientes as $c){ ?>
                    <tr>


						<td><?php echo $c['nome']; ?></td>
						<td><?php echo $c['sobrenome']; ?></td>
						<td><?php echo $c['datacadastro']; ?></td>
						<td><?php echo $c['telefonefixo']; ?></td>
						<td><?php echo $c['telefonecelular']; ?></td>

						<td><?php echo $c['obs']; ?></td>
            <?php if( $c['status']=='1'){ ?>
          <td>ATIVO</td>
          <?php } ?>
          <?php if( $c['status']=='2'){ ?>
          <td>INATIVO</td>
          <?php } ?>
						<td>
                            <a href="<?php echo site_url('cliente/edit/'.$c['idcliente']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>
                          <!--  <a href="<?php echo site_url('cliente/remove/'.$c['idcliente']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
