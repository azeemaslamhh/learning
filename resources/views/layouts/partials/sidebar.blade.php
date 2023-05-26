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
                    <a href="/home" class="nav-link">
                        <i class="nav-icon fa fa-tachometer-alt  text-white"></i>

                        <p class="text-white">
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-columns text-white" aria-hidden="true"></i>

                        <p class="text-white">
                            Blogs
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/blog_posts" class="nav-link">
                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                <p class="text-white">Manage Blogs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/blog_posts/create" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="text-white">Add Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/blog_post_categories" class="nav-link">
                                <!-- <i class="nav-icon fas fa-layer-group text-success"></i> -->
                                <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                <p class="text-white">Blog Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/blog_post_tags" class="nav-link">
                                <i class="nav-icon fas fa-tag text-danger"></i>
                                <p class="text-white">Blog Tags</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
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
                                <p class="text-white"> Add Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="text-white">All Page</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon nav-icon fa fa-building  text-white"></i>
                        <p class="text-white">
                            Questions
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/problem_lists" class="nav-link">
                                <i class="nav-icon fa fa-briefcase text-primary" aria-hidden="true"></i>
                                <p class="text-white">Manage Questions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/problem_lists" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>

                                <p class="text-white">Add new Question</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/categories" class="nav-link">
                                <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>
                                <p class="text-white">Question Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/comments" class="nav-link">
                                <i class=" fa fa-comments nav-icon text-danger"></i>
                                <p class="text-white">Comments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon  fa fa-clipboard text-warning"></i>
                                <p class="text-white">Import Quizzes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/quizzes" class="nav-link">
                                <i class="nav-icon  fa fa-clipboard text-warning"></i>
                                <p class="text-white">Quizzes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/input_field_types" class="nav-link">
                                <i class=" nav-icon fa fa-dot-circle text-success"></i>
                                <p class="text-white">Input Field Types</p>
                            </a>
                        </li>
                    </ul>
                </li>



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
                            <a href="/courses" class="nav-link">
                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                <p class="text-white">Manage Course</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/courses/create" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="text-white">Add Course</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/course_categories" class="nav-link">
                                <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                <p class="text-white">Course Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/course_tags" class="nav-link">
                                <i class="nav-icon fas fa-tag text-danger"></i>
                                <p class="text-white">Course Tags</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/course_instructors" class="nav-link">
                                <i class="nav-icon fas fa-tag text-danger"></i>
                                <p class="text-white">Course Instructor</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
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

                                <p class="text-white">Manage Classified</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="text-white">Add Classified</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-layer-group text-success"></i> -->
                                <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                <p class="text-white">Classified Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tag text-danger"></i>
                                <p class="text-white">Classified Tags</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item">
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

                                <p class="text-white">Manage Jobs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-layer-group text-success"></i> -->
                                <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                <p class="text-white">Job Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-briefcase text-white" aria-hidden="true"></i>

                                <p class="text-white">
                                    Job Emplyoer
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                        <p class="text-white">Name</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <!-- <i class="nav-icon fas fa-layer-group text-success"></i> -->
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                        <p class="text-white">logo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <!-- <i class="nav-icon fas fa-layer-group text-success"></i> -->
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                        <p class="text-white">Contact Detail</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <!-- <i class="nav-icon fas fa-layer-group text-success"></i> -->
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                        <p class="text-white">Details</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-briefcase text-white" aria-hidden="true"></i>

                                <p class="text-white">
                                    Applied Jobs
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                        <p class="text-white">Name</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <!-- <i class="nav-icon fas fa-layer-group text-success"></i> -->
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                        <p class="text-white">Location</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <!-- <i class="nav-icon fas fa-layer-group text-success"></i> -->
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                        <p class="text-white">Job apply</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <!-- <i class="nav-icon fas fa-layer-group text-success"></i> -->
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                        <p class="text-white">CV</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <!-- <i class="nav-icon fas fa-layer-group text-success"></i> -->
                                        <i class="nav-icon fa fa-dot-circle text-success" aria-hidden="true"></i>

                                        <p class="text-white">Job Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-briefcase text-white" aria-hidden="true"></i>

                                        <p class="text-white">
                                            Emplyoee
                                            <i class="right fas fa-angle-right"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview ">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa fa-table text-primary" aria-hidden="true"></i>

                                                <p class="text-white">Emplyoee Status</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

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

                                <p class="text-white"> Themes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="text-white">Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <!-- <i class="nav-icon fa fa-briefcase text-white" aria-hidden="true"></i> -->
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
                                <p class="text-white"> Add On Plugins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="text-white">Installed Plugins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-hourglass text-success" aria-hidden="true"></i>
                                <p class="text-white">All Plugins</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tasks text-white" aria-hidden="true"></i>

                        <p class="text-white">
                            User's Home
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/post_types" class="nav-link">
                                <i class="nav-icon fas fa-table text-primary"></i>

                                <p class="text-white">Manage Types</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/post_types/create" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="text-white">Add new Type</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user-circle text-white"></i>
                        <p class="text-white">
                            Users
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/users" class="nav-link">
                                <i class="nav-icon fa fa-users text-primary" aria-hidden="true"></i>

                                <p class="text-white">Manage Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/users/create" class="nav-link">
                                <i class="nav-icon fa fa-user-plus text-warning" aria-hidden="true"></i>

                                <!-- <i class="nav-icon fas fa-edit text-warning"></i> -->
                                <p class="text-white">Add new User</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <!-- <i class="nav-icon fa fa-briefcase text-white" aria-hidden="true"></i> -->
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
                                <p class="text-white"> Permalinks</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit text-warning"></i>
                                <p class="text-white">Reading</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

        </nav>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex ">

        </div>
    </div>
</aside>