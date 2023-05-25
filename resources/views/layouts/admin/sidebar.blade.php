<ul class="nav">
    <li class="nav-item profile">
        <div class="profile-desc">
            <div class="profile-pic">
                <div class="count-indicator">
                    <img class="img-xs rounded-circle " src="{{ asset('assets/images/faces/face15.jpg') }}" alt="">
                    <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                    <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                    <span>Gold Member</span>
                </div>
            </div>
            <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-settings text-primary"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-onepassword  text-info"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-calendar-today text-success"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                    </div>
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('user.index') }}">
            <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Utilisateurs</span>
        </a>
        <a class="nav-link" href="{{ route('categorie.index') }}">
            <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Categories</span>
        </a>
        <a class="nav-link" href="{{ route('plat.index') }}">
            <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Plats</span>
        </a>
        <a class="nav-link" href="{{ route('commande.index') }}">
            <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Commandes</span>
        </a>

    </li>
</ul>
