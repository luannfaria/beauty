<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Item Servs Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('item_serv/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Iditem Serv</th>
						<th>Idserv</th>
						<th>Nomeserv</th>
						<th>Idpacote</th>
						<th>Comissao</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($item_servs as $i){ ?>
                    <tr>
						<td><?php echo $i['iditem_serv']; ?></td>
						<td><?php echo $i['idserv']; ?></td>
						<td><?php echo $i['nomeserv']; ?></td>
						<td><?php echo $i['idpacote']; ?></td>
						<td><?php echo $i['comissao']; ?></td>
						<td>
                            <a href="<?php echo site_url('item_serv/edit/'.$i['iditem_serv']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('item_serv/remove/'.$i['iditem_serv']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
