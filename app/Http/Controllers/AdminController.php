<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use phpseclib\Crypt\RSA;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Plataforma;

class AdminController extends Controller
{
    public function home(Request $request){
        $auth = session('customer_info');

         if (is_null($auth))
        {
            //return the login page 
            return redirect('/');
        }else{
           //return the welcome page 
           return view('home');  
        }
    }
    
    public function verifyToken()
    {
        /*
        *check if the token is still valid
        *
        * This conditions is met when the current timestamp 
        * is greater that the access token expiration
        */
        if (Carbon::now()->timestamp > session('expiration_token')) {

           // dd("http://beesys.beenet.com.sv/api/2.0/admin/auth/tokens/.session('refresh_token')");
            // Renew token
            $response = Http::withOptions([
                    'debug' => false,
                    'verify' => false
                ])->get('https://beesys.beenet.com.sv/api/2.0/admin/auth/tokens/'.session('refresh_token'), [
                        
                ]);

            $responseToken = json_decode($response->getBody()->getContents()); 
            //dd($responseToken);
            session(['customer_token' => $responseToken->access_token]);
        } 
    }

   public function customers(){
    $this->verifyToken();
    if(is_null(session('customer_token'))){
        return redirect('/');
    }

    $search = [
        'main_attributes' => [
            'tariff_id' => '1'
        ]
    ];



    $users = Http::withOptions([
        'debug' => false,
        'verify' => false
    ])->withHeaders([
        'Authorization' => 'Splynx-EA (access_token=' . session('customer_token') . ')'
    ])->get('https://beesys.beenet.com.sv/api/2.0/admin/customers/customer/0/recurring-services?params=' . http_build_query($search))
    ->json();

    $page = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 10; // Cambia 10 por el número de usuarios que deseas mostrar por página

    $users = collect($users);

    $users = new LengthAwarePaginator(
        $users->forPage($page, $perPage),
        $users->count(),
        $perPage,
        $page,
        ['path' => LengthAwarePaginator::resolveCurrentPath()]
    );

    return view('users', compact('users'));
    
}

public function showCustomerInfo($customerId){
    $this->verifyToken();
    if(is_null(session('customer_token'))){
        return redirect('/');
    }

    $response=Http::withOptions([
        'debug' => false,
        'verify' => false
    ])->withHeaders([
        'Authorization' => 'Splynx-EA (access_token=' . session('customer_token') . ')'
    ])->get('https://beesys.beenet.com.sv/api/2.0/admin/customers/customer/' . $customerId);

    $response2 = Http::withOptions([
        'debug' => false,
        'verify' => false
    ])->withHeaders([
        'Authorization' => 'Splynx-EA (access_token=' . session('customer_token') . ')'
    ])->get("https://beesys.beenet.com.sv/api/2.0/admin/customers/customer/$customerId/bundle-services");



    $customerInfo = json_decode($response->getBody()->getContents());
    $bundleInfo = json_decode($response2->getBody()->getContents());

    return view('customer_info', compact('customerInfo','bundleInfo'));
}

public function numberUsers(Request $request){
    $auth = session('customer_info');

    if (is_null($auth)) {
        return redirect('/');
    } else {
        // Hacer una solicitud a la API para obtener la lista de usuarios activos
        $response = Http::withOptions([
            'debug' => false,
            'verify' => false
        ])->withHeaders([
            'Authorization' => 'Splynx-EA (access_token=' . session('customer_token') . ')'
        ])->get('https://beesys.beenet.com.sv/api/2.0/admin/customers/customer/0/recurring-services?params=' . http_build_query([
            'main_attributes' => [
                'status' => 'active'
            ]
        ]));

        // Decodificar la respuesta JSON
        $users = json_decode($response->getBody()->getContents(), true);

        // Contar el número de usuarios activos
        $activeUsersCount = count($users);

        return view('home', compact('activeUsersCount'));
    }
}

public function index(){
    $plataformas = Plataforma::all();
    $activeUsersCount = $plataformas->sum('perfiles_ocupados');

    return view('plataformas', compact('activeUsersCount', 'plataformas'));
}
    
}
