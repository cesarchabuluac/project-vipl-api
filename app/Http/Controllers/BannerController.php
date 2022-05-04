<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::withTrashed()->orderBy('id', 'DESC')->get();
        return view('banners.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->only('title', 'description');
            $imageName = time() . '.' . $request->image->extension();

            $file = $request->file('image');
            $name = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $name . '.' . $extension;
            $file->storeAs('public/banners/', $fileName);
            $input['image'] = $fileName;
            $banner = Banner::create($input);
            DB::commit();
            return redirect()->route('banners.index')->with('success', 'Banner saved successfully');
            
        } catch (Exception $ex) {
            DB::rollBack();
            Storage::delete("public/banners/{$fileName}");
            return redirect()->back()->with('errors', $ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banners.edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBannerRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $input = $request->only('title', 'description');
        $banner->update($input);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $name . '.' . $extension;
            $file->storeAs('public/banners/', $fileName);

            //Remove old image
            Storage::delete("public/banners/{$banner->image}");
            $banner->update(['image' => $fileName]);
        }

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::withTrashed()->find($id);
        if ($banner->deleted_at) {
            $banner->restore();
        } else {
            $banner->delete();
        }
        // $banner->save();
        return redirect()->route('banners.index')->with('success', 'Banner updated successfuly');
    }
}
