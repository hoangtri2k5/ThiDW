<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="http://127.0.0.1:8000/api/tests/create" name="formClient" method="post">
        <label for="name">name: </label><br>
        <input type="text" id="name" name="name"><br>
        <label for="price">price: </label><br>
        <input type="number" id="price" name="price"><br>
        <label for="avatar">avatar:</label><br>
        <input type="text" id="avatar" name="avatar"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>