<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta name="" content="" />

    <title>BCSIR | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" href="{{asset('logo-2.png')}}" type="image/x-icon" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" id="style" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animated.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    @yield('styles')
    @stack('styles')

</head>



<body class="app sidebar-mini ltr">
    <div id="global-loader">
        <img src="{{ asset('assets/images/svgs/loader.svg') }}" alt="loader">
    </div>

    <div class="page" id="">
        <div class="page-main">
            @include('layouts.navbar.navbar')
            @if (Auth::check() && auth()->user()->user_type == 1)
                @include('layouts.sidebars.admin_sidebar');
            @elseif (Auth::check() && auth()->user()->user_type == 3)
                @include('layouts.sidebars.staff_sidebar');
            @else
                @include('layouts.sidebars.b_admin_sidebar');
            @endif
            @yield('content')
        </div>
    </div>
    <a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>



    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scrollbar/p-scroll1.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.js') }}"></script>


    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>







    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('scripts')
    <script>
        function generateCode(length = 10) {
            let result = '';
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;
            while (counter < length) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
            }
            return result;
        }

        function succesToaster(title = "", message = "", parameter = "") {
            toastr.success(title, message, parameter);

        }

        function errorToaster(title = "", message = "", parameter = "") {
            toastr.error(title, message, parameter);

        }
    </script>
    <script>
        async function swalConfirmation(message = "Are you sure?", icon = "warning", ok_button_text = "Yes, delete it!") {

            let swal_result = false;
            await Swal.fire({
                    title: message,
                    icon: icon,
                    showCancelButton: true,
                    // buttons: ["Stop", "Do it!"],
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: ok_button_text
                })
                .then(async (result) => {
                    if (result.isConfirmed) {
                        swal_result = true;
                    }
                });
            return swal_result;
        }




        async function deleteConfirm(id, deleteURL) {

            let row = this.event.target.parentNode.parentNode.parentNode;
            if (await swalConfirmation()) {

                const payload = new FormData();
                payload.append("_token", "{{ csrf_token() }}");

                let fetched_response = await fetch(deleteURL, {
                    method: "DELETE",
                });

                let response = await fetched_response.json();
                if (response.msg == "success") {
                    row.remove();
                    succesToaster('Successfully Deleted', 'Deleted', {
                        "progressBar": true,
                        // positionClass: 'toast-bottom-right'
                    });
                    
                } else {}
            }
        }
        async function confirmed(id, url) {

            let row = this.event.target.parentNode.parentNode.parentNode;
            let icon = $(this.event.target).is('i') ? $(this.event.target) : $(this.event.target).children();
            if (await swalConfirmation("Are you sure?", "question", "Yes")) {

                const payload = new FormData();
                payload.append("_token", "{{ csrf_token() }}");

                let fetched_response = await fetch(url, {
                    method: "GET",
                });

                let response = await fetched_response.json();
                if (response.msg != "success") {
                    succesToaster(response.msg, 'Success', {
                        "progressBar": true,
                        positionClass: 'toast-bottom-right'
                    });
                    if (response.hasOwnProperty('icon')) {
                        response.icon != "" ? $(icon).removeAttr('class') : null;
                        response.icon != "" ? $(icon).addClass(response.icon) : null;
                    }

                } else {}
            }
        }
    </script>

    <script>
        function isNumber(e) {
            e.value = e.value.replace(/[^0-9\.]/g, '');
        }
    </script>

    @if (session()->has('success'))
        <script>
            $(document).ready(function() {
                toastr.success(`{!! session()->get('success') !!}`, 'Success', {
                    "progressBar": true
                }, );
                // swal(
                //     '{!! session()->get('success') !!}',
                //     '',
                //     'success'
                // )
            });
        </script>
    @endif

    @if (session()->has('errors'))
        @if (is_object(session()->get('errors')))
            <script>
                $(document).ready(function() {
                    for (const [k, i] of Object.entries({!! session()->get('errors') !!})) {
                        toastr.error(`${i}`, k, {
                            "progressBar": true
                        }, );
                    }
                });
            </script>
        @else
            <script>
                $(document).ready(function() {
                    toastr.error(`{!! session()->get('errors') !!}`, 'Error', {
                        "progressBar": true
                    }, );
                });
            </script>
        @endif

    @endif


    @stack('scripts')

</body>

</html>
