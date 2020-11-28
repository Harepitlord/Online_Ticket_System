# Online_Ticket_System_BasicSite
This is a college lab work project so I haven't gone deep into styling instead just went for a working website with basic styling.
Friends who need clone this project don't forget to have either a localhost server like MAMP, XAMP, WAMP to host this because the php files can't run directly like html.
Add create a dedicated database for this project in the server database.
The database should have four tables :
  Users   => user_id, username, email, password;
  Station => station_id, name;
  Day     => day_id, days;
  Train   => train_id,name,beg_station,end_station,pantry,day_id;
Create a user account of your own wish in the phpmyadmin page with all priveliges for seamless working, then modify the sqlconnect.php file replace last two arguments with your own userid and password.
Either place the clone inside server root folder or else change to the src/webpage folder for sealess access ( Most preferred one).
