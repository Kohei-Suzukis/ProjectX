<html>
<?php
	include_once '../scripts/header.php';
?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
<?php 
if (empty($_POST["room"])) {
  $room = "room1";
} else {
  $room = $_POST["room"];
}


$send_param["room"] = $room;

?>
var conn = new WebSocket('ws://128.199.246.253:8080? <?php echo(http_build_query($send_param))?>');

//get connection
conn.onopen = function(e) {
    console.log(e);
};
 
 //recieve message
conn.onmessage = function(e) {
    console.log(e.data);
    var receive_data = {}
    receive_data = JSON.parse(e.data)
    append_message = "<div>"+receive_data["name"] + ":" + receive_data["message"] + "<div>"
    $("#message_box").append(append_message);
};

conn.onerror = function(e) {
    alert("Error");
};

//get disconnected
conn.onclose = function(e) {
    alert("Disconnected");
};

//sending message
function send() {
  var param = {}
  param["name"] = $('#name').val();
  param["message"] = $('#message').val();
  conn.send(JSON.stringify(param));
}
</script>
<body>
  <div style="background-color:#FFAAFF">
    you are in <?php echo($room);?>
    <form action="room.php" method="post">
      <select name="room">
        <option value="room1">ROOM1</option>
        <option value="room2">ROOM2</option>
        <option value="room3">ROOM3</option>
      </select>
      <input type="submit" value="move"/>
    </form>
  </div>
  
  <div style="background-color:#FFFFAA">
   name<input type="text" id="name"> <br>
    message<input type="text" id="message"> <br>
    <input type="button" value="send" onclick= "send()">
  </div>
  
  <div id="message_box" style="background-color:#AAFFFF">
     
  </div>
</body>
<?php
	include_once '../scripts/footer.php';
?>
</html>