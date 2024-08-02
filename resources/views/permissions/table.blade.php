@php
    use App\Models\Permission;

    $heads = [
        'ID',
        'Permission Name',
        ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ];

    function btnEdit(int $permissionId): string {
        return "<a href=".route('permissions.edit', ['permission' => $permissionId])." class='btn btn-xs btn-default text-primary mx-1 shadow' title='Edit'>
                    <i class='fa fa-lg fa-fw fa-pen'></i>
                </a>";
    }

    function btnDelete(int $permissionId): string {
        return "<a href=".route('permissions.delete', ['permission' => $permissionId])." onclick='return confirmDelete()' class='btn btn-xs btn-default text-danger mx-1 shadow' title='Delete'>
                    <i class='fa fa-lg fa-fw fa-trash'></i>
               </a>";
    }

    function btnGive(int $permissionId): string {
        return "<a href=".route('permissions.give', ['permission' => $permissionId])." class='btn btn-xs btn-default text-teal mx-1 shadow' title='Give'>
                    <i class='fa fa-lg fa-fw fa-user-plus'></i>
                </a>";
    }

    $config = [
        'data' => [],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

    foreach (Permission::all() as $permission) {
        if ($permission->name === 'user-management') continue;
        $config['data'][] = [$permission->id, $permission->name,
        '<nobr>'.
            btnEdit($permission->id).
            btnDelete($permission->id).
            btnGive($permission->id).
        '</nobr>'];
    }
@endphp

<div class="d-flex justify-content-between mb-4">
    <h2 class="text-lg">All Permissions</h2>
    <a href="{{ route('permissions.give', ['permission' => 1]) }}" class="btn btn-outline-primary">Give User Management Permission</a>
</div>
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($config['data'] as $row)
        <tr>
            @foreach($row as $cell)
                <td>{!! $cell !!}</td>
            @endforeach
        </tr>
    @endforeach
</x-adminlte-datatable>
