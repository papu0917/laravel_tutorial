<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(6);
        return view('admin/admin', compact('stocks'));
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
