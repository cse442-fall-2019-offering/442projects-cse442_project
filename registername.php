<h2>User Register System</h2>
<hr>
<form action="register.php" method="POST" enctype="multipart/form-data">
    User Name:
    <input type="text" name="userName" size="20" maxlength="15" placeholder="User Name can't be empty">
    <br>

    Password:
    <input type="password" name="password" size="20" maxlength="15">
    <br>

    Confrim Password:
    <input type="password" name="confirmPassword" size="20" maxlength="15">
    <br>

    Email:
    <input type="Email" name="user_Email" size="20" maxlength="30">
    <br>

    Phone Number:
    <input type="phonenumber" name="user_Phone" size="20" maxlength="15">
    <br>



    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="cancel" value="Cancel">
</form>
