This will be a basic introduction to the set up for a gym management system only having the checkin feature
  -Once downloaded on windows add the repo in C:\\xampp\htdocs\ so it can be accessible on localhost/gym/.... on your browser
  -This app uses xampp as the server (https://www.apachefriends.org/download.html)
  -the db file can be foun in the db dir
  -ensure you have a database and users as shown below 

  
    $db   = 'simple_login';    // database name
    $user = 'user';            // your MySQL username
    $pass = '1234';

    
  -or you can modify according to your preference

  there is already an add user page /gym/add_user.php which will allow you to add a user and password.
  //the passwords have been hashed using the inbuilt hashing function in php

  
  
