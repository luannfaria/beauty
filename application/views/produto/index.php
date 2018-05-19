<section id="main-content">
  <section class="wrapper">




<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                <li><i class="fa fa-wrench"></i>Produtos</li>
              </ol>
            	<div class="box-tools">
                    <a href="<?php echo site_url('produto/add'); ?>" class="btn btn-success">NOVO PRODUTO</a>
                </div>
                  <br>
            </div>
            <div class="box-body">
              <section class="panel">
                <table class="table table-striped">
                    <tr>

						<th>Descrição</th>
						<th>Custo</th>
						<th>Venda</th>

						<th>Status</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($produtos as $p){ ?>
                    <tr>



						<td><?php echo $p['nome']; ?></td>
						<td><?php echo $p['custoproduto']; ?></td>
						<td><?php echo $p['precovenda']; ?></td>

						<td><?php echo $p['status']; ?></td>
						<td>
                            <a href="<?php echo site_url('produto/edit/'.$p['idproduto']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>

                        </td>
                    </tr>
                    <?php } ?>
                </table>
</section>
            </div>
        </div>
    </div>
</div>
