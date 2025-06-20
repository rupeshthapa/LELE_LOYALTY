<?php
namespace App\Repository;

use App\Interface\RepositoryInterface;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class SectorRepository{
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
		Sector::create($data);
	}



	/**
     * Get all about for DataTable query.
     *
     * @return Builder
     */
	public function getAllForDataTable(): Builder
	{
		return Sector::query()->select(['id', 'title', 'image']);
	}



	  /**
     * Find a project by ID or fail.
     *
     * @param mixed $id
     * @return Sector|Collection
     */

	public function findById(int $id): Sector|Collection
	{
		return Sector::findOrFail($id);
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
		return Sector::all();
	}

}
