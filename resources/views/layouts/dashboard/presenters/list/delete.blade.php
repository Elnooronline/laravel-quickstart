<a
        href="#"
        data-form="delete-form-{{ $entity->getKey() }}"
        data-confirm-title="@lang("$resource.dialogs.delete.title")"
        data-confirm-info="@lang("$resource.dialogs.delete.info")"
        data-confirm-confirm="@lang("$resource.dialogs.delete.confirm")"
        data-confirm-cancel="@lang("$resource.dialogs.delete.cancel")"
        class="delete-confirm btn btn-danger"
>
    <i class="fa fa-trash"></i>
    @lang('lists.actions.delete')
</a>
{{ BsForm::delete(route("dashboard.$resource.destroy", $entity), ['id' => 'delete-form-'.$entity->getKey()]) }}
{{ BsForm::close() }}
