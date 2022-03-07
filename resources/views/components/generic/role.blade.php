<div class="generic-role">
    @if($permissions->keys()->contains($category.'.list'))
    <div class="field head">
        <label for="list_permission_{{ $category }}">{{ ucfirst($category) }}</label>
        <input type="hidden" id="list_permission_{{ $category }}_hidden" name="permissions[{{ $permissions[$category.'.list']->id }}]" value="{{ $role->hasPermissionTo($category.'.list') ? "true" : "false" }}"/>
        <input type="checkbox" {{ $role->hasPermissionTo($category.'.list') ? "checked" : "" }} id="list_permission_{{ $category }}" value="{{ $permissions[$category.'.list']->id }}" onclick="Utils.bindRoleCheckbox(this)"/>
    </div>
    @endif

    <div class="content {{ !$role->hasPermissionTo($category.'.list') ? "disabled" : "" }}">
        @if($permissions->keys()->contains($category.'.create'))
            <div class="field">
                <label for="create_permission_{{ $category }}">Create</label>
                <input type="hidden" id="create_permission_{{ $category }}_hidden" name="permissions[{{ $permissions[$category.'.create']->id }}]" value="{{ $role->hasPermissionTo($category.'.create') ? "true" : "false" }}"/>
                <input type="checkbox" {{ $role->hasPermissionTo($category.'.create') ? "checked" : "" }} id="create_permission_{{ $category }}" value="{{ $permissions[$category.'.create']->id }}" onclick="Utils.bindRoleCheckbox(this)"/>
            </div>
        @endif

        @if($permissions->keys()->contains($category.'.edit'))
            <div class="field">
                <label for="edit_permission_{{ $category }}">Edit</label>
                <input type="hidden" id="edit_permission_{{ $category }}_hidden" name="permissions[{{ $permissions[$category.'.edit']->id }}]" value="{{ $role->hasPermissionTo($category.'.edit') ? "true" : "false" }}"/>
                <input type="checkbox" {{ $role->hasPermissionTo($category.'.edit') ? "checked" : "" }} id="edit_permission_{{ $category }}" value="{{ $permissions[$category.'.edit']->id }}" onclick="Utils.bindRoleCheckbox(this)"/>
            </div>
        @endif

        @if($permissions->keys()->contains($category.'.delete'))
            <div class="field">
                <label for="delete_permission_{{ $category }}">Delete</label>
                <input type="hidden" id="delete_permission_{{ $category }}_hidden" name="permissions[{{ $permissions[$category.'.delete']->id }}]" value="{{ $role->hasPermissionTo($category.'.delete') ? "true" : "false" }}"/>
                <input type="checkbox" {{ $role->hasPermissionTo($category.'.delete') ? "checked" : "" }} id="delete_permission_{{ $category }}" value="{{ $permissions[$category.'.delete']->id }}" onclick="Utils.bindRoleCheckbox(this)"/>
            </div>
        @endif
    </div>

</div>
