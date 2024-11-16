<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function upload(Request $request)
    {
        // Check if the request contains a file and if the file is valid
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Retrieve the uploaded file
            $file = $request->file('image');

            // Generate a unique filename using the current timestamp and the original file extension
            $fileName = time() . '-av.' . $file->getClientOriginalExtension();

            // Store the file in the 'uploads' directory with the generated filename
            $filePath = $file->storeAs('uploads', $fileName);

            // Check if the file was stored successfully
            if ($filePath) {
                // Return a success response with the file path
                return response()->json(['message' => 'File uploaded successfully', 'path' => $filePath], 200);
            } else {
                // Return an error response if the file could not be stored
                return response()->json(['message' => 'File upload failed'], 500);
            }
        } else {
            // Return an error response if the file is not present or invalid
            return response()->json(['message' => 'No valid image file in the request'], 400);
        }
    }


}
