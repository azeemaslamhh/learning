<!-- style="background: linear-gradient(-45deg,rgba(147,26,222,0.83) 0%,rgba(28,206,234,0.82)" -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary">
    <!-- elevation-4 -->
    <!-- Brand Logo -->
    <a class="brand-link text-white">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Education Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2 mt-2" alt="User Image">
            </div>
            <div class="info">

                <a href="#" class="d-block  text-white">{{ Auth::user()->name }} <br />
                    {{ Auth::user()->roles->first()->name }}
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-tachometer-alt  text-white"></i>
                        <p class="text-white">
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{ Route::is('blog_posts.index', 'blog_posts.create', 'blog_post_categories.index', 'blog_post_tags.index') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-columns text-white" aria-hidden="true"></i>
                        <p class="text-white">
                            Blogs
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('blog_posts.index') }}" class="nav-link  {{ Route::is('blog_posts.index') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                <p class="nav-link.active">Manage Blogs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog_posts.create') }}" class="nav-link {{ Route::is('blog_posts.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="nav-link.active">Add Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog_post_categories.index') }}" class="nav-link {{ Route::is('blog_post_categories.index') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>
                                <p class="nav-link.active">Blog Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog_post_tags.index') }}" class="nav-link {{ Route::is('blog_post_tags.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tag text-danger"></i>
                                <p class="nav-link.active">Blog Tags</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Pages -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file text-white" aria-hidden="true"></i>
                        <p class="text-white">
                            Pages
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>
                                <p class="nav-link.active"> Add Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="nav-link.active">All Page</p>
                            </a>
                        </li>
                    </ul>
                </li> -->



                <li class="nav-item">
                    <a href="#" class="nav-link {{ Route::is('problem_lists.index', 'problem_lists.create', 'categories.index', 'get.comments','quizzes.index','input_field_types.index') ? 'active' : '' }}">
                        <i class="nav-icon nav-icon fa fa-building  text-white"></i>
                        <p class="text-white">
                            Questions
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('problem_lists.index') }}" class="nav-link {{ Route::is('problem_lists.index') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-briefcase text-primary" aria-hidden="true"></i>
                                <p class="nav-link.active">Manage Questions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('problem_lists.create') }}" class="nav-link {{ Route::is('problem_lists.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-edit text-warning"></i>

                                <p class="nav-link.active">Add new Question</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link {{ Route::is('categories.index') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>
                                <p class="nav-link.active">Question Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('get.comments') }}" class="nav-link {{ Route::is('get.comments') ? 'active' : '' }}">
                                <i class=" fa fa-comments nav-icon text-danger"></i>
                                <p class="text-white">Comments</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon  fa fa-clipboard text-warning"></i>
                                <p class="text-white">Import Quizzes</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{ route('quizzes.index') }}" class="nav-link {{ Route::is('quizzes.index') ? 'active' : '' }}">
                                <i class="nav-icon  fa fa-clipboard text-warning"></i>
                                <p class="text-white">Quizzes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('input_field_types.index') }}" class="nav-link {{ Route::is('input_field_types.index') ? 'active' : '' }}">
                                <i class=" nav-icon fa fa-dot-circle text-success"></i>
                                <p class="text-white">Input Field Types</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Course -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-server text-white" aria-hidden="true"></i>

                        <p class="text-white">
                            Course
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('courses.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                <p class="text-white">Manage Course</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('courses.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="text-white">Add Course</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course_categories.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                <p class="text-white">Course Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course_tags.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tag text-danger"></i>
                                <p class="text-white">Course Tags</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course_instructors.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tag text-danger"></i>
                                <p class="text-white">Course Instructors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course_videos.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tag text-danger"></i>
                                <p class="text-white">Course Videos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Classified -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-briefcase text-white" aria-hidden="true"></i>

                        <p class="text-white">
                            Classified
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                <p class="nav-link.active">Manage Classified</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="nav-link.active">Add Classified</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>
                                <p class="nav-link.active">Classified Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tag text-danger"></i>
                                <p class="nav-link.active">Classified Tags</p>
                            </a>
                        </li>

                    </ul>
                </li> -->


                <!-- Jobs -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-archive text-white" aria-hidden="true"></i>

                        <p class="text-white">
                            Jobs
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                <p class="nav-link.active">Manage Jobs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>
                                <p class="nav-link.active">Job Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-briefcase text-white" aria-hidden="true"></i>

                                <p class="nav-link.active">
                                    Job Emplyoer
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                        <p class="nav-link.active">Name</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>
                                        <p class="nav-link.active">logo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>
                                        <p class="nav-link.active">Contact Detail</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>
                                        <p class="nav-link.active">Details</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-briefcase text-white" aria-hidden="true"></i>
                                <p class="nav-link.active">
                                    Applied Jobs
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                        <p class="nav-link.active">Name</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                        <p class="nav-link.active">Location</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                        <p class="nav-link.active">Job apply</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>
                                        <p class="nav-link.active">CV</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>
                                        <p class="nav-link.active">Job Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-briefcase text-white" aria-hidden="true"></i>

                                        <p class="nav-link.active">
                                            Emplyoee
                                            <i class="right fas fa-angle-right"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview ">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                                <p class="nav-link.active">Emplyoee Status</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <!-- Appearance -->
                <!-- 
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-building text-white" aria-hidden="true"></i>

                        <p class="text-white">
                            Appearance
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                   <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                <p class="nav-link.active"> Themes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="nav-link.active">Menu</p>
                            </a>
                        </li>
                    </ul> -->
                </li>
                <!-- Plugins -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-plug text-white" aria-hidden="true"></i>
                        <p class="text-white">
                            Plugins
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>
                                <p class="nav-link.active"> Add On Plugins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="nav-link.active">Installed Plugins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-hourglass text-success" aria-hidden="true"></i>
                                <p class="nav-link.active">All Plugins</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <li class="nav-item">
                    <a href="#" class="nav-link {{ Route::is('post_types.index', 'post_types.create') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-tasks text-white" aria-hidden="true"></i>

                        <p class="text-white">
                            User's Home
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('post_types.index') }}" class="nav-link {{ Route::is('post_types.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table text-primary"></i>

                                <p class="nav-link.active">Manage Types</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('post_types.create') }}" class="nav-link {{ Route::is('post_types.create') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="nav-link.active">Add new Type</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{ Route::is('users.index', 'users.create') ? 'active' : '' }}">

                        <i class="nav-icon fa fa-user-circle text-white"></i>
                        <p class="text-white">
                            Users
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{ Route::is('users.index') ? 'active' : '' }}">

                                <i class="nav-icon fa fa-users text-primary" aria-hidden="true"></i>

                                <p class="nav-link.active">Manage Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link {{ Route::is('users.create') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-user-plus text-warning" aria-hidden="true"></i>
                                <p class="nav-link.active">Add new User</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- Settings -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cog text-white" aria-hidden="true"></i>
                        <p class="text-white">
                            Settings
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>
                                <p class="nav-link.active"> Permalinks</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="nav-link.active">Reading</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>







        </nav>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex ">

        </div>
    </div>
</aside>

<style>
    .nav-link.active {
        color: #343a40 !important;
    }
</style>