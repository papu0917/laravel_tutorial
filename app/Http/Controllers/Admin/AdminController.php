<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;

class AdminController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(6);
        return view('admin/index', compact('stocks'));
    }
    public function create()
    {
        return view('admin/create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, Stock::$rules);
        $stock = new Stock;
        $form = $request->all();

        // formに画像があれば、保存する
        if (isset($form['image'])) {
            $path = $request->file('imgpath')->store('public/image');
            $stock->imgpath = basename($path);
        } else {
            $stock->imgpath = null;
        }

        unset($form['_token']);
        unset($form['image']);
        // データベースに保存する
        $stock->fill($form);
        $stock->save();
        return redirect()->route('admin.index');
    }

    public function edit(Request $request)
    {
        $stock = Stock::find($request->stock_id);
        if (empty($stock)) {
            abort(404);
        }

        return view('admin/edit', compact('stock'));
    }

    public function update(Request $request)
    {
        // dd($request);
        // Validationをかける
        $this->validate($request, Stock::$rules);
        // News Modelからデータを取得する
        $stock = Stock::find($request->id);
        // 送信されてきたフォームデータを格納する
        $stock_form = $request->all();
        if ($request->remove == 'true') {
            $stock_form['imgpath'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $stock_form['imgpath'] = basename($path);
        } else {
            $stock_form['imgpath'] = $stock->imgpath;
        }

        unset($stock_form['imgpath']);
        unset($stock_form['remove']);
        unset($stock_form['_token']);
        // 該当するデータを上書きして保存する
        $stock->fill($stock_form)->save();
        return redirect('admin/index');
    }

    public function delete(Request $request)
    {
        $stock = Stock::find($request->stock_id);
        $stock->delete();

        return redirect('admin/index');
    }
}
