<?php 
include_once('../_header.php'); 
require_once('../PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'squishyfluffy11@gmail.com';
$mail->Password = 'fluffy11squishy';
$mail->SetFrom('no-reply@makatimedicalcenter.com');
$mail->Subject = 'Login Information';
$mail->Body = 'Welcome to Makati Medical Center Web Application for Medical Record Database';
$mail->AddAddress('squishyfluffy11@gmail.com');

$mail->Send();
?>

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Dashboard</h1>
                <img src="../_assets/medcen.png" alt="Medical Center Logo" style="height:150px; width:500px;">
                <p>Welcome <mark><?=($_SESSION['user']);?></mark> to Medical Center Web Application for Medical Record Database</p>
                <a href="#menu-toggle" class="btn btn-success" id="menu-toggle">Toggle Menu</a>
            </div>
        </div>
    </div>
</div>
<!-- menu toggle function -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<?php include_once('../_footer.php'); ?>