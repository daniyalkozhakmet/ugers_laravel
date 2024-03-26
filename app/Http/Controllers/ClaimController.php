<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClaimEditRequest;
use App\Http\Requests\ClaimRequest;
use App\Models\Claim;
use Illuminate\Http\Request;

use function PHPUnit\Framework\matches;

class ClaimController extends Controller
{
    //
    public function index()
    {
        return view('create');
    }

    public function profile()
    {
        $claims = Claim::where('user_id', auth()->user()->id)->get();
        return view('profile', ["claims" => $claims]);
    }
    public function store(ClaimRequest $request)
    {
        Claim::create([
            'user_id' => auth()->user()->id,
            'res' => auth()->user()->username,
            'neighborhood' => $request->neighborhood,
            'invent_num' => $request->invent_num,
            'date_of_excavation' => $request->date_of_excavation,
            'date_recovery_ABP' => $request->date_recovery_ABP,
            'open_square' => $request->open_square,
            'street_type' => $request->street_type,
            'type_of_work' => $request->type_of_work,
            'address' => $request->address,
            'direction' => $request->direction,
        ]);

        return redirect()->route('profile');
    }
    public function search(Request $request)
    {

        $matched = Claim::where('invent_num', 'like', '%' . $request->invent . '%')->get();
        return view('profile', ["claims" => $matched]);
    }
    public function get_by_id(String $id)
    {

        $claim = Claim::where('id', $id)->first();

        if ($claim) {
            return view('single', ['claim' => $claim]);
        }
        abort(404, 'Не найден');
    }
    public function edit_show(String $id)
    {
        $claim = Claim::where('id', $id)->first();
        if ($claim) {
            return view('edit', ['claim' => $claim]);
        }
        abort(404, 'Не найден');
    }
    public function edit(ClaimEditRequest $request, String $id)
    {
        // dd($request->file('image1'));
        $claim = Claim::where('id', $id)->first();
        $file_controller = new FileController();
        if ($claim) {
            $claim->user_id = auth()->user()->id;
            $claim->res = auth()->user()->username;
            $claim->neighborhood = $request->neighborhood;
            $claim->invent_num = $request->invent_num;
            $claim->date_of_excavation = $request->date_of_excavation;
            $claim->date_recovery_ABP = $request->date_recovery_ABP;
            $claim->open_square = $request->open_square;
            $claim->street_type = $request->street_type;
            $claim->type_of_work = $request->type_of_work;
            $claim->address = $request->address;
            $claim->direction = $request->direction;
            $claim->square_restored_area = $request->square_restored_area;
            if ($request->hasFile('image1')) {
                $claim->image1 = $request->image1;
                $file_controller->processImage($claim->image1);
            }
            if ($request->hasFile('image2')) {
                $claim->image2 = $request->image2;
                $file_controller->processImage($claim->image2);
            }
            if ($request->hasFile('image3')) {
                $claim->image1 = $request->image1;
                $file_controller->processImage($claim->image3);
            }
            if ($request->hasFile('image4')) {
                $claim->image1 = $request->image1;
                $file_controller->processImage($claim->image4);
            }
            if ($request->hasFile('image5')) {
                $claim->image1 = $request->image1;
                $file_controller->processImage($claim->image5);
            }
            if ($request->hasFile('image6')) {
                $claim->image1 = $request->image1;
                $file_controller->processImage($claim->image6);
            }
            if ($request->hasFile('claim_photo')) {
                $claim->image1 = $request->image1;
                $file_controller->processImage($claim->claim_photo);
            }


            // $claim->image2 = $request->image2;
            // $claim->image3 = $request->image3;
            // $claim->image4 = $request->image4;
            // $claim->image5 = $request->image5;
            // $claim->image6 = $request->image6;
            // $claim->claim_photo = $request->claim_photo;
            $claim->date_of_sign = $request->date_of_sign;
            $claim->date_of_sending = $request->date_of_sending;
            $claim->date_of_fixing = $request->date_of_fixing;
            $claim->save();


            return redirect()->route('profile');
        }
        abort(404, 'Не найден');
    }
}
