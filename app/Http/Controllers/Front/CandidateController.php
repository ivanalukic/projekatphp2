<?php

namespace App\Http\Controllers\Front;

use App\Models\dto\CandidateDto;
use App\Models\dto\ConditionDto;
use App\Models\dto\RatingDto;
use App\Repository\CandidateRepo;
use Illuminate\Http\Request;

class CandidateController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            if ($request->hasFile('cv')) {
                $file = $request->file("cv");
                $fileName = $file->getClientOriginalName();
                $fileName = time() . "_" . $fileName;
                public_path("images\cv");
                $file->move(public_path("images\cv"), $fileName);
                $repo = new CandidateRepo();
                $candidate = new CandidateDto();
                $conditions = new ConditionDto();
                $rating = new RatingDto();
                $all = $request->all();
                $candidate->first_name = $request->input('first_name');
                $candidate->last_name = $request->input('last_name');
                $candidate->email = $request->input('email');
                $candidate->cv = $file;
                $candidate->job_offer = $request->input('hidden');
                $conditions->condition_id = $request->input('conditions');
                $id = $repo->insert($candidate, $conditions);
                //dohvatanje ostalih popunjenih uslova koji se dinamicki ispisuju
                foreach ($all as $key => $value) {
                    $value = [];
                    if (strpos($key, "field_") !== false) {
                        $item = explode('_', $key)[1];
                        $rating->form_field_id = $item;
                        $val[] = $all['field_' . $item];
                        $rating->value = $val;
                        $repo->rating($id, $rating);
                    }

                }
                return redirect('/')->with(['msg' => 'You apply successful for this job']);
            }else{
                return  redirect('/')->with(['error'=>'You need to chose file']);
            }
        }catch (\Exception $E){
            \Log::error($E->getMessage());
          return  redirect('/')->with(['error'=>'Try again']);
        }

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
