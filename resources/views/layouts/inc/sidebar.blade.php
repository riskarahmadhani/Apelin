<aside class="main-sidebar sidebar-dark-lightblue elevation-4">
    <a href="/" class="brand-link">
        <img src="/img/logo3.png" alt="" class="brand-image img-circle elevation-2 " style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <x-nav-item href="{{ route('dashboard') }}" :title="[
                    'name'=>'Dashboard',
                    'icon'=>'fas fa-home',
                    'active'=>['dashboard']
                ]"/>

                @can('admin-owner')
                <x-nav-item href="{{ route('log') }}" :title="[
                    'name'=>'Log Activity',
                    'icon'=>'fas fa-shoe-prints',
                    'active'=>['log']
                ]"/>
                @endcan
                                
                @can('admin-kasir')
                <x-nav-item href="{{ route('member.index') }}" :title="[
                    'name'=>'Member',
                    'icon'=>'fas fa-users',
                    'active'=>['member.index','member.edit','member.create']
                ]" />
                
                <x-nav-item href="{{ route('transaksi.index') }}" :title="[
                    'name'=>'Transaksi',
                    'icon'=>'fas fa-cash-register',
                    'active'=>['transaksi.index','transaksi.detail','transaksi.create']
                ]" />
                @endcan

                @can('admin')
                <x-nav-item href="{{ route('user.index') }}" :title="[
                    'name'=>'User',
                    'icon'=>'fas fa-user',
                    'active'=>['user.index','user.edit','user.create']
                ]" />

                <x-nav-item href="{{ route('outlet.index') }}" :title="[
                    'name'=>'Outlet',
                    'icon'=>'fas fa-store-alt',
                    'active'=>['outlet.index','outlet.edit','outlet.create']
                ]" />
                
                <x-nav-item href="{{ route('paket.index') }}" :title="[
                    'name'=>'Paket',
                    'icon'=>'fas fa-cubes',
                    'active'=>['paket.index','paket.edit','paket.create']
                ]" />
                @endcan

                <x-nav-item :href="route('laporan.index')" :title="[
                    'name'=>'Laporan',
                    'icon'=>'fas fa-print',
                    'active'=>['laporan.index','laporan.harian','laporan.perbulan']
                ]" />

            </ul>
        </nav>
    </div>
</aside>