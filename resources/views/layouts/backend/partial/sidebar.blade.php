<<<<<<< HEAD
 <!-- Left side column. contains the sidebar -->
 <aside class="main-sidebar">
   <!-- sidebar -->
   <div class="sidebar">
      <!-- sidebar menu -->
      <ul class="sidebar-menu">
         <li class="active">
            <a href="index.html"><i class="fa fa-tachometer"></i><span>Dashboard</span>
            <span class="pull-right-container">
            </span>
            </a>
         </li>
         <li class="treeview">
            <a href="#">
            <i class="fa fa-product-hunt"></i><span>Products</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="add-customer.html">Add Product</a></li>
               <li><a href="clist.html">View Products</a></li>
              
            </ul>
         </li>
      
      </ul>
   </div>
   <!-- /.sidebar -->
=======
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
            <div class="email">john.doe@example.com</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{Auth::user()->role->id ==1 ? route('admin.settings') : route('author.settings')}}"><i class="material-icons">settings</i>Settings</a></li>
                 
                    <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">

        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            @if(Request::is('admin*'))
            <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{Request::is('admin/tag*') ? 'active' : ''}}">
                <a href="{{route('admin.tag.index')}}">
                    <i class="material-icons">label</i>
                    <span>Tags</span>
                </a>
            </li>
            <li class="{{Request::is('admin/category*') ? 'active' : ''}}">
                <a href="{{route('admin.category.index')}}">
                    <i class="material-icons">label</i>
                    <span>category</span>
                </a>
            </li>
            <li class="{{Request::is('admin/product*') ? 'active' : ''}}">
                <a href="{{route('admin.product.index')}}">
                    <i class="material-icons">shopping_cart</i>
                    <span>Products</span>
                </a>
            </li>
            <li class="{{Request::is('admin/pending/product*') ? 'active' : ''}}">
                <a href="{{route('admin.product.pending')}}">
                    <i class="material-icons">pending</i>
                    <span>Pending Products</span>
                </a>
            </li>
           
            
           <li class="header">System</li>
           <li class="{{Request::is('admin/settings') ? 'active' : ''}}">
            <a href="{{route('admin.settings')}}">
                <i class="material-icons">settings</i>
                <span>Settings</span>
            </a>
        </li>

           <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            <i class="material-icons">input</i>
            <span>Sign Out</span>
            
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
         </li>
         @endif

         @if(Request::is('author*'))
         <li class="{{Request::is('author/dashboard') ? 'active' : ''}}">
             <a href="{{route('author.dashboard')}}">
                 <i class="material-icons">dashboard</i>
                 <span>Dashboard</span>
             </a>
         </li>
         <li class="{{Request::is('author/product*') ? 'active' : ''}}">
            <a href="{{route('author.product.index')}}">
                <i class="material-icons">shopping_cart</i>
                <span>Products</span>
            </a>
        </li>
        
         
        <li class="header">System</li>
        <li class="{{Request::is('author/settings') ? 'active' : ''}}">
            <a href="{{route('author.settings')}}">
                <i class="material-icons">settings</i>
                <span>Settings</span>
            </a>
        </li>

        <li>
         <a class="dropdown-item" href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
         <i class="material-icons">input</i>
         <span>Sign Out</span>
         
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      </li>
      @endif
     </ul>
 </div>
        </ul>
    </div>

    
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
</aside>