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
        return view(
            'pages.admin-portfolio',
            [
                'portfolios' => DB::table('portfolios')
                    ->join('portfolio_images', 'portfolios.id', '=', 'portfolio_images.portfolio_id')
                    ->select('portfolios.*', 'portfolio_images.src')
                    ->get()
            ]
        );
    }

    public function index()
    {
        $collection = Portfolio::all();
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
                'images' => PortfolioImage::where('portfolio_id', '=', $id)->firstOrFail()
            ]
        );
    }

    public function edit($id)
    {
        return view(
            'pages.portfolio-edit',
            [
                'item' => Portfolio::find($id),
                'images' => PortfolioImage::where('portfolio_id', '=', $id)->firstOrFail()
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $item = Portfolio::find($id);

        //TODO метод для изображений

        $item->title = $request->title;
        $item->intro = $request->intro;
        $item->body = $request->body;
        $item->active = $request->active;
        return redirect()
            ->action('PortfolioController@indexAdmin')
            ->with(['action' => 'updated', 'success' => $item->save()]);
    }

    public function destroy($id)
    {
        return redirect()
            ->action('PortfolioController@indexAdmin')
            ->with(['action' => 'deleted', 'success' => Portfolio::find($id)->delete()]);
    }
}
