<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class ShortlinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('shortlink.index', [
            'shortlinks' => Shortlink::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $qrCode = QrCode::format('png')->size(300)->generate($request->url_original);

        dd($qrCode);
        $filename = 'qrcode.png';
        $path = 'qrcodes/' . $filename;

        // Save the QR code image to storage
        Storage::put($path, $qrCode);

        return redirect()->route('shortlink.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Shortlink $shortlink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shortlink $shortlink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shortlink $shortlink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shortlink $shortlink)
    {
        //
    }
}