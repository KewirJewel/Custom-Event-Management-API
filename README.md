Custom Event Management API

Introduction:

This API provides endpoints for managing events. You can create, retrieve, update, and delete events.

Prerequisites:

A web bcolumnser
PHP 7.2 or later
XAMPP
Postma
VScode
Installation:
   To start the creation of this API, I downlaoded xampp and install the setup into my desktop. I installed the chrome web bcolumnser. I installed the Postman to run the custom_event_management_ap.I installed VScode and set it up on my desktop. I created a git hup repository called Custom_Event_Management_Api on the git hup website,where the issues to be done were created in the repository.
I Cloned the repository Custom_Event_Management_API and set it up in my desktop.

project structure:
   After creating a git repository, I started creating the project structure to ensure smooth accessibility and clean coding. I created the sql folder which contained the schema.sql file for the codes to create the database and its table. I created the config folder which contain the database.php file for the connection of the filles to the database. I created the api\event folder which contain the read.php, an event folder which contain the create.php, delete.php, update.php and retrieve.php files. I created the readme.md file and finally the model folder which contain the event.php file.

Database connection:
Using PDO for the database interaction, I created the database cnnection of the api. This connection has;
 no password, 
 a root username , 
 a database named custom_event_api, 
 and a localhost. 
 I made sure th various connection messages displayed if connected and if not connected.

Database table:
   I created the database and its table called events. this table consist of;
   an id column with an interger datatype which is the primary key of the table and is auto_incremented,
   title column with a Varchar datatype and is not null.
   description  column with a text datatype and is null.
   date column with a date datatype and is not null.
   location column with a Varchar datatype and is null.
   created_at column with a defualt timestamp and is not null.
   updated_at column with a defualt timestamp and is not null.


Create an Event:
   Including the database.php for the connection into the create.php file, I created the functionality to create an event in to the database. The implementation of the create function for reusable code, the create functionality was implemented. Validation of the imputed information was implemented with html special characters and string tags. As a user input the event title, description , date and location, the event is created into the database providing an auto generated id and a time created.
   Implementing jSON format and http response ,Using a conditional statement in the codes written,
   -if the event is created, a http response (201) will dispay with the Json encoded message saying 'event is created'
   -if the event is not created, a http response (501) will dispay with the Json encoded message saying ' unable to create event '
   -if the data is incomplete , then the http response (400) will dispay with the Json encoded message saying ' unable to create event: data is incomplete '.



Retrieve All Events



Retrieve a Single Event

Bash

Update an Event:
   Including the database.php for the connection into the update.php file, I created the functionality to update an event in to the database. The implementation of the update function for reusable code, the update functionality was implemented. Validation of the imputed information was implemented with html special characters and string tags. As a user input the event title, description and location to replace the information already inputted in an existing event, the event will be updated with newly inputted information into the database providing an unchanged id, and an unchanged time created aswell.
   Implementing jSON format and http response ,Using a conditional statement in the codes written,
  - if the event is updated, a http response (200) will dispay with the Json encoded message saying 'event is updated'
  - if the event is not updated, a http response (503) will dispay with the Json encoded message saying ' unable to update event '
  - if the data is incomplete , then the http response (400) will dispay with the Json encoded message saying ' unable to create event: data is incomplete '.

Delete an Event:
   Including the database.php for the connection into the delete.php file, I created the functionality to delete an event in to the database. The implementation of the delete function for reusable code, the delete functionality was implemented. As a user click the delete button, the event title, description and location will be deleted.
   Implementing jSON format and http response ,Using a conditional statement in the codes written,
   -if the event is deleted, a http response (200) will dispay with the Json encoded message saying 'event is deleted'
  - if the event is not deleted, a http response (503) will dispay with the Json encoded message saying ' unable to delete event'.

Testing the api
   Using postman, the api was tested for the functionality of creation, updating, retrieving and deleting.
   Endpoints









