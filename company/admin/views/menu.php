<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar doc-sidebar">
					<div class="app-sidebar__user clearfix">
						<div class="dropdown user-pro-body">
							<div>
								<img src="assets/images/faces/1.jpg" alt="user-img" class="avatar avatar-lg brround">
								<a href="index.php?page=userEdit&idEditar=<?php echo $_SESSION["id"]?>" class="profile-img">
									<span class="fa fa-pencil" aria-hidden="true"></span>
								</a>
							</div>
							<div class="user-info">
								<h2><?php echo $_SESSION["nombre"]; ?></h2>
								<span><?php echo $_SESSION["permisos"]; ?></span>
							</div>
						</div>
					</div>
					<ul class="side-menu">

						<li class="slide <?php if ($pagina == 'inicio') echo 'is-expanded'; ?>">
							<a class="side-menu__item <?php if ($pagina == 'inicio') echo 'active'; ?>" 
							href="index.php?page=inicio"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Home</span></a>
						</li>

						<!-- <li class="slide <?//php if ($pagina == 'search') echo 'is-expanded'; ?>">
							<a class="side-menu__item <?//php if ($pagina == 'search') echo 'active'; ?>" href="index.php?page=search"><i class="side-menu__icon fa fa-search"></i><span class="side-menu__label">Busca</span></a>
						</li> -->

						<!-- <li class="slide <?//php if ($pagina == 'venta') echo 'is-expanded'; ?>">
							<a class="side-menu__item <?//php if ($pagina == 'venta') echo 'active'; ?>" href="index.php?page=venta"><i class="side-menu__icon fa fa-money"></i><span class="side-menu__label">venta</span></a>
						</li> -->


						<!-- <li class="slide <?//  php if ($pagina == 'ventaList' || $pagina == 'venta' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item <?// php if ($pagina == 'userAdd' || $pagina == 'userList' ) echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Ventas</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?// php if ($pagina == 'venta') echo 'active'; ?>" href="index.php?page=venta">Registrar</a></li>
								<li><a class="slide-item <?// php if ($pagina == 'ventaList') echo 'active'; ?>" href="index.php?page=ventaList">Lista de ventas</a></li>
							</ul>
						</li> -->

						<li class="slide <?php if ($pagina == 'userAdd' || $pagina == 'userList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item 
								<?php if ($pagina == 'userAdd' || $pagina == 'userList' ) 
										echo 'active'; ?>" data-toggle="slide" href="#">
										<i class="side-menu__icon icon icon-people"></i>
										<span class="side-menu__label">Usuarios</span>
										<i class="angle fa fa-angle-right"></i>
							</a>
							<ul class="slide-menu">
								<li><a class="slide-item 
									<?php if ($pagina == 'userAdd') 
											echo 'active'; ?>" href="index.php?page=userAdd">Agregar</a>
								</li>
								<li><a class="slide-item 
									<?php if ($pagina == 'userList') 
											echo 'active'; ?>" href="index.php?page=userList">Lista</a>
								</li>

							</ul>
						</li>


						<li class="slide <?php if ($pagina == 'socioAdd' || $pagina == 'socioList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item 
								<?php if ($pagina == 'socioAdd' || $pagina == 'socioList' ) 
										echo 'active'; ?>" data-toggle="slide" href="#">
										<i class="side-menu__icon icon icon-people"></i>
										<span class="side-menu__label">Clientes</span>
										<i class="angle fa fa-angle-right"></i>
							</a>
							<ul class="slide-menu">
								<li><a class="slide-item 
									<?php if ($pagina == 'socioAdd') 
											echo 'active'; ?>" href="index.php?page=socioAdd">Agregar</a>
								</li>
								<li><a class="slide-item 
									<?php if ($pagina == 'socioList') 
											echo 'active'; ?>" href="index.php?page=socioList">Lista</a>
								</li>

							</ul>
						</li>

						<li class="slide <?php if ($pagina == 'proveedorAdd' || $pagina == 'proveedorList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item 
								<?php if ($pagina == 'proveedorAdd' || $pagina == 'proveedorList' ) 
										echo 'active'; ?>" data-toggle="slide" href="#">
										<i class="side-menu__icon icon icon-people"></i>
										<span class="side-menu__label">Proveedores</span>
										<i class="angle fa fa-angle-right"></i>
							</a>
							<ul class="slide-menu">
								<li><a class="slide-item 
									<?php if ($pagina == 'proveedorAdd') 
											echo 'active'; ?>" href="index.php?page=proveedorAdd">Agregar</a>
								</li>
								<li><a class="slide-item 
									<?php if ($pagina == 'proveedorList') 
											echo 'active'; ?>" href="index.php?page=proveedorList">Lista</a>
								</li>

							</ul>
						</li>


						<!-- <li class="slide <?//php if ($pagina == 'socioAdd' || $pagina == 'socioList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item <?//php if ($pagina == 'socioAdd' || $pagina == 'socioList' ) echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon icon icon-people"></i><span class="side-menu__label">Socios</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?//php if ($pagina == 'socioAdd') echo 'active'; ?>" href="index.php?page=socioAdd">Registrar</a></li>
								<li><a class="slide-item <?//php if ($pagina == 'socioList') echo 'active'; ?>" href="index.php?page=socioList">Lista de Socios</a></li>

							</ul>
						</li> -->


						<li class="slide <?php if ($pagina == 'productAdd' || $pagina == 'productList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item 
								<?php if ($pagina == 'productAdd' || $pagina == 'productList' ) 
										echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-cubes"></i>
										<span class="side-menu__label">Productos</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php if ($pagina == 'productAdd') echo 'active'; ?>" 
									href="index.php?page=productAdd"><i class="side-menu__icon fa fa-plus-circle"></i>Agregar</a>
								</li>
								<li><a class="slide-item <?php if ($pagina == 'productList') echo 'active'; ?>" 
									href="index.php?page=productList"><i class="side-menu__icon fa fa-list-ul"></i>Lista</a>
								</li>

							</ul>
						</li>

						<li class="slide <?php if ($pagina == 'brandAdd' || $pagina == 'brandList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item 
								<?php if ($pagina == 'brandAdd' || $pagina == 'brandList' ) 
										echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-star"></i>
										<span class="side-menu__label">Marcas</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php if ($pagina == 'brandAdd') echo 'active'; ?>" 
									href="index.php?page=brandAdd"><i class="side-menu__icon fa fa-plus-circle"></i>Agregar</a>
								</li>
								<li><a class="slide-item <?php if ($pagina == 'brandList') echo 'active'; ?>" 
									href="index.php?page=brandList"><i class="side-menu__icon fa fa-list-ul"></i>Lista</a>
								</li>

							</ul>
						</li>

						<li class="slide <?php if ($pagina == 'eqTypeAdd' || $pagina == 'eqTypeList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item 
								<?php if ($pagina == 'eqTypeAdd' || $pagina == 'eqTypeList' ) 
										echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-train"></i>
										<span class="side-menu__label">Categorías</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php if ($pagina == 'eqTypeAdd') echo 'active'; ?>" 
									href="index.php?page=eqTypeAdd"><i class="side-menu__icon fa fa-plus-circle"></i>Agregar</a>
								</li>
								<li><a class="slide-item <?php if ($pagina == 'eqTypeList') echo 'active'; ?>" 
									href="index.php?page=eqTypeList"><i class="side-menu__icon fa fa-list-ul"></i>Lista</a>
								</li>

							</ul>
						</li>
						

                        <hr>

						
					</ul>

				</aside>