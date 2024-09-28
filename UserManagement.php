<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="Style_User.css">
    <link rel="stylesheet" href="dashboard.css">
    <title>User Management | LBLMS</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <h2>LB<span class="danger">LMS</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="Amindashboarddemo.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="UserManagement.php" class="active">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>User Management</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Reports</h3>
                </a>
                <a href="Admin_Map.php">
                    <span class="material-icons-sharp">map</span>
                    <h3>Map View</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Tickets</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Sale List</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="Login_Signup.php">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
                </a>
                <a href="Login_Signup.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>User Management</h1>

            <!-- Action Selection -->
            <!-- Action Selection -->
<div class="action-selection">
    <div class="action-item" onclick="showSection('addUser')">
        <img src="Addusers.png" alt="Attendance Icon">
        <p>Add Users</p>
    </div>
    <div class="action-item" onclick="showSection('modifyUser')">
        <img src="Modify_User.png" alt="Class List Icon">
        <p>Modify Users</p>
    </div>
    <div class="action-item" onclick="showSection('deleteUser')">
        <img src="Delete_User.png" alt="Timetable Icon">
        <p>Delete Users</p>
    </div>
    <div class="action-item" onclick="showSection('addBatch')">
        <img src="Addbatch.png" alt="Exam Icon">
        <p>Add Batch</p>
    </div>
    <div class="action-item" onclick="showSection('viewBatch')">
        <img src="Viewbatch.png" alt="Calendar Icon">
        <p>View Batches</p>
    </div>
    <!-- Add more items as needed -->
</div>


            <!-- Add New User Form -->
            <div class="section" id="addUser" style="display:none;">
                <h2>Add New User</h2>
                <form id="addUserForm">
                    <div>
                        <label for="userType">User Type:</label>
                        <select id="userType" name="userType">
                            <option value="student">Student</option>
                            <option value="supervisor">Supervisor</option>
                        </select>
                    </div>
                    <div>
                        <label for="userName">User Name:</label>
                        <input type="text" id="userName" name="userName" required>
                    </div>
                    <div>
                        <label for="userEmail">Email:</label>
                        <input type="email" id="userEmail" name="userEmail" required>
                    </div>
                    <div>
                        <label for="userBatch">Batch (Class):</label>
                        <input type="text" id="userBatch" name="userBatch">
                    </div>
                    <button type="submit">Add User</button>
                </form>
            </div>
            <!-- End of Add New User Form -->

            <!-- Modify User Form -->
            <div class="section" id="modifyUser" style="display:none;">
                <h2>Modify User Details</h2>
                <form id="modifyUserForm">
                    <div>
                        <label for="selectUser">Select User:</label>
                        <select id="selectUser" name="selectUser">
                            <!-- Dynamic user options will be inserted here by JavaScript -->
                        </select>
                    </div>
                    <div>
                        <label for="modifyUserName">New User Name:</label>
                        <input type="text" id="modifyUserName" name="modifyUserName">
                    </div>
                    <div>
                        <label for="modifyUserEmail">New Email:</label>
                        <input type="email" id="modifyUserEmail" name="modifyUserEmail">
                    </div>
                    <button type="submit">Modify User</button>
                </form>
            </div>
            <!-- End of Modify User Form -->

            <!-- Delete User Form -->
            <div class="section" id="deleteUser" style="display:none;">
                <h2>Delete User</h2>
                <form id="deleteUserForm">
                    <div>
                        <label for="deleteUserSelect">Select User:</label>
                        <select id="deleteUserSelect" name="deleteUserSelect">
                            <!-- Dynamic user options will be inserted here by JavaScript -->
                        </select>
                    </div>
                    <button type="submit">Delete User</button>
                </form>
            </div>
            <!-- End of Delete User Form -->

            <!-- Add Batch Section -->
            <div class="section" id="addBatch" style="display:none;">
                <h2>Add Batch</h2>
                <form id="addBatchForm">
                    <div>
                        <label for="batchUser">Select User:</label>
                        <select id="batchUser" name="batchUser">
                            <!-- Dynamic user options will be inserted here by JavaScript -->
                        </select>
                    </div>
                    <div>
                        <label for="batchSupervisor">Select Supervisor:</label>
                        <select id="batchSupervisor" name="batchSupervisor">
                            <!-- Dynamic supervisor options will be inserted here by JavaScript -->
                        </select>
                    </div>
                    <div>
                        <label for="batchName">Batch (Class) Name:</label>
                        <input type="text" id="batchName" name="batchName" required>
                    </div>
                    <button type="submit">Assign Batch</button>
                </form>
            </div>
            <!-- End of Add Batch Section -->

            <!-- View Batch Associations Section -->
            <div class="section" id="viewBatch" style="display:none;">
                <h2>View Batch</h2>
                <form id="viewBatchForm">
                    <div>
                        <label for="viewBatchSelect">Select Batch:</label>
                        <select id="viewBatchSelect" name="viewBatchSelect">
                            <!-- Dynamic batch options will be inserted here by JavaScript -->
                        </select>
                    </div>
                    <button type="submit">View Details</button>
                </form>
                <div id="batchDetails">
                    <!-- Batch details will be displayed here -->
                </div>
            </div>
            <!-- End of View Batch Associations Section -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Reza</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="images/profile-1.jpg">
                    </div>
                </div>
            </div>
            <!-- End of Nav -->

            <!-- Additional Content Here -->
        </div>
        <!-- End of Right Section -->

    </div>

    <script src="user-management.js"></script>
	<script src="orders.js"></script>
    <script src="index.js"></script>
</body>

</html>
