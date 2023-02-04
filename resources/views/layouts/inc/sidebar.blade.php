<aside class="main-sidebar sidebar-dark-warning elevation-4">
    <a href="/" class="brand-link">
        <img src="/adminlte/dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
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

            </ul>
        </nav>
    </div>
</aside>