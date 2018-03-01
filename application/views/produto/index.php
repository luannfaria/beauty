<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Produtos Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('produto/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idproduto</th>
						<th>Status</th>
						<th>Idcategoria</th>
						<th>Nome</th>
						<th>Custoproduto</th>
						<th>Precovenda</th>
						<th>Codbarra</th>
						<th>Marca</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($produtos as $p){ ?>
                    <tr>
						<td><?php echo $p['idproduto']; ?></td>
						<td><?php echo $p['status']; ?></td>
						<td><?php echo $p['idcategoria']; ?></td>
						<td><?php echo $p['nome']; ?></td>
						<td><?php echo $p['custoproduto']; ?></td>
						<td><?php echo $p['precovenda']; ?></td>
						<td><?php echo $p['codbarra']; ?></td>
						<td><?php echo $p['marca']; ?></td>
						<td>
                            <a href="<?php echo site_url('produto/edit/'.$p['idproduto']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('produto/remove/'.$p['idproduto']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
