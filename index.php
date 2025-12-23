<?php
session_start();

// LOAD LIBRARY
require 'libraries/Database.php';
require 'libraries/Form.php';

$db = new Database();
$form = new Form();

// AMBIL PAGE ROUTING
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// HALAMAN YANG WAJIB LOGIN
$protected_pages = [
    'dashboard',
    'user/list',
    'user/add',
    'user/edit',
    'user/delete'
];

// CEK LOGIN
if (in_array($page, $protected_pages) && !isset($_SESSION['login'])) {
    echo "<script>alert('Login dulu bro!'); window.location='index.php?page=auth/login';</script>";
    exit;
}

// HEADER
require 'views/header.php';


// ROUTING INTI
switch ($page) {

    // MODULE USER (CRUD)
    case 'user/list':
        require 'modules/user/list.php';
        break;

    case 'user/add':
        require 'modules/user/add.php';
        break;

    case 'user/edit':
        require 'modules/user/edit.php';
        break;

    case 'user/delete':
        require 'modules/user/delete.php';
        break;

    // LOGIN & LOGOUT
    case 'auth/login':
        require 'modules/auth/login.php';
        break;

    case 'auth/logout':
        require 'modules/auth/logout.php';
        break;

    // DEFAULT → DASHBOARD
    default:
        require 'views/dashboard.php';
        break;
}


// FOOTER
require 'views/footer.php';
