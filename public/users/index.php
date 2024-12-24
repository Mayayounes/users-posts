<?php
include '../../load.php';
?>
<div>
    <a href="users/create.php">
        <Button class="p-3 text-2xl border border-white rounded-full bg-green-300 text-white w-screen">Add new user</Button>
    </a>
</div>
<?php
$qry = 'SELECT * FROM `pst_users`;';

$res = $db->query($qry);

$users = mysqli_fetch_all($res, MYSQLI_ASSOC);

foreach ($users as $user) {
    include '../../components/users/user.php';
}