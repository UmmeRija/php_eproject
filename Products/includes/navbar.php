<!-- TOPBAR -->
<header class="topbar" data-navbarbg="skin5">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin5">
      <a class="navbar-brand" href="../dashboard.php">
        <b class="logo-icon p-l-10">
          <!-- FIXED IMAGE PATH -->
          <img src="../assets/images/logo-icon.png" alt="homepage" class="light-logo" />
        </b>
        <span class="logo-text">
          <!-- FIXED IMAGE PATH -->
          <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" />
        </span>
      </a>
      <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)">
        <i class="ti-more"></i>
      </a>
    </div>

    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
      <ul class="navbar-nav float-left mr-auto">
        <li class="nav-item d-none d-md-block">
          <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
            <i class="mdi mdi-menu font-24"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
            <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item search-box">
          <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
          <form class="app-search position-absolute">
            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
          </form>
        </li>
      </ul>

      <ul class="navbar-nav float-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown">
            <img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
          </a>
          <div class="dropdown-menu dropdown-menu-right user-dd animated">
            <a class="dropdown-item" href="#"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
            <a class="dropdown-item" href="#"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
            <a class="dropdown-item" href="#"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- SIDEBAR -->
<aside class="left-sidebar" data-sidebarbg="skin5">
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="p-t-30">
        <li class="sidebar-item"><a class="sidebar-link" href="../dashboard.php"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="../Product/product.php"><i class="mdi mdi-calendar-check"></i><span class="hide-menu">Appointments</span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="../products/insert.php"><i class="mdi mdi-cart-outline"></i><span class="hide-menu">Products</span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="../orders.php"><i class="mdi mdi-clipboard-list-outline"></i><span class="hide-menu">Inventory</span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="../feedback.php"><i class="mdi mdi-cash-register"></i><span class="hide-menu">Billing</span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="../users.php"><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">Clients</span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="../stylists/list.php"><i class="mdi mdi-account-star"></i><span class="hide-menu">Stylists</span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="../feedback/list.php"><i class="mdi mdi-message-text-outline"></i><span class="hide-menu">Feedback</span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="../Product/product.php"><i class="mdi mdi-account-voice"></i><span class="hide-menu">Reception</span></a></li>
      </ul>
    </nav>
  </div>
</aside>

