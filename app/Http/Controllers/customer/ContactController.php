<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Repository\ContactRepository;
use Exception;
use Illuminate\Http\Request;
use Str;

class ContactController extends Controller
{
    protected ContactRepository $contactRepo;

    public function __construct(ContactRepository $contactRepo){
        $this->contactRepo = $contactRepo;
    }

    public function store(ContactRequest $request){
        try{
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);
            
            $this->contactRepo->store($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Details sent successfully! Team will contact you ASAP..!!',
            ]);


        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong!',
            ]);
        }
    }

    public function show(){
        $contact = $this->contactRepo->getData();

        return response()->json($contact);


    }
}
