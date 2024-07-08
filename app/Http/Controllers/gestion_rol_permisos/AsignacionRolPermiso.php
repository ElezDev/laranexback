<?php

namespace App\Http\Controllers\gestion_rol_permisos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AsignacionRolPermiso extends Controller
{


    public function index()
    {
        $permisos = Permission::All();

        return response()->json($permisos);
    }

    public function permissionsByRole(Request  $request)
    {

        $rol = $request->input('rol');
        $role = Role::findOrFail($rol);
        $groupsWithRoles = $role->getPermissionNames();
        return response()->json($groupsWithRoles);
    }


    public function assignFunctionality(Request $request)
    {
        $roles = Role::find($request->idRol);
        DB::table('role_has_permissions')
            ->where('role_id', $request->idRol)
            ->delete();


        $roles->syncPermissions($request->input('funciones', []));
        return $roles;
    }

    public function asignation(Request $request)
    {

        // DB::table('model_has_roles')
        //     ->where('model_id', $request->idActivation)
        //     ->delete();
        // $user = ActivationCompanyUser::find($request->input('idActivation'));
        // $user->assignRole($request->input('roles', []));
        // return $user;
    }
}
