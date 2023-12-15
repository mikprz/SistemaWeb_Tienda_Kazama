<?php
    include_once("../shared/formulario.php");
    class formGestionarUsuario extends formulario{
        public function formGestionarUsuarioShow(){
                $this -> encabezadoShowSimple("Gestionar Usuarios");
                ?>
                <div class="container usuario">
                <div class="row">
                    <div class="col-10">
                        <!--<p><i class='fas fa-user-alt'></i><?php echo $_SESSION['login'] ?>-->
                    </div>
                    <div class="col">
                        <form name="form3" method="post" action="../moduloSeguridad/getUsuario.php">                                                       
                                <button  style="color: white" name="retrocede" type="submit" class="btn btn-info" id="retrocede">
                                    VOLVER<i class="fa fa-arrow-circle-left"  style="margin-left:10px"></i>
                                </button>
                                <input name="login" type="hidden" id="login" value="<?php echo $_SESSION['login'] ?>">					
                        </form></p>
                    </div>
                </div>
            </div>
                <div class="container">
                    <div class="row">
                        <div class="col-4 lista">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="text-center" style="color:white">Registro de usuarios</h3>
                                </div>
                                <div class="card-body">
                                <form action="" method="post" id="frm">
                                    <div class="form-group">
                                        <label for="">LOGIN:</label>
                                        <input type="hidden" name="idp" id="idp" value="">
                                        <input type="text" name="user" id="user" placeholder="Login" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">CONTRASEÑA:</label>
                                        <input type="text" name="contra" id="contra" placeholder="Contraseña" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NOMBRE:</label>
                                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">DNI</label>
                                        <input type="text" name="dni" id="dni" placeholder="Dni" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">PREG. SECRETA:</label>
                                        <input type="text" name="pes" id="pes" placeholder="Pregunta secreta" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">RESP. SECRETA:</label>
                                        <input type="text" name="res" id="res" placeholder="Respuesta secreta" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">ROL:</label>
                                        <select class="form-select form-select-sm" id="rol" aria-label=".form-select-sm example">
                                            <option value="Administrador">ADMINISTRADOR</option>
                                            <option value="Cajero">CAJERO</option>
                                            <option value="Vendedor">VENDEDOR</option>
                                            <option value="Despachador">DESPACHADOR</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="button" value="Crear Usuario" id="registrar" onclick="registrarUsuario()" class="btn btn-primary btnRegistrarUsuarios">
                                        <input type="button" value="Modificar" id="editar" onclick="guardarUsuario()" class="btn btn-primary btnModificarUsuarios">
                                    </div>
                                    </form>    
                                </div>
                                </div>
                                
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 ml-auto">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="buscra">BUSCAR POR LOGIN:</label>
                                            <input type="hidden" id="idOcultoModificar">
                                            <input type="text" onkeyup="BuscarUsuarioLogin()" name="buscar" id="buscar" placeholder="Ingrese su LOGIN" class="form-control">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table class="table table-hover table-resposive text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>LOGIN</th>
                                        <th>CONTRASEÑA</th>
                                        <th>NOMBRE</th>
                                        <th>DNI</th>
                                        <th>P. SECRETA</th>
                                        <th>R. SECRETA</th>
                                        <th>ROL</th>
                                        <th>EDITAR</th>
                                        <th>ELIMINAR</th>
                                    </tr>
                                </thead>
                                <tbody id="lista_usuarios">
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            <script src="../js/scriptGestionarUsuario.js"></script>

            <?php          
                $this->piePaginaShow();
            }
    }
?>