<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>The Opinion Point Chat</title>
  <link rel="stylesheet" href="../../TheOP/css/style.css">
</head>
<body>
  <ul class="pages">
    <li class="chat page">
      <div class="chatArea">
        <ul class="messages"></ul>
      </div>
      <input class="inputMessage" placeholder="Type here..."/>
    </li>
    <li class="login page">
      <div class="form">
        <h3 class="title">What's your nickname?</h3>
        <input class="usernameInput" type="text" maxlength="14" />
      </div>
    </li>
  </ul>

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://cdn.socket.io/socket.io-1.3.2.js"></script>
  <script src="../../TheOP/js/main.js"></script>
</body>
</html>