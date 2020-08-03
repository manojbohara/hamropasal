<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Khalti;
class KhaltiController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'user_id'   => $request->input('user_id'),
            'mobile'    => $request->input('mobile'),
            'amount'    => ($request->input('amount')/100.00),
            'pre_token' => $request->input('token')
        ];

        try 
        {
            //before verification for reference purposes 
            $khalti = $this->khalti->create($data);

            $output = $this->verification($khalti);

            if ($output) 
            {
                return response()->json([
                    'success' => '  Your Account is succesfully credited'
                ],200);
            }
            
        } 
        catch (Exception $e) 
        {
            return response()->json([
                    'error' => '  Something went Wrong , Try Again !!'
                ],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verification($khalti)
    {
        $args = http_build_query(array(
                    'token' => $khalti->pre_token,
                    'amount'  => ($khalti->amount * 100)
                ));

        $url = "https://khalti.com/api/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ['Authorization: Key '.env('KHALTI_TEST_SECRET', '')];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $token = json_decode($response, TRUE);
        
        if (isset($token['idx'])&& $status_code == 200) 
        {
            $khalti = $khalti->update(['status' => 1 , 'verified_token' => $token['idx']]);

            return true;
            
        }
        return false;
    }

   
}
