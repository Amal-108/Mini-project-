<?php
session_start();
if (!isset($_SESSION['userID']) || $_SESSION['userType'] !== 'supervisor') {
    header("Location: Login_Signup.php");
    exit();
}
?>

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
    /* Default Light Mode Styles */

    body {
        background-color: #fff;
        color: #000;
        transition: background-color 0.3s, color 0.3s;
    }

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
        background-color: #f4f4f4;
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

    .form-container {
        display: none; /* Hide form initially */
        margin: 20px;
        padding: 20px;
        background: #f4f4f4;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-container.show {
        display: block; /* Show form when toggled */
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 15px;
    }

    .input-container {
        flex: 1;
        min-width: calc(50% - 10px);
        position: relative;
    }

    .input-container label {
        display: block;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .input-container input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .button {
        background-color: #4158D0;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #374AB0;
    }

    /* Dark Mode Styles */
    body.dark {
        background-color: #121212; /* Dark background color */
        color: #e0e0e0; /* Light text color */
    }

    body.dark .form-container {
        background-color: #1e1e1e; /* Dark background for the form container */
        color: #e0e0e0; /* Light text color for form elements */
        border: 1px solid #333; /* Dark border for the form container */
    }

    body.dark .form-container input {
        background-color: #333; /* Dark background for input fields */
        color: #e0e0e0; /* Light text color for input fields */
        border: 1px solid #555; /* Darker border for input fields */
    }

    body.dark .form-container label {
        color: #e0e0e0; /* Light text color for labels */
    }

    body.dark .card {
        background-color: #1f1f1f; /* Dark background for the cards */
        color: #e0e0e0; /* Light text color for the cards */
    }

    /* Dark Mode Styles */
body.dark .button {
    background-color: #4a90e2; /* Sky blue color for buttons */
    color: #ffffff; /* Light text color for buttons */
    border: 1px solid #3a7abf; /* Darker blue border for buttons */
}

body.dark .button:hover {
    background-color: #357ABD; /* Darker shade of sky blue for button hover state */
}

/* Styling for the dropdown */
select {
    background-color: white; /* white background for dropdown */
    color: black; /* White text for dropdown */
    cursor: pointer;
    padding: 8px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    width: 100%; /* Full width for the select box */
    box-shadow: 0px 2px 5px rgba(0,0,0,0.2); /* Slight shadow for depth */
}

/* Styling for dropdown when hovered */
select:hover {
    background-color:#cccccc; ; /* Grey background on hover */
}

/* Styling each option */
select option {
    background-color: white; /* white background for options */
    color: Black; /* black text for options */
    padding: 10px;
}

/* Option hover effect */
select option:hover {
    background-color: #cccccc; /* Grey background for options on hover */
}

/* Additional form styling to match the select */
input, select {
    margin-bottom: 10px;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: calc(50% - 10px); /* Adjust width to fit side by side */
}



.student-table th, .student-table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

.student-table th {
    background-color: #4158D0;
    color: white;
}

.student-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.student-table tr:hover {
    background-color: #ddd;
}

.action-button {
    padding: 6px 12px;
    margin: 2px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s;
}

.edit-button {
    background-color: #4CAF50;
    color: white;
}

.delete-button {
    background-color: #f44336;
    color: white;
}

.save-button {
    background-color: #008CBA;
    color: white;
}

.cancel-button {
    background-color: #555555;
    color: white;
}

.action-button:hover {
    opacity: 0.8;
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
            <li>
                <a href="Supervisor_Dashboard.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="Supervisor_Student.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Student Management</span>
                </a>
            </li>
            <li>
                <a href="Supervisor_Location.php">
                    <i class='bx bx-map'></i>
                    <span class="text">Location Management</span>
                </a>
            </li>
            <li>
                <a href="Supervisor_Activity.php">
                    <i class='bx bx-run'></i>
                    <span class="text">Activities Management</span>
                </a>
            </li>
            <li>
                <a href="Supervisor_Resource.php">
                    <i class='bx bx-folder'></i>
                    <span class="text">Resource Management</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-calendar-check'></i>
                    <span class="text">Attendance Tracking</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-file-blank'></i>
                    <span class="text">Reports</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
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
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/people.png">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="cards-container">
                <div class="card card-one" id="add-student-card">
                    <div class="card-content">
                        <h3 class="card-title">Add Students</h3>
                        <p class="card-para">Add new users to the system.</p>
                    </div>
                </div>

                <div class="card card-two" id="view-student-details-card">
                     <div class="card-content">
                         <h3 class="card-title">View Student Details</h3>
                        <p class="card-para">View and modify Student info.</p>
                    </div>
                </div>

                <div class="card card-three">
                    <div class="card-content">
                        <h3 class="card-title">View Batches</h3>
                        <p class="card-para">Delete Students.</p>
                    </div>
                </div>    
            </div>

            <div id="student-filter-container" style="display:none;">
                <select id="batch-select">
                    <option value="">Select Batch</option>
                    <option value="2022-26">2022-26</option>
                    <option value="2023-27">2023-27</option>
                    <option value="2024-28">2024-28</option>
                    <option value="2025-29">2025-29</option>
                </select>
                <select id="department-select">
                    <option value="">Select Department</option>
                    <option value="BACE">BACE</option>
                    <option value="BBA">BBA</option>
                    <option value="BCA">BCA</option>
                    <option value="Bcom">Bcom</option>
                    <option value="BSW">BSW</option>
                    <option value="Economics">Economics</option>
                    <option value="Mathematics">Mathematics</option>
                </select>
                <button id="filter-students-btn">Filter Students</button>
            </div>

<div id="student-table-container" style="display:none;">
    <!-- The table will be inserted here by JavaScript -->
</div>

            <!-- FORM CONTAINER -->
            <div class="form-container" id="form-container">
                <form>
                    <div class="form-row">
                        <div class="input-container">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" required>
                        </div>
                        <div class="input-container">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="input-container">
                            <label for="department">Department</label>
                            <input type="text" id="department" name="department" required>
                        </div>
                        <div class="input-container">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" id="phone_number" name="phone_number" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="input-container">
                            <label for="email_id">Email ID</label>
                            <input type="email" id="email_id" name="email_id" required>
                        </div>
                        <div class="input-container">
                            <label for="gender">Gender</label>
                            <input type="text" id="gender" name="gender">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="input-container">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="input-container">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                    </div>

                    <div class="form-row">
    <div class="input-container">
        <label for="year">Year</label>
        <div>
            <select id="year" name="year" required>
                <option value="">Select Year</option>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
            </select>
        </div>
    </div>
    <div class="input-container">
        <label for="batch">Batch</label>
        <div>
            <select id="batch" name="batch" required>
                <option value="">Select Batch</option>
                <option value="2022-26">2022-26</option>
                <option value="2023-27">2023-27</option>
                <option value="2024-28">2024-28</option>
                <option value="2025-29">2025-29</option>
            </select>
        </div>
    </div>
    <div class="input-container">
        <label for="section">Section</label>
        <div class="select-container">
            <select id="section" name="section" required>
                <option value="">Select Section</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </div>
    </div>
</div>

                    <button type="submit" class="button">Add Student</button>
                </form>
            </div>
            <!-- FORM CONTAINER -->
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script>
        const addStudentCard = document.getElementById('add-student-card');
        const formContainer = document.getElementById('form-container');

        addStudentCard.addEventListener('click', function () {
            formContainer.classList.toggle('show');
        });

        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

        allSideMenu.forEach(item => {
            const li = item.parentElement;

            item.addEventListener('click', function () {
                allSideMenu.forEach(i => {
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
            if (window.innerWidth < 576) {
                e.preventDefault();
                searchForm.classList.toggle('show');
                if (searchForm.classList.contains('show')) {
                    searchButtonIcon.classList.replace('bx-search', 'bx-x');
                } else {
                    searchButtonIcon.classList.replace('bx-x', 'bx-search');
                }
            }
        });

        if (window.innerWidth < 768) {
            sidebar.classList.add('hide');
        } else if (window.innerWidth > 576) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }

        window.addEventListener('resize', function () {
            if (this.innerWidth > 576) {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
                searchForm.classList.remove('show');
            }
        });

        const switchMode = document.getElementById('switch-mode');

        switchMode.addEventListener('change', function () {
            if (this.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        });
    </script>
    <script>
    document.getElementById('view-student-details-card').addEventListener('click', function() {
        document.getElementById('student-filter-container').style.display = 'block';
    });

    document.getElementById('filter-students-btn').addEventListener('click', function() {
        const batch = document.getElementById('batch-select').value;
        const department = document.getElementById('department-select').value;
        if (batch && department) {
            fetchStudentDetails(batch, department);
        } else {
            alert('Please select both batch and department');
        }
    });

    function fetchStudentDetails(batch, department) {
        // AJAX call to fetch student details
        fetch(`get_student_details.php?batch=${batch}&department=${department}`)
            .then(response => response.json())
            .then(data => {
                displayStudentTable(data);
            })
            .catch(error => console.error('Error:', error));
    }

    function displayStudentTable(students) {
        const tableContainer = document.getElementById('student-table-container');
        tableContainer.style.display = 'block';
        
        let tableHTML = `
            <table class="student-table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Year</th>
                        <th>Batch</th>
                        <th>Section</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
        `;

        students.forEach(student => {
            tableHTML += `
                <tr>
                    <td>${student.first_name}</td>
                    <td>${student.last_name}</td>
                    <td>${student.email_id}</td>
                    <td>${student.phone_number}</td>
                    <td>${student.gender}</td>
                    <td>${student.department}</td>
                    <td>${student.year}</td>
                    <td>${student.batch}</td>
                    <td>${student.section}</td>
                    <td>
                        <button class="action-button edit-button" onclick="editStudent(${student.id})">Edit</button>
                        <button class="action-button delete-button" onclick="deleteStudent(${student.id})">Delete</button>
                    </td>
                </tr>
            `;
        });

        tableHTML += `
                </tbody>
            </table>
        `;

        tableContainer.innerHTML = tableHTML;
    }

    function editStudent(id) {
        // Implement edit functionality
        console.log('Edit student with ID:', id);
    }

    function deleteStudent(id) {
        if (confirm('Are you sure you want to delete this student?')) {
            fetch(`delete_student.php?id=${id}`, { method: 'DELETE' })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Student deleted successfully');
                        // Refresh the table
                        const batch = document.getElementById('batch-select').value;
                        const department = document.getElementById('department-select').value;
                        fetchStudentDetails(batch, department);
                    } else {
                        alert('Error deleting student');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    }
</script>
    
</body>
</html>
