<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Session;

class UsedIDController extends Controller
{
    public function check(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'profileID' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Get the profileID from the request
        $profileID = $request->input('profileID');

        // Load the .csv file
        $csvFilePath = storage_path('app/public/profiles.csv');
       
        if (!file_exists($csvFilePath)) {
            // Handle case where the .csv file doesn't exist
            Log::error('CSV file not found.');
            return response()->json(['error' => 'CSV file not found.'.$csvFilePath], 500);
        }

        // Read the .csv file
        $csvData = array_map('str_getcsv', file($csvFilePath));
        // Check if the profileID is present in the .csv data
        $profileIDFound = false;
        foreach ($csvData as $row) {
            if (in_array($profileID, $row)) {
                // ProfileID found, set flag and break the loop
                $profileIDFound = true;
                break;
            }
        }

        if (!$profileIDFound) {
            // ProfileID not found, store it in the .csv file
            
            // Session::put('profileid','');
            // Session::save();
            session()->flush();
            // Return a response indicating success
            // dd(Session::get('profileid'));->with('profileid', $profileID)
            return redirect('/instructions');
        }
        
        // ProfileID found, return a response accordingly
        return redirect()->to('/invalid');
    }
}
