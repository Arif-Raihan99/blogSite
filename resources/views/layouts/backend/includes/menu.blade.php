<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('/') }}backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ isset(Auth::user()->profile->image) ? asset(Auth::user()->profile->image) : asset('/backend/dist/img/pp.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('self.profile', ['id' => Auth::user()->id]) }}" class="d-block text-decoration-none">{{ Auth::user()->name }}</a>
                <div class="row">
                    @if(!isset($check))
                        <div class="col-md-6">
                            <a href="{{ route('profiles.create') }}" class="btn-sm btn-outline-secondary"><i class="fa fa-plus-circle"></i></a>
                        </div>
                    @elseif(isset($check->address))

                        <div class="col-md-6">
                            <a href="{{ route('profiles.edit', Auth::user()->id) }}" class="btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <div class="row">
                        <div class="col-md-8 mx-auto btn text-center">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button>Log Out</button>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profiles.index') }}" class="nav-link ">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Manage Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('comments.index') }}" class="nav-link ">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Manage Comment</p>
                    </a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('manageUsers.index') }}" class="nav-link ">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Manage User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Role
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-3">
                        <li class="nav-item">
                            <a href="{{ route('roles.create') }}" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Create Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="far fa-file nav-icon"></i>
                                <p>Manage Role</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-3">
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Create Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link ">
                                <i class="far fa-file nav-icon"></i>
                                <p>Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Subcategory
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-3">
                        <li class="nav-item">
                            <a href="{{ route('subcategories.create') }}" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Create Subcategory</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subcategories.index') }}" class="nav-link ">
                                <i class="far fa-file nav-icon"></i>
                                <p>Manage Subcategory</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-3">
                        <li class="nav-item">
                            <a href="{{ route('blogs.create') }}" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Create Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blogs.index') }}" class="nav-link ">
                                <i class="far fa-file nav-icon"></i>
                                <p>Manage Blog</p>
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
