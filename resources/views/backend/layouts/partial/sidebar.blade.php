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
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bxs-graduation'></i>
                </div>
                <div class="menu-title">Tickets</div>
            </a>
            <ul>
                <li> <a href="{{ route('customer-tickets.index') }}"><i class="bx bx-right-arrow-alt"></i>All
                        Tickets</a>
                </li>

            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
