<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Item;
use App\Models\Types;
// use App\Models\User;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        //viewの$requestから検索ワードを受け取る
        $keyword = $request->input('keyword');

        $query = Item::select([
            'i.id as id',
            'i.user_id as user_id',
            'i.name as name',
            'i.type as type',
            'i.inventory as inventory',
            'i.detail as detail',
            't.type_name as type_name',
        ])
            ->from('items as i')
            ->leftJoin('types as t', function ($join) {
                $join->on('i.type', '=', 't.id');
            });

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('type_name', 'LIKE', "%{$keyword}%");
        }

        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        $items = $query->get();

        return view('/item.index', compact('items','keyword'));
    }

    /**
     * 商品登録
     */
    public function get_add(Request $request)
    {
            // 種別一覧を取得する
            $types = Types::orderBy('id', 'asc')->get();
    
            return view('/item.add', [
                'types' => $types,
            ]);
    }

    public function post_add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'inventory' => $request->inventory,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('/item.add');
    }

    /**
    *商品編集画面表示
    */
    public function get_item_edit(Request $request, $id )
    {
        // 種別一覧を取得する
        $types = Types::orderBy('id', 'asc')->get();

        $item = Item::find($id);
        return view('/item.item_edit', [
            'item' => $item,
            'types' => $types,
        ]);
    }

    /**
     * 商品編集・削除
     */
    public function edit_delete_item(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);

        /**
         * 商品編集
         */
        if(isset($request->edit)) {
            $item = Item::find($id);
            $item->update([
                'name' => $request->name,
                'type' => $request->type,
                'inventory' => $request->inventory,
                'detail' => $request->detail,
            ]);
        return redirect('/items');
        }

        /**
         * 商品削除
         */
        if(isset($request->delete)) {
            $item = Item::find($id);
            $item->delete();
        return redirect('/items');
        }
    }

}