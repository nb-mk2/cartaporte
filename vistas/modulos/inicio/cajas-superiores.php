<?php

$item = null;
$valor = null;
$orden = "id";





$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);



?>


<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">
    
    <div class="inner">
    
      <h3>
      <?php
      if($_SESSION["perfil"] =="Administrador" ){
         echo number_format($totalClientes);} ?>
      </h3>

      <p>Afiliados</p>
  
    </div>
    
    <div class="icon">
    
      <i class="ion ion-person-add"></i>
    
    </div>
    
    <a href="clientes" class="small-box-footer">

      Más Informacion <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

