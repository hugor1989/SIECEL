<?php  
 session_start();
   
 ?> 

<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img src="" class="img-responsive">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">Ingresar al sistema</p>
     <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>

      <div class="row">
       
        <div class="col-xs-4">

          <input type="submit" name="login" class="btn btn-primary btn-block" value="Ingresar"/>
        
        </div>

      </div>
    </form>

  </div>

</div>

