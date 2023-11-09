<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function showAssignRoleForm()
    {
        $users = User::all();
        return view('admin/assign_roles', compact('users'));
    }

    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:admin,guest',
        ]);

        $user = User::find($request->user_id);

        // Use a transaction to ensure data consistency
        DB::transaction(function () use ($user, $request) {
            $user->role = $request->role;
            $user->save();
        });

        return redirect()->route('assignRoleForm')->with('status', 'Role assigned successfully');
    }
}
