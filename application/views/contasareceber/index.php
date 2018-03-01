<section id="main-content">
  <section class="wrapper">

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="page-header"><i class="fa fa-money"></i>CONTAS A RECEBER</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('contasareceber/add'); ?>" class="btn btn-primary">ADICIONAR NOVO</a>
                </div>
                <br>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Numero</th>
						<th>Descricao</th>

						<th>Valor</th>
						<th>Data Vencimento</th>
						<th>Data Pagamento</th>
						<th>Observação</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($contasarecebers as $c){ ?>
                    <tr>
							<td><?php echo $c['numero']; ?></td>
						<td><?php echo $c['descricao']; ?></td>

						<td><?php echo $c['valor']; ?></td>
						<td><?php echo $c['datavencimento']; ?></td>
						<td><?php echo $c['datapagamento']; ?></td>
						<td><?php echo $c['obs']; ?></td>
						<td>
                          <?php if($c['datapagamento']!=NULL){ ?>
                            <a href="#" class="btn btn-info"><span class="fa fa-pencil"></span> VISUALIZAR</a>

                          <?php } ?>
                        <?php if($c['datapagamento']==NULL){ ?>
                            <a href="<?php echo site_url('contasareceber/edit/'.$c['idcontasareceber']); ?>" class="btn btn-success"><span class="fa fa-money"></span> RECEBER</a>
                            <a href="<?php echo site_url('contasareceber/remove/'.$c['idcontasareceber']); ?>" class="btn btn-danger"><span class="fa fa-trash"></span> EXCLUIR</a>
                          <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
