<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class Card extends Controller
{
    public function getCard(Request $request)
{
    // Assuming you have a CSV file named cards.csv in the storage directory
    $filePath = storage_path('app/public/cards.csv');

    if (!file_exists($filePath)) {
        return response()->json(['error' => 'CSV file not found'], 404);
    }

    $cards = $this->parseCsvFile($filePath);

    // Get the current card index from the session
    $currentCardIndex = $request->session()->get('currentCardIndex', 0);

    // Increment the current card index by 1
    $currentCardIndex++;

    // Check if the index is greater than or equal to the number of cards, reset to 0
    if ($currentCardIndex >= count($cards)) {
        $currentCardIndex = 0;
    }

    // Save the updated current card index to the session
    $request->session()->put('currentCardIndex', $currentCardIndex);
    $request->session()->put('size',count($cards));
    return response()->json([
        'card' => $cards[$currentCardIndex],
        'size' => count($cards),
        'currentCardIndex' => $currentCardIndex,
        'session'=>session()->all(),
    ]);
}

    

    private function parseCsvFile($filePath)
    {
        $csvData = array_map('str_getcsv', file($filePath));
        $headers = array_shift($csvData);

        $cards = [];

        foreach ($csvData as $row) {
            $card = array_combine($headers, $row);
            // You may need to customize this part based on your CSV structure
            $cards[] = [
                'name' => $card['CardName'],
                'description' => $card['CardDescription'],
                // Add other fields as needed
            ];
        }

        return $cards;
    }

    // Add more methods as needed

    // Example method to simulate getting the current card index
    private function getCurrentCardIndex(Request $request)
    {
        // Your logic to determine the current card index based on the request
        return $request->input('currentCardIndex', 0);
    }
    public function storeResult(Request $request)
    {
        $total_sorted = session()->get('total_sorted',0);
        $total_sorted = $total_sorted +1;
        session()->put('total_sorted',$total_sorted);

        $validatedData = $request->validate([
            'CardName' => 'required|string',
            'SortedInto' => 'required|string',
            'Path' => 'required|string',
            'SortingType' => 'required|string',
        ]);

        // Assuming you have a function to save the result to a database or any storage
        $result = $this->saveResultToDatabase($validatedData);
        
        if(session()->get('total_sorted') >= session()->get('size'))
        {
            $this->storeFinalData();
            return redirect('/api/card/show');
        }

        return response()->json($result);
    }

    // Example method to simulate saving the result to a database
    private function saveResultToDatabase(array $data)
    {
        $results = Session::get('card_sorting_results', []);

        // Store the current result in the session
        $results[] = $data;

        // Update the session data
        Session::put('card_sorting_results', $results);

        return $data;
    }

    public function storeFinalData()
    {
        $results = Session::get('card_sorting_results');
        
        return response()->json($results);
    }

    public function undoSort(Request $request)
    {
        // Assuming you have a function to handle undo logic
        $undoData = $this->undoCardSort($request);

        return response()->json($undoData);
    }

    private function undoCardSort(Request $request)
    {
        // Retrieve the accumulated results from the session
        $results = Session::get('card_sorting_results', []);

        // Pop the last result from the array
        $undoData = array_pop($results);

        // Update the session data
        Session::put('card_sorting_results', $results);

        // Retrieve and decrement the current card index from the session
        $currentCardIndex = Session::get('currentCardIndex', 0);
        $currentCardIndex--;

        // Ensure the index stays within valid bounds
        if ($currentCardIndex < 0) {
            $currentCardIndex = 0;
        }

        // Save the updated current card index to the session
        Session::put('currentCardIndex', $currentCardIndex);

        return $undoData;
    }

    public function flushall(Request $request)
    {
        $request->session()->flush();

        return redirect('/');
    }

    
}