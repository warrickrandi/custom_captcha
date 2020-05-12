<?php
session_start(); //start session
$err = "";
$suc ="";
if (!empty($_POST)) { //if post variable set
    //validation
    if ($_SESSION['captcha_text'] != $_POST['captcha']) { //check captcha validation
        $err = 'Captcha text is wrong';
    } else {
        $suc = "Success!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Captcha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <style>
    html{
        width: 100%;
        height: 100%;
    } 
    </style>
</head>

<body class="d-flex justify-content-center align-items-center" style="width: 100%;height:100%">
    <div class="col-lg-4 border p-5">
        <h4 class="text-center">Custom Captcha</h4>
        <?php if ($err != "") { ?>
            <div class="alert alert-danger">
                <?php echo $err; ?>
            </div>
        <?php } ?>
        <?php if ($suc != "") { ?>
            <div class="alert alert-success text-center">
                <?php echo $suc; ?>
            </div>
        <?php } ?>
        <form method="post" action="">
            <div class="form-group">
                <label>Captcha Text</label>
                <br>
                <img src="captcha.php" alt="CAPTCHA" class="captcha-image mb-2">&nbsp;&nbsp;<i class="fas fa-redo refresh btn btn-link"></i>
                <input type="text" id="captcha" class="form-control" placeholder="" name="captcha" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        var refreshButton = document.querySelector(".refresh");
        refreshButton.onclick = function() {
            document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
        }
    </script>
</body>

</html>