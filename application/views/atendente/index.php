<section id="main-content">
  <section class="wrapper">

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                <li><i class="fa fa-laptop"></i>Atendentes</li>
              </ol>

            	<div class="box-tools">
                    <a href="<?php echo site_url('atendente/add'); ?>" class="btn btn-success">NOVO ATENDENTE</a>
                </div>
                <br>
            </div>
            <div class="box-body">

              <section class="panel">
                <table class="table table-striped">
                    <tr>

						<th><i class="fa fa-user"></i> Nome</th>
						<th><i class="fa fa-user"></i> Sobrenome</th>
						<th><i class="icon_calendar"></i> Data Admissão</th>




						<th><i class="icon_mobile"></i> Telefone celular</th>
						<th><i class="fa fa-phone"></i> Telefone fixo</th>

            <th><i class="fa fa-check"></i> Status</th>
						<th><i class="fa fa-cogs"></i> Ações</th>
                    </tr>
                    <?php foreach($atendentes as $a){ ?>
                    <tr>

						<td><?php echo $a['nome']; ?></td>
						<td><?php echo $a['sobrenome']; ?></td>
						<td><?php echo $a['dataadmissao']; ?></td>



						<td><?php echo $a['telefonecelular']; ?></td>
						<td><?php echo $a['telefonefixo']; ?></td>

            <td><?php if($a['status']== '1'){ ?><span class="label label-success"> ATIVO </span> <?php }elseif($a['status']== '2') { ?> <span class="label label-danger"> INATIVO </span> <?php } ?></td>
						<td>
                            <a href="<?php echo site_url('atendente/edit/'.$a['idatendente']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>
                          <!--  <a href="<?php echo site_url('atendente/remove/'.$a['idatendente']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
</section>
            </div>
        </div>
    </div>
</div>
