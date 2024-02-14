<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('print.index') }}" class="nav-link {{ Request::is('print') ? 'active' : '' }}">
        <i class="nav-icon fas fa-print"></i>
        <p>Capture</p>
    </a>
    <a href="{{ route('payroll.index') }}" class="nav-link {{ Request::is('payroll') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Payroll</p>
    </a>
</li>
