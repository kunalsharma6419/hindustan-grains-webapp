 <nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
	  <li class="nav-item">
	    <a class="nav-link" href="{{route('admin.dashboard')}}">
	      <i class="mdi mdi-pulse menu-icon"></i>
	      <span class="menu-title">Dashboard</span>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="{{route('invoice_list')}}">
	      <i class="mdi mdi-format-list-bulleted menu-icon"></i>
	      <span class="menu-title">Invoice List</span>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="{{route('payment_list_status')}}">
	      <i class="mdi mdi-store menu-icon"></i>
	      <span class="menu-title">Payment Status List</span>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="{{route('product.index')}}">
	      <i class="mdi mdi-view-list menu-icon"></i>
	      <span class="menu-title">Product List</span>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="{{route('promoter.index')}}">
	      <i class="mdi mdi-account menu-icon"></i>
	      <span class="menu-title">Promoter List</span>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="{{route('user.index')}}">
	      <i class="mdi mdi-account-multiple-plus menu-icon"></i>
	      <span class="menu-title">User</span>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="{{route('calculations.index')}}">
	      <i class="mdi mdi-calculator menu-icon"></i>
	      <span class="menu-title">Packaging Calculator</span>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="{{route('product.profitLossPage')}}">
	      <i class="mdi mdi-apple-keyboard-option menu-icon"></i>
	      <span class="menu-title">Products Stats</span>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="{{route('profitLossPage')}}">
	      <i class="mdi mdi-chart-bar menu-icon"></i>
	      <span class="menu-title">Profit Loss</span>
	    </a>
	  </li>
	 
	  <li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
		  <i class="menu-icon mdi mdi-web"></i>
		  <span class="menu-title">Website</span>
		  <i class="menu-arrow"></i> 
		</a>
		<div class="collapse" id="ui-basic">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">Categories</a></li>
			<li class="nav-item"><a class="dropdown-item" href="{{route('category-product.index')}}">Products</a></li>
			<li class="nav-item"><a class="dropdown-item" href="">Orders</a></li>
			<li class="nav-item"><a class="dropdown-item" href="">Payments</a></li>
		  </ul>
		</div>
	  </li>
	  
	</ul>
</nav>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


