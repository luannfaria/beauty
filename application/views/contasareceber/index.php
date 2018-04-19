<section id="main-content">
  <section class="wrapper">

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                <li><i class="fa fa-dollar"></i>Contas a receber</li>
              </ol>
            	<div class="box-tools">
                    <a href="<?php echo site_url('contasareceber/add'); ?>" class="btn btn-success" >NOVO PAGAMENTO</a>
                </div>
                <br>
            </div>
            <div class="box-body">
              <section class="panel">
                <table class="table table-striped">
                    <tr>
						<th><i class="fa fa-sort-numeric-desc"> </i> Numero</th>
						<th><i class="fa fa-bookmark"> </i> Descricao</th>

						<th><i class="fa fa-dollar"> </i> Valor</th>
						<th><i class="fa fa-calendar"> </i> Data Vencimento</th>
						<th><i class="fa fa-calendar"> </i> Data Pagamento</th>
						<th><i class="fa fa-comment-o"> </i> Observação</th>
						<th><i class="fa fa-cogs"> </i> Ações</th>
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
              </section>
            </div>
        </div>
    </div>
</div>
