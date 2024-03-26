<?php

namespace App\Http\Controllers;

use Faker\Core\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FileController extends Controller
{
    //
    public function token()
    {
        $client_id = \Config('services.google.client_id');
        $client_secret = \Config('services.google.client_secret');
        $refresh_token = \Config('services.google.refresh_token');
        $folder_id = \Config('services.google.folder_id');

        $response = Http::post('https://oauth2.googleapis.com/token', [

            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'refresh_token' => $refresh_token,
            'grant_type' => 'refresh_token',

        ]);
        //dd($response);
        $accessToken = json_decode((string) $response->getBody(), true)['access_token'];

        return $accessToken;
    }
    public function test()
    {
        $access_token = $this->token();
        dd($access_token);
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'file' => 'file|required',
            'file_name' => 'required',
        ]);

        $accessToken = $this->token();
        //dd($accessToken);
        $name = $request->file->getClientOriginalName();
        //$mime=$request->file->getClientMimeType();

        $path = $request->file->getRealPath();




        $response = Http::withToken($accessToken)
            ->attach('data', file_get_contents($path), $name)
            ->post(
                'https://www.googleapis.com/upload/drive/v3/files',
                [
                    'name' => $name
                ],
                [
                    'Content-Type' => 'application/octet-stream',
                ]
            );

        //dd($response);



        if ($response->successful()) {
            $file_id = json_decode($response->body())->id;
            //dd($name);
            // $uploadedfile = new File;
            // $uploadedfile->file_name = $request->file_name;
            // $uploadedfile->name=$name;
            // $uploadedfile->fileid = $file_id;
            // $uploadedfile->save();

            return response('File Uploaded to Google Drive');
        }


        return response('Failed to Upload to Google Drive');
    }
    public function processImage(UploadedFile $image)
    {
        $accessToken = $this->token();
        //dd($accessToken);
        $name = $image->getClientOriginalName();
        //$mime=$image->getClientMimeType();

        $path = $image->getRealPath();




        $response = Http::withToken($accessToken)
            ->attach('data', file_get_contents($path), $name)
            ->post(
                'https://www.googleapis.com/upload/drive/v3/files',
                [
                    'name' => $name
                ],
                [
                    'Content-Type' => 'application/octet-stream',
                ]
            );

        //dd($response);



        if ($response->successful()) {
            $file_id = json_decode($response->body())->id;
            // dd($name);
            // $uploadedfile = new File;
            // $uploadedfile->file_name = $request->file_name;
            // $uploadedfile->name=$name;
            // $uploadedfile->fileid = $file_id;
            // $uploadedfile->save();

            return response('File Uploaded to Google Drive');
        }


        return response('Failed to Upload to Google Drive');
    }
}
