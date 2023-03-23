# Login-Webpage
<h1>For database connection</h1>
Change information on the databaseCon.php to configure your database.

<h1>Database Table Structure</h1>
CREATE TABLE `users` (
  `username` text NOT NULL PRIMARY,
  `password` text NOT NULL,
  `status` text NOT NULL,
  `country` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `children` int(11) NOT NULL
)
