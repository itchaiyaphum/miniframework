<div>homepage</div>
<?php
foreach ($this->data['users_items'] as $user) {
    ?>
    <div>Firstname: <?php echo $user['firstname']; ?></div>
    <div>Lastname: <?php echo $user['lastname']; ?></div>
    <div>E-mail: <?php echo $user['email']; ?></div>
    <hr/>
<?php
}
?>