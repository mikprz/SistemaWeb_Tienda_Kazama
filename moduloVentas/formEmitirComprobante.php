<?php
include_once("../shared/formulario.php");
class formEmitirComprobante extends formulario
{


    public function formEmitirComprobanteShow()
    {
        date_default_timezone_set('UTC');
        $this->encabezadoShowSimple("Emitir Comprobante");
?>

        <div class="container">
            <p class="usuario">Usuario activo:<?php echo $_SESSION['login'] ?> </p>
            <div class="row">
                <div class="col-6 lista">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="Buscar">Buscar por fecha:</label>
                            <input type="date" class="form-control" id="fecha_buscar" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="col-md-2">
                            <label for=""></label>
                            <button type="button" class="btn btn-success" onclick="BuscarProformaFecha()">Buscar</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="Buscar">Buscar por codigo:</label>
                            <input type="text" class="form-control" id="txtCodigo" placeholder="PF-0001">
                        </div>
                        <div class="col-md-2">
                            <label for=""></label>
                            <button type="button" class="btn btn-success" onclick="BuscarProformaCodigo()">Buscar</button>
                        </div>
                        <div class="col-md-2">
                            <label for=""></label>
                            <button type="button" class="btn btn-secondary" onclick="ExtraerProformas();">Refrescar</button>
                        </div>
                    </div>
                    <br>
                    <p>Seleccionar una proforma:</p>
                    <table class="table table-hover table-sm" id="datos">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Monto Total</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="lista_proformas">
                        </tbody>
                    </table>
                </div>
                <div class="col-6 proforma">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="Buscar">Codigo</label>
                            <input type="text" class="form-control Palacios" id="codigo" disabled />
                        </div>
                        <div class="col-md-4">
                            <label for="Buscar">Fecha</label>
                            <input type="date" class="form-control Palacios" id="fecha" value="<?php echo date('Y-m-d'); ?>" disabled />
                        </div>
                        <div class="col-md-5">
                            <label>Tipo de comprobante</label>
                            <select id="tipo_comprobante" class="form-select Palacios">
                                <option value="B">Boleta de venta</option>
                                <option value="F">Factura</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="nom_cliente">Nombre o Razón social</label>
                            <input type="text" class="form-control Palacios" id="nom_cliente">
                        </div>
                        <div class="col-md-4">
                            <label for="documento">DNI o RUC</label>
                            <input type="text" class="form-control Palacios" id="documento">
                        </div>
                    </div>
                    <br>
                    <p>Descripción de proforma seleccionada:</p>
                    <p id="codigo_proforma"></p>
                    <table class="table table-hover table-sm" id="datos">
                        <thead>
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio U.</th>
                                <th scope="col">envases</th>
                                <th scope="col">Monto</th>
                            </tr>
                        </thead>
                        <tbody id="detalle_proforma">
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <p id="monto_total_proforma"></p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div class="col">
                    <button id="emitirComprobante" class="btn btn-primary" onclick="EmitirComprobante()" disabled>Emitir Comprobante</button>
                    <form class="cancelar" method="post" action="../moduloSeguridad/getUsuario.php">
                        <button style="color: white" name="retrocede" type="submit" class="btn btn-info" id="retrocede">
                            Cancelar
                        </button>
                        <input name="login" type="hidden" id="login" value="<?php echo $_SESSION['login'] ?>">
                    </form>
                </div>
            </div>
        </div>

        <script src="../js/scriptEmitirComprobante.js"></script>
<?php
        $this->piePaginaShow();
    }
}
?>