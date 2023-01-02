

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Viajes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Viajes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
      <?php
       if(($_SESSION["perfil"] == "Administrador") || ($_SESSION["perfil"] == "Coordinador")|| ($_SESSION["perfil"] == "Afiliador")){
       echo' <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar CartaPorte

        </button>
        <button class="btn btn-primary" style="background-color:green !important;"data-toggle="modal" data-target="#modalGenerarXML">
          
          Generar Cartaporte

        </button>';
       }
        ?>
      </div>

      <div class="box-body">
        <div class="col-sm-11">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha Emision</th>
           <th>Cpe</th>
           <th>Cuit Titular</th>
           <th>Cuit Destinatario</th>
           <th>Transportista Cuit</th>
           <th>Proc Cod Localidad</td>
           <th>Destino Cod Localidad</td>
           <th>Cod Grano</td>
           <th>Peso Carga</td>
           <th>Km</td>
           <th>Tarifa Flete</td>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

          foreach ($clientes as $key => $value) {
            if ($_SESSION["perfil"] == 'Coordinador' || $_SESSION["perfil"] == 'Afiliador' || $_SESSION["perfil"] == 'Administrador' ) {
              
              //if ($value["localidad"] == $_SESSION["localidad"] || $_SESSION["perfil"] == 'Administrador') {

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["fechaemi"].'</td>

                    <td>'.$value["cpe"].'</td>

                    <td>'.$value["cuittitular"].'</td>

                    <td>'.$value["cuitdestinatario"].'</td>

                    <td>'.$value["cuittrasportista"].'</td>';

                    $itemLocalidad = "codLoc";
                    $valorLocalidad = $value["codproloc"];

                    $respuestaLocalidades = ControladorClientes::ctrMostrarLocalidades($itemLocalidad, $valorLocalidad, 1);
                  
                    echo '<td>'.$respuestaLocalidades["descripLoc"].'</td>';

                    $itemLocalidad = "codLoc";
                    $valorLocalidad = $value["coddesloc"];

                    $respuestaLocalidades = ControladorClientes::ctrMostrarLocalidades($itemLocalidad, $valorLocalidad, 1);
                  
                    echo '<td>'.$respuestaLocalidades["descripLoc"].'</td>';

                    $itemGranos = "id";
                    $valorGranos = $value["codgrano"];

                  $respuestaGranos = ControladorClientes::ctrMostrarGranos($itemGranos, $valorGranos);

                    echo '<td>'.$respuestaGranos["descrip"].'</td>

                    <td>'.$value["pesocarga"].'</td>

                    <td>'.$value["km"].'</td>

                    <td>'.$value["tarifaflete"].'</td>    
                    
                 
                    
                    <td>

                      <div class="btn-group">';
                      if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Coordinador" || $_SESSION["perfil"] == "Afiliador"){
                        echo '  <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';
                      }
                      if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Coordinador" || $_SESSION["perfil"] == "Afiliador"){

                          echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                      }

                      echo '</div>  

                    </td>

                  </tr>';
          
            
          }
        }

        ?>
   
        </tbody>

       </table>

       </div>
      </div>

    </div>

    

  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Nueva CartaPorte</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA FECHA EMISION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input  type="date" class="form-control input-lg" name="nuevoFechaEmi" placeholder="Ingresar Fecha Emision!" onkeyup="javascript:this.value=this.value.toUpperCase();" required >

              </div>

            </div>

            <!-- ENTRADA PARA EL CPE -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input  type="number" class="form-control input-lg" name="nuevoCpe" placeholder="Ingresar CPE!" onkeyup="javascript:this.value=this.value.toUpperCase();" required >

              </div>

            </div>

            <!-- ENTRADA PARA EL NUEVO CUIT TITULAR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCuitTitular" placeholder="Ingresar CUIT TITULAR" autocomplete="on" data-inputmask="'mask':'99'-'99999999'-'9'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA CUIT DESTINARIO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCuitDestinatario" placeholder="Ingresar CUIT DESTINARIO" data-inputmask="'mask':'99'-'99999999'-'9'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA CUIT TRANSPORTISTA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCuitTrasportista" placeholder="Ingresar CUIT TRANSPORTISTA" autocomplete="on" data-inputmask="'mask':'99'-'99999999'-'9'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA COD PROCEDENCIA LOCALIDAD -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
              
                <select class="form-control input-lg js-example-basic-single selectProProvincia" style="width: 50% !important;" name="nuevoProProvincia"   required>
                <option selected="true" disabled="disabled">SELECCIONE PROCEDENCIA</option>
                <?php 
                    $item = null;
                    $valor = null;
                    $provincias = ControladorClientes::ctrMostrarProvincias($item, $valor); 
                    //$localidades = ControladorClientes::ctrMostrarLocalidades($item, $valor); 
                    foreach ($provincias as $key => $value) {

                     echo ' <option value="'.$value["codProv"].'">'.$value["codProv"].' - '. $value["descripProv"].'</option> ';
                    }
                    ?> 
               

                </select>

                <select class="form-control input-lg js-example-basic-single selectProLocalidad"   style="width: 50% !important;" name="nuevoProLocalidad"  required>
                  <option selected="true" disabled="disabled">SELECCIONE PROCEDENCIA</option>
                </select>

              </div>

            </div>

            <!-- ENTRADA COD DESTINO LOCALIDAD -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <select class="form-control input-lg js-example-basic-single selectDesProvincia" style="width: 50% !important;" name="nuevoDesProvincia"   required>
                <option selected="true" disabled="disabled">SELECCIONE DESTINO</option>
                <?php 
                    $item = null;
                    $valor = null;
                    $provincias = ControladorClientes::ctrMostrarProvincias($item, $valor); 
                    //$localidades = ControladorClientes::ctrMostrarLocalidades($item, $valor); 
                    foreach ($provincias as $key => $value) {

                     echo ' <option value="'.$value["codProv"].'">'.$value["codProv"].' - '. $value["descripProv"].'</option> ';
                    }
                    ?> 
               

                </select>

                <select class="form-control input-lg js-example-basic-single selectDesLocalidad"   style="width: 50% !important;" name="nuevoDesLocalidad"  required>
                  <option selected="true" disabled="disabled">SELECCIONE DESTINO</option>
                </select>
              </div>

            </div>

            <!-- ENTRADA COD GRANO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <select class="form-control input-lg js-example-basic-single" style="width: 100% !important;" name="nuevoCodGrano"  required>
                <option selected="true" disabled="disabled">SELECCIONE GRANO</option>
                <?php 
                    $item = null;
                    $valor = null;

                    $granos = ControladorClientes::ctrMostrarGranos($item, $valor); 
                    foreach ($granos as $key => $value) {

                     echo ' <option value="'.$value["id"].'">'.$value["id"].'-'. $value["descrip"].'</option> ';
                    }
                    ?> 
               

                </select>

              </div>

            </div>

            <!-- ENTRADA PESO DE CARGA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoPesoCarga" placeholder="Ingresar Peso Carga kg" onkeyup="javascript:this.value=this.value.toUpperCase();" required>

              </div>

            </div>

             <!-- ENTRADA KM -->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoKm" placeholder="Ingresar Kilometros" onkeyup="javascript:this.value=this.value.toUpperCase();" required>

              </div>

            </div>


            <!-- ENTRADA TARIFA FLETE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="number" min="0.00"  step="0.01" class="form-control input-lg" name="nuevoFlete" placeholder="Ingresar Tarifa Flete"  required>
                <input type="hidden"   name="nuevoCodPlanta" value="<?php echo $_SESSION["localidad"]; ?>">

              </div>

            </div>

      
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar </button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>



