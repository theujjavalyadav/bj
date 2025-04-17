<div class="main-header">
    <div class="logo-header">
        <a href="dashboard" class="logo">Ready Dashboard</a>

        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse"
            aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
    </div>

    <nav class="navbar navbar-header navbar-expand-lg">
        <div class="container-fluid">

            <form class="navbar-left navbar-form nav-search mr-md-3" action="">
                <div class="input-group">
                    <input type="text" placeholder="Search ..." class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </div>
                </div>
            </form>

            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                        <span> {{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <div class="user-box">
                                <div class="u-img"><i class="fa-solid fa-user"></i></div>
                                <div class="u-text">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                    <a href="profile/{{ Auth::user()->id }}" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                </div>
                            </div>
                        </li>
                        <div class="dropdown-divider"></div>


                        <form id="logout-form" action="{{ url('logout') }}" method="get" style="display: none;">
                            @csrf
                        </form>

                        <a href="javascript:void(0);" class="dropdown-item logout-btn">
                            <i class="fa fa-power-off"></i> Logout
                        </a>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.logout-btn').addEventListener("click", function(e) {
            e.preventDefault();

            swal({
                title: "Are you sure?",
                text: "You will be logged out of your account.",
                icon: "warning",
                buttons: ["Cancel", "Logout"],

                dangerMode: true,
            }).then((willLogout) => {
                if (willLogout) {
                    document.getElementById("logout-form").submit(); // Submit the form manually
                }
            });
        });
    });
</script>