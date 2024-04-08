<?php

namespace App\Http\Controllers\Web\Admin\Database;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Event;

class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('database.index');
    }

    public function createForm()
    {
        return view('database.create-form');
    }

    public function store(Request $request)
    {
        $dbname = $request->input('database_name');
        $databaseName = $dbname;
        $query = "CREATE DATABASE IF NOT EXISTS `{$databaseName}`";
        DB::connection()->getPdo()->exec($query);

        return redirect()->route('database.index');
    }

    public function changeDatabase(Request $request)
    {
        $db = $request->input('db');
        // Update the database name in the .env file
        File::put(base_path('.env'), preg_replace("/DB_DATABASE=.*/", "DB_DATABASE={$db}", File::get(base_path('.env'))));

        // Clear the configuration cache
        Artisan::call('config:clear');

    }

    public function performMigration(){
        Artisan::call('migrate');
    }

}
