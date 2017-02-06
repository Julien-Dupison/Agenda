<?php
    session_start();
    if(!isset($_SESSION["id_user"])) header("location:login.php");
?>
<?php include "database.php"; ?>
<?php include "class.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Agenda</title>
		<?php include "parts/header.php"; ?>
	</head>
	<body>
		<!-- Contenu de la page -->
		<div class="page-content">
			<div class="page-evenement">
                <p style="font-size:20px;margin-top:10px;">Evenements :</p>
                <div class="evenement-container"></div>
            </div>
            <?php include "parts/chatbox.php";?>
		</div>
		<div class="toast-container"></div>

		<!-- Parts -->
		<?php include "parts/sidebar.php"; ?>
        <?php include "parts/edt.php"; ?>
        <?php include "parts/utilisateur.php"; ?>
		<?php include "parts/user-icon.php"; ?>

		<?php include "parts/form-add-event.php"; ?>
		<?php include "parts/list-categorie.php"; ?>
        <?php include "parts/form-add-categorie.php"; ?>

		<!-- Scripts -->
		<script src="js/jquery.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/datepicker.js"></script>
        <script src="js/scrollbar.js"></script>
		<script src="js/util.js"></script>
		<script src="js/form-add-event.js"></script>
		<script src="js/list-categorie.js"></script>
        <script src="js/evenements.js"></script>
		<script src="js/user-icon.js"></script>
		<script src="js/index.js"></script>

        <script>
            $(".chatbox-header").click(function(e){
                $(this).parent().toggleClass("chatbox-active");
            })

            $(".utilisateur-content").mCustomScrollbar({
                theme:"light"
            })

        </script>
	</body>
</html>
