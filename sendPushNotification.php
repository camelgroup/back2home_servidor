<!DOCTYPE html>

<html>
<head>
    <title>Firebase Push Notification</title>
</head>

<body>

<form action='send.php' method='post'>
    <input type="text" name='pkusuario'>
    <!-- here user would enter the message to send to a particular device -->
    <textarea name='message'></textarea><br />

    <button>Send Notification</button><br />
</form>
<?php if(isset($_REQUEST['success'])){ ?>
    <strong>Great!</strong> Your message has been sent successfully...
<?php } ?>
</body>
</html>