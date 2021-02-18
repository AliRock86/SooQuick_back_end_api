<?php

namespace App\Http\Controllers;

use JWTAuth;
use Exception;
use Validator;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UploadImageController;

class UserControllerAPI extends Controller
{
    protected $smsUrl = 'https://sms-gw.net:91/v2/api/Gateway/SendMessage';
    protected $smsToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjE2ZGMwNmEyLThkYWQtNDcyYy1hNDBhLWY3YmQwYWVhZDAxNyIsImVtYWlsIjoiZW5qYXpAc21zLWd3Lm5ldCIsImdpdmVuX25hbWUiOiJFTkpBWiIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL25hbWUiOiJFTkpBWiIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvcm9sZSI6IkN1c3RvbWVyIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwOS8wOS9pZGVudGl0eS9jbGFpbXMvYWN0b3IiOiIyIiwianRpIjoiNjNmNWFlOGEtODM1OS00M2EyLTkwNjgtMTVjM2Y5OTc5NjA1IiwibmJmIjoxNTgwMTY0Mjk2LCJleHAiOjE2MTE3ODY2OTYsImlzcyI6Iklzc3VlciIsImF1ZCI6IkF1ZGllbmNlIn0.yukJbD_zVIoE-gG2HKMxI8EpBeaohNwIxG_vnuS2TAw';
    public function index(){
        return 'tttttttttttttttttt';
    }
    public function store(Request $request)
    {
        
   
       
;
        $user = new User;
        $user->full_name = $request->full_name;
        $user->user_email = ($request->user_email) ? $request->user_email : 'null';
        $user->password = app('hash')->make($request->password);
        $user->user_phone = $request->user_phone;
        $user->role_id = $request->role_id;
        $user->status_id = 1;
        $user->mobile_token = md5(rand(1, 10) . microtime());
        $user->permision_id = 1;
        $sms_content =111111;
        //$sms_content = mt_rand(19999, 999999);

        try {
            DB::beginTransaction();
            $user->save();

            if($request->long==null || $request->lat==null)
            {
                $ip =$_SERVER['REMOTE_ADDR'];
                $access_key = '404b133e44aa0ced6faaf521cb09368c';
                $ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $json = curl_exec($ch);
                curl_close($ch);
                $api_result = json_decode($json, true);
                $long=$api_result['longitude'];
                $lat=$api_result['latitude'];
                
        
            }
            else
            {
                $long=$request->long;
                $lat=$request->lat;


            }
            $user->address()->create(
                [
                    'region_id' => $request->region_id,
                    'long' =>$long,
                    'lat' => $lat,
                    'address_descraption' => (!$request->address_descraption) ? $request->address_descraption : 'aaa',
                ]);
         if($request->images)
         {
            if (count($request->images) !== 0) {
                $upload = new UploadImageController;
                $path = $upload->uploadInner($request);
                $user->image()->create(
                    [
                        'image_url' => $path[0],
                    ]);
            }
         }

        Otp::create(['user_id' => $user->id, 'verify_number' => $sms_content]);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return false;
        }
        DB::commit();
        $credentials = $request->only(['user_phone', 'password']);
        $token = JWTAuth::attempt($credentials);
        return [
            'success'=>true,
             'token'=>$token,
             'data'=>$user

        ];
    

        

    }

    public function update(Request $request)
    {

        // $validator = Validator::make($request->all(), User::VALIDATION_RULE_UPDATE);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'data' => $validator->messages(),
        //     ], 400);
        // }
        $user = JWTAuth::parseToken()->authenticate();
        $user = User::find($user->id);
        if(!$user){
            return response()->json([
                'success' => false,
                'data' => 'Token Invalid',
            ], 400);
        }
        $user->full_name = $request->full_name;
     //   $user->user_email = ($request->user_email) ? $request->user_email : null;
      //  $user->password = app('hash')->make($request->password);
     //   $user->user_phone = $request->user_phone;

        try {
            DB::beginTransaction();
            $user->save();
            $user->address()->update(
                [
                    'region_id' => $request->region_id,
                    'long' => $request->long,
                    'lat' => $request->lat,
                    'address_descraption' => (!$request->address_descraption) ? $request->address_descraption : 'null',
                ]);
                if($request->images)
                {
            if (count($request->images) !== 0) {
                $upload = new UploadImageController;
                $path = $upload->uploadInner($request);
                $user->image()->create(
                    [
                        'image_url' => $path[0],
                    ]);
            }
        }
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return false;
            // return response()->json([
            //     'success' => false,
            //     'data' => 'data did not updated',
            // ], 400);
        }
        DB::commit();
        return [
            'success'=>true,
           //  'token'=>$token,
             'data'=>$user

        ];
    }

