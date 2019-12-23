<?php
if (!isset($_SESSION["logged_user"])){
    header("Location:login.php");
}
echo "Hello " .$_SESSION['logged_user']['username'].", you are in the main page";
$user_id = $_SESSION["logged_user"]["id"];
?>
<br>
<a href="index.php?target=user&action=logout"><button>Logout</button></a>
<br>
<a href="index.php?target=view&action=viewRouter&view=upload"><button>Upload video</button></a>
<br>
<a href="index.php?target=video&action=getAll&owner_id=<?= $user_id; ?>"><button>Show my videos</button></a>
<table>
    <?php
    if (isset($videos)) {
        foreach ($videos as $video) {
            echo "<tr><th>";
            echo $video["title"];
            echo "</th></tr>";
            echo "<tr><th>";
            echo $video["date_uploaded"];
            echo "</th></tr>";
            echo "<tr><th><a href='index.php?target=video&action=getById&id=" . $video["id"] . "'><img width='200px' src='";
            echo $video["thumbnail_url"];
            echo "'></a></th></tr>";
        }
    }
    ?>
</table>
