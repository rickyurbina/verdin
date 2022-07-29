//Variables -----------------------------------------------------------
const buscaProd = document.querySelector('#buscaProducto');
const buscaMarca = document.querySelector('#buscaMarca');
const buscaTipo = document.querySelector('#buscaTipo');

let rick = [];
const datosBusqueda = {
    busqueda:'',
    marca:'',
    tipo:''
}

let prodsFiltro= [];


//Events -----------------------------------------------------------

document.addEventListener('DOMContentLoaded', ()=> {
    ejemploFetch();
    //obtenerProductos();
    //console.log(productos);

} );

buscaMarca.addEventListener('change', e=>{
    datosBusqueda.marca = e.target.value;
    filtraProductos();
});

buscaTipo.addEventListener('change', e=>{
    datosBusqueda.tipo = e.target.value;
});





//Functions -----------------------------------------------------------


function obtenerProductos(){
    const url= 'controller/obtenerProductos.php';
    rick = fetch(url)
    .then (respuesta => respuesta.json())
    //.then (resultado => mostratHTML(resultado))
}

function mostratHTML(productos){
    const lista = document.querySelector('.productosList');

    let html='';

    productos.forEach(producto => {
        prodsFiltro.push(producto);
        const {idProducto, name, status, image} = producto;
        html += `
        <div class="col-lg-6 col-xl-3">
				<div class="card item-card">
					<!--<div class="ribbone">
						<span class="ribbon1">
							<span>20%</span>
						</span>
					</div>-->
					<div class="card-body pb-0 h-100">
						<div class="text-center">
							<img src="../../company/admin/${image}" alt="img" class="img-fluid">
						</div>
						<div class="card-body cardbody">
							<div class="cardtitle">
								<span>${producto.eqType}</span>
								<a>${producto.name}</a>
							</div>
							<div class="cardprice">
								<!--<span class="type--strikethrough">$999</span>-->
								<span>Day $ ${producto.dayPrice}</span>
                                <span>Week $ ${producto.weekPrice}</span>
                                <span>Month $ ${producto.monthPrice}</span>
							</div>
						</div>
					</div>
					<div class="text-center border-top">
						<a href="shop-des.html" class="btn btn-success btn-sm mt-4 mb-4"> Rent</a>
						<!--<a href="javascript:void(0)" class="btn btn-success btn-sm mt-4 mb-4"><i class="fa fa-shopping-cart"></i> Add to cart</a>-->
					</div>
				</div>
			</div>
        `
    });

    lista.innerHTML = html;
}  


function filtraProductos(){
    // let resultado = rick.filter ( filtraMarca ) 
    console.log(Object.values(rick).filter(x => x.brand === 'CAT'));
    console.log(resultado);
    //console.log(rick);  
}

function filtraMarca(prod){
    const { marca } = datosBusqueda;
    if( marca ) {
        return prod.marca === marca;
    }
    return prod;
}

function ejemploFetch(){
    const url= 'controller/obtenerProductos.php';
    rick = fetch(url)
        .then (respuesta=>{
            return respuesta.json();
        })
        .then (resultado=>{
            console.log(rick.filter(producto =>  idProducto == "30" ));
        })
        
}