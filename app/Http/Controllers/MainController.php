<?php

namespace App\Http\Controllers;

use App\Models\ClassGroup;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\ManualTelegramMessage;
class MainController extends Controller
{


    public function dashboard($value = '')
    {
        $totalTokens = ManualTelegramMessage::count();
        $manuallyAddedTokens = ManualTelegramMessage::where('manually_added', 1)->count();
        $promotedTokens = ManualTelegramMessage::where('promoted', 1)->count();
        $scrapedTokens = ManualTelegramMessage::where('manually_added', 0)->count();
        return view('dashboard', compact('totalTokens', 'manuallyAddedTokens', 'promotedTokens', 'scrapedTokens'));
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($request->brand_id),
            ],
        ]);
        if ($validator->fails()) {
            return $validator->messages();
            flashy()->error("Some thing Went wrong", '#');
            return redirect()->back()->withErrors($validator->messages())->withInput();
        } else {

            if ($request->brand_id == '') {
                $imagePath=null;
                if ($request->hasFile('logo')) {
                    $imagePath = $request->file('logo')->store('brand_logos', 'public');
                }
                User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'alamat' => $request->address,
                    'contact_number' => $request->contact_number,
                    'logo' => $imagePath,
                    'commission' => $request->commission,
                    'bank_account' => $request->bank_account,
                    'bank_name' => $request->bank_name,
                    'role' => 'super',
                    'status' => 1,
                    'branch_id' => auth()->id(),
                ]);
                flashy()->success('Brand created successfully', '#');
                return redirect()->back()->with('success', 'Brand created successfully');
            } else {
                if ($request->hasFile('logo')) {
                    $imagePath = $request->file('logo')->store('brand_logos', 'public');

                    User::find($request->brand_id)->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'alamat' => $request->address,
                        'contact_number' => $request->contact_number,
                        'logo' => $imagePath,
                        'commission' => $request->commission,
                        'bank_account' => $request->bank_account,
                        'bank_name' => $request->bank_name,
                    ]);
                } else {

                    User::find($request->brand_id)->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'alamat' => $request->address,
                        'contact_number' => $request->contact_number,
                        'commission' => $request->commission,
                        'bank_account' => $request->bank_account,
                        'bank_name' => $request->bank_name,
                    ]);
                }
                flashy()->success('Brand Updated successfully', '#');
                return redirect()->back()->with('success', 'Brand Updated successfully');

            }
        }
    }

}
