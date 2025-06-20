<?php
namespace App\Repository;

use App\Interface\RepositoryInterface;
use App\Models\Workflow;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class WorkflowRepository{
	public function __construct(){
		//empty construct
	}

	/**
	 *
	 * Store
	 * @param array $data
	 * @return void
	 */
	public function store (array $data){
		Workflow::create($data);
	}


	/**
     * Get all about for DataTable query.
     *
     * @return Builder
     */
	public function getAllData(): Builder
	{
		return Workflow::query()->select(['id', 'title', 'description', 'image']);
	}


	  /**
     * Find a project by ID or fail.
     *
     * @param mixed $id
     * @return Workflow|Collection
     */
	public function findById($id): Workflow|Collection
	{
		return Workflow::findOrFail($id);
	}

	/**
	 *
	 * Update
	 * @param Model $model
	 * @param array $data
	 * @return void
	 */
	public function update (Model $model,array $data){
		$model->fill($data)->save();
	}

	/**
	 *
	 * Update Status
	 * @param Model $model
	 * @return void
	 */
	public function updateStatus (Model $model){
		//do something here
	}

	/**
	 *
	 * Delete
	 * @param Model $model
	 * @return void
	 */
	public function delete (Model $model){
		$model->delete();
	}

	public function getAll(){
		return Workflow::all();
	}

}
