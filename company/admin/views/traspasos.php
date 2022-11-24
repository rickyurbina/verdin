<div><p></p></div>

<?php 
if (isset($_POST["idProducto"]))
        $productoABuscar = $_POST["idProducto"];
    else{
        $productoABuscar = "0";
    }
?>
    <div class="row">    
        <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="card m-b-20">
                <!-- <div class="card-header">
                    <h3 class="card-title">Búsquedas de Productos</h3>
                </div> -->
                <div class="card-body">
                    <form method="POST" action="index.php?page=traspasos">
                        <div class="form-group">
                            <label class="form-label">Producto</label>
                            <select class="form-control" name="idProducto" id="idProducto">
                                <?php $productos = new productos(); $productos -> ctlListProductos();?>
                            </select>
                        </div>
                        <button type="submit" name="buscaProducto" class="btn btn-blue">Buscar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row col-12">            
            <?php
                $registro = new Movimientos();
                $registro -> ctlTraspasoPiezasAKilos($productoABuscar);
                $registro -> ctlTraspaso();
            ?>
    </div>

        
    </div>


