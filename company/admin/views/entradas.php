<div class="page-header">
    <h4 class="page-title">Registro de Productos</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Products Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products Register</li>
    </ol>
</div>
<form method="POST" name="entradas">
<div class="row col-12">
    <div class="col-xl-6">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">Información del Proveedor</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label"># Orden</label>
                            <input type="text" class="form-control" name="ordenNum" id="ordenNum">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Proveedor</label>
                            <select class="form-control" name="idProveedor" id="idProveedor">
                                <?php $proveedores = new providers(); $proveedores -> ctlListProveedores();?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Concepto</label>
                            <select class="form-control custom-select select2" name="concepto" id="concepto">
                                <option value="entrada">Entrada</option>
                                <option value="ajuste">Ajuste</option>
                                <option value="saldo">Saldo Inicial</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Fecha</label>
                            <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="fechaMovimiento" id="fechaMovimiento">
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-9">
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">Producto</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-7 col-md-7">
                        <div class="form-group">
                            <label class="form-label">Producto</label>
                            <select class="form-control" name="idProducto" id="idProducto">
                                <?php $productos = new productos(); $productos -> ctlListProductos();?>
                            </select>
                        </div>
                    </div>
                            
                    <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Lote</label>
                            <input type="text" class="form-control" name="lote" id="lote">
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Cantidad</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="" >
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Medida</label>
                            <select class="form-control custom-select select2" name="medida" id="medida" >
                                <option value="Kgs">Kgs</option>
                                <option value="Pzas">Piezas</option>
                                
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Costo Unitario</label>
                            <input type="text" class="form-control" name="costo" placeholder="" id="costo" >
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1">
                    </div>
                    <div class="col-sm-1 col-md-1">
                        <a href="" type="" id="agregaProductoLista" class="btn btn-success">+</a>
                    </div>
                    <div id="error"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

</div>
</form>

<div class="row" data-select2-id="12">
    <div class="col-lg-12 users-list" data-select2-id="11">
        
        <div class="card">
            <div class="card-body">
                <div class="user-tabel table-responsive border-top">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="productos" id="productosBD">
                        </div>
                    </div>
                    

                    <!-- <table class="table card-table table-bordered table-hover table-vcenter text-nowrap">
                        <tbody class="text-center">
                            <tr>
                                <th>Producto</th>
                                <th>Lote</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th></th>
                            </tr>
                        </tbody>
                    </table> -->
                    
                    <table class="table card-table table-bordered table-hover table-vcenter text-nowrap">
                        <tbody class="text-left" id="productsTable">
                            <tr>
                                <td><a href="userprofile.html" class="text-dark">Jane Pearson</a></td>
                                <td> M-001</td>
                                <td> 1000 kgs</td>
                                <td>10.5</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-red btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<?php
    $registro = new usuarios();
    $registro -> ctrRegistra();
?>

