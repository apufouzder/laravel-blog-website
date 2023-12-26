<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <title>Admin Dashboard</title>

    {{-- Tostr.js --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        :root {
            --main-bg-color: #009d63;
            --main-text-color: #009d63;
            --second-text-color: #bbbec5;
            --second-bg-color: #c1efde;
        }

        .primary-text {
            color: var(--main-text-color);
        }

        .second-text {
            color: var(--second-text-color);
        }

        .primary-bg {
            background-color: var(--main-bg-color);
        }

        .secondary-bg {
            background-color: var(--second-bg-color);
        }

        .rounded-full {
            border-radius: 100%;
        }

        #wrapper {
            overflow-x: hidden;
            /* background-image: linear-gradient(to right, #baf3d7, #c2f5de,#cbf7e4, #d4f8ea,#ddfaef); */
            background: linear-gradient(0deg, rgb(255 219 254) 0%, rgba(218, 254, 255, 1) 100%);
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin 0.25s ease-out;
            -moz-transition: margin 0.25s ease-out;
            -o-transition: margin 0.25s ease-out;
            transition: margin 0.25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        #menu-toggle {
            cursor: pointer;
        }

        .list-group-item {
            border: none;
            padding: 20px 30px;
        }

        .list-group-item.active {
            background-color: transparent;
            color: var(--main-text-color);
            font-weight: bold;
            border: none;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        {{-- Sidebar --}}
        @include('includes.dashboardSideBar')
        {{-- Sidebar end --}}

        <!-- Page Content -->
        <div id="page-content-wrapper">
            {{-- Navbar --}}
            @include('includes.dashboard-navbar')
            {{-- Navbar end --}}

            @yield('dashboard')
        </div>
    </div>



    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
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
                title: 'Do you want to delete this Category?',
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




    {{-- Chart option JS here --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        const questionCategories = document.getElementById('questionCount').getElementsByTagName('span');
        const questionCounts = document.getElementById('questionCount').getElementsByTagName('small');

        // Create arrays to store the IDs
        let questionCategoriesIds = [];
        let questionCountsIds = [];

        function getCategories(categories, categoriesIds) {
            // Loop through the span elements and push their IDs into the spanIds array
            for (let i = 0; i < categories.length; i++) {
                categoriesIds.push(categories[i].id);
            }
        }

        function getCouts(counts, countsIds) {
            for (let j = 0; j < counts.length; j++) {
                countsIds.push(parseInt(counts[j].innerText));
            }
        }

        getCategories(questionCategories, questionCategoriesIds);
        getCouts(questionCounts, questionCountsIds);

        const xValues = questionCategoriesIds;
        const yValues = questionCountsIds;
        const barColors = ['#FF5733', '#33FF57', '#5733FF', '#FF33A1', '#A133FF', '#33FFC7', '#FFD433', '#33B4FF',
            '#D433FF', '#FF3333', '#33FFA1', '#FFC733', '#4933FF', '#FF33D8', '#33FF33'
        ];

        new Chart('categoryQuestionCounts', {
            type: 'doughnut', // Use 'doughnut' type for a pie chart with a hole
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues,
                    borderColor: '#ffffff', // Border color of each slice
                    borderWidth: 2, // Border width of each slice
                }],
            },
            options: {
                title: {
                    display: true,
                    text: 'Highest Question In Categories',
                    fontColor: '#333', // Title font color
                    fontSize: 18, // Title font size
                },
                legend: {
                    display: true,
                    position: 'top', // Position of the legend
                },
                cutoutPercentage: 50, // Adjust the size of the hole in the center (0 to 100)
                responsive: true, // Make the chart responsive
            },
        });


        // Bar chart info
        const categories = document.getElementById('cats').getElementsByTagName('span');
        const postCounts = document.getElementById('cats').getElementsByTagName('small');

        // Create arrays to store the IDs
        let categoriesIds = [];
        let postCountsIds = [];

        // common function
        getCategories(categories, categoriesIds);
        getCouts(postCounts, postCountsIds);

        const xValues_Category = categoriesIds;
        const yValues_Post = postCountsIds;
        const barColors_ForPosts = ['#FF5733', '#33FF57', '#5733FF', '#FF33A1', '#A133FF', '#33FFC7', '#FFD433', '#33B4FF',
            '#D433FF', '#FF3333', '#33FFA1', '#FFC733', '#4933FF', '#FF33D8', '#33FF33'
        ];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues_Category,
                datasets: [{
                    backgroundColor: barColors_ForPosts,
                    data: yValues_Post
                }]
            },
            options: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: "Highest Post In Categories",
                    fontColor: '#333', // Title font color
                    fontSize: 18,
                },
                cutoutPercentage: 50, // Adjust the size of the hole in the center (0 to 100)
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true, // Start the scale at zero
                            stepSize: 1.2, // Set the step size
                        },
                    }, ],
                },
            }
        });
    </script>


    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
