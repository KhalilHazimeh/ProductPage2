<section class="free_shipping_alert">
    <div>Enjoy FREE SHIPPING on orders over 80 AED</div>
</section>
<section class="top-nav-bar">
        <div class="top-nav">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-6">
                <div class="top-nav-left d-none d-lg-block">
                    <span>Dr Nutrition UAE</span>
                </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                <div class="top-nav-right">
                    <ul class="list-inline top-nav-right-list">
                        <li>
                            <a title="Contact" href="#">
                                <i class="fa-solid fa-phone" style="color: #68367f; margin-right: 10px;"></i>
                                Contact
                            </a>
                        </li>
                        <li>
                            <a title="AED" href="">
                                <i class="fa-solid fa-money-bill " style="color: #68367f; margin-right: 10px;"></i>
                                AED
                            </a>
                        </li>
                        <li>
                            <a  title="Login" data-bs-toggle="modal" data-bs-target="#exampleModal"  href="">
                                <i class="fa-solid fa-right-to-bracket"style="color: #68367f; margin-right: 10px;"></i>
                                Login
                            </a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action= "login.blade.php" method="post" >
                                            <?php
                                                if (isset($_GET['status']) && $_GET['status'] === 'failed') {
                                                    echo'<p style="color: red;">Incorrect username or password.</p>';
                                                }
                                            ?>
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-lg-4">
                                                                <label for="Username" style="font-size: 20px; padding-right: 20px;">Username</label>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8">
                                                                <input name="username" type="text" class="Username">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-lg-4">
                                                                <label for="password" style="font-size: 20px; padding-right: 20px;">Password</label>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8">
                                                                <input name="password" type="text" class="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" value="Login">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a  data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                                <i class="fa-solid fa-right-to-bracket"style="color: #68367f; margin-right: 10px;"></i>
                                Register
                            </a>
                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Register</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                            <form action= "register.blade.php" method="post" >
                                            <?php
                                                if (isset($_GET['register']) && $_GET['register'] === 'failed') {
                                                    echo'<p style="color: red;">Username not available.</p>';
                                                }
                                            ?>
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-lg-4">
                                                                <label for="Username" style="font-size: 20px; padding-right: 20px;">Username</label>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8">
                                                                <input name="username" type="text" class="Username">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-lg-4">
                                                                <label for="password" style="font-size: 20px; padding-right: 20px;">Password</label>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8">
                                                                <input name="password" type="text" class="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" value="Register">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
                            </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</section>
