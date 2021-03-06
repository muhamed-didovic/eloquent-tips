<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->select('users.*')
            ->join('companies', 'companies.id', '=', 'users.company_id')
            ->orderBy('companies.name')
            ->with('company')
            ->paginate();

        return view('users', ['users' => $users]);
    }
}
