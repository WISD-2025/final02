<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangeController extends Controller
{
    // 顯示帳戶資料
    public function index()
    {
        return view('change.index', [
            'user' => Auth::user()
        ]);
    }

    // 更新帳戶資料
    public function update(Request $request)
    {
        $user = Auth::user();

        // 驗證
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // 更新姓名、信箱
        $user->name  = $request->name;
        $user->email = $request->email;

        // 有填新密碼才更新
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('change.index')
            ->with('success', '帳戶資料已更新');
    }
}
