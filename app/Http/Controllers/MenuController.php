<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
 public function index()
{
    $menus = Menu::with('category')->get()->map(function ($item) {
        return [
            'id'       => $item->id,
            'name'     => $item->name,
            'photo'    => $item->photo,
            'category' => $item->category->name_category ?? '-',
            'price'    => (int) $item->price,
            'sold'     => (int) $item->terjual,

        ];
    });

    $categories = Category::all();

    return view('menus.index', [
        'menus' => $menus,
        'categories' => $categories
    ]);
}

    public function viewadd()
    {
        $data = Category::all();
        return view("menus.add-menu", ["data" => $data]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            "photo" => "nullable|image",
            "name" => "required",
            "deskripsi" => "required",
            "category_id" => "required",
            "price" => "required|numeric",
        ]);

        // dd($data);

        if ($request->hasFile("photo")) {
            $data["photo"] = $request->file("photo")->store("menu", "public");
        }

        $data["terjual"] = 0;

        Menu::create($data);

        return redirect("/dishes")->with(
            "success",
            "Menu berhasil ditambahkan",
        );
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->photo && Storage::disk('public')->exists($menu->photo)) {
            Storage::disk('public')->delete($menu->photo);
        }

        $menu->delete();

        return redirect()
            ->back()
            ->with('success', 'Menu berhasil dihapus');
    }
}
