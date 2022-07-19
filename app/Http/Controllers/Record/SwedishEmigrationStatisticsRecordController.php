<?php

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;
use App\Models\SwedishEmigrationStatisticsRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use MeiliSearch\Client as MeiliSearchClient;
use MeiliSearch\Endpoints\Indexes;

class SwedishEmigrationStatisticsRecordController extends Controller
{
    public function __construct(MeiliSearchClient $meilisearch)
    {
        $this->meilisearch = $meilisearch;
    }
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
        //
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


    public function search( Request $request )
    {

//        get the input data ready
        $inputFields = $request->except('_token', 'first_name', 'last_name','action' );
//        prepare for filter
        if($request->action === "filter")
        {
            $inputQuery = $request->first_name." ".$request->last_name;
        }
//        prepare for search
        if($request->action === "search")
        {
            $inputQuery = Arr::join( $request->except('_token', 'action'), ' ');
        }

        $records = SwedishEmigrationStatisticsRecord::search($inputQuery,
            function (Indexes $meilisearch, $query, $options) use ($request, $inputFields){
//            run the filter
                if($request->action === "filter") {
                    foreach($inputFields as  $fieldname => $fieldvalue){
                        if(!empty($fieldvalue)) {
                            $options['filter'] = ['"'.$fieldname.'"="' . $fieldvalue . '"'];
                        }
                    }
                }
                return $meilisearch->search($query, $options);
            })->paginate();
//        get the filter attributes
        $filterAttributes = $this->meilisearch->index('swedish_emigration_statistics_records')->getFilterableAttributes();
//        get the keywords again
        $keywords = $request->all();

        $model = new SwedishEmigrationStatisticsRecord();

        $fields = collect($model->getFillable())
            ->diff(['user_id', 'archive_id', 'organization_id','old_id','first_name', 'last_name'])
            ->flatten();
        $advancedFields = $fields->diff($filterAttributes)->flatten();
        $defaultColumns = $model->defaultTableColumns();
        $populated_fields = collect(array_filter($request->except(['first_name','last_name','action','_token','query', 'page']), 'strlen'))->except($defaultColumns)->keys();
//        return view
        return view('dashboard.scbe.records', compact('records', 'keywords', 'filterAttributes', 'advancedFields', 'defaultColumns','populated_fields'))->with($request->all());
    }
}
