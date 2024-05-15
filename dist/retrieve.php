<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yawhcf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM reg";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
    <link
      rel="shortcut icon"
      href="assets/img/favicon.png"
      type="image/x-icon"
    />
    <style>
        main {
            margin: 100px 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
        <!-- HEADER  -->

        <header class="">
      <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="flex flex-wrap items-center justify-between mx-auto p-4">

          <a href="index.html#" class="flex justify-center items-center gap-3 align-middle">
            <img src="assets/img/logo.png" alt="logo" class="h-10">
            <p class="text-accent tracking-wide text-center font-bold text-lg font-luckiest">VISIBLE MINIORITY RADIO & TV NETWORK (VMRTN) </p>
            <img src="assets/img/favicon.png" alt="logo" class="h-10">
          </a>

        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
          </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
          <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

            <li>
              <a href="index.html#about" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-theme md:p-0 ">About</a>
            </li>

            <li>
              <a href="index.html#programme" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-theme md:p-0 ">Programme</a>
            </li>

            <li>
              <a href="index.html#committee" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-theme md:p-0 ">Organizing Committee</a>

            <li>
              <a href="index.html#partner" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-theme md:p-0 ">Our Partners</a>
            </li>
          </ul>
        </div>
        </div>
      </nav>
      
    </header>
    <!-- HEADER ENDS -->

    <main class="">
    <h2>Registered Users</h2>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Attending</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data = json_decode($row["data"], true);
                echo "<tr>";
                echo "<td>" . $data['fname'] . "</td>";
                echo "<td>" . $data['lname'] . "</td>";
                echo "<td>" . $data['dob'] . "</td>";
                echo "<td>" . $data['gender'] . "</td>";
                echo "<td>" . $data['country'] . "</td>";
                echo "<td>" . $data['attending'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        ?>
    </table>
    </main>
    
    <footer class="bg-accent  dark:bg-gray-900">
  <div class="mx-auto w-full max-w-screen-xl">
    <div class="sm:flex sm:items-center text-center sm:justify-between py-4">
        <span class="text-sm text-light sm:text-center dark:text-gray-400">© <span id="year"></span> <a href="https://flowbite.com/" class="hover:underline">YAWHCF</a>. All Rights Reserved.
        </span>
        <div class="flex mt-4 sm:justify-center sm:mt-0">
 
        </div>
    </div>
  </div>
</footer>
</body>
</html>

<?php
$conn->close();
?>
