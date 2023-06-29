<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Types;

class TypeController extends Controller
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
     * 種別一覧
     */
    public function type_index()
    {
        // 種別一覧取得
        $types = Types
            ::where('types.status', 'active')
            ->select()
            ->get();

        return view('item.type_index', compact('types'));
    }

    /**
     * 種別登録
     */
    public function type_add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'type_name' => 'required|max:100',
            ]);

            // 種別登録
            Types::create([
                'type_name' => $request->type_name,
            ]);

            return redirect('/items/type_index');
        }

        return view('item.type_add');
    }

    /**
    *種別編集画面表示
    */
    public function get_type_edit(Request $request, $id )
    {
        $type = Types::find($id);
        return view('item.type_edit', [
            'type' => $type,
        ]);
    }

    /**
     * 種別編集・削除
     */
    public function edit_delete_type(Request $request, $id)
    {
        $this->validate($request, [
            'type_name' => 'required|max:100',
        ]);

        /**
         * 種別編集
         */
        if(isset($request->edit)) {
            $type = Types::find($id);
            $type->update([
                'type_name'=>$request->type_name,
            ]);
        return redirect('items/type_index');
        }

        /**
         * 種別削除
         */
        if(isset($request->delete)) {
            $type = Types::find($id);
            $type->delete();
        return redirect('items/type_index');
        }
    }

}