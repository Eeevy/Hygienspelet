<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Highscore</title>
</head>
<body>
    <h1>This is the highscore page</h1>

<?php foreach($highscores as $scores ){
    echo "<li>".$scores->questionText."</li>";
    }
?>
</body>
</html>