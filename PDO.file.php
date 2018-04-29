<?php foreach ($jokes as $joke): ?>
  ⋮ HTML code to output each $joke
<?php endforeach; ?>



<?php
foreach ($result as $row)
{
$jokes[] = $row['joketext'];
}
?>




<?php
if (get_magic_quotes_gpc())
{
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process))
{
foreach ($val as $k => $v)
{
    unset($process[$key][$k]);
if (is_array($v))
{
    $process[$key][stripslashes($k)] = $v;
    $process[] = &$process[$key][stripslashes($k)];
}
else
{
    $process[$key][stripslashes($k)] = stripslashes($v);
}
}
        }
unset($process);
}
        ?>
        


<?php 
$sql = 'INSERT INTO joke SET
joketext = :joketext,
jokedate = "today\'s date"';

$s = $pdo->prepare($sql);
$s->bindValue(':joketext', $_POST['joketext']);
$s->execute();
?>


<?php 
$sql = 'SELECT id, joketext FROM joke';
$result = $pdo->query($sql);
?>

<?php
while ($row = $result->fetch())
{
$jokes[] = array('id' => $row['id'], 'text' => $row['joketext']);
}
?>
<?php foreach ($jokes as $joke): ?>
    <form action="?deletejoke" method="post">
    <blockquote>
    <p>
    <?php echo htmlspecialchars($joke['text'], ENT_QUOTES,
    'UTF-8'); ?>
    <input type="hidden" name="id" value="<?php
    echo $joke['id']; ?>">
    <input type="submit" value="Delete">
    </p>
    </blockquote>
    </form>
<?php endforeach; ?>




<?php 
if (isset($_GET['deletejoke']))
{
try
{
$sql = 'DELETE FROM joke WHERE id = :id';
$s = $pdo->prepare($sql);
$s->bindValue(':id', $_POST['id']);
$s->execute();
}
catch (PDOException $e)
{
$error = 'Error deleting joke: ' . $e->getMessage();
include 'error.html.php';
exit();
}
    ?>
    
   
  
 <?php
    try
{
$sql = 'SELECT id, name FROM category WHERE id = :id';
$s = $pdo->prepare($sql);
$s->bindValue(':id', $_POST['id']);
$s->execute();
}
catch (PDOException $e)
{
$error = 'Error fetching category details.';
include 'error.html.php';
exit();
}
$row = $s->fetch();
$pageTitle = 'Edit Category';
$action = 'editform';
$name = $row['name'];
$id = $row['id'];
$button = 'Update category';
include 'form.html.php';
exit();
}
?>


<?php 
// Display search form
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
try
{
$result = $pdo->query('SELECT id, name FROM author');
}
catch (PDOException $e)
{
$error = 'Error fetching authors from database!';
include 'error.html.php';
212 PHP & MySQL: Novice to Ninja
www.it-ebooks.infoexit();
}
foreach ($result as $row)
{
$authors[] = array('id' => $row['id'], 'name' => $row['name']);
}
try
{
$result = $pdo->query('SELECT id, name FROM category');
}
catch (PDOException $e)
{
$error = 'Error fetching categories from database!';
include 'error.html.php';
exit();
}
foreach ($result as $row)
{
$categories[] = array('id' => $row['id'], 'name' => $row['name']);
}
include 'searchform.html.php';

?>


<?php foreach ($categories as $category): ?>
<option value="<?php htmlout($category['id']); ?>"><?php
htmlout($category['name']); ?></option>
<?php endforeach; ?>

<?php
foreach ($result as $row)
{
$categories[] = array(
'id' => $row['id'],
'name' => $row['name'],
'selected' => in_array($row['id'], $selectedCategories));
}
?>