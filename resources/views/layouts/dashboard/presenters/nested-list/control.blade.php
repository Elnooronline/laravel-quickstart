<div class="btn-group">
    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span> @lang('lists.actions.options')
    </button>
    <ul class="dropdown-menu">
        @if($present['show'])
            <li>
                <a href="{{ route("dashboard.$resource.show", [$parent, $entity]) }}">
                    <i class="fa fa-eye"></i>
                    @lang('lists.actions.show')
                </a>
            </li>
        @endif
        @if($present['edit'])
            <li>
                <a href="{{ route("dashboard.$resource.edit", [$parent, $entity]) }}">
                    <i class="fa fa-edit"></i>
                    @lang('lists.actions.edit')
                </a>
            </li>
        @endif
        @if($present['delete'])
            <li>
                <a
                        href="#"
                        class="form-confirm"
                        data-form="delete-form-{{ $entity->getKey() }}"
                        data-type="warning"
                        data-title="@lang("$resource.dialogs.delete.title")"
                        data-text="@lang("$resource.dialogs.delete.info")"
                        data-confirm-text="@lang("$resource.dialogs.delete.confirm")"
                        data-cancel-text="@lang("$resource.dialogs.delete.cancel")"
                >
                    <i class="fa fa-trash"></i>
                    @lang('lists.actions.delete')
                </a>
                {{ BsForm::delete(route("dashboard.$resource.destroy", [$parent, $entity]), [
                    'id' => 'delete-form-'.$entity->getKey()
                ]) }}
                {{ BsForm::close() }}

            </li>
        @endif
    </ul>
</div>