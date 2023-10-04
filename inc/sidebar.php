<div class="list-group">
    <table border="0" class="profile-container">
        <tr>
            <td width="30%" style="padding-left:20px">
                <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
            </td>
            <td style="padding:0px;margin:0px;">
                <p class="profile-title">Administrator</p>
                <p class="profile-subtitle">admin@edoc.com</p>
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
    <a href="index.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
            echo 'active';
        } ?>" aria-current="true">
        <i class="bi bi-kanban-fill"></i> Dashboard
    </a>
    <a href="doctors.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'doctors.php') {
        echo 'active';
    } ?>">
        <i class="bi bi-clipboard2-pulse-fill"></i> Doctors
    </a>




    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle list-group-item list-group-item-action
        <?php if (
            basename($_SERVER['PHP_SELF']) == 'inventory.php' ||
            basename($_SERVER['PHP_SELF']) == 'invItem.php' ||
            basename($_SERVER['PHP_SELF']) == 'invPurchase.php' ||
            basename($_SERVER['PHP_SELF']) == 'invVendor.php' ||
            basename($_SERVER['PHP_SELF']) == 'invSale.php' ||
            basename($_SERVER['PHP_SELF']) == 'invSearch.php' ||
            basename($_SERVER['PHP_SELF']) == 'invReports.php'
        ) {
            echo 'active';
        } ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-table"></i> Inventory
        </a>
        <ul class="dropdown-menu">
            <div class=" list-group">
                <a href="invItem.php" class="list-group-item list-group-item-action  <?php if (basename($_SERVER['PHP_SELF']) == 'invItem.php') {
                    echo 'active';
                } ?>">
                    <i class="bi bi-box2-fill"></i> Item
                </a>
                <a href="invPurchase.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'invPurchase.php') {
                    echo 'active';
                } ?>">
                    <i class="bi bi-cash-stack"></i> Purchase
                </a>
                <a href="invVendor.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'invVendor.php') {
                    echo 'active';
                } ?>">
                    <i class="bi bi-building"></i> Vendor
                </a>
                <a href="invSale.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'invSale.php') {
                    echo 'active';
                } ?>">
                    <i class="bi bi-handbag-fill"></i> Sale
                </a>
                <a href="invSearch.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'invSearch.php') {
                    echo 'active';
                } ?>">
                    <i class="bi bi-search"></i> Search
                </a>
                <a href="invReports.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'invReports.php') {
                    echo 'active';
                } ?>">
                    <i class="bi bi-envelope-paper-fill"></i> Reports
                </a>
            </div>
        </ul>
    </div>

</div>