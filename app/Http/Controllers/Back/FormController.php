<?php

namespace App\Http\Controllers\Back;

use App\Models\dto\FieldDto;
use App\Models\dto\FormDto;
use App\Models\dto\OptionsDto;
use App\Models\Field;
use App\Repository\FormFieldRepo;
use Illuminate\Http\Request;

class FormController extends BackController
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
        $all=$request->all();
        $formDto=new FormDto();
        $formDto->formId=$all['formId'];
        $repo=new FormFieldRepo();
        foreach ($all as $key=>$value)
                {
                if(strpos($key,"label_")!==false){
                  $item=explode('_',$key)[1];
                  $label=$all["label_".$item];
                  $ddl=$all['ddl_'.$item];

                  $dto=new FieldDto();
                  $dto->name=$label;
                  $dto->type_id=$ddl;
                 $rez= $repo->insert($dto,$formDto);
                                  $options=[];
                  if($ddl==2||$ddl==6||$ddl==3){
                      $options=$all['options_'.$item];
                      $option=new OptionsDto();
                      $option->options=$options;
                      try{
                          $repo->insertOption($option,$rez);
                      }catch (\Exception $e){
                          \Log::error($e->getMessage());
                      }

                  }

                }
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
