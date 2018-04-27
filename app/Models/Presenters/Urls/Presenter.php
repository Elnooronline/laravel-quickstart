<?php

namespace App\Models\Presenters\Urls;

class Presenter
{
    /**
     * The model instance
     * @var mixed
     */
    protected $entity;

    /**
     * The route prefix name.
     *
     * @var string|null
     */
    protected $prefix;

    /**
     * The resource name of the model.
     *
     * @var string
     */
    protected $resource;

    /**
     * Presenter constructor.
     *
     * @param $entity
     */
    public function __construct($entity, $prefix = null)
    {
        $this->entity = $entity;
        $this->prefix = $prefix;

        $this->entity->setResourceName();

        $this->resource = $this->prefix ?
            $this->prefix.'.'.$this->entity->getResourceName() : $this->entity->getResourceName();
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        if(method_exists($this, $key))
        {
            return $this->$key();
        }

        return $this->entity->$key;
    }

    /**
     * The index route for the specific model.
     *
     * @param array $parameters
     * @return string
     */
    public function index($parameters = [])
    {
        return route("{$this->resource}.index", $parameters);
    }

    /**
     * The create route for the specific model.
     *
     * @param array $parameters
     * @return string
     */
    public function create($parameters = [])
    {
        return route("{$this->resource}.create", $parameters);
    }

    /**
     * The store route for the specific model.
     *
     * @param array $parameters
     * @return string
     */
    public function store($parameters = [])
    {
        return route("{$this->resource}.store", $parameters);
    }

    /**
     * The destroy route for the specific model.
     *
     * @param array $parameters
     * @return string
     */
    public function destroy($parameters = [])
    {
        return route("{$this->resource}.destroy", [$this->entity] + $parameters);
    }

    /**
     * The edit route for the specific model.
     *
     * @param array $parameters
     * @return string
     */
    public function edit($parameters = [])
    {
        return route("{$this->resource}.edit", [$this->entity] + $parameters);
    }

    /**
     * The show route for the specific model.
     *
     * @param array $parameters
     * @return string
     */
    public function show($parameters = [])
    {
        return route("{$this->resource}.show", [$this->entity] + $parameters);
    }

    /**
     * The update route for the specific model.
     *
     * @param array $parameters
     * @return string
     */
    public function update($parameters = [])
    {
        return route("{$this->resource}.update", [$this->entity] + $parameters);
    }
}