<!-- <div class="page-header">
    <h4 class="page-title">Captura de Pedidos</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Inicio</li>
    </ol>
</div> -->
<div><p></p></div>


    <div class="row">
        
        <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="card m-b-20">
            <form method="POST">
                <div class="card-header">
                    <h3 class="card-title">Información del Cliente</h3>
                    <div class="card-options"><button type="submit" class="btn btn-sm btn-blue" name="regPedido" href="busca.php">Guardad Pedido</button> </div>
                </div>
                <div class="card-body">
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"># Pedido</label>
                                <input type="text" class="form-control" name="pedidoNum" id="pedidoNum" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Cliente</label>
                                <select class="form-control" name="idCliente" id="idCliente">
                                    <?php $clientes = new clientes(); $clientes -> ctlListClientes();?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Concepto</label>
                                <select class="form-control custom-select select2" name="concepto" id="concepto">
                                    <option value="venta">Venta</option>
                                    <option value="ajuste">Ajuste</option>
                                    <option value="saldo">Saldo Inicial</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Fecha</label>
                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="fechaMovimiento" id="fechaMovimiento">
                                <input type="text" class="form-control" name="pedidoBD" id="pedidoBD" hidden>
                                <input type="text" class="form-control" name="totalPedidoBD" id="totalPedidoBD" hidden>
                            </div>
                        </div>
                    </div>
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
                    <form action="busca.php" method="POST">
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



    <!-- <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-8"> 

            <div class="card">
            <div class="card-header">
                <h3 class="card-title" id="totalPedido">Total Pedido $</h3>
                <div class="card-options"><button class="btn btn-sm btn-blue" href="#">Guardad Pedido</button> </div>
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
    </div> -->



