<?php

namespace App\Http\Controllers\ACL;

use App\Http\Controllers\Controller;

class UserRoleController extends Controller
{
    public function index()
    {
        return view('content.acl.user-roles', [
            'pageTitle' => 'User Roles Management',
            'breadcrumbs' => [
                ['link' => "/", 'name' => "Home"],
                ['name' => "User Roles Management"]
            ]
        ]);
    }
}
