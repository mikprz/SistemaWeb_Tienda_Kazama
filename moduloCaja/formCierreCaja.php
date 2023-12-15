<?php
    include_once("../shared/formulario.php");
    class formCierreCaja extends formulario{
        public function formCierreCajaShow(){
            $this -> encabezadoShowSimple("Cierre Caja");
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
                <div class="col-2"></div>
                    <div class="col-3 caja1">
                        <table class="table table-borderless">
                            <tr class="table-dark text-center" >
                                <td colspan="2">RESUMEN DE CAJA</td>
                            </tr>
                            <tr>
                                <td><strong>TOTAL VENTA:</strong></td>
                                <td class="float-end"><input type="text" style="text-align:right" id="Total_venta" size="10" disabled></td>
                            </tr>
                            <tr>
                                <td>Efectivo: </td>
                                <td class="float-end efectivo"></td>
                            </tr>                            
                        </table>
                        <hr>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>TOTAL CAJA:</strong></td>
                                <td class="float-end"><input style="text-align:right" id="Total_caja" type="text" size="10" disabled></td>
                            </tr>
                            <tr>
                                <td>Cobrado: </td>
                                <td class="float-end cobrado"></td>
                            </tr>
                            <tr>
                                <td>Reembolso: </td>
                                <td class="float-end ReembolsoAJAX"></td>
                            </tr>
                        </table>
                        <hr>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>FECHA ACTUAL:</strong></td>
                                <td class="float-end"><input type="text" size="10" style="text-align:right" disabled value="<?php echo date('Y-m-d'); ?>"></td>
                            </tr> 
                        </table>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-5" id="caja">
                        <table class="table table-borderless text-center">
                                <tr class="table-dark" >
                                    <td colspan="4">RECUENTO DE N° DE MONEDADS Y BILLETES</td>
                                </tr>
                                <tr>
                                    <td>200 SOLES:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0" id="200s" onkeyup="ActualizarRecuento()"></td>
                                    <td>2 SOLES:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0" id="2s" onkeyup="ActualizarRecuento()"></td>
                                </tr>
                                <tr>
                                    <td>100 SOLES:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0" id="100s" onkeyup="ActualizarRecuento()"></td>
                                    <td>1 SOL:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0" id="1s" onkeyup="ActualizarRecuento()"></td>
                                </tr>
                                <tr>
                                    <td>50 SOLES:</td>
                                    <td><input type="text" size="10" style="text-align:center"  value="0" id="50s" onkeyup="ActualizarRecuento()"></td>
                                    <td>50 CENTIMOS:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0" id="50c" onkeyup="ActualizarRecuento()"></td>
                                </tr>
                                <tr>
                                    <td>20 SOLES:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0" id="20s" onkeyup="ActualizarRecuento()"></td>
                                    <td>20 CENTIMOS:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0" id="20c" onkeyup="ActualizarRecuento()"></td>
                                </tr>
                                <tr>
                                    <td>10 SOLES:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0" id="10s" onkeyup="ActualizarRecuento()"></td>
                                    <td>10 CENTIMOS:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0"  id="10c" onkeyup="ActualizarRecuento()"></td>
                                </tr>    
                                <tr>
                                    <td>5 SOLES:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0" id="5s" onkeyup="ActualizarRecuento()"></td>
                                    <td>5 CENTIMOS:</td>
                                    <td><input type="text" size="10" style="text-align:center" value="0" id="5c" onkeyup="ActualizarRecuento()"></td>
                                </tr>                   
                        </table>  
                        <hr>
                        <table class="table table-borderless text-center">
                            <tr>
                                <td>RECUENTO:</td>
                                <td><input type="text" style="text-align:right" size="10" id="Recuento" disabled></td>
                                <td>DESCUADRE</td>
                                <td><input type="text" style="text-align:right" size="10" id="Descuadre" disabled></td>
                            </tr>
                        </table>                    
                    </div>                    
                </div>
                
                <section class="text-center">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                                <p>
                                    <a onclick="tapar()"   id="btnvolver" class="btn btn-primary">ATRÁS</a>
                                    <a onclick="mostrar()" id="btncon"    class="btn btn-primary">CONTINUAR</a>
                                    <button onclick="guardaRegistro()" id="btnf" class="btn btn-primary">FINALIZAR</button>
                                </p>                                    
                        </div>
                    </div>
                </section>
            </div> 
            <div class="prueba"></div> 
            <script src="../js/scriptCierreCaja.js"></script>
            <?php          
            $this->piePaginaShow();
        }
    }
?>