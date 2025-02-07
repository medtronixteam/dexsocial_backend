<?php

namespace App\Http\Controllers;

use App\Models\ManualTelegramMessage;
use App\Models\TelegramMessage;
use App\Models\UserAddress;
use App\Models\Coin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TelegramController extends Controller
{
    public function getTelegramData()
    {
        // $channelUsername = 'Dex_social_bot';

        // // Get the last processed timestamp
        // $lastProcessedTimestamp = TelegramMessage::max('processed_at');

        // // Fetch recent messages from the bot with a filter for messages after the last processed timestamp
        // $response = Telegram::getUpdates([
        //     'limit' => 5,
        //     'timeout' => 555230,

        // ]);

        // $messages = collect($response)->pluck('message');

        // // Save only new messages to the database
        // foreach ($messages as $message) {
        //     TelegramMessage::create([
        //         'from_first_name' => $message['from']['first_name'] ?? 'Unknown User',
        //         'text' => $message['text'] ?? 'No message text available',
        //         'processed_at' => now(), // Mark the message as processed with the current timestamp
        //         // Add more attributes as needed
        //     ]);
        // }
        $totalTokens = TelegramMessage::count();
        $messages = [];
        return view('home', compact('messages', 'totalTokens'));
    }
    public function processTelegramData(Request $request)
    {
        $telegramData = $request->all();
        $message = TelegramMessage::firstOrCreate(
            ['from_first_name' => $telegramData['from_first_name'], 'text' => $telegramData['text']],
            $telegramData
        );
        $message->update(['processed_at' => now()]);
        return response()->json(['message' => 'Data processed successfully']);
    }
    public function editData()
    {
        // Fetch all data
        $allData = TelegramMessage::all();

        return view('editData', compact('allData'));
    }
    public function editToken($id)
    {
        // Fetch all data
        $Coin = Coin::where('status', 1)->get();
        $data = ManualTelegramMessage::where('id',base64_decode($id))->first();
        return view('editToken', compact('data','Coin'));
    }
    public function deleteData($id)
    {
        // Find the TelegramMessage by ID
        $message = ManualTelegramMessage::find($id);

        if (!$message) {
            flashy()->error("Token not found.", '#');
            return redirect()->route('edit-data')->with('error', 'Token not found.');

        }

        flashy()->success("Token deleted successfully.", '#');
        $message->delete();

        return redirect()->route('edit-data')->with('success', 'Token deleted successfully.');
    }

    public function promoteData($id)
    {
        // Find the TelegramMessage by ID
        $message = TelegramMessage::find($id);

        if (!$message) {
            return redirect()->route('edit-data')->with('error', 'Token not found.');
        }

        // Toggle the promoted_token value
        $message->promoted_token = !$message->promoted_token;
        $message->save();

        return redirect()->route('edit-data')->with('success', 'Token promoted/unpromoted successfully.');
    }
    public function latestData()
    {
        $latestData = ManualTelegramMessage::where('manually_added', 0)->latest('id')->paginate(10);

        return view('latestData', compact('latestData'));
    }
    public function promotedTokens()
    {
        $promotedTokens = ManualTelegramMessage::where('promoted', 1)->get();

        return view('promotedTokens', compact('promotedTokens'));
    }
    public function updateData(Request $request, $id)
    {
        $request->validate([
            'edited_text' => 'required|string',
        ]);

        $token = TelegramMessage::findOrFail($id);

        // Check if the text is actually being updated
        if ($token->text !== $request->input('edited_text')) {
            $token->text = $request->input('edited_text');
            $token->token_edited = 1; // Set the token_edited value to 1
            $token->save();
        }

        return redirect()->route('edit-data')->with('success', 'Token text updated successfully!');
    }
    public function updatedTokens()
    {
        $updatedTokens = TelegramMessage::where('token_edited', 1)->get();

        return view('updatedTokens', compact('updatedTokens'));
    }
    //
    public function addManualData(Request $request)
    {
        $request->validate([
            'token_name' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add validation rules for other fields as needed
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imagePath = str_replace('public/', '', $imagePath);
        } else {
            $imagePath = null;
        }

        // Create a new manual message
        $manualMessage = ManualTelegramMessage::create([
            'token_name' => $request->input('token_name'),
            'image_path' => $imagePath,
            'token_symbol' => $request->input('token_symbol'),
            'token_chain' => $request->input('token_chain'),
            'contract_address' => $request->input('contract_address'),
            'description' => $request->input('description'),
            'telegram' => $request->input('telegram'),
            'twitter' => $request->input('twitter'),
            'website' => $request->input('website'),
            'dexscreener' => $request->input('dexscreener'),
            'dextools' => $request->input('dextools'),
            'pancakeswap' => $request->input('pancakeswap'),
            'manually_added' => 1,
        ]);
        flashy()->success("Token has been Created successfully", '#');
        return redirect()->route('token.create')->with('success', 'Data added successfully!');
    }
    public function addTokenData()
    {
        $Coin = Coin::where('status', 1)->get();

        return view('addtokendata', compact('Coin'));

    }
    public function showManualData()
    {
        $manualData = ManualTelegramMessage::where('manually_added', 1)->get();

        return view('showManualData', compact('manualData'));
    }
    public function viewManualData(Request $request, $id)
    {
        $ManualTelegram = ManualTelegramMessage::where('contract_address',$id);
        if ($ManualTelegram->count()>0) {
            $ManualTelegramData=$ManualTelegram->first();
            $UserAddress = UserAddress::where('token_id', $ManualTelegramData->id)->where('address', $request->ip())->count();
            if ($UserAddress < 1) {
                UserAddress::create([
                    'address' => $request->ip(),
                    'token_id' => $ManualTelegramData->id,
                ]);
                $ManualTelegram->update([
                    'people_clicked' => $ManualTelegramData->people_clicked ++,
                ]);
            }

            return view('token_details', ['data' => $ManualTelegramData]);
        }

        flashy()->info("Token does not exists", '#');
        return redirect()->route('indextoken');

    }
    public function viewToken($id)
    {
        $data = ManualTelegramMessage::find(base64_decode($id));

        return view('viewManualData', ['data' => $data]);
    }
    public function editManualData($id)
    {
        $manualData = ManualTelegramMessage::findOrFail($id);

        return view('showManualData', compact('manualData'));
    }
    public function deleteManualData($id)
    {
        $manualData = ManualTelegramMessage::findOrFail($id);

        // Delete the associated image if it exists
        if ($manualData->image_path) {
            Storage::delete('public/' . $manualData->image_path);
        }

        $manualData->delete();

        return redirect()->route('show-manual-data')->with('success', 'Manual data deleted successfully!');
    }
    public function updateManualData(Request $request, $id)
    {
        $request->validate([
            'token_name' => 'required|string',
            'token_symbol' => 'string',
            'token_chain' => 'string',
            'contract_address' => 'string',


            // Add other fields and validation rules as needed
        ]);

        $manualData = ManualTelegramMessage::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($manualData->image_path) {
                Storage::delete('public/' . $manualData->image_path);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('public/images');
            $imagePath = str_replace('public/', '', $imagePath);

            $manualData->update(['image_path' => $imagePath]);
        }

        // Update other fields
        $manualData->update([
            'token_name' => $request->input('token_name'),
            'token_symbol' => $request->input('token_symbol'),
            'token_chain' => $request->input('token_chain'),
            'contract_address' => $request->input('contract_address'),
            'description' => $request->input('description'),
            'telegram' => $request->input('telegram'),
            'twitter' => $request->input('twitter'),
            'website' => $request->input('website'),
            'dexscreener' => $request->input('dexscreener'),
            'dextools' => $request->input('dextools'),
            'promoted' => $request->input('promoted', 0),
            'pancakeswap' => $request->input('pancakeswap'),
            // Add other fields as needed
        ]);
        flashy()->info("Token updated successfully", '#');
        return redirect()->route('show-manual-data')->with('success', 'Token updated successfully!');
    }
    public function indextoken()
    {
        // Fetch data or perform any other logic here
        $promotedTokens = ManualTelegramMessage::where('promoted', 1)->get();
        $scrapedTokens = ManualTelegramMessage::where('manually_added', 0)->latest('id')->take(20)->get();
        $updatedTokens = ManualTelegramMessage::where('manually_added', 1)->get();

        return view('main', ['promotedTokens' => $promotedTokens, 'scrapedTokens' => $scrapedTokens, 'updatedTokens' => $updatedTokens]);
    }
    public function fetchTokens(Request $request)
    {

        $results = ManualTelegramMessage::where('token_name', 'like', '%' . $request->name . '%')->limit(15)->get();

        return response()->json($results);
    }
    public function getMessagesServer(Request $request){
        $validator = Validator::make($request->all(), [
            'token_name' => 'required',
            'token_symbol' => 'required',
            'token_chain' => 'required',
            'pancakeswap' => 'required',
            'contract_address' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>'Some Field are missing','status'=>'error'],404);
        } else {
        $manualMessage = ManualTelegramMessage::create([
            'token_name' => $request->input('token_name'),
            'image_path' => null,
            'token_symbol' => $request->input('token_symbol'),
            'token_chain' => $request->input('token_chain'),
            'contract_address' => $request->input('contract_address'),
            'description' => null,
            'telegram' => null,
            'twitter' => null,
            'website' => null,
            'dexscreener' =>null,
            'dextools' => null,
            'pancakeswap' =>$request->input('pancakeswap'),
            'manually_added' => 0,
        ]);

        return response()->json(['message'=>'Token has been Created successfully','status'=>'success'],201);
    }
    }
}
