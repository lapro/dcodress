<ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{!! url('backoffice/users')!!}"> <i class="fa fa-user"></i> Users</a></li>
            <li><a href="{!! url('backoffice/products')!!}"><i class="fa fa-list"></i> Products</a></li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Invoices</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li class="active"><a href="{!! url('backoffice/products')!!}"> <i class="fa fa-circle-o"></i> <span>Semua</span>
                </a>
                </li>
                 <li><a href="#">
                	<a href="{!! url('backoffice/products')!!}">
                <i class="fa fa-circle-o"></i> <span>Belum Membayar</span>
              </a></li>
                <li><a href="#">
                	<a href="{!! url('backoffice/products')!!}">
                <i class="fa fa-circle-o"></i> <span>Sudah Membayar</span>
              </a></li>
               <li><a href="#">
                	<a href="{!! url('backoffice/products')!!}">
                <i class="fa fa-circle-o"></i> <span>Pengiriman</span>
              </a></li>
               <li><a href="#">
                	<a href="{!! url('backoffice/products')!!}">
                <i class="fa fa-circle-o"></i> <span>Selesai</span>
              </a></li>
                
              </ul>
            </li>
              
</ul>