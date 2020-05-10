<?php
$webpage_title = "Welcome!";
$webpage_name = "Jacky Eng's Website";
$my_name   = "Jacky Eng";
$web_server_software = "LAMP";
$webpage_editor = "Atom";
$fileNameIn = "cda216_io.txt";
$fileNameOut = "cda216_ior.txt";

// Report all PHP errors (see changelog)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
  An associative array that acts similar to a hashmap.
  - each assignment carries an array of links, in which those links also have associated descriptions
*/
$list = array(
  "Web Server Setup" => array(
                          array("phpsetup/server.png","start page"),
                          array("phpsetup/phpinfo.png","php info page"),
                          array("phpsetup/phpmyadmin.png","phpmyadmin page")
                        ),
  "Create Your First PHP Page" => array(
                                    array("index.php", "index.php file"),
                                    array("vars.php", "vars.php file")
                                  ),
  "Loop/Array/Function Page" => array(
                                  array("lfa/lfa.php", "lfa.php file")
                                ),
  "File I/O Page" => array(
                      array("fileio.php", "fileio.php web page")
                     ),
  "Create and Populate a MySQL Table" => array(
                                          array("db.php", "web page")
                                         ),
   "HTML5/PHP Table From MySQL" => array(
                                   array("php_mysql_table.php", "php_mysql_table web page")
                       ),
   "PHP Form With MySQL" => array(
                         array("php_mysql_form.php", "php_mysql_form web page")
                       ),
  "PHP/Javascript AJAX Page" => array(
                                  array("form.html", "Ajax example webpage")
                                ),
  "User Registration Site" => array(
                                array("registration.php", "user sign up page")
                              ),
  "User Login" => array(
                    array("login.php", "user log in page")
                  ),
  "Admin Site" => array(
                    array("N/A", "N/A")
                  )
);
?>
