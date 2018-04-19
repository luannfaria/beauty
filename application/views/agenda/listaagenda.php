<section id="main-content">
  <section class="wrapper">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <div class="row">
      <div class="col-lg-12">

        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
          <li><i class="fa fa-table"></i> Faturar Agendamentos</li>

        </ol>



      </div>
    </div>

<section class="panel">
<table class="table table-striped">
    <tr>

<th><i class="fa fa-sort-numeric-desc"> </i> Numero </th>
<th><i class="fa fa-user"> </i> Cliente</th>
<th><i class="icon_calendar"> </i> Data</th>
<th><i class="icon_calendar"> </i> Hora</th>
<th><i class="fa fa-dollar"> </i> Valor</th>
<th><i class="fa fa-dollar"> </i> Atendente</th>

<th><i class="fa fa-check"> </i> Status</th>
<th><i class="fa fa-cogs"> </i> Ações</th>
    </tr>
    <?php foreach($itensagenda as $i){ ?>
    <tr>

<td><?php echo $i['idagenda']; ?></td>
<td><?php echo $i['nomecliente']; ?></td>
<td><?php echo $i['data']; ?></td>
<td><?php echo $i['hora']; ?></td>



<td>R$<?php echo $i['subtotal']; ?></td>
<td><?php echo $i['nomeatend']; ?></td>

  <?php if( $i['status']=='1'){ ?>
<td><span class="label label-warning"> ABERTO </span></td>
<?php } ?>
<?php if( $i['status']=='2'){ ?>
<td><span class="label label-success">FINALIZADO </span></td>
<?php } ?>
<td>
          <?php if( $i['status']=='1'){ ?>

              <a href="<?php echo site_url('calendar/agendavenda/'.$i['idagenda']); ?>" class="btn btn-success"><span class="fa fa-money"></span> RECEBER</a>
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

</section>
