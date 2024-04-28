<?php
include ("../layout/header.php");

$id = isset($_GET['id'])? $_GET['id']: 0;

$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($db, $sql);
$user = $result->num_rows > 0 ? mysqli_fetch_assoc($result): null;
?>
<h2 style="color: grey;" class="text-center"><?= $id ? "EDIT" : "ADD"; ?> FORM NEW USER</h2>

    <form action="post-process.php" method="POST">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="<?= $id ; ?>">
            <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?= $user? $user['name']: '' ; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" value="<?= $user? $user['username']: '' ; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php" type="submit" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
                </form>
  <?php
include ("../layout/footer.php");
?>