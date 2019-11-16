<?php include 'header.php';
    error_reporting (0);
    if(isset($_SESSION['login'])){
        header('Location:shop.php');
    }
?>
<div class="login-form">
    <div id="header-login">
        Login to your account
    </div>
    <form method="POST" action="chek-login.php">
        <table>
            <tr>
                <td>
                    <label for="email">Email Address</label><br>
                    <input class="input" type="text" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass">Password</label><br>
                    <input class="input" type="password" name="pass">
                </td>
            </tr>
            <tr>
                <td> <input class="btn" type="submit" name="signin" value="Sign In"> </td>
            </tr>
        </table>
    </form>
</div>

<div class="create-holder">
    <div id="header">
        Create New Account<br>
    </div>
    <div id="sub-holder" style="margin-bottom:16px;">
        Register your account for a faster checkout process.
    </div>
    <form action="createacc.php">
        <tr>
            <td><input class="btn" style="width:170px;" type="submit" value="Create Account"></td>
        </tr>
    </form>
</div>