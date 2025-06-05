<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="home.php" class="brand-link">
		<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">AdminLTE 3</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="home.php" class="d-block"><?php echo $Fullname; ?></a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div> 

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
				<li class="nav-item menu-open">
					<a href="./dashboard" class="nav-link active">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard 
						</p>  
					</a> 
				</li>
				<li class="nav-item menu-open">
					<a href="./subheader" class="nav-link">
						<p>
							Subheader
						</p>  
					</a> 
				</li>  
				<li class="nav-header">INVESTOR</li>
				<li class="nav-item">
					<a href="#" class="nav-link"> 
						<p>
							Investor
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview"> 
						<li class="nav-item">
							<a href="./annual-report" class="nav-link">								
								<p>
									Annual Report  
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./financial-statement" class="nav-link">								
								<p>
									Financial Statement  
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./financial-highlight" class="nav-link">								
								<p>
									Financial Highlight 
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./shareholder" class="nav-link">								
								<p>
									Shareholder
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./disclosure" class="nav-link">								
								<p>
									Disclosure Information
								</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-header">RUPS</li>
				<li class="nav-item">
					<a href="#" class="nav-link"> 
						<p>
							RUPS
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview"> 
						<li class="nav-item">
							<a href="./gms-announcement" class="nav-link">								
								<p>
									GMS Announcement 
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./gms-invitation" class="nav-link">								
								<p>
									GMS Invitation
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./gms-mom" class="nav-link">								
								<p>
									GMS Minutes Of Meeting
								</p>
							</a>
						</li>
					</ul>
				</li> 
				<li class="nav-header">INDEX</li>
				<li class="nav-item">
					<a href="./home" class="nav-link"> 
						<p>
							Home 
						</p>
					</a> 
				</li> 
				<li class="nav-header">ABOUT US</li>
				<li class="nav-item">
					<a href="#" class="nav-link"> 
						<p>
							About Us
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview"> 
						<li class="nav-item">
							<a href="./company-profile" class="nav-link">								
								<p>
									Company Profile
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./vission-mission" class="nav-link">								
								<p>
									Vission Mission
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./growth-journey" class="nav-link">
								<p>
									Growth Journey
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./management" class="nav-link">
								<p>
									Management
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./people" class="nav-link">
								<p>
									People
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./gcg" class="nav-link">
								<p>
									Good Coorporate Governance
								</p>
							</a>
						</li>
					</ul>
				</li> 
				<li class="nav-header">OUR BUSINESSES</li>
				<li class="nav-item">
					<a href="./our-businesses" class="nav-link"> 
						<p>
							Our Businesses 
						</p>
					</a> 
				</li>   
				<li class="nav-header">NEWSROOM</li>
				<li class="nav-item">
					<a href="./newsroom" class="nav-link"> 
						<p>
							News
						</p>
					</a> 
				</li>  
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
