<?php
namespace App\Repository;

use App\Interface\RepositoryInterface;
use App\Models\About;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AboutRepository{
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
		About::create($data);
	}


	/**
     * Get all about for DataTable query.
     *
     * @return Builder
     */
	public function getAllAbout(): Builder
	{
		return About::query()->select(['id', 'title', 'description', 'image']);
	}

	  /**
     * Find a About by ID or fail.
     *
     * @param mixed $id
     * @return About|Collection
     */
	public function findById(int $id): About|Collection
	{
		return About::findOrFail($id);
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

	  public function getAll()
    {
        return About::all();
    }

}
