<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>

            <li class="active">
                <a href="pages/widgets.html">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Financeiro</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="{{ route('admin.balance') }}"><i class="fa fa-circle-o"></i> Saldo</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.historic.index') }}"><i class="fa fa-circle-o"></i> Histórico</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
