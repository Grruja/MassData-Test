<div class="mb-5 mt-3 border-bottom pb-5">
    <form action="{{ route('permissions.create') }}" method="POST" style="max-width: 350px">
        @csrf
        <legend class="text-lg mb-4">Create new permission</legend>
        <x-adminlte-input name="name" placeholder="permission name" required>
            <x-slot name="appendSlot">
                <x-adminlte-button type="submit" label="Create" theme="primary" />
            </x-slot>
        </x-adminlte-input>
    </form>
</div>
