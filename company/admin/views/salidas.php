<?php
    $orden = new Movimientos(); 
    $siguiente = $orden -> ctrSiguienteRegistro('salidas'); 
?>
<div><p></p></div>
            <?php
                $tickets = new Salidas();
                $tickets -> ctlTicketsAbiertos();
            ?>            
        
      <div class="row">    
        <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="card m-b-20">
            <form method="POST">
                <div class="card-header">
                    <h3 class="card-title">Cliente</h3>
                    <div class="card-options"><button type="submit" class="btn btn-sm btn-yellow" name="pausarPedido">Pausar Pedido</button> </div>
                    <div class="card-options"><button type="submit" class="btn btn-sm btn-blue" name="regPedido">Guardad Pedido</button> </div>
                </div>
                <div class="card-body">
                
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <div class="form-group">
                                <label class="form-label">Pedido <?php echo $siguiente; ?></label>
                                <!-- <input type="text" class="form-control" name="pedidoNum" id="pedidoNum" required> -->
                                
                                
                                <input type="text" class="form-control" name="pedidoNum" id="pedidoNum" value="<?php echo $siguiente; ?>" >
                            </div>
                        </div>
                        <div class="col-md-9">
                            
                            <div class="form-group">
                                <label class="form-label">Cliente</label>
                                <select class="form-control" name="idCliente" id="idCliente">
                                    <?php $clientes = new clientes(); $clientes -> ctlListClientes();?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Concepto</label>
                                <select class="form-control custom-select select2" name="concepto" id="concepto">
                                    <option value="venta">Venta</option>
                                    <option value="ajuste">Ajuste</option>
                                    <option value="saldo">Saldo Inicial</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Fecha</label>
                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="fechaMovimiento" id="fechaMovimiento">
                                <input type="text" class="form-control" name="pedidoBD" id="pedidoBD" hidden>
                                <input type="text" class="form-control" name="totalPedidoBD" id="totalPedidoBD" hidden>
                            </div>
                        </div>
                        
                     </div>  <!-- row -->
            </form>
            <?php
                $registro = new Salidas();
                $registro -> ctlRegistraPedido();
            ?>
            </div>
        </div>

            <div class="card m-b-20">
                <!-- <div class="card-header">
                    <h3 class="card-title">Búsquedas de Productos</h3>
                </div> -->
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="searchBox" oninput = "buscaJS(this.value)" placeholder="Busque un producto aqui">
                        </div>
                    </form>

                    <div class="user-tabel table-responsive border-top">                  
                        <table class="table card-table table-bordered table-hover table-vcenter text-nowrap">
                            <thead>
                                <th>Producto</th>
                                <th>Lote</th>
                                <th>Disp</th>
                                <th>$</th>
                                <th style="width: 40.406px;">Cant</th>
                                <th></th>
                            </thead>
                            <tbody class="text-left" id="productsTable">             
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
                <h3 class="card-title">Total Pedido </h3>
                <div class="card-options"><h3 id="totalPedido">$</h3> </div>
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


