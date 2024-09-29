<?php
require './template/header.php';
$action = null;
if (isset($_GET['id'])) {
    require './connection.php';
}
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_GET['id'])) {
    $query = $person->findOneAndUpdate(['_id' => intval($_GET['id'])], ['$set' => ['firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname']]]);
    if ($query) {
        $_SESSION['action'] = 'Update PersonID:<b>' . $_GET['id'] . '</b> Successfully';
        $_SESSION['display'] = 1;
        return header('Location:./');
    }
}
if (isset($_GET['id'])) {
    $result = $person->findOne(['_id' => intval($_GET['id'])]);
    if (!$result) {
        return print_r("Error 404");
    }
}

?>

<div class="col-md-3"></div>
<div class="col-md-6">
    <h4 class="text-center mb-3">Update<a href="index.php" class="float-end btn btn-secondary">Back</a></h4>
    <form action="?id=<?= $_GET['id'] ?>" method="post">
        <div class="form-goup mb-2">
            <label for="firstname">firstname</label>
            <input type="text" class="form-control" id="firstname" name="firstname" maxlength="60" value="<?= $result['firstname'] ?>" required>
        </div>
        <div class="form-goup mb-2">
            <label for="lastname">lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" maxlength="60" value="<?= $result['lastname'] ?>" required>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>
<div class="col-md-3"></div>

<?php

require './template/footer.php';
?>