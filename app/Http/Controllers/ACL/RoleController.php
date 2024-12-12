<?php

namespace App\Http\Controllers\ACL;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        return view('content.acl.roles', [
            'pageTitle' => 'Roles Management',
            'breadcrumbs' => [
                ['link' => "/", 'name' => "Home"],
                ['name' => "Roles Management"]
            ]
        ]);
    }
}
