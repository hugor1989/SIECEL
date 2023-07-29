
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Mercancias</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
    <h2>Registro de Mercancia</h2>
        <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--<div class="alert alert-success hide"></div>-->
        <form role="form" method="post" enctype="multipart/form-data" 
              id="register_form_mercancia" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
        <fieldset>
            <h2>Step 1: Datos Mercancia</h2>
             <!-- ENTRADA PARA EL DESCRIPCION -->
             <div class="input-group mb-3">
                <input type="text" class="form-control" name="nuevoDescripcion" id="nuevoDescripcion" 
                       onkeyup="mayus(this);" placeholder=" Nombre de Mercancia" >
            </div>
            <!-- -->
            <!-- ENTRADA PARA EL GIRO -->
            <div class="input-group mb-3">
                <select class="form-control select2 input-lg" id="nuevoGiro" name="nuevoGiro">	
                <option value="">Selecionar Giro</option>

            <?php
                $giro = ControladorMercancia::ctrMostrarGiro($item, $valor);

                foreach ($giro as $key => $value){

                    ?>
                    <option value="<?php echo $value["Id"] ?>"><?php echo $value["Descripcion"] ?></option>
                    
                    <?php
                }	
                ?>			
                
                </select>
            </div>
            <!-- -->
            <!-- ENTRADA PARA EL GIRO -->
            <div class="input-group mb-3">
                <select class="form-control input-lg" id="nuevoPeligrosidad"  name="nuevoPeligrosidad">	
                    <option value="">Selecionar Peligrosidad</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
              
            </div>
            <!-- -->
            <!-- ENTRADA PARA EL Valor Aseguradora -->
            <div class="input-group mb-3">
                <input type="text" class="form-control" rel="txtTooltipCuotaContenedor" 
                            title="Valor Aseguradora" data-toggle="tooltip"  name="nuevoValorA" id="nuevoValorA" placeholder=" Valor Aseguradora">
            </div>
            <!-- -->
            <!-- ENTRADA PARA EL Valor Apar -->
            <div class="input-group mb-3">
                <input type="text" class="form-control" rel="txtTooltipCuotaContenedor" 
                            title="Valor APAR" data-toggle="tooltip" name="nuevoValorAP" id="nuevoValorAP" placeholder=" Valor APAR">
               
            </div>
            <!-- --> 
            </br>
        <input type="button" class="next-form-m btn btn-info" value="Siguiente" />
        </fieldset>
       <!-- <fieldset>
        <h2> Step 2: Deducibles</h2>
        <div class="form-row mt-4">
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                        title="ROT" data-toggle="tooltip" type="text" 
                        name="nuevoROT" id="nuevoROT" placeholder="ROT"/>
                        
                </div> 
            </div>
            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                <div class="input-group mb-3">
                    <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                            title="TR" data-toggle="tooltip" type="text" 
                            name="nuevoRobo" id="nuevoRobo" placeholder="TR"/>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa fa-percent"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                <div class="input-group mb-3">
                    <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                            title="VARIACION TERMINCA" data-toggle="tooltip" type="text" 
                            name="nuevoVT" id="nuevoVT" placeholder="VARIACION TERMINCA"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-percent"></span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <br>
            <input type="button" name="previous" class="previous-form-m btn btn-default" value="Atras" />
            <input type="button" name="next" class="next-form-me btn btn-info" value="Siguiente" />
        </fieldset> -->
        <fieldset>
            <h2>Step 3: Protocolos</h2>
            <!-- Grupo de imput -->
            <div class="form-row mt-4">
                <div class="col-12 col-sm-6">
                <label>de 0 a 1'000,000</label>
                    <select class="form-control input-lg" id="nuevoIntervalo1" name="nuevoIntervalo1" 
                            rel="txtTooltipCuotaContenedor" 
                            title="de 0 a 1'000,000" data-toggle="tooltip" required>	
                        <option value="">Selecionar Protocolo</option>
                        <?php
                        $mercancia = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

                            foreach ($mercancia as $key => $value){
                                ?>
                                <option value="<?php echo $value["Id"] ?>"><?php echo $value["Id"] ?></option>
                                <?php
                            }	
                        ?>			
                    </select>
                </div>
                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                <label>de 1'000,001 a 1'500,000</label>
                    <select class="form-control input-lg" id="nuevoIntervalo2" name="nuevoIntervalo2" 
                            rel="txtTooltipCuotaContenedor" 
                            title="de 1'000,001 a 1'500,000" data-toggle="tooltip" required>	
                        <option value="">Selecionar Protocolo</option>
                        <?php
                        $mercancia = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

                            foreach ($mercancia as $key => $value){
                                ?>
                                <option value="<?php echo $value["Id"] ?>"><?php echo $value["Id"] ?></option>
                                <?php
                            }	
                        ?>			
                    </select>
                </div>
                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                <label>de 1'500,001 a 3'000,000</label>
                    <select class="form-control input-lg" id="nuevoIntervalo3" name="nuevoIntervalo3" 
                            rel="txtTooltipCuotaContenedor" 
                            title="de 1'500,001 a 3'000,000" data-toggle="tooltip" required>	
                        <option value="">Selecionar Protocolo</option>
                        <?php
                        $mercancia = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

                        foreach ($mercancia as $key => $value){
                            ?>
                            <option value="<?php echo $value["Id"] ?>"><?php echo $value["Id"] ?></option>
                            <?php
                        }	
                        ?>			
                    </select>
                </div>
            </div> 
             <!-- fin de grupo input-->
             <div class="form-row mt-4">
                <div class="col-12 col-sm-6">
                <label>de 3'000,001 a 5'100,000</label>
                <select class="form-control input-lg" id="nuevoIntervalo4" name="nuevoIntervalo4" 
                            rel="txtTooltipCuotaContenedor" 
                            title="de 3'000,001 a 5'100,000" data-toggle="tooltip" required>	
                        <option value="">Selecionar Protocolo</option>
                        <?php
                        $mercancia = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

                        foreach ($mercancia as $key => $value){
                            ?>
                            <option value="<?php echo $value["Id"] ?>"><?php echo $value["Id"] ?></option>
                            <?php
                        }	
                        ?>			
                    </select>
                </div>
                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                    <label>de 3'000,001 a 5'100,000</label>
                    <select class="form-control input-lg" id="nuevoIntervalo5" name="nuevoIntervalo5" 
                            rel="txtTooltipCuotaContenedor" 
                            title="de 3'000,001 a 5'100,000" data-toggle="tooltip" required>	
                        <option value="">Selecionar Protocolo</option>
                        <?php
                        $mercancia = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

                        foreach ($mercancia as $key => $value){
                            ?>
                            <option value="<?php echo $value["Id"] ?>"><?php echo $value["Id"] ?></option>
                            <?php
                        }	
                        ?>			
                    </select>
                </div>
            </div> 
            <!-- fin de grupo input-->
            </br>
            <input type="button" name="previous" class="previous-form-m btn btn-default" value="Previous" />
            <button type="submit" class="btn btn-primary" name="submit">Guardar Mercancia</button>
        </fieldset>
            <?php

                $nuevoDescripcion = new ControladorMercancia();
                $nuevoDescripcion -> ctrCrearMercancia();
            ?>
        </form>
    </div>    
      <!-- /.container-fluid -->
  </section>

</div>


