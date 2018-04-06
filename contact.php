<?php
include 'templates/header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style>
		#map{
			width: 100%;
			height: 500px;
		}
	</style>
</head>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Contact
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form method="post" action="contact.php">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Votre message
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Votre adresse mail">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Comment peut-on vous aider ?"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Envoyer
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Adresse
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Ma Jolie Boutique </br> 66 rue de l'abée de l'épée </br> 33000 Bordeaux
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Téléphone
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								05 56 56 56 56 
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Mail
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								majolieboutique@example.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/app.js"></script>

	<div id="map">		
	</div>
	<script>
		// Création de la fonction initMap()
		function initMap() {
	        var bordeaux = {lat: 44.842580, lng: -0.582863};
	        var map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 17,
	          center: bordeaux,
	          zoomControl: false,
			  mapTypeControl: false,
			  scaleControl: false,
			  streetViewControl: false,
			  rotateControl: false,
			  fullscreenControl: false,
	          styles : [{"featureType": "road",}]
	        });
	        var marker = new google.maps.Marker({
	          position: bordeaux,
	          map: map
	        });
	    }
    
    </script>
	<script async defer
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDySIB-3p8S7kjsoI3PZujLrIcbPt08sv4&callback=initMap">
    </script>

	<!-- <div class="map">  -->
		<!-- <div class="size-303" id="google_map" data-map-x="44.843131" data-map-y=" -0.582820" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div> --> 
	<!-- </div> -->

<?php
	include 'templates/footer.php';

	// Envoi de mon message 
	//on va chercher le fichier généré par composer qui s'occupe de gérer les dépendances
    require('vendor/autoload.php');
    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	//on peut envoyer l'email à l'utilisateur avec un lien contenant deux paramètres : son id et le token associé

    $mail = new PHPMailer();

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    // Utilisation d'un SMTP pour envoyer les mails
    $mail->isSMTP();
    $mail->Host = 'mail.gmx.com';

    // Si votre SMTP a besoin d'un authentification
    $mail->SMTPAuth   = true;
    $mail->Username   = 'promo5wf3@gmx.fr';
    $mail->Password   = 'ttttttttt33';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    //expéditeur et destinataire(s) du mail
    $mail->setFrom('promo5wf3@gmx.fr');

    $mail->addAddress('fabhennion74@gmail.com');
    
    //affichage du mail au format HTML
    $mail->isHTML(true);

    //contenu du mail
    $mail->Subject = "Demande d'information";
    //dans le coprs du mail on place le lien contenant deux paramètres, l'id de l'utilisateur et le token associé" qui vont nous servir à identifier cet utilisateur en les comparant avec ceux stockés en bdd
    //$mail->Body = $_POST['$msg'];
    $mail->Body = "Merci";
                                        
    //envoi du mail
    //if(!$mail->send()){
    //    //echec de l'envoi
    //    echo 'erreur lors de l\'envoi du mail';
    //    echo 'Erreur: ' . $mail->ErrorInfo;
    //}
    //    else{
    //        echo 'mail envoyé';
    //}
  
  
?>



	