<?php
include_once("../shared/formulario.php");
class formEmitirProforma extends formulario
{
    public function formEmitirProformaShow()
    {
        $this->encabezadoShowSimple("Emitir Proforma");
        date_default_timezone_set('America/Los_Angeles');
?>

        <div class="container">
            <p class="usuario">Usuario activo:<?php echo $_SESSION['login'] ?> </p>
            <div class="row">
                <div class="col-6 lista">
                    <input type="text" id="txtNombre" placeholder="Buscar por nombre" size="60" />
                    <button onclick="BuscarProductoNombre()" class="btnBuscarPr">Buscar</button>
                    <div id="lista_productos" class="lista_productos">
                    </div>
                </div>
                <div class="col-6 proforma">
                    <label>Codigo: </label>
                    <input type="text" id="codigo" value="" disabled />
                    <label>Fecha: </label>
                    <input type="date" id="fecha" value="<?php echo date('Y-m-d'); ?>" disabled />
                    <table class="table table-hover table-sm" id="datos">
                        <thead>
                            <tr>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio unitario</th>
                                <th scope="col">envases</th>
                                <th scope="col">Monto</th>
                                <th scope="col" class="moverimpri">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="lista-proforma">
                        </tbody>
                    </table>
                    <div class="sec_total">
                        <label>Monto total:</label>
                        <input type="text" size="6" id="monto_total" value="0.00" disabled />
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                </div>
                <div class="col">

                </div>
                <div class="col">
                    <button id="emitir" class="btn btn-primary" onclick="EmitirProforma()">Emitir</button>
                    <form class="cancelar" method="post" action="../moduloSeguridad/getUsuario.php">
                        <button style="color: white" name="retrocede" type="submit" class="btn btn-info" id="retrocede">
                            Cancelar
                        </button>
                        <input name="login" type="hidden" id="login" value="<?php echo $_SESSION['login'] ?>">
                    </form>
                </div>
            </div>
        </div>
        <script src="../js/scriptEmitirProforma.js"></script>
<?php
        $this->piePaginaShow();
    }
}
?>