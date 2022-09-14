<div class="page-header">
	<h4 class="page-title">Stock List</h4>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Stock Admin</a></li>
		<li class="breadcrumb-item active" aria-current="page">Stock List</li>
	</ol>
</div>

<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">Pedidos</div>

		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="hover table-bordered border-top-0 border-bottom-0" style="text-align: center;">
					<thead>
						<td>Orden</td>
						<td>Cliente</td>
						<td>Fecha</td>
						<td>Monto</td>
						<td>opciones</td>
					</thead>
					<tbody>
						<?php
							$lista = new Salidas();
							$lista -> ctrListaSalidas();
							$lista -> ctrBorrarSalida();
						?>
						
					</tbody>
					<tfoot>
						<tr>
							<td>Orden</td>
							<td>Cliente</td>
							<td>Fecha</td>
							<td>Monto</td>
							<td>opciones</td>
						</tr>
					</tfoot>
				</table>

			</div>
		</div>
	</div>
</div>