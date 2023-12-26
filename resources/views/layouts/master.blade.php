<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- Tostr.js --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- AOS Animation --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        .text_color_indigo {
            color: #7630ff;
        }

        .bg_color_indigo {
            background-color: #7630ff;
        }

        .bg_color_cyan {
            background-color: #8efbda;
        }

        .text_color_gray {
            color: #dfdee3;
        }

        .nav-link:hover {
            color: #7630ff !important;
        }

        .nav-link.active {
            color: #7630ff !important;
            font-weight: bold;
        }

        .bg-img {
            /* position: absolute;
            left: 0;
            top: 0; */
            width: 100%;
            height: 100%;
        }

        .bg-img::before {
            content: " ";
            background-color: #0a090c78;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        @media screen and (max-width: 600px) {
            .bg-img {
                height: 28rem;
            }

            .content {
                padding: 1rem;
            }
        }

        /* Loader screen */
        #loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 1s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -40px;
            margin-left: -40px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .simple-shape {
            width: 50px;
            height: 30px;
            display: inline-block;
            margin: 30px;
            border-radius: 5rem;
            position: absolute;
            top: 0;
        }

        .four {
            background-color: pink;
            -webkit-animation: simple-move 3s 2s linear infinite alternate;
            animation: simple-move 3s 2s linear infinite alternate;
        }

        @-webkit-keyframes simple-move {
            100% {
                -webkit-transform: translate(100px, 0);
            }
        }

        @keyframes simple-move {
            100% {
                transform: translate(100px, 0);
            }
        }
    </style>
</head>

<body>

    @include('includes.navbar')
    <main>
        <div id="loader"></div>
        @yield('content')

    </main>
    @include('includes.footer')





    <script>
        const loaderEl = document.getElementById('loader');
        document.addEventListener('readystatechange', (event) => {

            const readyState = "complete";

            if (document.readyState == readyState) {
                setTimeout(() => {
                    loaderEl.parentNode.removeChild(loaderEl);
                }, 100)
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    {{-- AOS Animation JS file --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


    {{-- toastr.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    {{-- TODO: toastr not working right now --}}
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    {{-- Sweetalert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Sweetalert Script -->
    <script>
        $('.delete').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Do you want to delete this Question?',
                text: "Once deleted, you will not be able to recover this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                }
            })
        });
        $('.addCategory').click(function(event) {
            if (true) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 200,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount', 'image'
            ],
            toolbar: 'menubar | undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
</body>

</html>
