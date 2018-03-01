<section id="main-content">
  <section class="wrapper">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-calendar"></i>FATURAR AGENDAMENTOS</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
          <li><i class="fa fa-table"></i> Faturar Agendamentos</li>

        </ol>



      </div>
    </div>


<table class="table table-striped">
    <tr>

<th>Numero </th>
<th>Data</th>

<th>Cliente</th>


<th>Valor</th>


<th>Status</th>
<th>Ações</th>
    </tr>
    <?php foreach($itensagenda as $i){ ?>
    <tr>

<td><?php echo $i['idagenda']; ?></td>
<td><?php echo $i['data']; ?></td>

<td><?php echo $i['nomecliente']; ?></td>


<td>R$<?php echo $i['subtotal']; ?></td>

  <?php if( $i['status']=='1'){ ?>
<td>ABERTO</td>
<?php } ?>
<?php if( $i['status']=='2'){ ?>
<td>FECHADO</td>
<?php } ?>
<td>
          <?php if( $i['status']=='1'){ ?>
            <a href="<?php echo site_url('itensagenda/faturar/'.$i['idagenda']); ?>" class="btn btn-success"><span class="fa fa-money"></span> RECEBER</a>
            <a href="#" class="btn btn-info"><span class="fa fa-pencil"></span> VISUALIZAR</a>
<?php } ?>

<?php if( $i['status']=='2'){ ?>
  <a href="#" class="btn btn-info"><span class="fa fa-pencil"></span> VISUALIZAR</a>
<?php } ?>
        </td>
    </tr>
    <?php } ?>
</table>


</section>

</section>
