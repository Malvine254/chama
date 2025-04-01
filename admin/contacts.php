<?php include '../php/register_user.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background: teal;
            padding: 20px;
            color: #fff;
        }

        .sidebar h4 {
            margin-bottom: 28px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 10px 0;
            transition: 0.3s;
            font-weight: bold;
        }

        .sidebar a:hover {
            color: #fff;
        }

        .content {
            padding: 30px;
        }

        .card {
            border: none;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #343a40;
            color: #fff;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .back-up{
            background-color: teal;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h4>DASHBOARD</h4>
            <a href="index.php">Members</a>
            <a href="contacts.php">Contacts</a>
            <a href="#">Settings</a>
            <a href="#">Logout</a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Topbar -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <h5>Welcome, Admin</h5>
                </div>
            </nav>

                            <!-- Page Content -->
            <div class="content row col-md-11">

                <!-- Table Card -->
                <div class="card ">
                    <div class="card-header back-up text-white">
                        <h5>Members Table</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                   <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php displayAllContacts(); ?>
                                <!-- Add more rows dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
          
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
