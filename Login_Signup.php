<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Login & Registration</title>
    
    <style>
        /* Initially hide the Year, Batch, and Section fields */
        #yearBatchFields {
            display: none;
            margin-top: 20px; /* Space between radio buttons and dropdowns */
        }
        /* Ensure dropdowns fit in a single row */
        .dropdown-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px; /* Space between dropdowns and Register button */
        }
        .dropdown-container .input-box {
            flex: 1;
        }
        .input-box select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .input-radio {
            margin-bottom: 20px; /* Space between radio buttons and dropdowns */
        }

        /* Styling the dropdown (select) field */
        select {
            background-color: #000; /* Black background for dropdown */
            color: #fff; /* White text for dropdown */
            cursor: pointer;
        }

        /* Styling for options when dropdown is hovered */
        select:hover {
            background-color: #555; /* Grey background on hover */
        }

        /* Styling each option in the dropdown */
        select option {
            background-color: #000; /* Black background for options */
            color: #fff; /* White text for options */
        }

        /* Styling option on hover */
        select option:hover {
            background-color: #888; /* Grey background for options on hover */
        }

        /* Styling for the message div */
        #message {
            display: none;
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        #loginErrorMessage {
        display: none;
        color: #fff; /* White text */
        background-color: #ff4d4d; /* Reddish background */
        padding: 15px;
        border-radius: 8px;
        font-family: Arial, sans-serif;
        font-weight: bold;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
        margin: 10px 0;

        }

    </style>
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>LBLMS .</p>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

<!----------------------------- Form box ----------------------------------->    
<div class="form-box">
        
    <!------------------- login form -------------------------->
    <div class="login-container" id="login">
        <div class="top">
            <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
            <header><strong>Login</strong></header>
        </div>
        <form id="loginForm" action="Validate.php" method="POST" onsubmit="return validateLogin()">
            <div class="input-box">
                <input type="text" id="loginUsername" class="input-field" name="Username" placeholder="Username or Email">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" id="loginPassword" name="Password" class="input-field" placeholder="Password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Sign In">
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="login-check">
                    <label for="login-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </form>
        <div id="loginErrorMessage" style="color: white; display: none;"></div>
    </div>
    
    <!------------------- registration form -------------------------->
    <div class="register-container" id="register">
        <div class="top">
            <span>Have an account? <a href="#" onclick="login()">Login</a></span>
            <header><strong>Sign Up</strong></header>
        </div>
        <form id="registerForm">
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" id="registerFirstname" class="input-field" name="registerFirstname" placeholder="Firstname">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" id="registerLastname" class="input-field" name="registerLastname" placeholder="Lastname">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="two-forms">
                <div class="input-box">
                    <input type="email" id="registerEmail" class="input-field" name="registerEmail" placeholder="Email">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="text" id="registerPhone" class="input-field" name="registerPhone" placeholder="Phone number">
                    <i class="fas fa-phone-alt"></i>
                </div>
            </div>
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" id="registerDepartment" class="input-field" name="registerDepartment" placeholder="Department">
                    <i class="fas fa-building"></i>
                </div>
                <div class="input-box">
                    <input type="text" id="registerGender" class="input-field" name="registerGender" placeholder="Gender">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" id="registerUsername" class="input-field" name="registerUsername" placeholder="Username">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" id="registerPassword" class="input-field"  name="registerPassword" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
            </div>

            <span id="username_error" style="color: white; display: block;"></span>
            <span id="email_error" style="color: white; display: block;"></span>
            <div class="input-radio">
                <input type="radio" id="supervisor" name="user-type" value="supervisor" onclick="toggleYearBatchFields()">
                <label for="supervisor">Supervisor</label>
                <input type="radio" id="student" name="user-type" value="student" onclick="toggleYearBatchFields()">
                <label for="student">Student</label>
            </div>
            <!-- Year, Batch, and Section fields (hidden by default) -->
            <div id="yearBatchFields" class="dropdown-container">
                <div class="input-box">
                    <select id="registerYear" class="input-field" name="registerYear">
                        <option value="">Select Year</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                    </select>
                </div>
                <div class="input-box">
                    <select id="registerBatch" class="input-field" name="registerBatch">
                        <option value="">Select Batch</option>
                        <option value="2022-26">2022-26</option>
                        <option value="2023-27">2023-27</option>
                        <option value="2024-28">2024-28</option>
                        <option value="2025-29">2025-29</option>
                    </select>
                </div>
                <div class="input-box">
                    <select id="registerSection" class="input-field" name="registerSection">
                        <option value="">Select Section</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Register">
            </div>
            <div id="message"></div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="register-check">
                    <label for="register-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Terms & conditions</a></label>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function myMenuFunction() {
        var i = document.getElementById("navMenu");
        if(i.className === "nav-menu") {
            i.className += " responsive";
        } else {
            i.className = "nav-menu";
        }
    }

    // Get the button and form container elements
    var loginBtn = document.getElementById("loginBtn");
    var registerBtn = document.getElementById("registerBtn");
    var loginForm = document.getElementById("login");
    var registerForm = document.getElementById("register");

    function login() {
    loginForm.style.left = "4px";
    registerForm.style.left = "-520px";  // Change 'right' to 'left'
    loginBtn.classList.add("white-btn");
    registerBtn.classList.remove("white-btn");
    loginForm.style.opacity = 1;
}

