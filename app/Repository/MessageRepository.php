<?php
namespace App\Repository;

use App\Interface\RepositoryInterface;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MessageRepository{
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
	public function store (Model $model,array $data){
		//do something here
	}

	/**
     * Get all about for DataTable query.
     *
     * @return Builder
     */
	public function getAllContact(): Builder
	{
		return Contact::query()->select(['id', 'name', 'message', 'is_read'])->orderBy('id', 'desc');
	}


	public function findById($id)
    {
        return Contact::findOrFail($id);
    }

    public function updateStatus($id, $status)
    {
        return Contact::where('id', $id)->update(['is_read' => $status]);
    }





public function markAllAsRead(): int
{
    return Contact::where('is_read', 'unread')->update(['is_read' => 'read']);
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
	 * Delete
	 * @param Model $model
	 * @return void
	 */
	public function delete (Model $model){
		//do something here
	}

}
