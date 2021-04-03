<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    /**
     * Some generic validation, not going to be triggered
     */
    if (empty($_POST)) {
        $errors[] = 'Empty request';
    }

    if (empty($_POST['email']) && empty($_POST['phone'])) {
        $errors[] = 'Empty user identifier (email or phone number)';
    }

    // validate email (already validated on frontend)
    if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    // validate phone number (already validated on frontend)
    if (!empty($_POST['phone']) && !preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['phone'])) {
        $errors[] = 'Invalid phone number format';
    }

    // 50% chanse to fails
    if (rand(0, 1)) {
        $errors[] = 'Oops, random generated error to show functionality';
    }
    $formSubmited = true;
    $messageThankYou = !empty($_POST['notifications']) && $_POST['notifications'] === 'on' ?
        'Thank you for subscription!' :
        false;
    
    // emulate processing .. just to show the loading spinner
    sleep(1);
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="favicon.ico" />
    <script src="scripts.js"></script>
    <meta charset="utf-8">
    <title>Test task</title>
</head>

<body onload="disableSubmit()">

        <div class="loader center invisible" id="spinner"></div>

        <!-- NAVIAGATION -->
        <div class="navigation">
            <a href="#home" onclick="changePage('form', 'main_content_welcome')">Home</a>
            <a href="#registration" onclick="changePage('main_content_welcome', 'form', 'phone')">Registration With
                Phone</a>
            <a href="#registration" onclick="changePage('main_content_welcome', 'form', 'email')">Registration With
                Email</a>
        </div>

        <!-- RESPONSE ALERTS -->
        <?php if (isset($formSubmited)): ?>

            <?php if (empty($errors)): ?>
                <div class="alert, success">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        You have been successfully registered.
                        <?php if ($messageThankYou): ?>
                            <?= $messageThankYou ?>
                        <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="alert warning">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <ul>
                            <?php foreach ($errors as $err): ?>
                                <li> <?= $err ?> </li>
                            <?php endforeach; ?>
                        </ul>
                </div>
            <?php endif; ?>


        <?php endif; ?>

        <!-- WELCOME PAGE -->
        <div class="visible" id="main_content_welcome">
            <h1>Welcome to a OOO "Field of Dreams"!</h1>
            <p>Please kindly check the above navigation bar. The items names are quite descreptive.</p>
        </div>

        <!-- FORM PAGE -->
        <div class="invisible" id="form">
            <h1>This is a form</h1>
            <form method="post" onsubmit="showElement('spinner')">

                <div id="form_phone" class="invisible">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="form_phone_input" name="phone" placeholder="123-456-7890"
                        pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                </div>
                <div id="form_email" class="invisible">
                    <label for="email">Email:</label>
                    <input type="text" id="form_email_input" name="email" placeholder="example@email.com"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                </div>
                <fieldset>
                    <legend>Currency to be used:</legend>
                    <div>
                        <input type="radio" id="form_currency_eur" name="currency" value="eur" checked>
                        <label for="eur">Euro</label>
                    </div>

                    <div>
                        <input type="radio" id="form_currency_usd" name="usd" value="dewey">
                        <label for="usd">USD</label>
                    </div>

                    <div>
                        <input type="radio" id="form_currency_din" name="din" value="louie">
                        <label for="din">Dinar</label>
                    </div>
                </fieldset>

                <div>
                    <input type="checkbox" name="terms" id="form_terms" onchange="changeSubmitState(this)"> 
                    I Agree Terms & Coditions
                </div>
                <div>
                    <input type="checkbox" name="notifications" id="form_notifications"> 
                    I agree to receive notifications
                    </div>
                <input id="submit" type="submit" value="Submit" ">
            </form>
        </div>

</body>

</html>
