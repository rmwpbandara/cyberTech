<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            {{--<li class="header">MAIN NAVIGATION</li>--}}
            <li class="active treeview">
                <a href="#"><i class="fa fa-dashboard"></i> <span>Emails CRUD</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route("bulk_email")}}"><i class="fa fa-circle-o"></i> Bulk Emails Upload</a></li>
                    <li><a href="{{route('single_email')}}"><i class="fa fa-circle-o"></i> Single Email Upload</a></li>
                    <li><a href="{{route('add_batch_name')}}"><i class="fa fa-circle-o"></i> Add Batch Name</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#"><i class="fa fa-dashboard"></i> <span>Email Scheduler</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('email_scheduler')}}"><i class="fa fa-circle-o"></i> Scheduler</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
