<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserMobile;
use Illuminate\Http\Request;
use Validator;

class UserApiController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|unique:user_mobiles,email',
            'phone' => 'required|string',
            'date_of_birth' => 'required',
            'date_register' => 'required',
            'type_login' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors();
            return $this->sendError($message, 401);
        }

        try {
            $input = $request->all();
            $input['active'] = 1;
            $user = UserMobile::create($input);
            return $this->sendResponse($user, 'User saved successfully');
        } catch (\Exception $ex) {
            \Log::info($ex->getMessage());
            return $this->sendError($ex->getMessage(), 500);
        }
    }
}
