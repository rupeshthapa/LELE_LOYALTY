<?php
namespace App\Repository;

use App\Interface\RepositoryInterface;
use App\Models\Feature;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class FeatureRepository{
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
		Feature::create($data);
	}


	/**
	 *
	 * Store
	 * @return Builder
	 */
	public function getData(): Builder
	{
		return Feature::query()->select(['id', 'title', 'description', 'image']);
	}
	  /**
     * Find a Feature by ID or fail.
     *
     * @param mixed $id
     * @return Feature|Collection
     */
	public function findeById(int $id): Feature|Collection
	{
		return Feature::findOrFail($id);
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
		return Feature::all();
	}

}
