<?php

namespace App\Http\Controllers\Site;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show()
    {
        $services = Service::all();
        return view('site.services', compact('services'));
    }

    public function create()
    {
        return view('site.create-services');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'description'           => 'nullable|string',
            'price'                 => 'required|numeric',
            'image'                 => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'installment_option'    => 'nullable|array',
            'custom_fields'         => 'nullable|array',
        ]);

        $service = new Service();
        $service->name              = $request->input('name');
        $service->description       = $request->input('description');
        $service->price             = $request->input('price');

        if ($request->hasFile('image')) {
            $imagePatch                     = $request->file('image')->store('services', 'public');
            $service->image_patch           = $imagePatch;
        }

        if ($request->filled('installment_options')) {
            $service->installment_options   = json_encode($request->input('installment_options'));
        }

        if ($request->filled('custom_fileds')) {
            $service->custom_fields         = json_encode($request->input('custom_fields'));
        }

        $service->save();

        return redirect()->route('services')->with('success', 'Serviço criado com sucesso');
    }
}
