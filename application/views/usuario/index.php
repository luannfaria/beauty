<section id="main-content">
  <section class="wrapper">

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                <li><i class="fa fa-laptop"></i>Usuarios</li>
              </ol>
            	<div class="box-tools">
                    <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success">ADICIONAR USUARIO</a>
                </div>
                <br>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Numero usuario</th>
            <th>Login</th>
						<th>Status</th>

						<th>Ações</th>
                    </tr>
                    <?php foreach($usuarios as $u){ ?>
                    <tr>
						<td><?php echo $u['idusuario']; ?></td>
            <td><?php echo $u['login']; ?></td>
						<td><?php echo $u['status']; ?></td>

						<td>
                            <a href="<?php echo site_url('usuario/edit/'.$u['idusuario']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>
                            <a href="<?php echo site_url('usuario/remove/'.$u['idusuario']); ?>" class="btn btn-danger"><span class="fa fa-trash"></span> DELETAR</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
