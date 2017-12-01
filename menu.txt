<?php  
$mod = (isset($_GET['mod'])? $_GET['mod'] : '');
$sub = (isset($_GET['sub'])? $_GET['sub'] : '');


?>

	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li <?php echo ($mod == 'dashboard'? 'class="active"' : ''); ?> ><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" <?php echo ($mod == 'dashboard'? 'style="display: block;"' : ''); ?> >
            <li <?php echo ($sub == 'plantilla'? 'class="current-page"' : ''); ?> ><a href="?mod=dashboard&sub=plantilla">Dashboard</a></li>
          </ul>
        </li>
<!--
        <li <?php echo ($mod == 'forms'? 'class="active"' : ''); ?> ><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" <?php echo ($mod == 'forms'? 'style="display: block;"' : ''); ?> >
            <li <?php echo ($sub == 'formulario'? 'class="current-page"' : ''); ?> ><a href="?mod=forms&sub=formulario">General Form</a></li>
            <li <?php echo ($sub == 'liquidador'? 'class="current-page"' : ''); ?> ><a href="?mod=forms&sub=liquidador">Liquidador</a></li>
          </ul>
        </li>
-->
        <li <?php echo ($mod == 'cotizaciones'? 'class="active"' : ''); ?> ><a><i class="fa fa-desktop"></i> Cotizaciones <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" <?php echo ($mod == 'cotizaciones'? 'style="display: block;"' : ''); ?> >
          <li <?php echo ($sub == 'cotizador'? 'class="current-page"' : ''); ?> ><a href="?mod=cotizaciones&sub=cotizador">Cotizador</a></li>
            <li><a href="#">Cotización detallada</a></li>
            <li><a href="#">Cotizaciones generadas</a></li>            
            <li <?php echo ($sub == 'clientes'? 'class="current-page"' : ''); ?> ><a href="?mod=cotizaciones&sub=clientes">Clientes</a></li>
          </ul>
        </li>

        <li <?php echo ($mod == 'almacen'? 'class="active"' : ''); ?> ><a><i class="fa fa-archive"></i> Almacen <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" <?php echo ($mod == 'almacen'? 'style="display: block;"' : ''); ?> >
            <li <?php echo ($sub == 'productosservicios'? 'class="current-page"' : ''); ?> ><a href="?mod=almacen&sub=productosservicios">Productos y Servicios</a></li>
            <li <?php echo ($sub == 'proveedores'? 'class="current-page"' : ''); ?> ><a href="?mod=almacen&sub=proveedores">Proveedores</a></li>
            <li <?php echo ($sub == 'entradaalmacen'? 'class="current-page"' : ''); ?> ><a href="?mod=almacen&sub=entradaalmacen">Entrada de almacen</a></li>
            <li <?php echo ($sub == 'salidaalmacen'? 'class="current-page"' : ''); ?> ><a href="?mod=almacen&sub=salidaalmacen">Salida de almacen</a></li>
            <li <?php echo ($sub == 'conceptos'? 'class="current-page"' : ''); ?> ><a href="?mod=almacen&sub=conceptos">Conceptos de almacen</a></li>
          </ul>
        </li>

        <li <?php echo ($mod == 'produccion'? 'class="active"' : ''); ?> ><a><i class="fa fa-table"></i> Producción <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" <?php echo ($mod == 'produccion'? 'style="display: block;"' : ''); ?> >
            <li <?php echo ($sub == 'ordenproduccion'? 'class="current-page"' : ''); ?> ><a href="?mod=produccion&sub=ordenproduccion">Crear orden</a></li>
            <li <?php echo ($sub == 'ordenesproduccion'? 'class="current-page"' : ''); ?> ><a href="?mod=produccion&sub=ordenesproduccion">Órdenes de producción</a></li>
            
          </ul>
        </li>

        <li <?php echo ($mod == 'nomina'? 'class="active"' : ''); ?> ><a><i class="fa fa-table"></i> Nomina <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" <?php echo ($mod == 'nomina'? 'style="display: block;"' : ''); ?> >
            <li <?php echo ($sub == 'liquidador'? 'class="current-page"' : ''); ?> ><a href="?mod=nomina&sub=liquidador">Liquidador</a></li>
            <li><a href="#">Anticipos</a></li>
            <li <?php echo ($sub == 'empleados'? 'class="current-page"' : ''); ?> ><a href="?mod=nomina&sub=empleados">Empleados</a></li>
            <li><a href="#">Informe de nomina</a></li>
            <li><a href="#">Colillas de pago</a></li>
            <li><a href="#">Deducciones</a></li>
            <li <?php echo ($sub == 'parametrosnomina'? 'class="current-page"' : ''); ?> ><a href="?mod=nomina&sub=parametrosnomina">Parámetros de nomina</a></li>
          </ul>
        </li>

        <li><a><i class="fa fa-bar-chart-o"></i> Facturación <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="?mod=facturacion&sub=nuevaventa">Ventas</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-clone"></i> Inventario <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          <!--
            <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
            <li><a href="fixed_footer.html">Fixed Footer</a></li>
          -->
          </ul>
        </li>
        <li><a><i class="fa fa-cogs"></i> Sistema <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          
            <li><a href="?mod=sistema&sub=usuarios">Usuarios</a></li>
            <li><a href="?mod=sistema&sub=roles">Roles</a></li>
          <!--  <li><a href="fixed_footer.html">Fixed Footer</a></li>
          -->
          </ul>
        </li>
      </ul>
    </div>
<!--
    <div class="menu_section">
      <h3>Live On</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="e_commerce.html">E-commerce</a></li>
            <li><a href="projects.html">Projects</a></li>
            <li><a href="project_detail.html">Project Detail</a></li>
            <li><a href="contacts.html">Contacts</a></li>
            <li><a href="profile.html">Profile</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="page_403.html">403 Error</a></li>
            <li><a href="page_404.html">404 Error</a></li>
            <li><a href="page_500.html">500 Error</a></li>
            <li><a href="plain_page.html">Plain Page</a></li>
            <li><a href="login.html">Login Page</a></li>
            <li><a href="pricing_tables.html">Pricing Tables</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
              <li><a href="#level1_1">Level One</a>
              <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="level2.html">Level Two</a>
                  </li>
                  <li><a href="#level2_1">Level Two</a>
                  </li>
                  <li><a href="#level2_2">Level Two</a>
                  </li>
                </ul>
              </li>
              <li><a href="#level1_2">Level One</a>
              </li>
          </ul>
        </li>                  
        <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
      </ul>
    </div>
-->
  </div>