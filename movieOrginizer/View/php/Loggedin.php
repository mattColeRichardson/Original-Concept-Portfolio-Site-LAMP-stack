<div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
        <?php echo ucwords($_SESSION['fNameUser'])." ".ucwords($_SESSION['lNameUser']);?> 
        </span>
        <img class="img-profile  rounded-circle" src="View/img/profile.png">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="/movieOrginizer/account">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a  class="dropdown-item" href="/movieOrginizer/friends">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Friends
            </a>
            <a  class="dropdown-item" href="/movieOrginizer/settings">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <div class="dropdown-divider"></div>
            <form action="Controller/php/logout.php" method="POST">
                <button type="submit" class="dropdown-item" href="#" name = "logout-submit">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </button>
            </form>
        </div>
        <!-- Dropdown - User Information !END -->
    </li>
</div>