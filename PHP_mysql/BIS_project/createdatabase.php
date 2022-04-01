<?php
    $title = 'Create mockdata Database';
    $database = 'mockdata';
    include('header.php');


    $dsn = 'mysql:host=localhost';
    $username = 'root';
    $password = '';
    $user = 'admin';
    $pass = 'Pa11word';

    try {
        $db = new PDO($dsn,$username,$password);

        $db->exec("CREATE DATABASE IF NOT EXISTS `$database`;
        CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
        GRANT ALL ON *.* TO '$user'@'localhost';
        FLUSH PRIVILEGES;");


        echo '<p>New user <b>' . $user . '</b> has been created and granted full access.</p>';
        echo '<p>Database <b>' . $database . '</b> has been created.</p>';

        $db = NULL;
        $db = new PDO($dsn,$user,$pass);
      
        $qry = 'USE ' . $database;
        $created = $db->exec($qry);

        // CREATE Customers TABLE
        $qry = 'CREATE TABLE IF NOT EXISTS customers (id INT, first_name VARCHAR(50), last_name VARCHAR(50),city VARCHAR(50),state VARCHAR(50))';
        $created = $db->exec($qry);
        echo '<p>Table <b>customers</b> has been created.</p>';

       


        // AUTO INSERT DATA INTO Customers TABLE
        $query = "insert IGNORE into customers (id, first_name, last_name, city, state)
                  VALUES
                  (1, 'Steven', 'Ewen', 'Phoenix', 'AZ'),
                  (2, 'Barclay', 'Frodsham', 'Philadelphia', 'PA'),
                  (3, 'Jedediah', 'Kornacki', 'Saint Louis', 'MO'),
                  (4, 'Il\'\'yse', 'McClinton', 'Dallas', 'TX'),
                  (5, 'Leandra', 'Waylett', 'New York City', 'NY'),
                  (6, 'Bren!', 'Deval', 'Huntington', 'WV'),
                  (7, 'Barthel', 'Si'lson', 'Yakima', 'WA'),
                  (8, 'Lorri', 'Ivashov', 'San Francisco', 'CA'),
                  (9, 'Kyle', 'Smith', 'Baton Rouge', 'LA'),
                  (10, 'Klarrisa', 'Mans\'er', 'New Orleans', 'LA'),
                  (11, 'Aeriel', 'Abelov', 'Honolulu', 'HI'),
                  (12, 'Alis', 'Domenicone', 'Pasadena', 'CA'),
                  (13, 'Sosanna', 'Le Cornu', 'Tacoma', 'WA'),
                  (14, 'Sosanna', 'Mordacai', 'Terre Haute', 'IN'),
                  (15, 'Lyndel', 'Merrisson', 'Montgomery', 'AL'),
                  (16, 'Toby', 'Leslie', 'Austin', 'TX'),
                  (17, 'Madalyn', 'Guiducci', 'Topeka', 'KS'),
                  (18, 'Aloysius', 'Lapere', 'Tacoma', 'WA'),
                  (19, 'Barthel', 'Silon', 'Yakima', 'WA'),
                  (20, 'Thaxter', 'Lippingwell', 'Cedar Rapids', 'IA'),
                  (21, 'Adrianna', 'Derks', 'Memphis', 'TN'),
                  (22, 'Alicia', 'Dike', 'Phoenix', 'AZ'),
                  (23, 'Ewen', 'Dike', 'Phoenix', 'AZ'),
                  (24, 'Steve', 'Ivashov', 'San Francisco', 'CA'),
                  (25, 'Ky1e', 'Bonehill', 'Baton Rouge', 'LA')";
        $insert_count = $db->exec($query); 
        
         echo '<p>Data added to customers table.</p><br>';
         echo '<p>You can now access the data for the <b>mockdata</b> database.';

    } 
    catch (PDOException $exception) {
        echo 'Error: ' . $exception->getCode() . ' | ' . $exception->getMessage();
    }

    // Close  mockdata database
    include('dbclose.php');

    include('footer.php');
?>