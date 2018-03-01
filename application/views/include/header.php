<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>UP Unhas </title>

  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo base_url()?>assets/css/bootstrap-theme.css" rel="stylesheet">

  <link  rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" />
  <!--external css-->
  <!-- font icon -->
  <link href="<?php echo base_url()?>assets/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="<?php echo base_url() ?>assets/css/fullcalendar.min.css" rel="stylesheet" />

  <link href="<?php echo base_url() ?>assets/css/fullcalendar.print.min.css" rel="stylesheet" media="print" />
  <link href="<?php echo base_url() ?>assets/css/scheduler.min.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/bootstrap-fullcalendar.css" rel="stylesheet" />


  <!-- owl carousel -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/owl.carousel.css" type="text/css">
  <link href="<?php echo base_url()?>assets/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->

  <link href="<?php echo base_url()?>assets/css/widgets.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/style-responsive.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/xcharts.min.css" rel=" stylesheet">
  <link href="<?php echo base_url()?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">UP <span class="lite">Unhas</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->

          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->

          <!-- inbox notificatoin end -->
          <!-- alert notification start-->

          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username">LOGADO</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
              <a href=<?php echo site_url();?>dashboard/sair><i class="icon_key_alt"></i> Sair do sistema</a>
              </li>

              <li>

              </li>

            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="<?php echo base_url(); ?>dashboard/painel">
                          <i class="icon_house_alt"></i>
                          <span>Painel inicial</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_calendar"></i>
                          <span>Agenda</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="<?php echo base_url(); ?>calendar">Agendar horario</a></li>
              <li><a class="" href="<?php echo base_url();?>calendar/listaagenda">Agendamentos</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_tools"></i>
                          <span>Serviços/Pacotes</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="<?php echo base_url(); ?>servico">Serviços/Pacotes</a></li>
              <li><a class="" href="#">Produtos</a></li>
              <li><a class="" href="<?php echo base_url(); ?>categoria_prod_serv">Categorias</a></li>
            </ul>
          </li>
          <li>
            <a class="" href="<?php echo base_url() ?>cliente">
                          <i class="icon_profile"></i>
                          <span>Clientes</span>
                      </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-money"></i>
                          <span>Financeiro</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="<?php echo base_url(); ?>contasapagar">Contas a pagar</a></li>
              <li><a class="" href="<?php echo base_url(); ?>contasareceber">Contas a receber</a></li>
              <li><a class="" href="<?php echo base_url(); ?>fluxo/fluxo">Fluxo de caixa</a></li>
            </ul>
          </li>



          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Relatorios</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="#">Clientes</a></li>
              <li><a class="" href="<?php echo base_url() ?>relatorio/comissao">Comissões</a></li>
              <li><a class="" href="#">Serviços/Produtos</a></li>
              <li><a class="" href="#">Vendas</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-cogs"></i>
                          <span>Configurações</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="#">Dados da Empresa</a></li>
              <li><a class="" href="<?php echo base_url() ?>atendente"><span>Atendentes</span></a></li>
              <li><a class="" href="<?php echo base_url() ?>usuario">Usuarios do sistema</a></li>

            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
