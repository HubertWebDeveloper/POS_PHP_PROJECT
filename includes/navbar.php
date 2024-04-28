<nav class="sb-topnav navbar navbar-expand navbar-dark bg-white shadow">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html" style="color:black">POS PHP PROJECT</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"  style="color:black"id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class=" ms-auto me-0 me-md-3 my-2 my-md-0">
               
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                <?php if(isset($_SESSION['loggedIn'])): ?>
                    <a class="nav-link dropdown-toggle" style="color:black" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?= $_SESSION['loggedInUser']['name'] ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>