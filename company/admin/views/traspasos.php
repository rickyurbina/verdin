<?php
    // $orden = new Movimientos(); 
    // $siguiente = $orden -> ctrSiguienteRegistro('salidas'); 
?>
<div><p></p></div>
            <?php
                // $tickets = new Salidas();
                // $tickets -> ctlTicketsAbiertos();
            ?>            
        
    <div class="row">    
        <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="card m-b-20">
            <form method="POST">
                <div class="card-header">
                    <h3 class="card-title">Traspaso de existencias</h3>
                    <!-- <div class="card-options"><button type="submit" class="btn btn-sm btn-yellow" name="pausarPedido">Pausar Pedido</button> </div>
                    <div class="card-options"><button type="submit" class="btn btn-sm btn-blue" name="regPedido">Guardad Pedido</button> </div> -->
                </div>
                <div class="card-body">
                
                    <div class="row">
                        
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <label class="form-label">Productos</label>
                                <select class="form-control" name="idProducto" id="idProducto">
                                    <?php $productos = new productos(); $productos -> ctlListProductos();?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-options"><button type="submit" class="btn btn-sm btn-blue" name="regPedido">Buscar producto</button> </div>
                       
                     </div>  <!-- row -->
            </form>
            <?php
                $registro = new Salidas();
                $registro -> ctlRegistraPedido();
            ?>
            </div>
        </div>
    </div>

    <div class="row col-12">
        <div class="col-xl-6 col-lg-6 col-md-8"> 
            <!-- Datos a insetar en la Base de Datos -->
            
            <!--  -->     
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cajas </h3>
            </div>
                <div class="card-body">
                    <div class="user-tabel table-responsive border-top">                  
                        <table class="table card-table table-bordered table-hover table-vcenter text-nowrap">
                            <thead>
                                <th>Producto</th>
                                <th>Lote</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th></th>
                            </thead>
                            <tbody class="text-left" id="listaPedido">             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-xl-6 col-lg-6 col-md-8"> 
            <!-- Datos a insetar en la Base de Datos -->
            
            <!--  -->     
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Piezas</h3>
            </div>
                <div class="card-body">
                    <div class="user-tabel table-responsive border-top">                  
                        <table class="table card-table table-bordered table-hover table-vcenter text-nowrap">
                            <thead>
                                <th>Producto</th>
                                <th>Lote</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th></th>
                            </thead>
                            <tbody class="text-left" id="listaPedido">             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
        

    </div>

        
    </div>


