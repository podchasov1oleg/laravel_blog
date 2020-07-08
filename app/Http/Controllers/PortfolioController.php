<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{

    public function indexAdmin()
    {
        return view(//TODO переписать в соответствии с index
            'pages.admin-portfolio',
            [
                'portfolios' => Portfolio::all()
            ]
        );
    }

    public function index()
    {
        $collection = Portfolio::where('active', 1)->get();
        foreach ($collection as $item) {
            $item->image = $item->images->first()->src ?? 'https://via.placeholder.com/825x464/ff7f7f/333333?text=No+Image+Founded';
        }
        return view(
            'pages.portfolio',
            [
                'portfolios' => $collection
            ]
        );
    }

    public function create()
    {
        return view('pages.admin-portfolio-create');
    }

    public function store(Request $request)
    {
        $portfolio = new Portfolio;
        //TODO написать метод получения изображений с учетом того, что их может быть много
        $portfolio->title = $request->title;
        $portfolio->intro = $request->intro;
        $portfolio->body = $request->body;
        $portfolio->active = $request->active;
        return redirect()
            ->action('PortfolioController@indexAdmin')
            ->with(['action' => 'added', 'success' => $portfolio->save()]);
    }

    public function show($id)
    {
        return view(
            'pages.portfolio-item',
            [
                'portfolio' => Portfolio::find($id),
                'images' => PortfolioImage::where('portfolio_id', '=', $id)->get()
            ]
        );
    }

    public function edit($id)
    {
        return view(
            'pages.portfolio-edit',
            [
                'portfolio' => Portfolio::find($id),
                'images' => PortfolioImage::where('portfolio_id', '=', $id)->get()
            ]
        );
    }

    public function update(Request $request)
    {
        $portfolio = Portfolio::find($request->id);
        foreach ($request->all() as $key => $item) {
            if (strpos($key, 'image') !== false) {
                $file = $request->file($key);
                $path = $file->getClientOriginalName();
                if (Storage::disk('public')->exists($path)) {
                    $path = '_.' . $file->getClientOriginalName();
                }
                Storage::disk('public')->put($path, File::get($file));
                $image = new PortfolioImage();
                $image->portfolio_id = $request->id;
                $image->src = 'storage/' . $path;
                $image->save(); //TODO обработать, если не получилось
            }
        }
        $portfolio->title = $request->title;
        $portfolio->intro = $request->intro;
        $portfolio->body = $request->body;
        $portfolio->active = $request->active ? 1 : 0;
        return redirect()
            ->action('PortfolioController@indexAdmin')
            ->with(['action' => 'updated', 'success' => $portfolio->save()]);
    }

    public function destroy($id)
    {
        return redirect()
            ->action('PortfolioController@indexAdmin')
            ->with(['action' => 'deleted', 'success' => Portfolio::find($id)->delete()]);
    }
}
