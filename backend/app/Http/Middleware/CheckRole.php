<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

/**
 * Middleware kiểm tra role_id của người dùng.
 * Dùng: Route::middleware('role:1,2')->group(...)
 * (1 = admin, 2 = nhân viên, theo quy ước dự án)
 */
class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Chưa đăng nhập hoặc token không hợp lệ',
            ], 401);
        }

        if (!$user || !in_array((string) $user->role_id, $roles, true)) {
            return response()->json([
                'message' => 'Bạn không có quyền truy cập chức năng này',
            ], 403);
        }

        // Gắn user đã xác thực vào request để controller dùng lại nếu cần
        $request->attributes->set('auth_user', $user);

        return $next($request);
    }
}
