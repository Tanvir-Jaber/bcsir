<div class="sticky">
    <aside class="app-sidebar">


        @include('layouts.sidebars.common.header')

        <div class="app-sidebar3">
            <div class="main-menu">

                @include('layouts.sidebars.common.username')


                <ul class="side-menu">
                    <li class="side-item side-item-category mt-4">Menu</li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('dashboard') }}">
                            <i class="feather feather-home  sidemenu_icon"></i>
                            <span class="side-menu__label">Dashboard</span></a>
                    </li>
                    
                    <li class="side-item side-item-category">Administration</li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('department.create') }}">
                            <i class="feather feather-home  sidemenu_icon"></i>
                            <span class="side-menu__label">Add Department</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('department.index') }}">
                            <i class="feather feather-list sidemenu_icon"></i>
                            <span class="side-menu__label">Department List</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('staff.create') }}">
                            <i class="feather feather-home  sidemenu_icon"></i>
                            <span class="side-menu__label">Add User</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('staff.index') }}">
                            <i class="feather feather-list sidemenu_icon"></i>
                            <span class="side-menu__label">User List</span></a>
                    </li>
                    
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.create') }}">
                            <i class="feather feather-user-plus sidemenu_icon"></i>
                            <span class="side-menu__label">Add Admin</span>
                        </a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.index') }}">
                            <i class="feather feather-list sidemenu_icon"></i>
                            <span class="side-menu__label">Admin List</span>
                        </a>
                    </li>
                    <li class="side-item side-item-category">Profile</li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('profile.index') }}">
                            <i class="feather feather-home  sidemenu_icon"></i>
                            <span class="side-menu__label">Update Profile</span></a>
                    </li>
                    <li class="side-item side-item-category">QR CODE</li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('qr.create') }}">
                            <i class="feather feather-home  sidemenu_icon"></i>
                            <span class="side-menu__label">Add QR CODE</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('qr.index') }}">
                            <i class="feather feather-list sidemenu_icon"></i>
                            <span class="side-menu__label">QR CODE List</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
</div>



