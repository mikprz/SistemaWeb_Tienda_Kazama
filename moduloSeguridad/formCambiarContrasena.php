<?php
    include_once("../shared/formulario.php");
    class formCambiarContrasena extends formulario{
        public function formCambiarContrasenaShow(){
            $this -> encabezadoShow("Cambiar Password");
            ?>   
            <div class="container">
                <div class="row">
                <div class="col-7"></div>
                <div class="col-2">
                            <form name="form3" method="post" action="../moduloSeguridad/getUsuario.php">                                                       
                                    <button  style="color: white" name="retrocede" type="submit" class="btn btn-info" id="retrocede">
                                        VOLVER<i class="fa fa-arrow-circle-left"  style="margin-left:10px"></i>
                                    </button>
                                    <input name="login" type="hidden" id="login" value="<?php echo $_SESSION['login'] ?>">					
                            </form><p></p>
                </div>  
                </div>
            </div>       
            <form action="../moduloSeguridad/getUsuario.php" method="POST" >
            <table class="ADSLogin">
                <tr>
                    <td class="tdEspecial">Cambiar Contraseña</td>
                </tr>
                <tr >
                    <td><label for="acontra" class="tituloPass">INGRESE SU CONTRASEÑA ACTUAL</label></td>
                </tr>
                <tr >
                    <td><input type="text" name="acontra" id="acontra" class="inpPass"></td>
                </tr>
                <tr >
                    <td><label for="ncontra" class="tituloPass">INGRESE SU NUEVA CONTRASEÑA</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="ncontra" id="ncontra" class="inpPass"></td>
                </tr>
                <tr >
                    <td><label for="ccontra" class="tituloPass">CONFIRME SU NUEVA CONTRASEÑA</label></td>
                </tr>
                <tr>
                <input type="hidden" name="loginc" value="<?php echo $_SESSION['login'] ?>"/>
                    <td><input type="text" name="ccontra" id="ccontra" class="inpPass"></td>
                </tr>
                <tr>
                    <td><input type="submit" class="btncontra" value="ACEPTAR" name="btnContrasena"></td>
                </tr>
            </table>
            </form>
            <?php          
            $this->piePaginaShow();
        }
    }
?>