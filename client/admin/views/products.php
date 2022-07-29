<div class="page-header">
    <h4 class="page-title"></h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"></li>
    </ol>
</div>
<div class="row ">
    <div class="col-lg-8">
        <form class="card" method="POST">
            <div class="card-header">
                <h3 class="card-title">Search</h3>
            </div>
			
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label">Type Name</label>
                            <input type="text" class="form-control" name="txtBuscar" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Brand</label>
                            <select class="form-control custom-select select2" name="filtroMarca" >
								<option value="">--Select--</option>
								<option value="CAT">CAT</option>
								<option value="John Deere">John Deere</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Equipment Type</label>
                            <select class="form-control custom-select select2" name="filtroEqType" >
								<option value="">--Select--</option>
								<option value="Cargadores">Cargadores</option>
								<option value="Tractor">Tractor</option>
                                
                            </select>
                        </div>
                    </div>
					

                </div>
            </div>
			<div class="card-footer text-right">
				<button type="submit" id="login" class="btn btn-primary" name="btnFiltrar">Filter</button>
			</div>

        </form>
    </div>
	
	<div class="col-lg-12 col-xl-12">
		<div class="row productosList">
			<?php
				$lista = new productos();
				$lista -> ctlObtenerProductos();
				$filtro = new productos();
				$filtro -> ctlobtenerProductosFiltrados();
			?>

		</div>
	</div>
</div>