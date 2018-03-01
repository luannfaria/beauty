<section id="main-content">
  <section class="wrapper">

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <h3 class="page-header"><i class="fa fa-user"></i>ATENDENTES</h3>

            	<div class="box-tools">
                    <a href="<?php echo site_url('atendente/add'); ?>" class="btn btn-primary">ADICIONAR ATENDENTE</a>
                </div>
                <br>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>

						<th>Nome</th>
						<th>Sobrenome</th>
						<th>Data Admissão</th>
						<th>Comissão</th>



						<th>Telefone celular</th>
						<th>Telefone fixo</th>

            <th>Status</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($atendentes as $a){ ?>
                    <tr>

						<td><?php echo $a['nome']; ?></td>
						<td><?php echo $a['sobrenome']; ?></td>
						<td><?php echo $a['dataadmissao']; ?></td>
						<td><?php echo $a['comissao']; ?></td>


						<td><?php echo $a['telefonecelular']; ?></td>
						<td><?php echo $a['telefonefixo']; ?></td>

            <td><?php if($a['status']== '1'){ ?>ATIVO <?php }elseif($a['status']== '2') { ?> INATIVO <?php } ?></td>
						<td>
                            <a href="<?php echo site_url('atendente/edit/'.$a['idatendente']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> EDITAR</a>
                          <!--  <a href="<?php echo site_url('atendente/remove/'.$a['idatendente']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
