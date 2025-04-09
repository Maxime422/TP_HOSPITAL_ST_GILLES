<!doctype html>
<html lang="fr">

<?php
require_once "./PHP/validation.php";


include './PHP/head.php';
?>

<body>
	<?php include "./PHP/header.php"; ?>
	<main class="container">
		<section id="zf">
			<div>
				<span class="cta secondaryButton">N°1 des hôpitaux de la région</span>
				<h1><span class="styleText">Hôpital Saint-Gilles</span> - Gestion des rendez-vous et suivi des patients
				</h1>
				<p>L'Hôpital Saint-Gilles propose une plateforme sécurisée pour la gestion des rendez-vous et des
					dossiers médicaux. Cet outil permet aux praticiens d'organiser leurs consultations, d'optimiser leur
					emploi du temps et d'assurer un suivi rigoureux des patients.</p>
				<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
					<input type="search" name="search" id="search" required placeholder="Rechercher">
					<input type="submit" name="submit" class="cta primaryButton" value="rechercher">
				</form>
			</div>
			<figure>
				<img src="./ASSETS/IMG/img-visual-surgeon.jpg" alt="Visualisation d'un chirurgien">
			</figure>
		</section>

		<section id="gestionSection">
			<div>
				<article>
					<div>
						<i class="fa-solid fa-circle-info"></i>
					</div>
					<h3>Suivi médical personnalisé</h3>
					<p>Chaque patient bénéficie d'un accompagnement structuré, du premier rendez-vous aux soins de
						suivi. L'interface permet d'accéder rapidement aux informations essentielles pour une prise en
						charge efficace et coordonnée.</p>
					<a href="#" title="Assistance pour le suivi médical"><i class="fa-solid fa-circle-info"></i>Besoin
						d'assistance ?</a>
				</article>
				<article>
					<div>
						<i class="fa-solid fa-circle-info"></i>
					</div>
					<h3>Planification des consultations simplifiée</h3>
					<p>Le système de gestion des rendez-vous offre une planification intuitive et rapide, garantissant
						une meilleure répartition des créneaux et une fluidité des prises en charge.</p>
					<a href="#" title="Assistance pour la planification"><i class="fa-solid fa-circle-info"></i>Besoin
						d'assistance ?</a>
				</article>
				<article>
					<div>
						<i class="fa-solid fa-circle-info"></i>
					</div>
					<h3>Accès sécurisé aux dossiers médicaux</h3>
					<p>Les professionnels de santé disposent d'un espace sécurisé pour consulter et mettre à jour les
						informations médicales des patients. La protection des données est assurée conformément aux
						réglementations en vigueur.</p>
					<a href="#" title="Assistance pour l'accès sécurisé"><i class="fa-solid fa-circle-info"></i>Besoin
						d'assistance ?</a>
				</article>
				<article>
					<div>
						<i class="fa-solid fa-circle-info"></i>
					</div>
					<h3>Accès sécurisé aux dossiers médicaux</h3>
					<p>Les professionnels de santé disposent d'un espace sécurisé pour consulter et mettre à jour les
						informations médicales des patients. La protection des données est assurée conformément aux
						réglementations en vigueur.</p>
					<a href="#" title="Assistance pour l'accès sécurisé"><i class="fa-solid fa-circle-info"></i>Besoin
						d'assistance ?</a>
				</article>
			</div>
		</section>

		<section id="presentationSection">
			<figure>
				<img src="./ASSETS/IMG/img-visual-surgeon.jpg" alt="Visualisation d'un chirurgien">
			</figure>
			<div>
				<h2>Un espace sécurisé pour une gestion fiable</h2>
				<p>L'ensemble des données enregistrées sont protégées et accessibles uniquement aux professionnels
					habilités. La sécurité des informations médicales est une priorité afin de garantir la
					confidentialité et le respect du parcours de soins</p>
				<a href="#" title="Assistance pour la gestion sécurisée"><i class="fa-solid fa-circle-info"></i>Besoin
					d'assistance ?</a>
			</div>
		</section>

		<section id="securitySection">
			<div>
				<h2>Un espace sécurisé pour une gestion fiable</h2>
				<p>L'ensemble des données enregistrées sont protégées et accessibles uniquement aux professionnels
					habilités. La sécurité des informations médicales est une priorité afin de garantir la
					confidentialité et le respect du parcours de soins</p>
				<a href="#" title="Assistance pour la sécurité"><i class="fa-solid fa-circle-info"></i>Besoin
					d'assistance ?</a>
			</div>
		</section>
	</main>

	<?php
	include './PHP/script-links.php';
	?>
</body>

</html>
