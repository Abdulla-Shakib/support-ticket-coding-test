<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <p class="logo-text">Support Ticket</p>
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
                    <div class="parent-icon"><i class="bx bx-home-circle"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>

            <li>
                <a href="{{ route('admin-tickets.index') }}">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-disc"></i>
                    </div>
                    <div class="menu-title">Tickets</div>
                </a>
            </li>
        @endif

        <!-- Customer -->
        @if (auth()->user()->type === 'customer')
            <li>
                <a href="{{ route('customer.dashboard') }}">
                    <div class="parent-icon"><i class="bx bx-home-circle"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>

            <li>
                <a href="{{ route('customer-tickets.index') }}">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-disc"></i>
                    </div>
                    <div class="menu-title">Tickets</div>
                </a>
            </li>
        @endif
    </ul>
    <!--end navigation-->
</div>
