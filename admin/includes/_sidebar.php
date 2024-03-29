<?php
function side($username, $id)
{
	?>
	<nav class="sidebar sidebar-offcanvas" id="sidebar">
		<ul class="nav">
			<li class="nav-item nav-category">Main</li>
			<li class="nav-item">
				<a class="nav-link" href="./../dashboard.php">
					<span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
					<span class="menu-title">Dashboard</span>
				</a>
			</li>

			<!-- <li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
				  <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
				  <span class="menu-title">UI Elements</span>
				  <i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-basic">
				  <ul class="nav flex-column sub-menu">
					<li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
					<li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
					<li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
				  </ul>
				</div>
			  </li> -->

			<!-- <li class="nav-item">
				<a class="nav-link" href="pages/icons/mdi.html">
				  <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
				  <span class="menu-title">Icons</span>
				</a>
			  </li> -->

			<!-- <li class="nav-item">
				<a class="nav-link" href="pages/forms/basic_elements.html">
				  <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
				  <span class="menu-title">Forms</span>
				</a>
			  </li> -->
			<!-- Lien vers les ajouter et retrait de tock -->
			<li class="nav-item">
				<a class="nav-link" href="./../ajout.php">
					<span class="icon-bg"><i class="mdi mdi-cart-plus"></i></span>
					<span class="menu-title">Ajout de stock</span>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="./../retrait.php">
					<span class="icon-bg"><i class="mdi mdi-cart-plus"></i></span>
					<span class="menu-title">Retrait de stock</span>
				</a>
			</li>
			<!-- Fin lien ajout et retrait de stock -->
			<?php if($id===1){ ?>
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
				  <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
				  <span class="menu-title">Administration</span>
				  <i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="auth">
				  <ul class="nav flex-column sub-menu">
					<li class="nav-item"> <a class="nav-link" href="admin/users.php"> Utilisateurs inscrits </a></li>
					<li class="nav-item"> <a class="nav-link" href="#"> État de santé du site </a></li>
					<li class="nav-item"> <a class="nav-link" href="#"> Visites </a></li>
					<li class="nav-item"> <a class="nav-link" href="#"> Vide </a></li>
					<li class="nav-item"> <a class="nav-link" href="#"> Vide </a></li>
				  </ul>
				</div>
			  </li>
			 <?php } ?>
			<!-- Profil de l'utilisateur -->
			<li class="nav-item sidebar-user-actions">
				<div class="user-details">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<div class="d-flex align-items-center">
								<div class="sidebar-profile-img">
									<img class="img-avatar  img-avatar48" src="./../uploads/photoprofil/profil<?php echo($id); ?>.png" alt="Photo">
									<!-- <i class="bi bi-person-circle"></i> -->
								</div>
								<div class="sidebar-profile-text">
									<p class="mb-1"><?php echo $username; ?></p>
								</div>
							</div>
						</div>
						<div class="badge badge-danger">0</div>
					</div>
				</div>
			</li>
			<li class="nav-item sidebar-user-actions">
				<div class="sidebar-user-menu">
					<a href="./../settings.php" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
						<span class="menu-title">Paramètres</span>
					</a>
				</div>
			</li>
			<!-- Fin profil de l'utilisateur -->
			  <!-- Déconnexion button -->
			<li class="nav-item sidebar-user-actions">
				<div class="sidebar-user-menu">
					<a href="./includes/logout.php" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
						<span class="menu-title">Déconnexion</span></a>
				</div>
			</li>
			<!-- Fin deconnexion button -->
		</ul>
	</nav>
<?php
}
?>