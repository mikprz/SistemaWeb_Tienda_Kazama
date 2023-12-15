<?php
    include_once("../shared/formulario.php");
    class formGestionarReclamo extends formulario{
        public function formGestionarReclamoShow(){
            $this -> encabezadoShowSimple("Gestionar Reclamo");
            ?> 
            
            <div class="container">
                <div class="row">
                    <div class="col-6">
                                <div class="mb-3 row">
                                    <label for="boleta" class="col-sm-4 col-form-label"><strong>N° BOLETA</strong></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="boleta">
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-danger" onclick="BuscarComprobante()"><i class="fa fa-search"></i></button>
                                    </div>  
                                </div>
                                <div class="mb-3 row">
                                    <label for="fecha" class="col-sm-4 col-form-label">FECHA DE COMPRA</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="fecha" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="razonS" class="col-sm-4 col-form-label">NOMBRE O RAZON SOCIAL</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="razonS" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="motivo" class="col-sm-4 col-form-label">MOTIVO DEL RECLAMO</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" id="motivo" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="monto" class="col-sm-4 col-form-label">MONTO A RECLAMAR</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="monto">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="fechaR" class="col-sm-4 col-form-label" >FECHA DE RECLAMO</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="fechaR" value="<?php echo date('Y-m-d'); ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-lg-6 mx-auto">
                                        <button class="btn btn-success" onclick="RegistrarReclamo()">REGISTRAR</button>
                                    </div>
                                </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="solucionarC" placeholder="NUMERO DE BOLETA" style="text-align:center">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-danger" onclick="BSolucionar()"><i class="fa fa-search"></i></button>
                            </div>                            
                        </div>  
                        
                        <div class="row">
                            <table class="table table-hover table-sm text-center" id="datos">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Motivo</th>
                                            <th scope="col">Monto</th>
                                            <th scope="col">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="tdfecha"></td>
                                            <td class="tdmotivo"></td>
                                            <td class="tdmonto"></td>
                                            <td class="tdestado"></td>
                                            <input type="hidden" class="tdestadoforAJAX">
                                            <input type="hidden" class="tdidforAJAX">
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <button class="btn btn-danger" onclick="SolucionarReclamo()">SOLUCIONAR</button>
                        </div>
                    </div>
                <section class="text-center">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <form name="form3" method="post" action="../moduloSeguridad/getUsuario.php">                                                       
                                    <button  style="color: white" name="retrocede" type="submit" class="btn btn-info" id="retrocede">
                                        SALIR
                                    </button>
                                    <input name="login" type="hidden" id="login" value="<?php echo $_SESSION['login'] ?>">					
                            </form>                              
                        </div>
                    </div>
                </section>
            </div>
            
            <script src="../js/scriptGestionarReclamo.js"></script>
            <?php          
            $this->piePaginaShow();
        }
    }
?>