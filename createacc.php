<?php include 'header.php'; ?>
<div class="login-form" style="margin-top:40px;">
    <div id="header">
        Register
    </div>
    <form method="POST" action="createacc-con.php">
        <table>
            <tr>
                <td>
                    <label for="email">Email Address</label><br>
                    <input class="input" type="text" name="email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass">Password</label><br>
                    <input class="input" type="password" name="pass" required>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="sub-header">Billing Information<br></div>
                    <input class="input" style="width:150px;" type="text" name="firstname" placeholder="First Name" required>
                    <input class="input" style="width:150px;" type="text" name="lastname" placeholder="Last Name" required>                
                </td>
            </tr>
            <tr>
                <td>
                    <input class="input" type="text" name="address" placeholder="Address" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="input" type="text" name="city" placeholder="City" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="input" type="text" name="zip" placeholder="Postal Code" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="input" type="text" name="phone" placeholder="Phone Number">
                </td>
            </tr>
            <tr>
                <td> <input class="btn" style="width:120px;" type="submit" name="Register" value="Register"> </td>
            </tr>
        </table>
    </form>
</div>