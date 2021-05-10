<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_hotel";
// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
  echo "Connection failed: " . $conn->connect_error;
}

if ($_GET['id']) {

  $stmt = $conn->prepare("SELECT * FROM stanze WHERE id = ?");
  $stmt->bind_param("i", $_GET['id']);

  // set parameters and execute
  $stmt->execute();
  $result = $stmt->get_result();
  while($row = $result->fetch_assoc()) { ?>
  <div class="">
    <div class="">
      <strong> room number </strong> <?= $$ow['room_number'] ?>
    </div>
    <div class="">
      <strong> floor </strong> <?= $row['floor'] ?>
    </div>
    <div class="">
      <strong> beds </strong> <?= $row['beds'] ?>
    </div>
  </div> <?php
}

} else { ?>

<table>
  <thead>
    <tr>
      <th>id</th>
      <th>room_number</th>
      <th>floor</th>
      <th>beds</th>
      <th>created_at</th>
      <th>updated_at</th>
    </tr>
  </thead>


<?php

$sql = "SELECT * FROM stanze";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><a href="/db-hotel/lista_stanze/?id=<?= $row['id'] ?>"><?= $row['room_number'] ?></a></td>
    </tr>
  <?php }
} elseif ($result) { ?>
  <td colspan="6">Nessun risultato</td> <?php
} else { ?>
  <td colspan="6">Errore nella selezione</td> <?php
}



?>
</table>
<?php }
$conn->close();?>
