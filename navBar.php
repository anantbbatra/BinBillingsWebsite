<?php
echo('
<!DOCTYPE html>
<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a, .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover, .dropdown:hover .dropbtn {
            background-color: red;
        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
<h1 style="color: green" align="center">Bin Billings</h1>

<ul>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Transactions</a>
        <div class="dropdown-content">
            <a href="transaction_history.php">Search</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Providers</a>
        <div class="dropdown-content">
            <a href="manage_firms.php">Manage Existing</a>
            <a href="add_firm.php">Add New</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Customers</a>
        <div class="dropdown-content">
            <a href="manage_customers.php">Manage Existing</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Bins</a>
        <div class="dropdown-content">
            <a href="manage_customers.php">Manage Existing</a>
            <a href="manage_customers.php">Add New</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Payments</a>
        <div class="dropdown-content">
            <a href="manage_customers.php">View Historical</a>
            <a href="manage_customers.php">Create Payout</a>
        </div>
    </li>
    <li style="float:right"><a class="active" href="log_out.php">Log Out</a></li>
</ul>

</body>
</html>
');
?>