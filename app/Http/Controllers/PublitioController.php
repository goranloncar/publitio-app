<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PublitioAPI;

class PublitioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('publitio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

                //$publitio_api  = new PublitioAPI('ihjdi3bhbuPihHT0scQa','G9bjB6x14tWcB8gPZhZ1Dy9PbRPtVrup');
                $fileTmpName = $_FILES['myfile']['tmp_name'];
               // dd($fileTmpName);
//                $response = $publitio_api->upload_file($fileTmpName, "file",
//                    array('name' => 'goran',
//                        'position' => 'top-right',
//                        'padding' => '20')
//                );

        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $link = "https://api.publit.io/v1/files/create?&api_signature=0c53a7e258b214b3ad0b3440679a09594e673feb&api_key=ihjdi3bhbuPihHT0scQa&api_nonce=21914854&api_timestamp=1537112246&api_test=true";
        $request =
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fileTmpName);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();

        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);

        $result2 = json_decode($result);
        $r = array(
            'link'=>$link,
            'request'=>$fileTmpName,
            'response'=>$result
        );
        dd($r);




        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}