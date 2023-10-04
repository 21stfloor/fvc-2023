<div class="list-group">
    <table border="0" class="profile-container">
        <tr>
            <td width="30%" style="padding-left:20px">
                <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
            </td>
            <td style="padding:0px;margin:0px;">
                <p class="profile-title">
                    <?php echo substr($username, 0, 13) ?>
                </p>
                <p class="profile-subtitle">
                    <?php echo substr($useremail, 0, 22) ?>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <a href="../logout.php"><input type="button" value="Log out"
                        class="logout-btn btn-primary-soft btn"></a>
            </td>
        </tr>
    </table>
</div>
<div class=" list-group">
    <a href="../doctor/index.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
        echo 'active';
    } ?>" aria-current="true">
        <i class="bi bi-kanban-fill"></i> Dashboard
    </a>
    <a href="../doctor/appointment.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'appointment.php') {
        echo 'active';
    } ?>" aria-current="true">
        <i class="bi bi-heart-pulse-fill"></i> My Appointments
    </a>
    <a href="../doctor/schedule.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'schedule.php') {
        echo 'active';
    } ?>" aria-current="true">
        <i class="bi bi-bookmark-heart-fill"></i> My Sessions
    </a>
    <a href="../doctor/patient.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'patient.php') {
        echo 'active';
    } ?>" aria-current="true">
        <i class="bi bi-journal-medical"></i> My Patients
    </a>
    <a href="../admin/species.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'species.php') {
        echo 'active';
    } ?>">
        <i class="bi bi-egg-fill"></i> Species
    </a>
    <a href="../admin/breed.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'breed.php') {
        echo 'active';
    } ?>">
        <i class="bi bi-bookmark-heart-fill"></i> Breed
    </a>
    <a href="../doctor/settings.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'settings.php') {
        echo 'active';
    } ?>" aria-current="true">
        <i class="bi bi-gear-fill"></i> Settings
    </a>
</div>