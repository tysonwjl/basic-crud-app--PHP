<?php
//reverse $jokes array
$jokes = array_reverse($jokes);
foreach($jokes as $joke){
    echo '<form action="deletejoke.php" method="post">
    <div class="col-12">' . $joke['joketext'];
?>
    <div class="col fl">
    <form action="deletejoke.php" method="post">
        <input type="hidden" name="id" value="<?=$joke['id']?>">
        <input type="submit" value="Delete">
    </form>
    <form action="editJoke.php" method="post">
        <input type="hidden" name="id2" value="<?=$joke['id']?>">
        <a href="editJoke.php">
        <input type="submit" value="Edit">
</a>
    </form>
</div>


<?php } ?>
