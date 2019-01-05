
<?php
include_once '../scripts/header.php';
?>
<body>
  <div style="background-color:#FFAAFF">
    join to room
    <form action="room.php" method="post">
      <select name="room">
        <option value="room1">ROOM1</option>
        <option value="room2">ROOM2</option>
        <option value="room3">ROOM3</option>
      </select>
      <input type="submit" value="move"/>
    </form>
  </div>

</body>
<?php
include_once '../scripts/footer.php';
?>
