@props(['users'])

@php
    $heads = [
        'ID',
        'Name',
        'Email',
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

    $config = [
        'data' => [],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

    foreach ($users as $user) {
        if ($user->email === 'admin@gmail.com') continue;
        $config['data'][] = [$user->id, $user->name, $user->email,
        '<nobr>'.
            btnEdit($user->id).
            btnDelete($user->id).
        '</nobr>'];
    }
@endphp

<h2 class="text-lg mb-4">All Users</h2>

<div class="d-flex align-items-start justify-content-between">
    <x-adminlte-input name="search" placeholder="search">
        <x-slot name="appendSlot">
            <x-adminlte-button theme="outline-primary" icon="fas fa-search"/>
        </x-slot>
    </x-adminlte-input>
    <a href="{{ route('permissions.give', ['permission' => 1]) }}" class="btn btn-outline-primary">Create New User</a>
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

{{ $users->links() }}
