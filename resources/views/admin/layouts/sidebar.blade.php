 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="/" class="brand-link text-center">

     <span class="brand-text font-weight-light"><b>User</b></span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="{{ route('home') }}" class="nav-link {{ request()->is('home')?'active':'' }} ">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard

             </p>
           </a>

         </li>
         <li class="nav-item">
           <a href="{{ route('pos') }}" class="nav-link {{ request()->is('pos')?'active':'' }} ">
             <i class="nav-icon fas fa-th"></i>
             <p>POS</p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{ route('sales') }}" class="nav-link {{ request()->is('sales')?'active':'' }} ">
             <i class="nav-icon fas fa-th"></i>
             <p>Sales</p>
           </a>
         </li>
        
         <li class="nav-item" id="purchaseli">
           <a href="#" class="nav-link " id="purchaseA">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Purchase
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview" >
             <li class="nav-item">
               <a href="{{ route('addpurchase') }}" class="nav-link {{ request()->is('addpurchase')?'active':'' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Purchase</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('managpurchase') }}" class="nav-link {{ request()->is('managpurchase')?'active':'' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Manage Purchase</p>
               </a>
             </li>

           </ul>
         </li>
         <li class="nav-item">
           <a href="{{ route('stock') }}" class="nav-link {{ request()->is('stock')?'active':'' }} ">
             <i class="nav-icon fas fa-th"></i>
             <p>Stock</p>
           </a>
         </li>

         <li class="nav-item" id="productli">
           <a href="#" class="nav-link" id="productA">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Products
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview" >
             <li class="nav-item">
               <a href="{{ route('addproduct') }}" class="nav-link {{ request()->is('addproduct')?'active':'' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Product</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('manageproduct') }}" class="nav-link {{ request()->is('manageproduct')?'active':'' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Manage Products</p>
               </a>
             </li>

           </ul>
         </li>


         <li class="nav-item" id="categoryli">
           <a href="#" class="nav-link" id="categoryA">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Categorys
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview" >
             <li class="nav-item">
               <a href="{{ route('addcategory') }}" class="nav-link {{ request()->is('addcategory')?'active':'' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Category</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('managecategory') }}" class="nav-link {{ request()->is('managecategory')?'active':'' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Manage Categorys</p>
               </a>
             </li>

           </ul>
         </li>

         <li class="nav-item  " id="brandli" >
           <a href="#" class="nav-link " id="brandA">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Brands
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview" >
             <li class="nav-item">
               <a href="{{ route('newbrand') }}" class="nav-link {{ request()->is('newbrand')?'active':'' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Brand</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('managebrand') }}" class="nav-link {{ request()->is('managebrand')?'active':'' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Manage Brand</p>
               </a>
             </li>

           </ul>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>