<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabinet;

class CabinetController extends Controller
{
    public function hello(){
        echo "Hello World!";
    }
    public function get(){
        echo "get";
    }
    public function post(){
        echo "post";
    }
    public function put(){
        echo "put";
    }
    public function delete(){
        echo "delete";
    }
    public function create(Request $request){
        $cabinet = new Cabinet();

        $cabinet->name = "php_cabinet";
        $cabinet->number = 223;

        $cabinet->save();
        return $cabinet;
    }
    public function getItemById($id)
    {
        $item = Cabinet::find($id);
        return $item;
    }
    public function updateCabinet(Request $request, $id)
    {
        $cabinet = Cabinet::find($id);

        if ($cabinet) {
            $cabinet->name = $request->input('name'); // Assuming 'name' is the field you want to update
            $cabinet->number = $request->input('number'); // Assuming 'number' is the field you want to update

            $cabinet->save();
            return "Cabinet with ID $id has been updated.";
        } else {
            return "Cabinet with ID $id was not found.";
        }
    }

    public function get_cabinet($id)
    {
        $menu = Cabinet::orderBy('id', 'desc')->get();
        return $menu;
    }

    public function deleteCabinet($id)
    {
        $cabinet = Cabinet::find($id);

        if ($cabinet) {
            $cabinet->delete();
            return "Cabinet with ID $id has been deleted.";
        } else {
            return "Cabinet with ID $id was not found.";
        }
    }

    public function get_c() {
        $users = Cabinet::all();
        return $users;
    }
}
