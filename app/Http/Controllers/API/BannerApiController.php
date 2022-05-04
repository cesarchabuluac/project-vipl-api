<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerApiController extends Controller
{
    public function index(Request $request) {
        $banners = Banner::orderBy('updated_at', 'DESC')->paginate(10);
        return $this->sendResponse($banners, 'Banners retrievied successfully');
    }
}
