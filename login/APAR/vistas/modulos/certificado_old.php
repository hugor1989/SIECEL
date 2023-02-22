
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Generar Cotizacion</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Generar Cotizacion</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <i class="fas fa-edit"></i>
                  Datos Generales
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <form role="form" id="datos_certificado" onKeypress="if(event.keyCode == 13) event.returnValue = false;" action="" method="post">
                        <fieldset>
                          <div class="row">
                          <div class="col-md-6" id="DV_FechaHora">
                            <label> Fecha y Hora</label>
                              <?php 
                                date_default_timezone_set('America/Mexico_City');
                                $DateAndTime = date('d-m-Y', time());
                                $hora = date('h:i:s a', time());
                                
                                ///Se usa para co
                                $time = $hora; 
                                $chunks = explode(':', $time);
                                if (strpos( $time, '') === false && $chunks[0] !== '12') {
                                    $chunks[0] = $chunks[0] + 12;
                                } else if (strpos( $time, '') === false && $chunks[0] == '12') {
                                    $chunks[0] = '00';
                                }

                                //SUMAR 60 MINUTOS DESPUES DE LA HORA Y se usa para actualizar para el input de abajo
                                  $MINUTOS = strtotime('+60 minutes'); 
                                  $HORA2 = date('h:i:s a', $MINUTOS);
                                  $time2 = $HORA2; 
                                  $chunks2 = explode(':', $time2);
                                  if (strpos( $time2, 'AM') === false && $chunks2[0] !== '12') {
                                      $chunks2[0] = $chunks2[0] + 12;
                                  } else if (strpos( $time2, 'PM') === false && $chunks2[0] == '12') {
                                      $chunks2[0] = '00';
                                  }

                              ?>
                            <input type="text" class="form-control sm" id="DT_FechaHora" name="DT_FechaHora" value="<?php echo $DateAndTime." ".date("H:i", Strtotime($time)); ?>" disabled >
                            <input type="hidden" id="DT_Actual" name="DT_Actual" value="<?php echo $DateAndTime; ?>" >
                            <input type="hidden" id="hora_Actual" name="hora_Actual" value="<?php echo date("H:i", Strtotime($time)); ?>" >
                            <!--<label> Hora </label>-->
                          <!--<input type="text" class="form-control sm" id="hora_Actual" value="" disabled >-->
                          </div>
                          <div class="col-md-6">
                            <label> Folio </label>
                              <?php 
                                $logo = $_SESSION["foto"]; //logo que del asociado
                                $email = $_SESSION["email"]; //email asociado
                                $perfil = $_SESSION['perfil']; //perfil del asociado
                                $item="Id"; //coluna dentro de la tabla de asociado
                                $valor=$_SESSION['id']; //valor de la variable de sesion Id
                                if($perfil == 1 ||  $perfil == 2){

                                  echo ' <input type="hidden" class="form-control sm" name="TB_Folio" id="TB_Folio" disabled></input>';
                                  echo '<input type="hidden" name="TB_ObjComision" id="TB_ObjComision" disabled></input>
                                        <input type="hidden" name="TB_ObjCuotaBasica" id="TB_ObjCuotaBasica" disabled></input>
                                        <input type="hidden" name="TB_ObjCuotaRot" id="TB_ObjCuotaRot" disabled></input>
                                        <input type="hidden" name="TB_ObjCuotaTR" id="TB_ObjCuotaTR" disabled></input>
                                        <input type="hidden" name="TB_ObjCuotaContenedor" id="TB_ObjCuotaContenedor" disabled></input>
                                        <input type="hidden" name="TB_ObjPrimaminima" id="TB_ObjPrimaminima" disabled></input>
                                        <input type="hidden" name="TB_ObjDerechoCertificado" id="TB_ObjDerechoCertificado" disabled></input>
                                        <input type="hidden" name="TB_EmailAsociado" id="TB_EmailAsociado"  disabled></input>
                                        <input type="hidden" name="TB_ImagenAsociado" id="TB_ImagenAsociado"  disabled></input>';
                                }else{
                                  
                                  $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                                    foreach ($usuarios as $key => $value){

                                      echo ' <input type="text" class="form-control sm" name="TB_Folio" id="TB_Folio" value='.$value["Abreviatura"].' disabled></input>';
                                      echo ' <input type="hidden" class="form-control sm" name="TB_ObjComision" id="TB_ObjComision" value='.$value["Comision"].' disabled></input>';
                                      echo ' <input type="hidden" class="form-control sm" name="TB_ObjCuotaBasica" id="TB_ObjCuotaBasica" value='.$value["Cuota_VT"].' disabled></input>';
                                      echo ' <input type="hidden" class="form-control sm" name="TB_ObjCuotaRot" id="TB_ObjCuotaRot" value='.$value["Cuota_Rot"].' disabled></input>';
                                      echo ' <input type="hidden" class="form-control sm" name="TB_ObjCuotaTR" id="TB_ObjCuotaTR" value='.$value["Cuota_TR"].' disabled></input>';
                                      echo ' <input type="hidden" class="form-control sm" name="TB_ObjCuotaContenedor" id="TB_ObjCuotaContenedor" value='.$value["Cuota_Contenedor"].' disabled></input>';
                                      echo ' <input type="hidden" class="form-control sm" name="TB_ObjPrimaminima" id="TB_ObjPrimaminima" value='.$value["Prima_minima"].' disabled></input>';
                                      echo ' <input type="hidden" class="form-control sm" name="TB_ObjDerechoCertificado" id="TB_ObjDerechoCertificado" value='.$value["Derecho_Certificado"].' disabled></input>';
                                      echo ' <input type="hidden" name="TB_EmailAsociado" id="TB_EmailAsociado" value='.$value["Email"].' disabled></input>';
                                      echo ' <input type="hidden" name="TB_ImagenAsociado" id="TB_ImagenAsociado" value='.$value["Foto"].' disabled></input>';
                                    }
                                }
                              ?>
                          
                          </div>
                        </div>
                        
                        <label> Asociado </label>

                        <?php ?>
                        <input type="hidden" class="form-control" name="nuevoIdAsociado" id="nuevoIdAsociado" disabled>
                        <!-- ENTRADA PARA EL Asociado -->
                        <?php 
                            $perfil = $_SESSION['perfil'];
                            $nombre = $_SESSION['nombre'];
                            $valoridAsociado=$_SESSION['id'];
                            $item1=null; 
                            $valor1=null;
                            if($perfil == 1 || $perfil == 2){
                            
                              echo '<div class="input-group mb-3">
                                      <select class="form-control select2 input-lg" id="nuevoAsociado" name="nuevoAsociado" required>	
                                        <option value="">Selecionar Asociado</option>
                                          ';
                                          $asociado = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor1);

                                          foreach ($asociado as $key => $value){

                                              echo '<option value='.$value["Id"].'>'.$value["Nombre"].'</option>';
                                          }
                                      echo ' </select>
                                              <div class="input-group-append">
                                                <div class="input-group-text">
                                                  <span class="fas fa-user"></span>
                                                </div>
                                              </div>
                                          </div>';   
                            }else{

                              echo '<script>
                                    document.getElementById("nuevoIdAsociado").value = '.$valoridAsociado.'
                                    </script>';
                              echo '<input type="text" class="form-control" name="nuevoAsociado" id="nuevoAsociado" value="'.$nombre.'" disabled>';
                            }
                        ?>
                      <!-- ROW DEL CLIENTE-->
                      <div class="row">
                          <div class="col-md-12" >
                            <div class="form-group" id="cliente">
                              <label>Cliente</label>
                              <input type="hidden" name="rfc" id="rfc" disabled></input>
                              <input type="hidden" name="email" id="email" disabled></input>
                              <input type="hidden" name="direccion" id="direccion" disabled></input>

                              <input type="hidden" name="Cuota_CL_ROT" id="Cuota_CL_ROT" disabled></input>
                              <input type="hidden" name="Cuota_CL_TR" id="Cuota_CL_TR" disabled></input>
                              <input type="hidden" name="Cuota_CL_VT" id="Cuota_CL_VT" disabled></input>
                              <?php 
                              $perfil = $_SESSION['perfil'];

                                if($perfil == 1 || $perfil == 2){
                                  echo '<select class="form-control select2 input-lg"  id="nuevoCliente" name="nuevoCliente" style="width: 100%;">
                                          <option value="">Seleccionar Cliente</option>
                                        </select>';
                                }else{
                                  $itemCliente="Asociado"; 
                                  $valorCliente=$_SESSION['id'];

                                  echo ' <select class="form-control select2 input-lg" id="nuevoCliente" name="nuevoCliente" style="width: 100%;" required>	
                                          <option value="">Selecionar Cliente</option>
                                        ';
                                        $cliente = ControladorPersona::ctrMostrarAsociado($itemCliente, $valorCliente);

                                        foreach ($cliente as $key => $value){
                                          echo '<option value="'.$value["Id"].'" data-city="'.$value["MercanciaAutorizada"].'" >'.$value["Nombre"].'</option>';
                                        }
                              echo '    </select>';}
                              ?>
                            </div>
                          </div>
                      </div>
                        
                        <!-- Fin de Seleccionar Mercancia -->
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                            <label>Mercancia</label>
                              <select class="form-control select2 input-lg" id="nuevoMercancia"  name="nuevoMercancia" style="width: 100%;" required>	
                                <option value="na">Selecionar Mercancia</option>
                                    <?php
                                        $itemMercancia = null;
                                        $valorMercancia = null; 
                                        $mercancia = ControladorMercancia::ctrMostrarMercancia($itemMercancia, $valorMercancia);

                                        foreach ($mercancia as $key => $value){
                                            ?>
                                            <option value="<?php echo $value["Id"] ?>" data-city="<?php echo $value["Giro"] ?>" ><?php echo $value["Descripcion"] ?></option>
                                            <?php
                                        }	
                                        ?>			
                              </select>
                              <input type="hidden" name="TB_Peligrosidad" id="TB_Peligrosidad"/>
                              <input type="hidden" name="TB_ValorAseguradora" id="TB_ValorAseguradora"/>
                              <input type="hidden" name="TB_ValorApar" id="TB_ValorApar"/>
                              <input type="hidden" name="TB_ROT" id="TB_ROT"/>
                              <input type="hidden" name="TB_Robo" id="TB_Robo"/>
                              <input type="hidden" name="TB_Otros" id="TB_Otros"/>
                              <input type="hidden" name="TB_VT" id="TB_VT"/>
                              <input type="hidden" name="TB_EspecialesA" id="TB_EspecialesA"/>
                              <input type="hidden" name="TB_EspecialesB" id="TB_EspecialesB"/>
                              <input type="hidden" name="TB_ValorA" id="TB_ValorA"/>
                              <input type="hidden" name="TB_ValorB" id="TB_ValorB"/>
                              <input type="hidden" name="TB_ValorC" id="TB_ValorC"/>
                              <input type="hidden" name="TB_ValorD" id="TB_ValorD"/>
                              <input type="hidden" name="TB_ValorE" id="TB_ValorE"/>
                              <input type="hidden" name="TB_ValorF" id="TB_ValorF"/>
                              <input type="hidden" name="TB_DescripcionProtocolo" id="TB_DescripcionProtocolo"/>
                            </div>  
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label>Giro</label>
                                <input type="text" class="form-control" name="TB_Giro" id="TB_Giro" disabled>
                              </div>
                          </div>
                        </div>
                        <!-- Registro datos Embarque -->
                        <h3>Datos de Embarque</h3>

                      <div class="row" >
                        <div class="col-md-6">   
                        <label onkeyup="mayus(this);"  id="LB_CoberMercancias" name="LB_CoberMercancias">PAIS ORIGEN DE LA COBERTURA</label> 
                        </div>
                        <div class="col-md-6">   
                        <label onkeyup="mayus(this);"  id="LB_CoberMercancias" name="LB_CoberMercancias">PAIS DESTINO FINAL DE LA COBERTURA</label> 
                        </div>
                    </div>
                    <!-- fINAL DEL ROW -->
                    <div id="Di_DatosEmbarque" class="row" >
                        <div class="col-md-6">   
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Pais Origen Embarque</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <select class="form-control select2"  id="TB_PaisOrigen" name="TB_PaisOrigen" style="width: 100%;">
                                    <option value="">Seleccione Pais</option>
                                    
                                    <?php
                                    $item = null;
                                    $valor = null;
                                        $pais = ControladorPais::ctrMostrarPais($item, $valor);

                                        foreach ($pais as $key => $value){

                                        ?>
                                        <option value="<?php echo $value["Id"] ?>" data-city="<?php echo $value["Estatus"] ?>" ><?php echo $value["Descripcion"] ?></option>

                                        <?php
                                        }
                                        ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Origen Cobertura</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                              <select class="form-control select2"  id="TB_OrigenCobertura" name="TB_OrigenCobertura" style="width: 100%;">
                                    <option value="">Seleccione Pais Origen Cobertura</option>
                                    
                                    <?php
                                    $item = null;
                                    $valor = null;
                                        $pais = ControladorPais::ctrMostrarPais($item, $valor);

                                        foreach ($pais as $key => $value){

                                        ?>
                                        <option value="<?php echo $value["Id"] ?>" data-city="<?php echo $value["Estatus"] ?>"><?php echo $value["Descripcion"] ?></option>

                                        <?php
                                        }
                                        ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Estado</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control" onkeyup="mayus(this);"  placeholder="Estado" id="TB_EstadoOrigenCobertura" name="TB_EstadoOrigenCobertura">
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Poblacion, Municipio o Delegacion</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control" onkeyup="mayus(this);" 
                                       placeholder="Poblacion, Municipio o Delegacion" id="TB_MunicipioOrigenCobertura" 
                                       name="TB_MunicipioOrigenCobertura">
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                        </div>
                        <div class="col-md-6">   
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Pais Destino Embarque</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                              <select class="form-control select2"  id="TB_PaisDestinoCobertura" name="TB_PaisDestinoCobertura" style="width: 100%;">
                                    <option value="">Seleccione Pais Destino Embarque</option>
                                    
                                    <?php
                                    $item = null;
                                    $valor = null;
                                        $pais = ControladorPais::ctrMostrarPais($item, $valor);

                                        foreach ($pais as $key => $value){

                                        ?>
                                        <option value="<?php echo $value["Id"] ?>" data-city="<?php echo $value["Estatus"] ?>"><?php echo $value["Descripcion"] ?></option>

                                        <?php
                                        }
                                        ?>
                                </select>        
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Estado</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control" onkeyup="mayus(this);"  id="TB_EstadoDestinoCobertura" name="TB_EstadoDestinoCobertura" placeholder="Estado">
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Poblacion, Municipio o Delegacion</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control" onkeyup="mayus(this);"  id="TB_MunicipioDestinoCobertura" name="TB_MunicipioDestinoCobertura" placeholder="Poblacion, Municipio o Delegacion">
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                        </div>
                    </div>
                    
                         <!-- Row de dESCRIPCIO NMERCANCIA -->
                    <div class="row">
                        <div class="col-md-12">   
                          <label>Descripcion Mercancia</label> 
                        </div>
                        <div class="col-md-12">   
                        <div class="form-group">
                          <textarea class="form-control" rows="3" onkeyup="mayus(this);"  
                                    id="TB_DescripcionMercancia" name="TB_DescripcionMercancia" placeholder="Describe Mercancia"></textarea>
                        </div>
                        </div>
                    </div>
                    <!-- fINAL DEL ROW -->
                    <div class="row" >
                        <div class="col-md-6">   
                        <label id="LB_CoberMercancias" name="LB_CoberMercancias">Deducibles Mercancia</label> 
                        </div>
                        <div class="col-md-6">   
                        <label id="LB_CoberMercancias" name="LB_CoberMercancias">Deducibles Contenedor</label> 
                        </div>
                    </div>
                    <!-- Termina row-->
                    <div class="row" id="Id_DescripcionMercancia">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                        <textarea class="form-control" rows="3" name="TB_Deducible" id="TB_Deducible" placeholder="Deducible" disabled></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <textarea class="form-control" rows="3" name="TB_CuotaContenedor" id="TB_CuotaContenedor" placeholder="Deducible Contenedor" disabled></textarea>
                        </div>
                      </div>
                   </div>
                  <!-- termina row -->
                  <!-- fINAL DEL ROW -->
                  <div class="row" >
                        <div class="col-md-6">   
                        <label >Cobertura Mercancia</label> 
                        </div>
                        <div class="col-md-6">   
                        <label>Cobertura Contenedor</label> 
                        </div>
                    </div>
                    <!-- fINAL DEL ROW -->
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <textarea class="form-control" rows="3" id="TB_CoberturaMercancia" name="TB_CoberturaMercancia" placeholder="Cobertura Mercancia" disabled></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <textarea class="form-control" rows="3" name="TB_CoberturaContenedor" id="TB_CoberturaContenedor" placeholder="Cobertura Deducible" disabled></textarea>
                        </div>
                      </div>
                   </div>
                  <!-- termina row -->
                  <!-- Seleccion de tipo de remolque full o no full -->
                  <div class="row">
                    <div class="col-md-12" >
                      <label> Se trata de Doble Remolque (Carga Full)? </label>
                          <div class="input-group mb-3">
                            <select class="form-control input-lg" name="nuevoRemolque" id="nuevoRemolque">
                                <option value="">Selecionar Opcion</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                  <span class="fa fa-users"></span>
                                  </div>
                              </div>
                          </div>
                          <label id="txt-remolque" name="txt-remolque"></label>
                    </div>
                  </div>
                  <!-- termina row-->
                  <!-- Se registra valor de mercancia -->
                  <div class="row">
                    <div class="col-md-4">
                      
                      <label id="txt-contenedor1" name="txt-contenedor1">Valor de Mercancia 1.</label>
                      <input type="text" class="form-control sm" id="valormercancia1" name="valormercancia1" > </input>
                      
                    </div>
                    <div class="col-md-4">
                      <!--<label> Contendedor 2 </label>-->
                      <label id="txt-contenedor2" name="txt-contenedor2">Valor de Mercancia 2.</label>
                      <input type="text" class="form-control sm" id="valormercancia2" name="valormercancia2" ></input>
                    </div>
                    <div class="col-md-4">
                        <label> Valor Total del Embarque </label>
                        <input class="form-control" type="text" name="TB_ValorEmbarque" id="TB_ValorEmbarque" />
                    </div>
                  </div>
                        <!-- Termina  row -->
                        <!-- Termina Row de Mercancia -->
                        <!--<div class="row">-->
                            <!--<div class="col-md-6">
                                <label> Valor Total del Embarque </label>
                                <input class="form-control" type="text" name="TB_ValorEmbarque" id="TB_ValorEmbarque" onblur="F_ValidarValorEmbarque();" readonly/>
                            </div>-->
                            <div class="row">
                              <div class="col-md-4">
                                <label> Medio de Transporte </label>
                                  <div class="input-group mb-3">
                                    <select class="form-control input-lg" name="MTPT" id="MTPT">
                                        <option value="">Selecionar Opcion</option>
                                        <option value="TE">TERRESTRE</option>
                                        <option value="MMT">MARITIMO</option>
                                        <option value="AEREO">AEREO</option>
                                        <option value="COMAM">COMBINACION AEREO - MARITIMO</option>
                                        <option value="COMAMT">COMBINACION AEREO - MARITIMO - TERRESTRE</option>
                                        <option value="COMAT">COMBINACION AEREO - TERRESTRE</option>
                                        <option value="COMMT">COMBINACION MARITIMO - TERRESTRE</option>
                                    </select>   
                                  </div>
                              </div>
                              <div class="col-md-4">
                                <label> Transporte con antigüedad </label>
                                <label> mayor a 30 años? </label>
                                  <div class="input-group mb-3">
                                    <select class="form-control input-lg" name="EMAYOR" id="EMAYOR" >
                                        <option value="">Selecionar Opcion</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>   
                                  </div>
                              </div>
                              <div class="col-md-4">
                                <label> Valor para Seguro </label>
                                  <div class="input-group mb-3">
                                    <select class="form-control input-lg" name="Cmbx_VAPSG" id="Cmbx_VAPSG" >
                                        <option value="">Selecionar Opcion</option>
                                        <option value="EMCP">Embarques de compras</option>
                                        <option value="EMVT">Embarques de ventas</option>
                                        <option value="EMMQ">Embarques de maquila</option>
                                        <option value="EMBEFL">Embarques entre filiales</option>
                                        <option value="BUOR">Bienes usados o reconstruidos</option>
                                        <option value="PANMEP">Para animales en pie</option>
                                        <option value="CNTD">Contenedores</option>
                                    </select>   
                                  </div>
                              </div>
                            </div>
                        <!--</div>-->
                        <div class="row">
                          <textarea class="form-control" rows="3" onkeyup="mayus(this);"  id="TB_DescripcionGPS" name="TB_DescripcionGPS" placeholder="Protocolos" ></textarea>
                        </div>
                    
                        <!-- Se ampara conenedor -->
                        <div class="row">
                          <div class="col-md-12" >
                          <label> Se ampara Contenedor? </label>
                            <div class="input-group mb-3">
                                <select class="form-control input-lg" name="nuevoContenedor" id="nuevoContenedor" >
                                    <option value="">Selecionar Opcion</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>

                                </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fa fa-users"></span>
                                        </div>
                                    </div>
                                </div> 
                          </div>
                        </div>  
                        <!-- Termina  row -->
                          <!-- Y/O Y RFC -->  
                        <!-- Termina  row -->
                        <div class="row">
                          <div class="col-md-6">
                            
                            <label id="txt-contenedor1" name="txt-contenedor1">IDENTIFICADOR DEL CONTENEDOR 1.</label>
                            <input type="text" class="form-control sm" id="contenedor1" name="contenedor1" > </input>
                            
                          </div>
                          <div class="col-md-6">
                            <!--<label> Contendedor 2 </label>-->
                            <label id="txt-contenedor2" name="txt-contenedor2">IDENTIFICADOR DEL CONTENEDOR 2.</label>
                            <input type="text" class="form-control sm" id="contenedor2" name="contenedor2"  ></input>
                            
                          </div>
                        </div>
                        <!-- Termina  row -->
                        <div class="row">
                            <div class="col-md-6">
                                <label id="element1" name="element1">Tipo de Contenedor 1.</label>
                                <div class="input-group mb-3">
                                  <select class="form-control input-lg" name="nuevoTipoContenedor1" id="nuevoTipoContenedor1">
                                      <option value="No">Selecionar Opcion</option>
                                      <option value="DRY20DC">DRY CARGO/GENERAL PURPOSE 20DC</option>
                                      <option value="DRY40DC">DRY CARGO/GENERAL PURPOSE 40DC</option>
                                      <option value="HIGHDRY20">HIGH CUBE DRY CARGO 20DX</option>
                                      <option value="HIGHDRY40">HIGH CUBE DRY CARGO 40DX</option>
                                      <option value="REEFEREQ20">REEFER HIGH CUBE C/ EQUIPO 20RX</option>
                                      <option value="REEFEREQ40">REEFER HIGH CUBE C/ EQUIPO 40RX</option>
                                      <option value="REEFER20FT">REEFER SIN EQUIPO 20 ft</option>
                                      <option value="REEFERSQ40FT">REEFER SIN EQUIPO 40 ft</option>
                                      <option value="REEFERSQ40FTHC">RREEFER SIN EQUIPO 40 ft HC</option>
                                      <option value="REFRIGERATED20">REFRIGERATED 20RF</option>
                                      <option value="REFRIGERATED40">REFRIGERATED 40RF</option>
                                  </select>
                                </div>
                            </div>
                            <div  class="col-md-6">
                                    <label name="element2" id="element2">Tipo de Contenedor 2.</label>
                                <div class="input-group mb-3">
                                  <select class="form-control input-lg" name="nuevoTipoContenedor2" id="nuevoTipoContenedor2">
                                      <option value="No">Selecionar Opcion</option>
                                      <option value="DRY20DC">DRY CARGO/GENERAL PURPOSE 20DC</option>
                                      <option value="DRY40DC">DRY CARGO/GENERAL PURPOSE 40DC</option>
                                      <option value="HIGHDRY20">HIGH CUBE DRY CARGO 20DX</option>
                                      <option value="HIGHDRY40">HIGH CUBE DRY CARGO 40DX</option>
                                      <option value="REEFEREQ20">REEFER HIGH CUBE C/ EQUIPO 20RX</option>
                                      <option value="REEFEREQ40">REEFER HIGH CUBE C/ EQUIPO 40RX</option>
                                      <option value="REEFER20FT">REEFER SIN EQUIPO 20 ft</option>
                                      <option value="REEFERSQ40FT">REEFER SIN EQUIPO 40 ft</option>
                                      <option value="REEFERSQ40FTHC">RREEFER SIN EQUIPO 40 ft HC</option>
                                      <option value="REFRIGERATED20">REFRIGERATED 20RF</option>
                                      <option value="REFRIGERATED40">REFRIGERATED 40RF</option>
                                  </select>
                                </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                <label id="TB_Responsabilidad1" name="TB_Responsabilidad1">Valor M. compañia del contenedor 1</label>
                                <input type="text" class="form-control sm" id="TB_Valor1" name= "TB_Valor1" > </input>
                              </div>
                              <div class="col-md-6">
                                <label  >S. A. Solicitada del contendedor 1</label>
                                <input type="text" class="form-control sm" id="TB_SumaSolicitada1" name= "TB_SumaSolicitada1" > </input>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                <label id="TB_Responsabilidad2" name="TB_Responsabilidad2">Valor M. compañia del contenedor 2</label>
                                <input type="text" class="form-control sm" id="TB_Valor2" name= "TB_Valor2"  ></input>
                              </div>
                              <div class="col-md-6">
                                <label  >S. A. Solicitada del contenedor 2</label>
                                <input type="text" class="form-control sm" id="TB_SumaSolicitada2" name= "TB_SumaSolicitada2" > </input>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                  <label> Tipo de Bien? </label>
                                <div class="input-group mb-3">
                                  <select class="form-control input-lg" name="nuevoBienesDesperdicios" id="nuevoBienesDesperdicios">
                                      <option value="">Selecionar Opcion</option>
                                      <option value="Usados">Bienes Usuados o Reconstruidos</option>
                                      <option value="Nuevos">Nuevos</option>
                                  </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                          <span class="fa fa-users"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label> ¿EL Trayecto es continuación de viaje? </label>
                                <div class="input-group mb-3">
                                  <select class="form-control input-lg" name="nuevoCVJ" id="nuevoCVJ">
                                      <option value="">Selecionar Opcion</option>
                                      <option value="Si">Si</option>
                                      <option value="SiCertificado">Si (Cuenta con Certificado)</option>
                                      <option value="No">No</option>
                                  </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                          <span class="fa fa-users"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div div class="col-md-5">
                            <label> Cobertura de Mercacias </label>
                                <div class="input-group mb-3">
                                  <select class="form-control input-lg" name="nuevoCBM" id="nuevoCBM">
                                    <option value="">Selecionar Opcion</option>
                                    <option value="TODO RIESGO">TODO RIESGO</option>
                                    <option value="ROT Y ROBO">ROT Y ROBO</option>
                                    <option value="TODO RIESGO Y VT">TODO RIESGO Y VT</option>
                                  </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fa fa-users"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                                <!--<div class="col-auto p-5 text center" >
                                  <h4 class="text-center"><strong>CUOTAS</strong></h4>
                                </div>-->
                            <table cellspacing="2" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                    <th style="width: 80%; text-align: right;">CUOTA MERCANCIA  :  </th>
                                    <th style="width: 20%; text-align: right;"><input type="text" class="form-control sm" 
                                                                                      style="text-align:right" id="TB_CMCIA" 
                                                                                      name="TB_CMCIA"  ></input></th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA MERCANCIA  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" 
                                          style="text-align:right" id="TB_PNTA" name= "TB_PNTA" 
                                             ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA CONTENEDOR  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="TB_PMCTND" name= "TB_PMCTND" 
                                           ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA TOTAL  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="TB_PMAGT" name= "TB_PMAGT" 
                                             ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">DERECHO CERTIFICADO  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm"
                                          style="text-align:right" id="TB_DCRT" name= "TB_DCRT" 
                                           ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">IVA  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="TB_IVA" name= "TB_IVA"
                                         ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA TOTAL APAR  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" 
                                            style="text-align:right" id="TB_IVATOTAL" name= "TB_IVATOTAL" 
                                             ></input>
                                      </th>
                                </tr>
                            </table>
                            
                          </div>

                          <!-- Cuotas que se cobral al clioente  -->
                          <div class="col-md-6">
                                <!--<div class="col-auto p-5 text center" >
                                  <h4 class="text-center"><strong>PRIMA NETA A COBRAR A CLIENTE</strong></h4>
                                </div>-->
                                <!-- EMPIEZA TABLAS-->
                                <table cellspacing="2" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                    <th style="width: 80%; text-align: right;">CUOTA MERCANCIA  :  </th>
                                    <th style="width: 20%; text-align: right;"><input type="text" class="form-control sm" 
                                                                                      style="text-align:right" id="PNETA" 
                                                                                      name="PNETA" ></input></th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA MERCANCIA  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" 
                                          style="text-align:right" id="TB_PNTAT" name= "TB_PNTAT" 
                                             ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA CONTENEDOR  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="TB_PMCTNDT" name= "TB_PMCTNDT" 
                                           ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA TOTAL  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="TB_PMAGTT" name= "TB_PMAGTT" 
                                             ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">DERECHO CERTIFICADO  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm"
                                          style="text-align:right" id="TB_DCRTT" name= "TB_DCRTT" 
                                           ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">IVA  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="IVA" name= "IVA"
                                           ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA TOTAL  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" 
                                            style="text-align:right" id="TOTAL" name= "TOTAL" 
                                             ></input>
                                      </th>
                                </tr>
                            </table>
                          </div>
                        </div>
                        <!--<input type="button" name="previous" class="previous-form btn btn-default" value="Atras" />-->
                        <input type="button" id="next" name="next" class="next-formcertificado btn btn-info" value="Siguiente" />
                      </fieldset>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <label> Hora de Inicio de Cobertura (Formato 24 Hrs.)</label>
                              <!--<input type="text" id="time" placeholder="Time" class="form-control sm">-->
                              <input type="text" class="form-control clockpicker" id="time"
                                     value="<?php echo preg_replace('/\s[A-Z]+/s', '', implode(':', $chunks2)); ?>"
                                        data-placement="right" data-align="top" data-autoclose="true" onblur="blurFunction()">
                          </div>
                          <div class="col-md-6">
                            <label> COBERTURA A PARTIR DEL (DD-MM-AA):</label>
                            <?php 
                                $month = date('m');
                                $day = date('d');
                                $year = date('Y');

                                $today = $year . '-' . $month . '-' . $day;
                            
                              ?>
                              <input type="date" value="<?php echo $today; ?>"
                                    class="form-control" id="dt" name="dt" onblur="blurFunction()">
                          </div>
                      </div>
                      
                      <!-- termina row -->
                      <div class="row">
                          <div class="col-md-6">
                            <label> Numero de Guia Embarque</label>
                              <!--<input type="text" id="time" placeholder="Time" class="form-control sm">-->
                              <input type="text" class="form-control" onkeyup="mayus(this);" id="TB_NumeroGuia" name="TB_NumeroGuia" placeholder="Numero de Guia">
                          </div>
                          <div class="col-md-6">
                            <label> EMBARQUE:</label>
                            <select class="form-control input-lg" name="nuevoTipoEmbarque" id="nuevoTipoEmbarque">
                                      <option value="No">Selecionar Opcion</option>
                                      <option value="Nacional">Nacional</option>
                                      <option value="Internacional">Internacional</option>
                                  </select>
                          </div>
                      </div>
                      <!-- termina row -->
                      
                  <div class="row" >
                        <div class="col-md-6">   
                          <label id="LB_CoberMercancias" name="LB_CoberMercancias">Tipo de Empaque</label>
                              <div class="input-group mb-3">
                                  <select class="form-control input-lg" name="nuevoTipoEmpaque" id="nuevoTipoEmpaque">
                                      <option value="">Selecionar Opcion</option>
                                      <option value="01 EL ADECUADO SEGÚN LA NATURALEZA PROPIA DE LA MERCANCÍA">01 EL ADECUADO SEGÚN LA NATURALEZA PROPIA DE LA MERCANCÍA</option>
                                      <option value="A GRANEL">A GRANEL</option>
                                      <option value="BOTELLAS DE CARTÓN">BOTELLAS DE CARTÓN</option>
                                      <option value="BOTELLAS DE PLÁSTICO">BOTELLAS DE PLÁSTICO</option>
                                      <option value="BOTELLAS DE VIDRIO">BOTELLAS DE VIDRIO</option>
                                      <option value="BOTES METÁLICOS">BOTES METÁLICOS</option>
                                      <option value="CAJAS DE CARTÓN">CAJAS DE CARTÓN</option>
                                      <option value="CAJAS DE MADERA">CAJAS DE MADERA</option>
                                      <option value="CAJAS DE PLÁSTICO">CAJAS DE PLÁSTICO</option>
                                      <option value="CARRO TANQUE, PIPA O CISTERNA">CARRO TANQUE, PIPA O CISTERNA</option>
                                      <option value="CUÑETES DE CARTÓN">CUÑETES DE CARTÓN</option>
                                      <option value="EMBOBINADO">EMBOBINADO</option>
                                      <option value="EN BLOQUES">EN BLOQUES</option>
                                      <option value="EN PLANCHAS">EN PLANCHAS</option>
                                      <option value="ENVASES DE CARTÓN">ENVASES DE CARTÓN</option>
                                      <option value="ENVASES DE PAPEL">ENVASES DE PAPEL</option>
                                      <option value="ENVASES DE PLÁSTICO RÍGIDO">ENVASES DE PLÁSTICO RÍGIDO</option>
                                      <option value="ENVASES DE POLIETILENO">ENVASES DE POLIETILENO</option>
                                      <option value="ENVASES METÁLICOS">ENVASES METÁLICOS</option>
                                      <option value="LAMINADOS">LAMINADOS</option>
                                      <option value="LATAS">LATAS</option>
                                      <option value="PACAS">PACAS</option>
                                      <option value="PALLETS">PALLETS</option>
                                      <option value="SACOS">SACOS</option>
                                      <option value="SACOS DE PAPEL">SACOS DE PAPEL</option>
                                      <option value="SACOS DE PLÁSTICO">SACOS DE PLÁSTICO</option>
                                      <option value="TAMBORES METÁLICOS">TAMBORES METÁLICOS</option>
                                      <option value="TROZOS">TROZOS</option>
                                  </select>
                              </div>
                        </div>
                        <div class="col-md-6">   
                        <label>EL TRASLADO SE EFECTUA RECORRIENDO:</label> 
                              <select class="form-control input-lg" name="nuevoTLER" id="nuevoTLER">
                                  <option value="">Selecionar Opcion</option>
                                  <option value="POR AUTOPISTA DE CUOTA">POR AUTOPISTA DE CUOTA</option>
                                  <option value="POR AUTOPISTA DONDE EXISTA">POR AUTOPISTA DONDE EXISTA</option>
                                  <option value="POR CARRETERA LIBRE">POR CARRETERA LIBRE</option>
                                  <option value="SOLO EN ÁREA METROPOLITANA DE GUADALAJARA">SOLO EN ÁREA METROPOLITANA DE GUADALAJARA</option>
                                  <option value="SOLO EN ÁREA METROPOLITANA DE MONTERREY">SOLO EN ÁREA METROPOLITANA DE MONTERREY</option>
                                  <option value="SOLO EN ÁREA METROPOLITANA DE LA CD. DE MEXICO">SOLO EN ÁREA METROPOLITANA DE LA CD. DE MEXICO</option>
                                  <option value="OTRA">OTRA</option>
                              </select>
                        </div>
                    </div>
                    <!-- Termina row-->
                    
                    <!-- Fin de row de descripcion de  gps -->
                    <div class="row">
                        <textarea class="form-control" rows="3" id="TB_DescripcionCondicionesTER" name="TB_DescripcionCondicionesTER" placeholder="Describir">Es condición indispensable para la presente cobertura que se deberá cumplir con las siguientes medidas de prevención y está de acuerdo en que queda sin protección por parte de la Aseguradora en el momento en que el asegurado o a quien quiera que éste contrate falte a cualquiera de ellas: • Los únicos lugares permitidos para hacer una parada son los predios de las gasolineras y los lugares específicamente designados por la Secretaría de Comunicaciones y Transportes para aparcar en las carreteras.
                        </textarea>
                    </div>
                    
                    <div class="row">
                    <textarea class="form-control" rows="3" onkeyup="mayus(this);"  id="TB_ObservacionGnral" name="TB_ObservacionGnral" placeholder="Observaciones"></textarea>
                    </div>
                    
                    <h3>Datos Transportista</h3>
                    
                      <div class="row">
                        <div class="col-md-4">
                              <label> Nombre linea transportista </label>
                              <input type="text" class="form-control" onkeyup="mayus(this);"  id="TB_NLITPTA" name="TB_NLITPTA" placeholder="Nombre Linea Transportista" >
                        </div>
                        <div class="col-md-4">
                            <label> Tipo de linea transportista </label>
                            <select class="form-control input-lg" name="nuevoNbLNTRP" id="nuevoNbLNTRP">
                                  <option value="">Selecionar Opcion</option>
                                  <option value="CAMION DE SERVICIO PUBLICO FEDERAL">CAMION DE SERVICIO PÚBLICO FEDERAL</option>
                                  <option value="LINEA AEREA COMERCIAL">LÍNEA AÉREA COMERCIAL</option>
                                  <option value="LINEA NAVAL COMERCIAL">LÍNEA NAVAL COMERCIAL</option>
                                  <option value="LINEA AEREA PRIVADA">LÍNEA AÉREA PRIVADA</option>
                                  <option value="LINEA NAVAL PRIVADA">LÍNEA NAVAL PRIVADA</option>
                                  <option value="LINEA DE TRANSPORTES COMERCIAL">LÍNEA DE TRANSPORTES COMERCIAL</option>
                                  <option value="LINEA DE TRANSPORTES PRIVADA">LÍNEA DE TRANSPORTES PRIVADA</option>
                                  <option value="VEHICULOS PROPIOS">VEHÍCULOS PROPIOS</option>
                                  <option value="OTRO">OTRO</option>
                              </select>
                        </div>
                        <div div class="col-md-4">
                            <label> Nombre del Chofer </label>
                            <input type="text" class="form-control" onkeyup="mayus(this);"  id="TB_NombreChofer" name="TB_NombreChofer" placeholder="nombre de chofer" >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                              <label> Tipo de Vehiculo </label>
                              <select class="form-control input-lg" name="nuevoTipoVehiculo" id="nuevoTipoVehiculo">
                                  <option value="">Selecionar Opcion</option>
                                  <option value="CAJA CARGA SECA">CAJA CARGA SECA</option>
                                  <option value="CAJA REFRIGERADA">CAJA REFRIGERADA</option>
                                  <option value="CAJA CISTERNA O TANQUE">CAJA CISTERNA O TANQUE</option>
                                  <option value="CAJA ABIERTA PARA GRANEL">CAJA ABIERTA PARA GRANEL</option>
                                  <option value="CAJA CON ESTACAS">CAJA CON ESTACAS</option>
                                  <option value="CAJA GONDOLA PARA TRANSPORTE DE VEHICULOS">CAJA GÓNDOLA PARA TRANSPORTE DE VEHÍCULOS</option>
                                  <option value="PLATAFORMA PARA CARGA SOBRE DIMENSIONADA">PLATAFORMA PARA MÁQUINA PESADA</option>
                                  <option value="VEHICULOS PROPIOS">VEHÍCULOS PROPIOS</option>
                                  <option value="BUQUE DE CONTENEDORES">BUQUE DE CONTENEDORES</option>
                                  <option value="BUQUE DE CARGA REFRIGERADA">BUQUE DE CARGA REFRIGERADA</option>
                                  <option value="BUQUE DE CARGA GENERAL">BUQUE DE CARGA GENERAL</option>
                                  <option value="BUQUE DE CARGA A GRANEL">BUQUE DE CARGA A GRANEL</option>
                                  <option value="BUQUE CISTERNA O TANQUE">BUQUE CISTERNA O TANQUE</option>
                                  <option value="BUQUE DE CARGA RODANTE">BUQUE DE CARGA RODANTE</option>
                                  <option value="BUQUE DE CARGA DE VEHICULOS">BUQUE DE CARGA DE VEHÍCULOS</option>
                                  <option value="FERROCARRIL FURGON">FERROCARRIL FURGÓN</option>
                                  <option value="FERROCARRIL GONDOLA">FERROCARRIL GÓNDOLA</option>
                                  <option value="FERROCARRIL TOLVA GRANELERA (AGRICOLA)">FERROCARRIL TOLVA GRANELERA (AGRÍCOLA)</option>
                                  <option value="FERROCARRIL TOLVA CEMENTERA">FERROCARRIL TOLVA CEMENTERA</option>
                                  <option value="FERROCARRIL CARRO TANQUE">FERROCARRIL CARRO TANQUE</option>
                                  <option value="FERROCARRIL PALLET DOS NIVELES PARA AUTOS">FERROCARRIL PALLET DOS NIVELES PARA AUTOS</option>
                                  <option value="FERROCARRIL PLATAFORMA INTERMODAL">FERROCARRIL PLATAFORMA INTERMODAL</option>
                                  <option value="FERROCARRIL TRINIVEL AUTOMOTRIZ (AUTORACK)">FERROCARRIL TRINIVEL AUTOMOTRIZ (AUTORACK)</option>
                                  <option value="OTRO">OTRO</option>
                              </select>
                        </div>
                        <div class="col-md-4">
                            <label> Marca </label>
                            <input type="text" class="form-control" onkeyup="mayus(this);"  id="TB_Marca" name="TB_Marca" placeholder="marca" >
                        </div>
                        <div div class="col-md-4">
                            <label> Modelo </label>
                            <input type="text" class="form-control" onkeyup="mayus(this);"  id="TB_Modelo" name="TB_Modelo"  placeholder="modelo" >
                        </div>
                      </div>
                      <!--  termina row -->
                      <div class="row">
                        <div class="col-md-3">
                        <label> N° Placas </label>
                            <input type="text" class="form-control" onkeyup="mayus(this);"  id="TB_Placas" name="TB_Placas" placeholder="placas" >
                        </div>
                        <div class="col-md-3">
                        <label> Color </label>
                            <input type="text" class="form-control" onkeyup="mayus(this);"  id="TB_Color" name="TB_Color" placeholder="color" >
                        </div>
                        <div class="col-md-3">
                        <label> N° Motor </label>
                            <input type="text" class="form-control" onkeyup="mayus(this);"  id="TB_Motor" name="TB_Motor" placeholder="motor" >
                        </div>
                        <div class="col-md-3">
                        <label> N° Serie </label>
                            <input type="text" class="form-control" onkeyup="mayus(this);"  id="TB_Serie" name="TB_Serie" placeholder="serie" >
                        </div>
                      </div>
                      <!-- fin del row de transportista-->
                     </br>
                    <input type="button" name="previous" class="previous-formcertificado btn btn-default" value="Atras" />
                    <!--<button type="button" class="btn btn-primary" onclick="impresionCertificadoPDF();" name="submit">Generar Certificado</button>-->
                    <button type="submit" class="btn btn-primary"  name="submit">Generar Cotizacion</button>
                    <!--<button type="button" id="Btn_ImprimiCotizacion" class="btn btn-outline-primary" onclick="impresionCotizacionPDF();">
                          <i class="fa fa-print"></i> Generar Cotizacion
                    </button>-->
                  </fieldset>
                    
                  </form>  
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>

</div>