function register() {
    loginForm.style.left = "-510px";
    registerForm.style.left = "4px";  // Change 'right' to 'left'
    loginBtn.classList.remove("white-btn");
    registerBtn.classList.add("white-btn");
    registerForm.style.opacity = 1;
}

    // Add click event listeners to the buttons
    loginBtn.addEventListener('click', login);
    registerBtn.addEventListener('click', register);

    // Call login() initially to set the default state
    login();

    function toggleYearBatchFields() {
        var studentRadio = document.getElementById('student');
        var yearBatchFields = document.getElementById('yearBatchFields');
        
        // Show year, batch, and section fields if student is selected, hide otherwise
        if (studentRadio.checked) {
            yearBatchFields.style.display = 'flex';
        } else {
            yearBatchFields.style.display = 'none';
        }
    }

    function validateLogin() {
        var username = document.getElementById('loginUsername').value;
        var password = document.getElementById('loginPassword').value;

        if(username === "" || password === "") {
            alert("Both fields are required.");
            return false;
        }
        return true;
    }

    $(document).ready(function() {
        $('#registerForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'insert.php',
                data: $(this).serialize(),
                success: function(response) {
                    $('#message').html(response).show();
                    if (response.includes('successful')) {
                        $('#message').removeClass('error').addClass('success');
                        $('#registerForm')[0].reset();
                    } else {
                        $('#message').removeClass('success').addClass('error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + ": " + error);
                    $('#message').html("An error occurred. Please try again.").show().removeClass('success').addClass('error');
                }
            });
        });

        // AJAX function for username and email checks
        $('#registerUsername, #registerEmail').on('blur', function() {
            var field = $(this).attr('id') === 'registerUsername' ? 'username' : 'email';
            var value = $(this).val();
            
            $.ajax({
                url: 'insert.php',
                method: 'POST',
                data: {
                    check_field: field,
                    check_value: value
                },
                dataType: 'json',
                success: function(response) {
                    if (response.exists) {
                        $('#' + field + '_error').text(field.charAt(0).toUpperCase() + field.slice(1) + ' already exists');
                    } else {
                        $('#' + field + '_error').text('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + ": " + error);
                }
            });    
        });

        $('#loginForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'Validate.php',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                window.location.href = response.redirect;
            } else {
                $('#loginErrorMessage').text(response.message).show();
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error: " + status + ": " + error);
            $('#loginErrorMessage').text("An error occurred. Please try again.").show();
        }
    });
});
    });
</script>
</body>
</html>