<p align="center"><img src="https://github.com/Monika171/OutplacementHeroes/blob/master/public/profile_pic/oph.jpeg" width="400"></p>



## IMPORTANT!!!

1) After cloning, modify .env file with your own database, email values (or mailtrap values). Because a user can't proceed without email verification.  

Also enter admin values, eg:
    
ADMIN_NAME="Some Admin Name"  
ADMIN_EMAIL=adminexample@site.com  
ADMIN_PASSWORD=AdminPassword  

and email values, eg:  
  
MAIL_MAILER=smtp  
MAIL_HOST=smtp.gmail.com  
MAIL_PORT=587  
MAIL_USERNAME=site_email@site.com  
MAIL_PASSWORD=YourEmailPassword  
MAIL_ENCRYPTION=tls  
MAIL_FROM_ADDRESS=site_email@site.com  
MAIL_FROM_NAME=OPH  

2) Go for:  
  
"php artisan migrate:fresh" and  
"php artisan db:seed" and  
"php artisan storage:link"  
  
3) Import 'countries.sql', 'states.sql', 'cities.sql', 'courses.sql', 'designations.sql', 'industries.sql', 'skills.sql', 'specializations.sql' at your database.  
(If required, delete the previous existing tables with same name which got created after 'php artisan migrate' in first step!
Well sql query does the same but just in case..)  
  
(These .sql files are available here inside 'OPH_sql_import1')  
  
NOTE:   
-----------------
[A] 'cities.sql' is comparatively a big file. May not get imported easily without doing some extra one or two steps.. i.e:  
1) At  
xampp control panel-> (mysql)config -> my.ini -> (open and set)  
myisam_sort_buffer_size = 100M  
2)
copy cities.sql to "C:\xampp\mysql\bin", then in terminal-  
C:\xampp\mysql\bin>mysql -u [username] -p [databaseName] < cities.sql  

[B] 'skills.sql' file may not get imported directly. In that case, please copy the INSERT QUERY from the file and use SQL(INSERT) at phpmyadmin to achieve the same.  
  
  
## Initial tasks:  
-HIRING EMPLOYERS, JOBSEEKERS, ADMIN (sending notification carrying JD link, if latter is eligible etc).  
~~[AssignedTo: Monika]  

-VOLUNTEER(S), CHAT INTERFACE:  
~~[AssignedTo: Priti]  
  
-SEPARATING EMPLOYERS, CONSULTANTS:  
~~[AssignedTo: Pawan]  
  
-HOME+LOGIN+REGISTRATION PAGE DESIGN:  
~~[AssignedTo: Akanksha]  
  
  
Other pages (and more to be added later):  
-dashboard   
-profile/CV upload page for separating employer (def: has details of people who got fired)  
  
"registration & login system, candidate profile including Resume& displaying the same, display job seeker resume, employer can view applicants, company listing, notice period.. etc."

