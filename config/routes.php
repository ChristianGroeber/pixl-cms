<?php

use PixlMint\CMS\Controllers\AuthenticationController;
use PixlMint\CMS\Controllers\AdminController;
use PixlMint\CMS\Controllers\InitController;
use PixlMint\CMS\Controllers\MediaController;
use PixlMint\CMS\Controllers\NotFoundController;
use PixlMint\CMS\Controllers\UsersController;
use PixlMint\CMS\Controllers\ViewPageController;

return [
    [
        "route" => '/',
        "controller" => NotFoundController::class,
        "function" => "index",
    ],
    [
        "route" => "/api/entry/view",
        "controller" => ViewPageController::class,
        "function" => "loadEntry",
    ],
    [
        "route" => "/api/admin/entry/rename",
        "function" => "rename",
        "controller" => AdminController::class,
    ],
    [
        "route" => "/api/admin/entry/add",
        "controller" => AdminController::class,
        "function" => "add"
    ],
    [
        "route" => "/api/admin/folder/add",
        "controller" => AdminController::class,
        "function" => "addFolder"
    ],
    [
        "route" => "/api/admin/folder/delete",
        "controller" => AdminController::class,
        "function" => "deleteFolder"
    ],
    [
        "route" => "/api/admin/entry/edit",
        "controller" => AdminController::class,
        "function" => "edit"
    ],
    [
        'route' => '/api/admin/generate-backup',
        'controller' => AdminController::class,
        'function' => 'generateBackup',
    ],
    [
        'route' => '/api/admin/restore-backup',
        'controller' => AdminController::class,
        'function' => 'restoreFromBackup',
    ],
    [
        "route" => "/api/admin/entry/delete",
        "controller" => AdminController::class,
        "function" => "delete"
    ],
    [
        "route" => "/api/auth/login",
        "controller" => AuthenticationController::class,
        "function" => "login"
    ],
    [
        "route" => "/api/auth/change-password",
        "controller" => AuthenticationController::class,
        "function" => "changePassword",
    ],
    [
        "route" => "/api/auth/request-new-password",
        "controller" => AuthenticationController::class,
        "function" => "requestNewPassword",
    ],
    [
        "route" => "/api/auth/restore-password",
        "controller" => AuthenticationController::class,
        "function" => "restorePassword",
    ],
    [
        "route" => "/api/auth/generate-new-token",
        "controller" => AuthenticationController::class,
        "function" => "generateNewToken",
    ],
    [
        "route" => "/api/auth/create-admin",
        "controller" => AuthenticationController::class,
        "function" => 'createAdmin',
    ],
    [
        // TODO: postman
        'route' => '/api/admin/entry/gallery/upload',
        'controller' => MediaController::class,
        'function' => 'uploadMedia',
    ],
    [
        // TODO: postman
        'route' => '/api/admin/entry/media/load',
        'controller' => MediaController::class,
        'function' => 'loadMediaForEntry',
    ],
    [
        // TODO: postman
        'route' => '/api/admin/entry/media/delete',
        'controller' => MediaController::class,
        'function' => 'deleteMedia',
    ],
    [
        "route" => "/api/init",
        "controller" => InitController::class,
        "function" => "init",
    ],
];