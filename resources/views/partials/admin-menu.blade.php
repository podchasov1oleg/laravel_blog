<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Blog posts
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.posts.list')}}" class="nav-link {{ (\Route::currentRouteName() == 'admin.posts.list') ? 'active' : '' }}">
                        <i class="fas fa-table nav-icon"></i>
                        <p>All posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.posts.create')}}" class="nav-link {{ (\Route::currentRouteName() == 'admin.posts.create') ? 'active' : '' }}">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>New post</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <i class="fas fa-hashtag fa-lg"></i>
                <p>
                    Post tags
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('tags.list')}}" class="nav-link {{ (\Route::currentRouteName() == 'tags.list') ? 'active' : '' }}">
                        <i class="fas fa-table nav-icon"></i>
                        <p>All</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tags.create')}}" class="nav-link {{ (\Route::currentRouteName() == 'tags.create') ? 'active' : '' }}">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Create new</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <i class="fas fa-folder-open fa-lg"></i>
                <p>
                    Portfolio
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('portfolio.admin.list')}}" class="nav-link {{ (\Route::currentRouteName() == 'portfolio.admin.list') ? 'active' : '' }}">
                        <i class="fas fa-table nav-icon"></i>
                        <p>All</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('portfolio.create')}}" class="nav-link {{ (\Route::currentRouteName() == 'portfolio.create') ? 'active' : '' }}">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Create new</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
