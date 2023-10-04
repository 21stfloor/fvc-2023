<div class=" list-group">
    <a href="../admin/invItem.php" class="list-group-item list-group-item-action  <?php if (basename($_SERVER['PHP_SELF']) == 'invItem.php' || basename($_SERVER['PHP_SELF']) == 'index.php') {
        echo 'active';
    } ?>">
        <i class="bi bi-box2-fill"></i> Item
    </a>
    <a href="../admin/invPurchase.php" class="list-group-item list-group-item-action <?php if (basename($_SERVER['PHP_SELF']) == 'invPurchase.php') {
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