# Login-Webpage
<h1>For database connection</h1>
Change information on the databaseCon.php to configure your database.

<h1>Database Table Structure</h1>
CREATE TABLE `users` (<br>
  `username` text NOT NULL PRIMARY,<br>
  `password` text NOT NULL,<br>
  `status` text NOT NULL,<br>
  `country` text NOT NULL,<br>
  `firstname` text NOT NULL,<br>
  `lastname` text NOT NULL,<br>
  `email` text NOT NULL,<br>
  `children` int(11) NOT NULL<br>
)<br>
