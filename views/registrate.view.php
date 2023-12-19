<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div id="card_registration">
    <div id="card-content">
        <div id="card-title">
            <h2>Registration</h2>
            <div class="underline-title"></div>
        </div>
        <form method="post" class="form" id="registration_form" >
            <label for="registration_fname" style="padding-top:13px">
                &nbsp;First Name
            </label>
            <input id="registration_fname" class="form-content"  name="fname" autocomplete="on" required value="" />
            <div class="form-border"></div>
            <label for="registration_lname" style="padding-top:13px">
                &nbsp;Last Name
            </label>
            <input id="registration_lname" class="form-content"  name="lname" autocomplete="on" required value="" />
            <div class="form-border"></div>
            <label for="registration_phone" style="padding-top:13px">
                &nbsp;Phone Number
            </label>
            <input id="registration_phone" class="form-content"  name="phone" autocomplete="on" required value="" type="number" />
            <div class="form-border"></div>
            <label for="registration_email" style="padding-top:13px">
                &nbsp;Email
            </label>
            <input id="registration_email" class="form-content" type="email" name="email" autocomplete="on" required />
            <div class="form-border"></div>
            <label for="registration_password" style="padding-top:22px">&nbsp;Password
            </label>
            <input id="registration_password" class="form-content" type="password" name="password" required />
            <div class="form-border"></div>
            <label for="registration_confirm_password" style="padding-top:22px">&nbsp;Confirm Password
            </label>
            <input id="registration_confirm_password" class="form-content" type="password" name="password" required />
            <div class="form-border"></div>
            <input id="submit-btn_registration" type="submit" name="submitt" value="Registrate" />
            <a href="login.view.php" id="signup">Have account already?<br> Login here </a>
        </form>
    </div>
</div>
</body>
</html>

