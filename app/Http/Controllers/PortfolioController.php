<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        return view('pages.portfolio-create');
    }

    private function savePortfolioImage($file, $portfolio_id)
    {
        $path = $file->getClientOriginalName();
        if (Storage::disk('public')->exists($path)) {
            $path = '_.' . $file->getClientOriginalName();
        }
        Storage::disk('public')->put($path, File::get($file));
        $image = new PortfolioImage();
        $image->portfolio_id = $portfolio_id;
        $image->src = 'storage/' . $path;
        $image->save(); //TODO обработать, если не получилось
    }

    public function store(Request $request)
    {
        $portfolio = new Portfolio;
        $portfolio->title = $request->input('title');
        $portfolio->intro = $request->input('intro');
        $portfolio->body = $request->input('body');
        $portfolio->active = $request->input('active') ?? 0;
        $saved = $portfolio->save();
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'image') !== false) {
                $file = $request->file($key);
                $this->savePortfolioImage($file, $portfolio->id);
            }
        }
        return redirect()
            ->action('PortfolioController@indexAdmin')
            ->with(['action' => 'added', 'success' => $saved]);
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
        $portfolio = Portfolio::find($request->input('id'));
        $file = $request->file('image1');
        $this->savePortfolioImage($file, $request->input('id'));
        foreach ($request->all() as $key => $item) {
            if (strpos($key, 'delete-img') !== false) {
                $image = PortfolioImage::find($item);
                unlink($image->src);
                $image->delete(); //TODO обработать, если не получилось
            }
        }
        $portfolio->title = $request->input('title');
        $portfolio->intro = $request->input('intro');
        $portfolio->body = $request->input('body');
        $portfolio->active = $request->input('active') ?? 0;
        return redirect()
            ->action('PortfolioController@indexAdmin')
            ->with(['action' => 'updated', 'success' => $portfolio->save()]);
    }

    public function destroy(Request $request)
    {
        return redirect()
            ->action('PortfolioController@indexAdmin')
            ->with(['action' => 'deleted', 'success' => Portfolio::find($request->get('id'))->delete()]);
    }
}
