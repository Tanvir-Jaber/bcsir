<div class="sticky">
    <aside class="app-sidebar ">



        @include('layouts.sidebars.common.header')

        <div class="app-sidebar3">
            <div class="main-menu">

                @include('layouts.sidebars.common.username')


                <ul class="side-menu">
                    <li class="side-item side-item-category mt-4">Menu</li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-home  sidemenu_icon"></i>
                            <span class="side-menu__label">Dashboards</span></a>
                    </li>
                    
                    <li class="side-item side-item-category">Children</li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-codepen sidemenu_icon"></i>
                            <span class="side-menu__label">My Children</span></a>
                    </li>
                    <li class="side-item side-item-category">Academic</li>
                    
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-lock sidemenu_icon"></i>
                            <span class="side-menu__label">Childs Routine</span></a>
                    </li>
                    <li class="slide ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-sliders sidemenu_icon"></i>
                            <span class="side-menu__label">Remarks & Actions</span><i
                                class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="javascript:void(0);">Remarks & Actions</a></li>
                            <li><a href="javascript:void(0);" class="slide-item">Daily Remarks</a></li>
                            <li><a href="javascript:void(0);" class="slide-item">Test Record</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-shopping-cart sidemenu_icon"></i>
                            <span class="side-menu__label">Parents Meeting</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-shopping-cart sidemenu_icon"></i>
                            <span class="side-menu__label">Payments History</span></a>
                    </li>
                    
                    
                    <li class="side-item side-item-category">Others</li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="feather feather-copy sidemenu_icon"></i>
                            <span class="side-menu__label">Message</span></a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </aside>
</div>


<script>
    function show_add_subject_modal() {
        // document.getElementById('add_subject').classList.toggle('d-none');
        $("#add_subject_modal").modal("toggle");

    }
</script>