<!--=====================================
MODAL GENERAR CARTAPORTE
======================================-->

<div id="modalGenerarXML" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Generar Cartaporte!</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA FECHA EMISION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input  type="date" class="form-control input-lg" name="nuevoFechaDesde" style="width: 50% !important;"   required >

                <input  type="date" class="form-control input-lg" name="nuevoFechaHasta" style="width: 50% !important;"  required >

                <input type="hidden"   name="nuevoCodPlanta"   value="<?php echo $_SESSION["localidad"]; ?>" >

             

              </div>

            </div>
      
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Generar</button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCartaPorte();
        
                    
      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar CartaPorte</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA FECHA EMISION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input  type="date" class="form-control input-lg" name="editarFechaEmi" id="editarFechaEmi" onkeyup="javascript:this.value=this.value.toUpperCase();" required >
                <input type="hidden" id="idCliente" name="idCliente">
                <input type="hidden"   name="editarCodPlanta" id="editarCodPlanta">
              
              </div>

            </div>

              <!-- ENTRADA PARA CPE -->
            
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input  type="number" class="form-control input-lg" name="editarCpe" id="editarCpe"  onkeyup="javascript:this.value=this.value.toUpperCase();" required >
              
              </div>

            </div>
        
            <!-- ENTRADA PARA EL DOCUMENTO TITULAR  -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCuitTitular" id="editarCuitTitular"   data-inputmask="'mask':'99'-'99999999'-'9'" data-mask required>

              </div>

            </div>

              <!-- ENTRADA PARA CUIT DESTINARIO -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCuitDestinatario" id="editarCuitDestinatario"  data-inputmask="'mask':'99'-'99999999'-'9'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA CUIT TRANSPORTISTA -->
              
            <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                  <input type="text" class="form-control input-lg" name="editarCuitTrasportista" id="editarCuitTrasportista"   data-inputmask="'mask':'99'-'99999999'-'9'" data-mask required>

                </div>

            </div>

             <!-- ENTRADA COD PROCEDENCIA LOCALIDAD -->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <select class="form-control input-lg js-example-basic-single selectProProvincia" style="width: 50% !important;" name="editarProProvincia" id="editarProProvincia"   required>
                <option selected="true" disabled="disabled">SELECCIONE PROCEDENCIA</option>
                <?php 
                    $item = null;
                    $valor = null;
                    $provincias = ControladorClientes::ctrMostrarProvincias($item, $valor); 
                    //$localidades = ControladorClientes::ctrMostrarLocalidades($item, $valor); 
                    foreach ($provincias as $key => $value) {

                     echo ' <option value="'.$value["codProv"].'">'.$value["codProv"].' - '. $value["descripProv"].'</option> ';
                    }
                    ?> 
               

                </select>

                <select class="form-control input-lg js-example-basic-single selectProLocalidad"   style="width: 50% !important;" name="editarProLocalidad" id="editarProLocalidad" nano="" required>
                  <option selected="true" disabled="disabled">SELECCIONE PROCEDENCIA</option>
                </select>
                    
              </div>

            </div>

             <!-- ENTRADA COD DESTINO LOCALIDAD -->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <select class="form-control input-lg js-example-basic-single selectDesProvincia" style="width: 50% !important;" name="editarDesProvincia" id="editarDesProvincia" nano="" required>
                <option selected="true" disabled="disabled">SELECCIONE DESTINO</option>
                <?php 
                    $item = null;
                    $valor = null;
                    $provincias = ControladorClientes::ctrMostrarProvincias($item, $valor); 
                    //$localidades = ControladorClientes::ctrMostrarLocalidades($item, $valor); 
                    foreach ($provincias as $key => $value) {

                     echo ' <option value="'.$value["codProv"].'">'.$value["codProv"].' - '. $value["descripProv"].'</option> ';
                    }
                    ?> 
               

                </select>
                

                <select class="form-control input-lg js-example-basic-single selectDesLocalidad"   style="width: 50% !important;" name="editarDesLocalidad" id="editarDesLocalidad"  required>
                  <option selected="true" disabled="disabled">SELECCIONE DESTINO</option>
                </select>
              </div>

            </div>
            
              <!-- ENTRADA COD GRANO -->

              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                  <select class="form-control input-lg " style="width: 100% !important;" name="editarCodGrano" id="editarCodGrano"  required>
                  <option selected="true" disabled="disabled">SELECCIONE GRANO</option>
                  <?php 
                      $item = null;
                      $valor = null;

                      $granos = ControladorClientes::ctrMostrarGranos($item, $valor); 
                      foreach ($granos as $key => $value) {

                      echo ' <option value="'.$value["id"].'">'.$value["id"].'-'. $value["descrip"].'</option> ';
                      }
                      ?> 
                

                  </select>

                </div>

              </div>

             <!-- ENTRADA PESO DE CARGA -->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="number" class="form-control input-lg" name="editarPesoCarga" id="editarPesoCarga"  onkeyup="javascript:this.value=this.value.toUpperCase();" required>

              </div>

            </div>

             <!-- ENTRADA KM -->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="number" class="form-control input-lg" name="editarKm" id="editarKm"  onkeyup="javascript:this.value=this.value.toUpperCase();" required>

              </div>

            </div>


            <!-- ENTRADA TARIFA FLETE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="number" class="form-control input-lg" name="editarFlete" id="editarFlete" placeholder onkeyup="javascript:this.value=this.value.toUpperCase();" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

    

    </div>

  </div>

</div>



<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>

