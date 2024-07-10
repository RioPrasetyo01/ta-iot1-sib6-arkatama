<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="dashboard">
            <img src="images/logo_3.png" class="img-fluid" alt="">
            <span>My IoT</span>
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="
                @if (request()->url()==route('dashboard'))
                    active
                @endif">
                    <a href="dashboard" class="iq-waves-effect collapsed">
                        <i class="ri-home-4-line"></i><span>Dashboard</span></a>
                </li>
                <li class="
                @if (request()->url()==route('sensor.index'))
                    active
                @endif">
                    <a href="sensor" class="iq-waves-effect collapsed">
                        <i class="ri-sensor-line"></i><span>Sensor</span></a>
                </li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
