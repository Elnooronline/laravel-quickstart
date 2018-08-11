<?php

namespace App\Models\Concerns;

trait SingleTableInheritance
{
    /**
     * The field which indicated the type of the table.
     *
     * @var string
     */
    protected $typeField = 'type';

    /**
     * Boot the trait.
     */
    protected static function bootSingleTableInheritance()
    {
        static::creating(function ($model) {
            $model->{$model->typeField} = $model->modelType;
        });
    }
}
