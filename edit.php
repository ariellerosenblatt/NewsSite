<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<?php
//Editing post
require "database.php";

$header = $_POST['postTitle'];
$content = $_POST['postCont'];
$link = $_POST['newlink'];

$query = "SELECT id, title, body, links FROM posts WHERE id = ?";

if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param('i', $_GET['id']);

    $stmt->execute();
    $stmt->bind_result($id, $title, $body, $oldlink);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "failed to fetch data\n";
}

if ($_POST['submit'] == 'submit') {
    if ($header != '' && $content != '') { //if it isnt empty
        $sql = "UPDATE posts set title='".$header."', body='".$content."', links='".$link."' where id = " .$_GET['id']; //updating posts

        if ($results = $mysqli->query($sql)) {
            echo "New record created successfully";
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
}
$mysqli->close();
?>

<form method='POST'>

    <p><label>Title</label><br />
    <input type='text' name='postTitle' value='<?php if (isset($title)) { //paste in whats already there
    echo $title;
}?>'></p>

    <p><label>Content</label><br />
    <textarea name='postCont' cols='60' rows='10'><?php if (isset($body)) { //paste in whats already there
    echo $body;
}?></textarea></p>

    <input type = 'hidden' value=<?php if (isset($id)) { //paste in whats already there
    echo $id;
}?> name="HIDDENID"> 

    <p><label>Link? </label><br/>
    <textarea name='newlink' cols='60' rows='3'><?php if (isset($oldlink)) { //paste in whats already there
    echo $oldlink;
}?></textarea></p>

    <p><input type='submit' name='submit' value='submit'></p>

</form>

</body>
</html>






