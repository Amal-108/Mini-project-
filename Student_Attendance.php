<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="supervisor.css">
	<style>
		.card {
			width: calc(33.333% - 20px); /* Three cards per row with some margin */
			height: 200px;
			border-radius: 8px;
			color: white;
			overflow: hidden;
			position: relative;
			transform-style: preserve-3d;
			perspective: 1000px;
			transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: center;
			margin: 10px; /* Space between cards */
		}

		.card-content {
			padding: 20px;
			position: relative;
			z-index: 1;
			display: flex;
			flex-direction: column;
			gap: 10px;
			color: white;
			align-items: center;
			justify-content: center;
			text-align: center;
			height: 100%;
		}

		.card-content .card-title {
			font-size: 24px;
			font-weight: 700;
			color: inherit;
			text-transform: uppercase;
		}

		.card-content .card-para {
			color: inherit;
			opacity: 0.8;
			font-size: 14px;
		}

		.card:hover {
			transform: rotateY(10deg) rotateX(10deg) scale(1.05);
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
		}

		.card:before, .card:after {
			content: "";
			position: absolute;
			top: 0;
			width: 100%;
			height: 100%;
			background: linear-gradient(transparent, rgba(0, 0, 0, 0.1));
			transition: transform 0.5s cubic-bezier(0.23, 1, 0.320, 1);
			z-index: 1;
		}

		.card:hover:before {
			transform: translateX(-100%);
		}

		.card:hover:after {
			transform: translateX(100%);
		}

		.cards-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.card-one {
			background-color: #4158D0;
			background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
		}

		.card-two {
			background-color: #FF7E5F;
			background-image: linear-gradient(43deg, #FF7E5F 0%, #FFB88C 100%);
		}

		.card-three {
			background-color: #6a11cb;
			background-image: linear-gradient(43deg, #6a11cb 0%, #2575fc 100%);
		}

		.card-four {
			background-color: #00c6ff;
			background-image: linear-gradient(43deg, #00c6ff 0%, #0072ff 100%);
		}

		.card-five {
			background-color: #FF512F;
			background-image: linear-gradient(43deg, #FF512F 0%, #F09819 100%);
		}

		.card-six {
			background-color: #00c6ff;
			background-image: linear-gradient(43deg, #00c6ff 0%, #0072ff 100%);
		}
	</style>

	<title>Supervisor</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<h2>LB<span color:"red">LMS</span></h2>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="Student_Dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li> 
				<a href="Student_Activities.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Activities</span>
				</a>
			</li>
			<li>
				<a href="Student_Resources.php">
					<i class='bx bx-map'></i>
					<span class="text">Access Resources</span>
				</a>
			</li>
			<li class="active">
				<a href="Student_Attendance.php">
					<i class='bx bx-run'></i>
					<span class="text">Mark Attendance</span>
				</a>
			</li>
			<li>
				<a href="Student_Submit.php">
					<i class='bx bx-folder'></i>
					<span class="text">Submit Activities</span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
			<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script>
		const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

		allSideMenu.forEach(item=> {
			const li = item.parentElement;

			item.addEventListener('click', function () {
				allSideMenu.forEach(i=> {
					i.parentElement.classList.remove('active');
				});
				li.classList.add('active');
			});
		});

		// TOGGLE SIDEBAR
		const menuBar = document.querySelector('#content nav .bx.bx-menu');
		const sidebar = document.getElementById('sidebar');

		menuBar.addEventListener('click', function () {
			sidebar.classList.toggle('hide');
		});

		const searchButton = document.querySelector('#content nav form .form-input button');
		const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
		const searchForm = document.querySelector('#content nav form');

		searchButton.addEventListener('click', function (e) {
			if(window.innerWidth < 576) {
				e.preventDefault();
				searchForm.classList.toggle('show');
				if(searchForm.classList.contains('show')) {
					searchButtonIcon.classList.replace('bx-search', 'bx-x');
				} else {
					searchButtonIcon.classList.replace('bx-x', 'bx-search');
				}
			}
		});

		if(window.innerWidth < 768) {
			sidebar.classList.add('hide');
		} else if(window.innerWidth > 576) {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
			searchForm.classList.remove('show');
		}

		window.addEventListener('resize', function () {
			if(this.innerWidth > 576) {
				searchButtonIcon.classList.replace('bx-x', 'bx-search');
				searchForm.classList.remove('show');
			}
		});

		const switchMode = document.getElementById('switch-mode');

		switchMode.addEventListener('change', function () {
			if(this.checked) {
				document.body.classList.add('dark');
			} else {
				document.body.classList.remove('dark');
			}
		});
	</script>
</body>
</html>
