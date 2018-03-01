<section id="main-content">
  <section class="wrapper">


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Categorias Produtos/Serviços</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('categoria_prod_serv/add'); ?>" class="btn btn-primary">NOVA CATEGORIA</a>
                </div>
                <br>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>


						<th>Nome</th>
            <th>Status</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($categoria_prod_servs as $c){ ?>
                    <tr>


						<td><?php echo $c['nome']; ?></td>
            <td><?php if($c['status']== '1'){ ?>ATIVO <?php }elseif($c['status']== '2') { ?> INATIVO <?php } ?></td>
						<td>
                            <a href="<?php echo site_url('categoria_prod_serv/edit/'.$c['idcategoria_prod_serv']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>
                    <!--        <a href="<?php echo site_url('categoria_prod_serv/remove/'.$c['idcategoria_prod_serv']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
