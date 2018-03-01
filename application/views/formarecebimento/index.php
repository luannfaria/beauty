<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Formarecebimentos Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('formarecebimento/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idformarecebimento</th>
						<th>Nomeforma</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($formarecebimentos as $f){ ?>
                    <tr>
						<td><?php echo $f['idformarecebimento']; ?></td>
						<td><?php echo $f['nomeforma']; ?></td>
						<td>
                            <a href="<?php echo site_url('formarecebimento/edit/'.$f['idformarecebimento']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('formarecebimento/remove/'.$f['idformarecebimento']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
