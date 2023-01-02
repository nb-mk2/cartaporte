<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<div class="container-login"> 

<div class="login-box">
  
  <div class="login-logo">

   

  </div>

  <div class="wrap-login">

    <p class="login-form-title">Iniciar Sesión!</p>

    <form class="login-form validate-form" method="post">

      <div class="wrap-input100">

        <input type="text" class="input100" placeholder="Usuario" name="ingUsuario" required>
        <span class="focus-efecto"></span>
      
      </div>
    

      <div class="wrap-input100">

        <input type="password" class="input100" placeholder="Contraseña" name="ingPassword" required>
        <span class="focus-efecto"></span>
      
      </div>

    
      <div class="container-login-form-btn">
        <div class="wrap-login-form-btn">
          <div class="login-form-bgbtn"></div>
            

            <button type="submit" class="login-form-btn">Ingresar</button>
          
          
        </div>
      </div>
       



      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>


  </div>

</div>

</div>

<style> 
.container-login {
    width: 100%;
    min-height: 100vh;
    display: -webkit-flex;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 15px;
    background-image: url("vistas/img/fondo.jpg")
}
.wrap-login {
    width: 400px;
    background: #eceff1;
    border-radius: 20px;
    overflow: hidden;
    padding: 77px 55px 53px 55px;
    -webkit-box-shadow: 25px 40px 28px 0px rgb(0 0 0 / 38%);
}

.login-form {
    width: 100%;
}

.login-form-title {
    display: block;
    font-family: Poppins-Bold;
    font-size: 40px;
    color: #333333;
    line-height: 1.5;
    text-align: center;
}
.input100 {
    font-family: Poppins-Regular;
    font-size: 15px;
    color: #555555;
    line-height: 1.2;
    display: block;
    width: 100%;
    height: 45px;
    background: transparent;
    padding: 0 5px;
}
input {
    outline: none;
    border: none;
}
button, input {
    overflow: visible;
}
.focus-efecto {
    position: absolute;
    display: block;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    pointer-events: none;
}
* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}
.wrap-input100 {
  width: 100%;
  position: relative;
  border-bottom: 2px solid #adadad;
  margin-bottom: 37px;
}

.wrap-input100 {
  width: 100%;
  position: relative;
  border-bottom: 2px solid #adadad;
  margin-bottom: 37px;
}

.input100 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #555555;
  line-height: 1.2;

  display: block;
  width: 100%;
  height: 45px;
  background: transparent;
  padding: 0 5px;
}

/*---------------------------------------------*/ 
.focus-efecto {
  position: absolute;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
}

.focus-efecto::before {
  content: "";
  display: block;
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 4px; /*ancho de la linea que hace el efecto de barra de progeso en el input al hacer foco*/

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  background: #6a7dfe;
  background: -webkit-linear-gradient(left, #21d4fd, #3aff21);
  background: -o-linear-gradient(left, #21d4fd, #3aff21);
  background: -moz-linear-gradient(left, #21d4fd, #3aff21);
  background: linear-gradient(left, #21d4fd, #3aff21);
}

.focus-efecto::after {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #999999;
  line-height: 1.2;

  content: attr(data-placeholder);
  display: block;
  width: 100%;
  position: absolute;
  top: 16px;
  left: 0px;
  padding-left: 5px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.input100:focus + .focus-efecto::after {
  top: -15px;
}

.input100:focus + .focus-efecto::before {
  width: 100%;
}

.has-val.input100 + .focus-efecto::after {
  top: -15px;
}

.has-val.input100 + .focus-efecto::before {
  width: 100%;
}

/*---------------------------------------------*/


/*------------------------------------------------------------------
[ Button ]*/
.container-login-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 13px;
}

.wrap-login-form-btn {
  width: 100%;
  display: block;
  position: relative;
  z-index: 1;
  border-radius: 40px 5px;
  overflow: hidden;
  margin: 0 auto;
}

.login-form-bgbtn {
    position: absolute;
    z-index: -1;
    width: 300%;
    height: 100%;
    background: #a64bf4;
    background: -webkit-linear-gradient(right, #21d4fd, #34ad25, #21d4fd, #34ad25);
    background: -o-linear-gradient(right, #21d4fd, #34ad25, #21d4fd, #34ad25);
    background: -moz-linear-gradient(right, #21d4fd, #34ad25, #21d4fd, #34ad25);
    background: linear-gradient(right, #21d4fd, #34ad25, #21d4fd, #34ad25);
    top: 0;
    left: -100%;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
}

.login-form-btn {
  font-family: Poppins-Medium;
  font-size: 20px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;
}

.wrap-login-form-btn:hover .login-form-bgbtn {
  left: 0;
}

button {
    /* overflow: visible; */
    outline: none !important;
    border: none;
    background: transparent;
}


</style>