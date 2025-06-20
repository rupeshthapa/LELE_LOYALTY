<?php
namespace App\Repository;

use App\Interface\RepositoryInterface;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ContactRepository{
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
		Contact::create($data);
	}


	/**
	 * Show
	 * @return Builder
	 */
	public function getData(): Builder
	{
		return Contact::query()->select(['name', 'organization_name', 'email', 'phone_number', 'address', 'country', 'message']);

	}

	/**
	 *
	 * Update
	 * @param Model $model
	 * @param array $data
	 * @return void
	 */
	public function update (Model $model,array $data){
		//do something here
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
		//do something here
	}

	public function getAll(){
		return Contact::all();
	}

}
