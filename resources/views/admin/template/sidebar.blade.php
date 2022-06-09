<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>

            <li class="{{ menu_active('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ menu_open('admin.financial*') }}">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Financeiro</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ menu_active('admin.financial.balance') }}">
                        <a href="{{ route('admin.financial.balance') }}"><i class="fa fa-circle-o"></i> Saldo</a>
                    </li>
                    <li class="{{ menu_active('admin.financial.historic.index') }}">
                        <a href="{{ route('admin.financial.historic.index') }}"><i class="fa fa-circle-o"></i> Histórico</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
