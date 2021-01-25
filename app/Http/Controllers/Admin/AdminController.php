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
        if ($file = $request->imgpath) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('image/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        $stock = new Stock;
        $stock->name = $request->name;
        $stock->fee = $request->fee;
        $stock->detail = $request->detail;
        $stock->imgpath = $fileName;
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
        // $file = $request->all();

        $new_stock = $request->all();
        if ($request->remove == 'ture') {
            $new_stock['imgpath'] = null;
        } elseif ($request->file('imgpath')) {
            $path = $request->file('imgpath')->store('image/');
            $new_stock['imgpath'] = basename($path);
        } else {
            $new_stock['imgpath'] = $stock->imgpath;
        }

        unset($new_stock['imgpath']);
        unset($new_stock['remove']);
        unset($new_stock['_token']);

        // 該当するデータを上書きして保存する
        $stock->fill($new_stock)->save();
        return redirect('admin/index');
    }

    public function delete(Request $request)
    {
        $stock = Stock::find($request->stock_id);
        $stock->delete();

        return redirect('admin/index');
    }
}
