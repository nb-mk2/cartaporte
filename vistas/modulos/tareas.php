

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tareas Asignadas Afiliaciones 
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">seguimiento</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body" id="div1">
        
       <table class="table table-bordered table-striped dt-responsive tablas" id="afiliado" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Apellido</th>
           <th>Documento ID</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th>Localidad</th>
           <th>Dirección</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
          $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

          foreach ($clientes as $key => $value) {
            
            if ($value["asigusuario"] == $_SESSION["id"] || $_SESSION["perfil"] == 'Administrador' ) {
              
              if ($value["localidad"] == $_SESSION["localidad"] ) {
            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["apellido"].'</td>

                    <td>'.$value["documento"].'</td>

                   <td>'.$value["email"].'</td>

                    <td>'.$value["telefono"].'</td>';

                    $itemLocalidad = "id";
                    $valorLocalidad = $value["localidad"];

                  $respuestalocalidad = ControladorClientes::ctrMostrarLocalidad($itemLocalidad, $valorLocalidad);

                    echo '<td>'.$respuestalocalidad["localidad"].'</td>

                    <td>'.$value["direccion"].'</td>
                    
                    ';
                   echo '  
                   <td> 

                     <select class="form-control claseSelects ';if ($value["asigestado"] == 1){echo'btn-success"';}if ($value["asigestado"] == 2){echo'btn-danger"';}if ($value["asigestado"] == 3){echo'btn-warning"';}
                       echo 'name="btnActivarCliente" id="btnActivarCliente" idCliente="'.$value["id"].'">
                          <option value="0"> PROCESO </option>
                          <option ';if ($value["asigestado"] == 1){echo' selected ';} echo ' value="1"> LISTO </option>
                          <option ';if ($value["asigestado"] == 2){echo' selected';} echo ' value="2"> PENDIENTE </option>
                          <option ';if ($value["asigestado"] == 3){echo' selected ';} echo ' value="3"> SIN RESPUESTA </option>
                          
                      </select> 

                  </td>

                    

                  </tr>';
                }
              }
            }

        ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

