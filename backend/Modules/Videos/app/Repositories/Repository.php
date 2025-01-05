<?php
namespace Modules\Videos\Repositories;

class Repository
{
    protected $model;

    protected function newQuery()
    {
        return app($this->model)->newQuery();
    }

    protected function doQuery($query = null, $take = 15, $paginate = true, $order = false)
    {
        if ($query === null) {
            $query = $this->newQuery();
        }

        if ($order) {
            $query->orderBy($order['field'], $order['by'] ?? 'ASC');
        }

        if ($paginate) {
            return $query->paginate($take);
        }

        return $query->get();
    }

    public function getAll($take = 15, $paginate = true)
    {
        return $this->doQuery(null, $take, $paginate);
    }

    public function lists($column, $key = null)
    {
        return $this->newQuery()->lists($column, $key);
    }

    public function findWith($query = null, $with = null, $take = 15, $paginate = true)
    {
        if ($query === null) {
            $query = $this->newQuery();
        }

        if ($with !== null) {
            $relations = is_array($with) ? $with : [$with];
            foreach ($relations as $relation) {
                $query->with($relation);
            }
        }

        return $this->doQuery($query, $take, $paginate);
    }

    public function findByID($id, $fail = true)
    {
        if ($fail) {
            return $this->newQuery()->findOrFail($id);
        }

        return $this->newQuery()->find($id);
    }

    public function findByIDWithout($id, $without)
    {
        return $this->newQuery()->without($without)->find($id);
    }

    public function findByIDWith($id, $with = null)
    {
        $query = $this->newQuery();

        if ($with !== null) {
            $relations = is_array($with) ? $with : [$with];
            foreach ($relations as $relation) {
                $query->with($relation);
            }
        }

        return $query->find($id);
    }

    public function findByAttribute($attribute, $value, $fail = true)
    {
        $query = $this->newQuery()->where($attribute, $value);
        if ($fail) {
            return $query->firstOrFail();
        }

        return $query->first();
    }

    /**
     * Toggle Status
     */
    public function status($id, $status = null)
    {
        $entidade = $this->findByID($id, false);

        if (!is_null($entidade)) {
            if (!is_null($status)) {
                $entidade->status = $status;    
            } else {
                $entidade->status = $entidade->status == 'true' ? 'false' : 'true';
            }
            
            if ($entidade->save()) {
                return true;
            }
        }

        return false;
    }

    public function makeReturn($status, $message, $data)
    {
        return [
            'sucess'    => $status,
            'message'   => $message,
            'data'      => $data
        ];
    }
}
