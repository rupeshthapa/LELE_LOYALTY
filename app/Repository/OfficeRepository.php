<?php
namespace App\Repository;

use App\Interface\RepositoryInterface;
use App\Models\Office;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OfficeRepository{
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
		Office::create($data);
	}

	/**
	 * @return Builder
	 */

	 public function getData(): Builder
	 {
		return Office::query()->select(['id', 'title', 'description', 'icon']);
	 }

	/**
	 *
	 * Update
	 * @param mixed $id
	 * @return Office|Collection
	 */
	public function findById(int $id): Office|Collection
	{
		return Office::findOrFail($id);
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
		return Office::all();
	}

}
