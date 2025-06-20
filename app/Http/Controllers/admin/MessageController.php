<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Repository\MessageRepository;
use Illuminate\Http\Request;
use Str;
use Yajra\DataTables\Facades\DataTables;

class MessageController extends Controller
{
    protected MessageRepository $messageRepo;

    public function __construct(MessageRepository $messageRepo)
    {
        $this->messageRepo = $messageRepo;
    }

    public function index()
    {
        return view("admin.messages.index");
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $messages = $this->messageRepo->getAllContact();

            return DataTables::of($messages)
            ->addIndexColumn()
                ->addColumn('status', function ($row) {
                if ($row->is_read === 'unread') {
                    return "<button class='toggle-status' data-id='{$row->id}' data-bs-toggle='tooltip' title='Mark as Read' style='background: none; border: none;'>
                                <i class='fas fa-envelope text-success'></i>
                            </button>";
                } else {
                    return "<i class='fas fa-envelope-open text-secondary' data-bs-toggle='tooltip' title='Already Read'></i>";
                }
            })

                ->rawColumns(['status'])
                ->make(true);
        }

        return view('admin.messages.index');
    }

    public function toggleStatus($id)
{
    $message = $this->messageRepo->findById($id);

    // Only update if currently unread
    if ($message->is_read === 'unread') {
        $this->messageRepo->updateStatus($id, 'read');
        return response()->json(['status' => 'read']);
    }

    return response()->json(['status' => 'already_read']);
}


 





  public function markAllRead()
{
    $updatedCount = $this->messageRepo->markAllAsRead();

    if ($updatedCount === 0) {
        return response()->json([
            'status' => 'info',
            'message' => 'All messages are already marked as read.'
        ]);
    }

    return response()->json([
        'status' => 'success',
        'message' => "$updatedCount message(s) marked as read."
    ]);
}


}
