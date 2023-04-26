<div class="menu-block customscroll">
    <div class="sidebar-menu">
        <ul id="accordion-menu">
            <li class="dropdown">
                <a class="dropdown-toggle no-arrow" href="{{ route('admin.home') }}">
                    <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-diagram"></span><span class="mtext">Services</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('admin.service.create') }}">Create Services</a></li>
                    <li><a href="{{ route('admin.service.index') }}">
                            List Of Services</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-file3"></span><span class="mtext">Categories</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('admin.categorie.create') }}">Create categories</a></li>
                    <li><a href="{{ route('admin.categorie.index') }}">
                            List Of categories</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-edit2"></span><span class="mtext">Projets</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('admin.project.create') }}">
                            Create Projet</a></li>
                    <li><a href="{{ route('admin.project.index') }}">
                            List Of Projet</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-file-3"></span><span class="mtext">Photos</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('admin.photo.create') }}">
                            Create Photo</a></li>
                    <li><a href="{{ route('admin.photo.index') }}">
                            List Of Photos</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle no-arrow" href="{{ route('admin.message.index') }}">
                    <span class="micon dw dw-chat3"></span><span class="mtext">Messages</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-user"></span><span class="mtext">Users</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('admin.user.create') }}">
                            Create User</a></li>
                    <li><a href="{{ route('admin.user.index') }}">
                            List Of User</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
