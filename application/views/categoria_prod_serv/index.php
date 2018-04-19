<section id="main-content">
  <section class="wrapper">


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                <li><i class="fa fa-laptop"></i>Categorias</li>
              </ol>
            	<div class="box-tools">
                    <a href="<?php echo site_url('categoria_prod_serv/add'); ?>" class="btn btn-success">NOVA CATEGORIA</a>
                </div>
                <br>
            </div>
            <div class="box-body">
              <section class="panel">
                <table class="table table-striped">
                    <tr>


						<th><i class="fa fa-cicle"></i> Nome</th>
            <th><i class="fa fa-check"></i> Status</th>
						<th><i class="icon_cogs"></i> Ações</th>
                    </tr>
                    <?php foreach($categoria_prod_servs as $c){ ?>
                    <tr>


						<td><?php echo $c['nome']; ?></td>
            <td><?php if($c['status']== '1'){ ?><span class="label label-success"> ATIVO </span><?php }elseif($c['status']== '2') { ?> <span class="label label-danger"> INATIVO </span> <?php } ?></td>
						<td>
                            <a href="<?php echo site_url('categoria_prod_serv/edit/'.$c['idcategoria_prod_serv']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>
                    <!--        <a href="<?php echo site_url('categoria_prod_serv/remove/'.$c['idcategoria_prod_serv']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
</section>
            </div>
        </div>
    </div>
</div>
