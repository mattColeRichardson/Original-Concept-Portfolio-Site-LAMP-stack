<!-- Topbar Search -->
<div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" id = "movieSearchBox" placeholder="Search for movie or show" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
        <button id="searchBtn" class="btn btn-primary" id = "searchBtn" type="button">
            <i class="fas fa-search fa-sm"></i>
        </button>
        </div>
    </div>
</div>

<!-- Nav Item - Search Dropdown (Visible Only XS) -->
<div class = "navbar-nav">
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class = "fa-fw"> <i class="fas fa-search fa-fw"></i></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <div class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
            <input id = "searchBoxXS" type="text" class="form-control bg-light border-0 small" placeholder="Search by movie title." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button id="searchBtnXS" class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
            </div>
        </div>
        </div>
    </li>
</div>
