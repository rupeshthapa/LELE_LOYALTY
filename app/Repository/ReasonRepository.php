<?php
namespace App\Repository;

use App\Interface\RepositoryInterface;
use App\Models\Reason;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ReasonRepository{
	public function __construct(){
		//empty construct
	}

	/**
	 *
	 * Store
	 * @param Model $model
	 * @param array $data
	 * @return void
	 */
	public function store (array $data){
		Reason::create($data);
	}


	/**
     * Get all about for DataTable query.
     *
     * @return Builder
     */
	public function getAllReason(): Builder
	{
		return Reason::query()->select('id', 'title', 'description', 'icon');
	}


	 /**
     * Find a project by ID or fail.
     *
     * @param mixed $id
     * @return Reason|Collection
     */
	public function findById($id): Reason|Collection
	{
		return Reason::findOrFail($id);
	}
	/**
	 *
	 * Update
	 * @param mixed $model
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
		return Reason::all();
	}

}
