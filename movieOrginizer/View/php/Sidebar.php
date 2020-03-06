<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!--Brand-->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
            <div class="sidebar-brand-icon rotate-n-15"><!--this is where you change the pic of icon-->
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Movie Orginizer</div>
    </a>
    <!--Divider-->
    <hr class="sidebar-divider my-0">
    <!--Portfolio-->
    <li class="nav-item"> <!--You can set "active"  class for the active window-->
        <a class="nav-link" href="/index">
        <img class="fas fa-fw" src = "View/img/profile.png"/>
        <span>Back to the Portfolio</span></a>
    </li>
    <!--Divider-->
    <hr class="sidebar-divider my-0">
    <!--Movies-->
    <li class="nav-item"> <!--You can set "active"  class for the active window-->
        <a class="nav-link" href="movies">
        <img class="fas fa-fw" src = "View/img/MovieReel.png"/>
        <span>My movies</span></a>
    </li>
    <!--Divider-->
    <hr class="sidebar-divider my-0">
    <!--Shows-->
    <li class="nav-item"> 
            <a class="nav-link" href="shows">
            <img class="fas fa-fw" src = "View/img/TV.png"/>
            <span>My Shows</span></a>
    </li>
    <!--Divider-->
    <hr class="sidebar-divider my-0">
    <!--Account-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Account</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">My account --</h6>
            <a class="collapse-item" href="account">Profile</a>
            <a class="collapse-item" href="friends">Friends</a>
            <a class="collapse-item" href="settings">Settings</a>
        </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>