    public function accountActivate($otpNumber)
    {
        
        $user = JWTAuth::parseToken()->authenticate();
        if ($user->id) {
            $otpObject = Otp::where(
                ['user_id' => $user->id],
                ['verify_number' => $otpNumber]
            )->get();
        } else {
            return response()->json([
                'success' => false,
                'data' => 'Token Invalid',
            ], 400);
        }

        if (!$otpObject) {
            return response()->json([
                'success' => false,
                'data' => 'otp invalid',
            ], 400);
        } else {
            $end_date = strtotime(date("Y-m-d H:i:s"));
            $start_date = strtotime($otpObject[0]->created_at);
            $diffInHoures = floor(($end_date - $start_date) / 60 / 60);
            if ($diffInHoures >= 25) {
                return response()->json([
                    'success' => false,
                    'data' => 'otp expired',
                ], 400);
            }
        }
        $user = User::find($user->id);
        $user->status_id = 2;
        $user->save();

        return response()->json([
            'success' => true,
            'data' => 'user activated',
        ], 200);
    }



    public function changePassword(Request $request)
    {


        $validator = Validator::make($request->all(), User::VALIDATION_change_Password);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }

         $user = JWTAuth::parseToken()->authenticate();

        if($user)
        {
            $otpObject = Otp::where('user_id','=',$user->id)
            ->where('verify_number','=',$request->otpNumber)
            ->get();

        }
        else
        {
            return response()->json([
                'success' => false,
                'data' => 'Account Not Found',
            ], 401);

        }


        // if (count($otpObject)==0) {
        //     return response()->json([
        //         'success' => false,
        //         'data' => 'otp invalid',
        //     ], 400);
        // }
        
        
        
        // else {
        //     $end_date = strtotime(date("Y-m-d H:i:s"));
        //     $start_date = strtotime($otpObject[0]->created_at);
        //     $diffInHoures = floor(($end_date - $start_date) / 60 / 60);
        //     if ($diffInHoures >= 25) {
        //         return response()->json([
        //             'success' => false,
        //             'data' => 'otp expired',
        //         ], 401);
        //     }
        // }
        $user = User::find($user->id);
        $user->password = app('hash')->make($request->password);
        $user->save();
        return response()->json([
            'success' => true,
            'data' => 'password changed',
        ], 200);
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'success' => true,
                'data' => 'Successfully logged out',
            ], 200);
        
        }

        catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => 'wrong',
            ], 400);
        } 

        
     
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), User::VALIDATION_RULE_LOGIN);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
        $credentials = $request->only(['user_phone', 'password']);
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                throw new Exception('invalid_credentials');
            }

            $user = auth()->user();
            return new UserResource($user, $token);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => $e->getMessage(),
            ], 400);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'data' => $e->getMessage(),
            ], 500);
        }
    }

    public function sms($smsData)
    {
        $response = Http::withToken($this->smsToken)
            ->post($this->smsUrl, $smsData);
        return $response;
    }

    public function changeStatus($statusId, $userId)
    {
        $u = User::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }

    public function refresh(Request $request)
    {
        try {
            $token = JWTAuth::getToken();
            $new_token = JWTAuth::refresh($token);
            return response()->json([
                'success' => true,
                'data' => $new_token,
            ], 200);
        }

             catch (Exception $e) {
           $this->data['data'] = $e->getMessage();
           return response()->json([
            'success' => false,
            'data' => $this->data['data'] = $e->getMessage(),
        ], 500);
           
        } 

       
    }

    public function forgotPassword($userPhone)
    {
        $user = User::where('user_phone', $userPhone)->first();
        if ($user) {
            $sms_content = mt_rand(19999, 999999);
            $smsData = [];
            $smsData['number'] = $userPhone;
            $smsData['text'] = $sms_content;
            $smsData['messageType'] = 3;
            $smsData['sentThrough'] = 1;
            Otp::create(['user_id' => $user->id, 'verify_number' => $sms_content]);
            $this->sms($smsData);
        } else {
            return response()->json([
                'success' => false,
                'data' => 'Account Not Found',
            ], 404);

        }

        return response()->json([
            'success' => true,
            'data' => 'message sent ....',
        ], 200);
    }

  
}
