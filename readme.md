# Test Poyect

This was made as part of a test as a Wordpress developer.

## Local Installation

in the folder "proyect files" you will find a copy of th DB of the project and a wp-config.php in case you need it.

Clone the repository go to you phpmyadmin and run the script. the script will create the DB and al the tables.

on your xampp folder go to "C:\xampp\apache\conf\extra" and open your httpd-vhosts.conf file.

once inside add the following lines to the file:

<VirtualHost *:80> <br/>
    DocumentRoot "C:/xampp/htdocs/test" <br/>
    ServerName simon.test.com <br/>
</VirtualHost> <br/>

save and reset your xampp.

After doing that open your notepad in administrator mode, click on open file and go to "C:\Windows\System32\drivers\etc\" select to show all the files and open your host file.

if you host file your going to add the following line:

127.0.0.1       simon.test.com


This will be enough for the project to run on your local environment

don't forget to add your credentials for mysql on wp-config.php to be able to access de DB

## Usage

Now that the project is running on our local enviroment we are going to "http://simon.test.com/wp-login.php"

the user is admin and the pass 123456

once we have loged in check in Appearance > Themes is the "simon theme test" is activated. if is not, activate it.

after that we have make sure that our cmb2 and simon plugin plugins are activated too.

once they activated we're go to go.