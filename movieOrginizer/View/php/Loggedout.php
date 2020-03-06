<li class="nav-item dropdown" id="LoginID">
            <a class="nav-link text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login.</a>
            
    <!-- Dropdown - Login(before) -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in m-2" aria-labelledby="userDropdown">
        <a class="dropdown-item align-items-center" href="#"></a>
        <form action="model/php/login.php" method="POST">
            <h3 class="text-center">Email</h3>
            <input class = "m-2" type="text" name= "userEmail" placeholder="Email">
            <h3 class="text-center">Password</h3>
            <input class = "m-2" type="password" name= "pwd" placeholder="Password">
            <button type="submit" class="loginButton btn btn-primary" name = "login-submit">Login</button>
        </form>
        <a class="forgotPwd" href="forgot-password">forgot Password?</a>
        <div class="dropdown-divider"></div>
        <a class="signup" href="register">New here? Signup!</a>
    </div>
</li>