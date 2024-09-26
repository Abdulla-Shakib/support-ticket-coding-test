<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <!-- Admin -->
        @if (auth()->user()->type === 'admin')
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="bx bx-right-arrow-alt"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin-tickets.index') }}">
                    <i class="bx bx-right-arrow-alt"></i> All Tickets
                </a>
            </li>
        @endif

        <!-- Customer -->
        @if (auth()->user()->type === 'customer')
            <li>
                <a href="{{ route('customer.dashboard') }}">
                    <i class="bx bx-right-arrow-alt"></i> Dashboard
                </a>
                <a href="{{ route('customer-tickets.index') }}">
                    <i class="bx bx-right-arrow-alt"></i> All Tickets
                </a>
            </li>
        @endif


    </ul>
    <!--end navigation-->
</div>
