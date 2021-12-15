<?php
//editing comment
require "database.php"; 
$idd = $_GET['id'];
$postcontent = $_POST['postCont'];
echo("<b> EDITING COMMENT <b>");
$stmt = $mysqli->prepare("UPDATE comments SET content=? WHERE comment_id=?"); //updating comments
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('si', $postcontent, $idd);

$stmt->execute();

$stmt->close();
?>
<form method='POST'>
        <br>
        <p><label>Insert Comment Here</label><br>
        <textarea name='postCont' cols='20' rows='2' value=<?php if(isset($postcontent)){ echo $postcontent;}?>> </textarea></p>
        <input type = 'hidden' value=<?php if(isset($id)){ echo $id;}?> name="HIDDENID"> 

        <?php
        ?>
        <p><input type='submit' value='submit'></p>
        <input type="hidden" name='id' id='<?php echo($rid);?>' value='<?php echo($rid);?>'>
        <!-- passing token -->
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" /> 


</form>
<p> <a href="index.php" style="color:blue;">Go Back</a></p>


