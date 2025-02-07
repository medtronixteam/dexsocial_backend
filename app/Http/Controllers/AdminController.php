<?php

namespace App\Http\Controllers;

use App\Models\ManualTelegramMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('dashboard');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'username' => ['required', Rule::unique('users', 'username')],

        ]);
        if ($validator->fails()) {

            flashy()->error($this->findFirstElement($validator->messages()), '#');
            return redirect()->back()->withErrors($validator->messages())->withInput();
        } else {

            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'alamat' => $request->address,
                'contact_number' => $request->contact_number,
                'role' => 'tutor',
                'status' => 1,
                'branch_id' => Auth::user()->id,
            ]);
            flashy()->success('tutor created successfully', '#');
            return redirect()->back()->with('success', 'tutor created successfully');
        }
    }

    public function profile()
    {
        return view('profile');
    }

    public function profileUpdate(REQUEST $request)
    {
        if (auth()->user()->role == "siswa") {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:30',
                'email' => 'required|email',
            ]);
            if ($validator->fails()) {

                flashy()->error("Something went wrong", '#');
                return redirect()->back()->withErrors($validator->messages())->withInput();
            } else {

                User::find(auth()->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
                flashy()->info("Profile Updated", '#');
                return redirect()->back();

            }
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:30',
                'email' => 'required|email',

            ]);
            if ($validator->fails()) {

                flashy()->error("Something went wrong", '#');
                return redirect()->back()->withErrors($validator->messages())->withInput();
            } else {

                User::find(auth()->id())->update([

                    'name' => $request->name,
                    'email' => $request->email,
                ]);
                flashy()->info("Profile Updated", '#');
                return redirect()->back();

            }

        }

    }



public function disableIdBy(Request $request)
{
    if ($request->type == 'token') {
        $token = ManualTelegramMessage::find(base64_decode($request->disableId));
        if ($token) {
            $token->delete();
            $response = ['msg' => 'Token has been deleted', 'sts' => 'success'];
        } else {
            $response = ['msg' => 'Invalid Id', 'sts' => 'error'];
        }
    }

    return $response;

}
public function promoteUser(Request $request)
{

        $token = ManualTelegramMessage::find(base64_decode($request->disableId));
        if ($token) {
            if ($request->action == 'promote') {
                $token->update(['promoted' => 1]);
                $response = ['msg' => 'Token has been Promoted', 'sts' => 'success'];
            } else {
                $token->update(['promoted' => 0]);
                $response = ['msg' => 'Token Account has been Demoted', 'sts' => 'success'];
            }

        } else {
            $response = ['msg' => 'Invalid Id', 'sts' => 'error'];
        }


    return $response;

}
public function getIp (Request $request) {
    $userIp = $request->ip();

    // Now, $userIp contains the user's IP address
    dd($userIp);

}
}
