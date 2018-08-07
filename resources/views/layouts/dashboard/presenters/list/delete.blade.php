<a
        href="#"
        class="form-confirm btn btn-danger"
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

{{ BsForm::delete(route("dashboard.$resource.destroy", $entity), ['id' => 'delete-form-'.$entity->getKey()]) }}
{{ BsForm::close() }}
