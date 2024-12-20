<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Handle signout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset(); // Clear session variables
    session_destroy();
    header("Location: login.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Dashboard</title>
    <link rel="stylesheet" href="Home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <nav>
                <div class="slidebar">
                    <div class="logo_details">
                        <i class="bx bxl-audible icon"></i>
                        <div class="logo_name">Healthy</div>
                        <i class="bx bxl-menu" id="btn"></i>
                    </div>
                    <u1 class="nav-list">
                        <li>
                            <a href="#">
                                <i class="bx bx-grid-alt"></i>
                                <span class="link_name">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-user "></i>
                                <span class="link_name">User</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chat"></i>
                                <span class="link_name">Message</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-pie-chart-alt-2"></i>
                                <span class="link_name">Analytics</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-folder"></i>
                                <span class="link_name">File Manager</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-cart-alt"></i>
                                <span class="link_name">Order</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-cog"></i>
                                <span class="link_name">Setting</span>
                            </a>
                        </li>
                    </u1>
                </div>
        </aside>
        <main class="main-content">
            <header class="header">
                <p>Good Morning </p><span class="welcome-back">Welcome Back 🎉</span>
            </header>
            <div class="stats">
                <div class="card" id="steps">
                    <h3>Steps</h3>
                    <p>0 Steps</p>
                    <p>0% of your goals</p>
                </div>
                <div class="card" id="water">
                    <h3>Water</h3>
                    <p>0 Liters</p>
                </div>
                <div class="card" id="calories">
                    <h3>Calories</h3>
                    <p>Today</p>
                </div>
                <div class="card" id="heart_rate">
                    <h3>Heart Rate</h3>
                    <p>75 bpm</p>
                </div>
            </div>
            <div class="progress-section">
                <div class="activity-chart">
                    <h3>Activity</h3>
                    <div class="histogram">
                    <div class="bar-chart-container">
                        <div class="bar-chart">
                            <div class="bar" style="--height: 20%;" data-day="">
                                <span class="label">Mon</span>
                            </div>
                            <div class="bar" style="--height: 40%;" data-day="">
                                <span class="label">Tues</span>
                            </div>
                            <div class="bar" style="--height: 30%;" data-day="">
                                <span class="label">Wed</span>
                            </div>
                            <div class="bar" style="--height: 50%;" data-day="50%">
                                <span class="label">Thurs</span>
                            </div>
                            <div class="bar" style="--height: 35%;" data-day="">
                                <span class="label">Fri</span>
                            </div>
                            <div class="bar" style="--height: 45%;" data-day="">
                                <span class="label">Satur</span>
                            </div>
                            <div class="bar" style="--height: 20%;" data-day="">
                                <span class="label">Sun</span>
                            </div>
                            
                        </div>
                    </div>
                    </div>
                    
                    <div class="chart">
                        <div class="bar" style="height: 50%;">50%</div>
                        <!-- Add bars for other days -->
                    </div>
                </div>
                <div class="progress-chart">
                    <h3>Progress</h3>
                    <div class="ring">
                    <div class="ring-chart">
                        <div class="ring-label">Strething<br>40hrs</div>
                        <ul>
                            <li>Cardio: --30 hrs</li>
                            <li>Stretching: 40 hrs</li>
                            <li>Treadmill: 30 hrs</li>
                            <li>Strength: 20 hrs</li>
                        </ul>
                      </div>
                    </div>
                   
                </div>
            </div>
            <div class="trainer-section">
                <h3>Recommended Trainer for You</h3>
                <div class="trainer-card">
                    <a href="https://youtube.com/@chrisbumstead?si=kDHi4Tbc84Nh4ESX">
                        <img src="chris.jpg" alt="Trainer" style="width: 300px;height: 170px;" >
                    <p>Chris Bumstead</p>
                    <p>Fitness Specialist</p>
                    </a>
                    
                </div>
                <div class="trainer-card">
                    <a href="https://youtube.com/@arnoldschwarzenegger?si=BQ3OEkl235Vw13BY">
                    <img src="Arnald1.jpg"  alt="Trainer" style="width: 300px;height: 170px;" >
                    <p>Arnold Schwarzenegger</p>
                    <p>Fitness Specialist</p>
                </a>
                </div>
                <div class="trainer-card">
                    <a href="https://youtube.com/@ronniecoleman8?si=O28uPDNMgsWKCuPU">
                    <img src="Ronnie_Coleman.jpg" alt="Trainer" style="width: 300px;height: 170px;" >
                    <p>Ronnie Coleman</p>
                    <p>Fitness Specialist</p>
                </a>
                </div>
                <!-- Add more trainer cards -->
            </div>
        </main>
        <aside class="profile">
            <li class="slidebar" id="user_bgg">
                <div class="pofile_details">
                    <img src="user.jpeg" alt="profile image" id="user" style="display: inline-block;">
                    <div class="profile_content" style="display: inline-block;">
                        <div class="name">User Name</div>
                        <a href="Login.html"><i class="bx bx-log-out" id="log_out"></i></a>
                    </div>
                </div>
                <div class="set&edit_profile">
                    <div class="profile_set">
                    <button type="button"> </button>
                    </div>
                    <div class="edit_profile">
                    <a href="page4.html"><button type="button">Edit your Profile</button></a>
                    </div>
                </div>
                <div class="goals">
                    <h3>Your Goals</h3>
                    <ul>
                        <div class="ee">
                            <img src="running.jpeg" alt="img not found" class="goal_img">
                            <input type="number" placeholder="Running 0 km" style="width: 50%;height: 50%;">
                        </div>
                        <div class="ee">
                            <img src="sleep.jpeg" alt="img not found" class="goal_img">
                            <input type="number" placeholder="Running 0 km" style="width: 50%;height: 50%;">
                        </div>
                        <div class="ee">
                            <img src="wheight_loss.jpeg" alt="img not found" class="goal_img">
                            <input type="number" placeholder="Running 0 km" style="width: 50%;height: 50%;">
                        </div>
                    </ul>
           
            <div class="Shchedule">
                <h3>Shcheduled</h3>
                <ul> 
                    <div class="ee">
                    <img src="yogo.jpeg" alt="img not found" class="goal_img">
                    <input type="number" placeholder="Yogo time" style="width: 50%;height: 50%;">
                </div>
                <div class="ee">
                    <img src="swim.jpg" alt="img not found" class="goal_img">
                    <input type="number" placeholder="swim time" style="width: 50%;height: 50%;">
                </div>                                                  
            </div>
            </div>

        </aside>
    </div>
</body>
</html>