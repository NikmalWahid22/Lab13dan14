<?php global $db; ?>

<div class="container">
    <h1>Dashboard</h1>

    <div class="dashboard-cards">

        <div class="card">
            <h3>Total Barang</h3>
            <p>
            <?php
            $total = $db->get("SELECT COUNT(*) AS total FROM data_barang")[0];
            echo $total['total'];
            ?>
            </p>
        </div>

        <div class="card">
            <h3>User Login</h3>
            <p>
                <?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Unknown'; ?>
            </p>
        </div>

        <div class="card">
            <h3>Status</h3>
            <p>Online</p>
        </div>

    </div>
</div>
