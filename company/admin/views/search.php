<div class="page-header">
    <h4 class="page-title">Recepcion de Clientes</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Inicio</li>
    </ol>
</div>

<div class="row">
<div class="col-xl-4 col-lg-6 col-md-8">
    <div class="card m-b-20">
        <div class="card-header">
            <h3 class="card-title">Búsquedas</h3>

        </div>
        <div class="card-body">
            <form action="busca.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="searchBox" oninput=buscaJS(this.value)  placeholder="Busque aqui">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<div id="misResultados">
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cliente</h3>
                </div>
                <div class="card-body" id="resultados"></div>
            </div>
        </div>
    </div>
</div>

