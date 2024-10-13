<?php

namespace App\Http\Controllers\Site;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('site.services', compact('services'));
    }
    public function show($id)
    {
        // Buscar o serviço pelo ID
        $service = Service::findOrFail($id); // findOrFail lança erro 404 se não encontrar

        // Retornar a view com o serviço
        return view('site.service', compact('service'));
    }

    public function create()
    {
        $installments = range(1, 12);

        return view('site.create-services', compact('installments'));
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
            'installment_options.total_installments' => 'required|integer|min:1|max:12',
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
