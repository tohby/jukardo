<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portfolios = Portfolio::orderBy('created_at', 'asc')->paginate(6);
        return view('admin.portfolio.index')->with('portfolios', $portfolios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.portfolio.create');
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
        $this->validate($request, [
            'title' => 'required',
            'desc'  => 'required',
            'img' => 'image|nullable|max:4999'
        ]);

        if($request->hasFile('img')){
            //get file name with the extension
            $fileNameWithExt = $request->file('img')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('img')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //image upload
            $path = $request->file('img')->storeAs('public/portfolio_images', $fileNameToStore);
        }else {
            $fileNameToStore = NoImage.jpg;
        }

        Portfolio::create([
            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
            'img' => $fileNameToStore
        ]);
        return redirect('/admin/portfolio')->with('success', 'Project added to portfolio');
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
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.view')->with('portfolio', $portfolio);
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
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit')->with('portfolio', $portfolio);
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
        $this->validate($request, [
            'title' => 'required',
            'desc'  => 'required',
            'img' => 'image|nullable|max:4999'
        ]);

        if($request->hasFile('img')){
            //get file name with the extension
            $fileNameWithExt = $request->file('img')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('img')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //image upload
            $path = $request->file('img')->storeAs('public/portfolio_images', $fileNameToStore);
        }else {
            $fileNameToStore = 'NoImage.jpg';
        }

        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->input('title');
        $portfolio->desc = $request->input('desc');
        $portfolio->img = $fileNameToStore;
        $portfolio->save();
        return redirect('/admin/portfolio')->with('success', 'Project has been updated');
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
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        return redirect('/admin/portfolio')->with('success', 'Project has been deleted');
    }
}
