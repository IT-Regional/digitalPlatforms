<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login(Request $request){

        $incoming = $request->all();
    

        try {
                
            //this response generate a customer token to be able to login
            $response = Http::withOptions([
                'debug' => false,
                'verify' => false
            ])->post('https://beesys.beenet.com.sv/api/2.0/admin/auth/tokens', [
                    'auth_type' => "admin",
                    'login' => $incoming['username'] ,
                    'password' => $incoming['password']
            ]);

            if($response->failed()){  
                /* alert('Credenciales invalidas ','Intentelo nuevamente');    */
                dd('Las credenciales no son correctas');
                
               return back();   
            }

            $responseToken = json_decode($response->getBody()->getContents());

           //dd($responseToken);

            /*
             *check if the token is still valid
             *
             * This conditions is met when the current timestamp 
             * is greater that the access token expiration
             */
            if (Carbon::now()->timestamp > $responseToken->access_token_expiration) {

               // Renew token
               $response = Http::withOptions([
                    'debug' => false,
                    'verify' => false
                ])->get('https://beesys.beenet.com.sv/api/2.0/admin/auth/tokens' . $responseToken->refresh_token, [
                    
                ]);

                $responseToken = json_decode($response->getBody()->getContents()); 
            } 
            
            //If the API call fails, It returns to main page
            if($response->failed()){     
                return back();   
            }

            //This response show the customer information according to the token that was generated
            $response = Http::withOptions([
                'debug' => false,
                'verify' => false
            ])->withHeaders([
                'Authorization' => 'Splynx-EA (access_token=' . $responseToken->access_token . ')'
            ])->get('https://beesys.beenet.com.sv/api/2.0/admin/users/user', [

            ]);

            $responseCustomer = json_decode($response->getBody()->getContents());

            // sessions are created
            session(['customer_info' => $responseCustomer]);
            session(['customer_token' => $responseToken->access_token]);
            session(['expiration_token' => $responseToken->access_token_expiration]);
            session(['refresh_token' => $responseToken->refresh_token]);

            //Redirect the welcome page
            /* alert()->success('Bienvenido a  Portal de pago ECO Networks');  */
            /* dd('Bienvenido a Pulpo Streaming'); */
            return redirect()->route('home'); 

        } catch (ClientException $e) {
            return back();
        }  //end try catch
        
       
    }



    public function logout()
    {
        //destroy the session
        Session::flush();
        return redirect('/');
    }  

}