<section id="main-content">
  <section class="wrapper">

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                <li><i class="fa fa-laptop"></i>Contas a pagar</li>
              </ol>
            	<div class="box-tools">
                    <a href="<?php echo site_url('contasapagar/add'); ?>" class="btn btn-success">NOVO PAGAMENTO</a>
                </div>
                <br>
            </div>
            <div class="box-body">
              <section class="panel">
                <table class="table table-striped">
                    <tr>

<th>Numero</th>
						<th>Descrição</th>

						<th>Valor</th>
						<th>Data Vencimento</th>
						<th>Data Pagamento</th>

						<th>Ações</th>
                    </tr>
                    <?php foreach($contasapagars as $c){ ?>
                    <tr>

<td><?php echo $c['numero']; ?></td>
						<td><?php echo $c['descricao']; ?></td>

						<td><?php echo $c['valor']; ?></td>
						<td><?php echo $c['datavencimento']; ?></td>
						<td><?php echo $c['datapagamento']; ?></td>




                        <td>
                                      <?php if($c['datapagamento']!=NULL){ ?>
                                        <a href="#" class="btn btn-info"><span class="fa fa-pencil"></span> VISUALIZAR</a>

                                      <?php } ?>
                                    <?php if($c['datapagamento']==NULL){ ?>
                                        <a href="<?php echo site_url('contasapagar/edit/'.$c['idcontasapagar']); ?>" class="btn btn-success"><span class="fa fa-money"></span> PAGAR</a>
                                        <a href="<?php echo site_url('contasapagar/remove/'.$c['idcontasapagar']); ?>" class="btn btn-danger"><span class="fa fa-trash"></span> EXCLUIR</a>
                                      <?php } ?>
                                    </td>

                    </tr>
                    <?php } ?>
                </table>
</section>
            </div>
        </div>
    </div>
</div>
