<?php include 'header.php';
error_reporting(1);
if (isset($_SESSION['login'])) {
    header('Location:shop.php');
}
?>
<div class="login-form">
    <div id="header-login">
        Login to your account
    </div>
    <form method="POST" action="chek-login.php?con=heroes">
        <table>
            <tr>
                <td>
                    <label for="uid">User ID</label><br>
                    <input class="input" type="text" name="uid">
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