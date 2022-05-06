<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
    data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}"
    data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="#">
            <img alt="Logo" src="{{ asset('logos/logos3.png') }}"
                class="h-45px logo" />
        </a>
        <!--end::Logo-->
        @include('nav.toggle')
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-2 py-5 py-lg-8"
            id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: true, lg: true}"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
            data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">Data
                            analytics Concept Demo</span>
                    </div>
                </div>
                <div class="menu-item d-none">
                    <a class="menu-link " href="#">
                        <span class="menu-icon">
                            <i class="fas fa-chart-line fs-3"
                                aria-hidden="true"></i>

                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>



                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span
                            class="menu-section text-muted text-uppercase fs-8 ls-1">Menu
                            Options</span>
                    </div>
                </div>


                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion viewer_only">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas text-light fw-bolder fa-2x me-1 fa-users"
                                aria-hidden="true"></i>
                        </span>
                        <span class="menu-title ms-2 fs-6">Dashboard</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        <?php

                        MenuItem($link = '#', $label = 'Dashboard');

                        ?>


                    </div>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion viewer_only">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas text-light fw-bolder fa-2x me-1 fa-cogs"
                                aria-hidden="true"></i>
                        </span>
                        <span class="menu-title ms-2 fs-6">Settings</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        <?php

                        MenuItem($link = route('MgtDistricts'), $label = 'Manage Districts');
                        MenuItem($link = route('MgtCounties'), $label = 'Manage Counties');
                        MenuItem($link = route('MgtSubCounties'), $label = 'Manage Sub-Counties');
                        MenuItem($link = route('MgtParishes'), $label = 'Manage Parishes');
                        MenuItem($link = route('MgtVillages'), $label = 'Manage Villages');

                        ?>


                    </div>
                </div>


            </div>
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->

    <!--end::Footer-->
</div>
