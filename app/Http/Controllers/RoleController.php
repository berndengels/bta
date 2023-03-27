<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Libs\AppCache;
use Exception;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Cache;

class RoleController extends Controller
{
    /**
     * @var Collection
     */
    protected $permissions;

    public function __construct()
    {
        $this->permissions = Cache::remember(AppCache::KEY_OPTIONS_PERMISSION, AppCache::TTL, function () {
            return Permission::orderBy('name')
                ->get()
                ->keyBy('id')
                ->map
                ->name;
        });
    }

    public function index()
    {
        $data = Cache::remember(AppCache::KEY_OPTIONS_ROLE, AppCache::TTL, fn()
            => Role::paginate($this->paginatorLimit));
        return view('pages.roles.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Role $role
     * @return Response
     */
    public function show(Role $role)
    {
        return view('pages.roles.show', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.roles.create', [
            'permissions' => $this->permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoleRequest $request
     * @return Response
     */
    public function store(StoreRoleRequest $request)
    {
        try {
            $permissions = isset($request->validated()['permissions']) ? $request->validated()['permissions'] : null;
            $role = Role::create(collect($request->validated())->except(['permissions'])->toArray());
            if($permissions) {
                $role->syncPermissions($permissions);
            }
            return redirect()->route('pages.roles.index')->with('success', 'Rolle erfolgreich angelegt!');
        } catch(Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return Response
     */
    public function edit(Role $role)
    {
        $permissions = $this->permissions;
        return view('pages.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRoleRequest $request
     * @param  Role        $role
     * @return Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        try {
            $permissions = isset($request->validated()['permissions']) ? $request->validated()['permissions'] : null;
            $role->syncPermissions($permissions)->update($request->validated());
            return redirect()->route('pages.roles.index')->with('success', 'Rolle erfolgreich bearbeitet!');
        } catch(Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return Response
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return back()->with('success', 'Rolle erfolgreich gelöscht!');
        } catch(Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
