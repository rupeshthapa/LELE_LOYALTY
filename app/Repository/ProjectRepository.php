<?php

namespace App\Repository;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class ProjectRepository
{
    public function __construct()
    {
        // empty constructor
    }

    /**
     * Store a new Project.
     *
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
         Project::create($data);
    }

    /**
     * Get all projects for DataTable query.
     *
     * @return Builder
     */
    public function getAllForDataTable(): Builder
    {
        return Project::query()->select(['id', 'name', 'description', 'logo', 'url']);
    }

    /**
     * Find a project by ID or fail.
     *
     * @param mixed $id
     * @return Project|Collection
     */
    public function findById(int $id): Project|Collection
	{
		return Project::findOrFail($id);
	}


    /**
     * Update a project.
     *
     * @param mixed $model
     * @param array $data
     * @return void
     */
    public function update(Model $model, array $data): void
    {
        $model->fill($data)->save();
    }

    /**
     * Delete a project.
     *
     * @param Model $model
     * @return void
     */
    public function delete(Model $model): void
    {
         $model->delete();
    }

    public function getAll()
    {
        return Project::all();
    }
}
