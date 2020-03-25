<?php 
if(isset($_SESSION['userId']))
{
    require_once "./Model/php/msgTools.php";
    require_once "./Model/php/loginTools.php";
    $message = new msgTools(); 
    $lookupUser = new loginTools(); 
    date_default_timezone_set("America/Chicago");
    //$message->sendUserMsg("2", "this is a test", date("H:i"), "9");
    $msg = $message->lookupUsersMsgs(2);
    echo $msg;
}
?>
<!-- Dropdown - Messages -->
<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
    <div class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
        <input type="text" id = "searchBoxXS" class="form-control bg-light border-0 small" placeholder="Search for a Movie or TV show" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button id = "searchBtnXS" class="searchBtn btn btn-primary" type="button">
            <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
        </div>
    </div>
</div>

<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-envelope fa-fw"></i>
    <!-- Counter - Messages -->
    <span class="badge badge-danger badge-counter">7</span>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header">
        Friends PM's
    </h6>
    <?php
     echo '
        <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
        <img class="rounded-circle" src="view/img/MattR.jpg" alt="">
        <div class="status-indicator bg-success"></div>
        </div>
        <div class="font-weight-bold">
        <div class="text-truncate">'.$msg[2].'</div>
        <div class="small text-gray-500"> From:'.$lookupUser->lookupUser($msg[0]).' @ '.$msg[3].'</div>
        </div>
        </a>
       ';
    ?>
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
        <img class="rounded-circle" src="view/img/MattR.jpg" alt="">
        <div class="status-indicator bg-success"></div>
        </div>
        <div class="font-weight-bold">
        <div class="text-truncate">This is where you messages will go!</div>
        <div class="small text-gray-500">Matt R · 58m</div>
        </div>
    </a>
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
        <img class="rounded-circle" src="view/img/MattR.jpg" alt="">
        <div class="status-indicator"></div>
        </div>
        <div>
        <div class="text-truncate">This is where you messages will go!</div>
        <div class="small text-gray-500">Matt R · 1d</div>
        </div>
    </a>
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
        <img class="rounded-circle" src="view/img/MattR.jpg" alt="">
        <div class="status-indicator bg-warning"></div>
        </div>
        <div>
        <div class="text-truncate">This is where you messages will go!</div>
        <div class="small text-gray-500">Matt R · 2d</div>
        </div>
    </a>
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
        <img class="rounded-circle" src="view/img/MattR.jpg" alt="">
        <div class="status-indicator bg-success"></div>
        </div>
        <div>
        <div class="text-truncate">This is where you messages will go!</div>
        <div class="small text-gray-500">Matt R · 2w</div>
        </div>
    </a>
    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
    </div>
</li>
