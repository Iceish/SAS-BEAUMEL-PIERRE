<div class="generic-role">
    @if($permissions->keys()->contains($category.'.list'))
    <div class="field head">
        <label for="list_permission_{{ $category }}">{{ $category }}</label>
        <input type="checkbox" name="permissions[]" id="list_permission_{{ $category }}" value="{{ $permissions[$category.'.list']->id }}"/>
    </div>
    @endif

    <div class="content">
        @if($permissions->keys()->contains($category.'.create'))
            <div class="field">
                <label for="create_permission_{{ $category }}">Create</label>
                <input type="checkbox" name="permissions[]" id="create_permission_{{ $category }}" value="{{ $permissions[$category.'.create']->id }}"/>
            </div>
        @endif

        @if($permissions->keys()->contains($category.'.edit'))
            <div class="field">
                <label for="edit_permission_{{ $category }}">Edit</label>
                <input type="checkbox" name="permissions[]" id="edit_permission_{{ $category }}" value="{{ $permissions[$category.'.edit']->id }}"/>
            </div>
        @endif

        @if($permissions->keys()->contains($category.'.delete'))
            <div class="field">
                <label for="delete_permission_{{ $category }}">Delete</label>
                <input type="checkbox" name="permissions[]" id="delete_permission_{{ $category }}" value="{{ $permissions[$category.'.delete']->id }}"/>
            </div>
        @endif
    </div>


</div>
