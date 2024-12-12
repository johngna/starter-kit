<?php

namespace App\Http\Controllers\ACL;

use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        return view('content.acl.permissions', [
            'pageTitle' => 'Permissions Management',
            'breadcrumbs' => [
                ['link' => "/", 'name' => "Home"],
                ['name' => "Permissions Management"]
            ]
        ]);
    }
}
