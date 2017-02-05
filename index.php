<?php
    session_start();
    if(!isset($_SESSION["id_user"])) header("location:login.php");
?>

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

		<script src="js/jquery.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/datepicker.js"></script>
		<script src="js/util.js"></script>
		<script src="js/form-add-event.js"></script>
		<script src="js/list-categorie.js"></script>
        <script src="js/evenements.js"></script>
		<script src="js/user-icon.js"></script>
		<script src="js/index.js"></script>
        <script></script>
	</body>
</html>
