<aside id="left-panel" class="left-panel" style="background-color: #152238">
        <nav class="navbar navbar-expand-sm navbar-default" style="background-color: #152238">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('admin.dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="active">
                        <a href="{{route('categories.index')}}"> <i class="menu-icon fa fa-table"></i>Manage Category </a>
                    </li>
                    <li class="active">
                        <a href="{{route('posts.index')}}"> <i class="menu-icon fa fa-table"></i>Manage Posts </a>
                    </li>
                    <li class="active">
                        <a href="{{route('news.index')}}"> <i class="menu-icon fa fa-table"></i>Manage News </a>
                    </li>


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
