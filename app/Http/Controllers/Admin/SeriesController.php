<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Event\EventRepository;
use App\Repositories\Series\SeriesRepository;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model = null;

    public function __construct(SeriesRepository $model, EventRepository $event)
    {
        $this->model = $model;
        $this->series =  $model;
        $this->event =  $event;
    }

    public function index()
    {
        $details = $this->model->latest()->get();
        return view('admin.series.list', compact('details'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return abort(404);
        $data = $this->event->get();
        return view('admin.series.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $formInput = $request->all();
        $formInput['publish'] = $request->publish=="on"?1:0;
        $this->model->create($formInput);
        return redirect()->route('series.index')->with('message', 'Series Has Been Created Successfuly.');
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
        $detail = $this->series->find($id);
        
        return view('admin.series.edit', compact('detail'));
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
        $old = $this->series->find($id);
        $formInput = $request->all();

        $formInput['publish'] = is_null($request->publish) ? 0 : 1;

        $this->series->update($formInput, $id);
        return redirect()->route('series.index')->with('message', 'Series updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->series->destroy($id);
        return redirect()->back()->with('message', 'Series Deleted Successfully');
    }
}
