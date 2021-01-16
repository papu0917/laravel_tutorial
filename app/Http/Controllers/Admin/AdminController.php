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
    public function addAdmin()
    {
    }

    public function editAdmin()
    {
    }

    public function updataAdmin()
    {
    }

    public function deleteAdmin()
    {
    }
}
