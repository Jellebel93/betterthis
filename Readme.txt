
I/ HOW TO IMPORT DATABASE TO MYSQL
- The file sql storage on folder "database" with name "Dump20140211.sql"
- The database export by MySQL Workbench. 
- Before import the database, we must change some infomation on this file. (open it on notepad++)
 1/ Change the database name: 
   + Currently, we have line
{code}
CREATE DATABASE  IF NOT EXISTS `betterthis` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `betterthis`;
{code}
  We must change the database name "betterthis" same your database as you want to import OR remove 2 lines that when import with phpmyadmin or emma.
 
 2/ Change information of domain-name: Currently, all url used "http://localhost/betterthis". So, when import on your host, the wordpress can not run.
 You must replace this url by your domain.
 + Open file "Dump20140211.sql" by notepad++ (or others editer but not notepad in window and some editer has formater).
 + Ctrl+H (used fature find/replace) and replace all "localhost/betterthis" by your domain (ex: exampledomain.com). If your domain used https, you must replace all "http://localhost/betterthis" by https://your-domain.com
 
- After done, you can import it on your mysql of your hostting.

II/ HOW TO CONFIGURAION
- Open file "wp-config.php"
- Change information of your hostting for true
/** The name of the database for WordPress */
define('DB_NAME', 'betterthis');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');



DONE/

If have question, contact for me: Vu Duy Tu<duytucntt@gmail.com>
