<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:users,username',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|min:8',
            'full_name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20|unique:users,phone',
            'gender' => 'nullable|in:male,female,other',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255'
        ],
        [
            // Username
            'username.required' => 'Tên đăng nhập không được để trống.',
            'username.string' => 'Tên đăng nhập phải là chuỗi ký tự.',
            'username.max' => 'Tên đăng nhập không được quá 50 ký tự.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',

            // Email
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được quá 100 ký tự.',
            'email.unique' => 'Email đã được sử dụng.',

            // Password
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',

            // Full name
            'full_name.required' => 'Họ và tên không được để trống.',
            'full_name.string' => 'Họ và tên phải là chuỗi.',
            'full_name.max' => 'Họ và tên không được quá 100 ký tự.',

            // Phone
            'phone.string' => 'Số điện thoại không hợp lệ.',
            'phone.max' => 'Số điện thoại không được quá 20 ký tự.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',

            // Gender
            'gender.in' => 'Giới tính không hợp lệ.',

            // Date
            'date_of_birth.date' => 'Ngày sinh không đúng định dạng.',

            // Address
            'address.string' => 'Địa chỉ không hợp lệ.',
            'address.max' => 'Địa chỉ không được quá 255 ký tự.',
        ]
        );

        $user = new User();

        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->full_name = $validated['full_name'];
        $user->phone = $validated['phone'] ?? null;
        $user->gender = $validated['gender'] ?? 'other';
        $user->date_of_birth = $validated['date_of_birth'] ?? null;
        $user->address = $validated['address'] ?? null;

        $user->role_id = 3;
        $user->status = 'active';

        $user->save();
        // return redirect('/login')->with('success', 'Đăng ký thành công');
        return response()->json([
            'message' => 'Đăng ký thành công',
            'user' => [
                'user_id' => $user->user_id,
                'username' => $user->username,
                'full_name' => $user->full_name,
                'email' => $user->email,
                'role_id' => $user->role_id,
                'status' => $user->status,
            ]
        ], 201);
    }
    public function login(Request $request)
    {

        // 1. Validate
        $validated = $request->validate(
            [
                'email' => 'required|string',
                'password' => 'required|string',
            ],
            [
                'email.required' => 'Vui lòng nhập Email hoặc Tên đăng nhập.',
                'password.required' => 'Vui lòng nhập mật khẩu.',
            ]
        );

        // 2. Kiểm tra tài khoản
        $user = User::where('email', $validated['email'])
                ->orWhere('username', $validated['email'])
                ->first();

        if (!$user) {
            return response()->json([
                'message' => 'Tên đăng nhập hoặc email không tồn tại'
            ], 401);
        }

        // 3. Kiểm tra mật khẩu
        if (!Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Mật khẩu không đúng'
            ], 401);
        }

        // 4. Tạo token
        // Access token: 15 phút
        JWTAuth::factory()->setTTL(15);
        $accessToken = JWTAuth::claims([
            'type' => 'access'
        ])->fromUser($user);

        // Refresh token: 7 ngày
        JWTAuth::factory()->setTTL(60 * 24 * 7);
        $refreshToken = JWTAuth::claims([
            'type' => 'refresh'
        ])->fromUser($user);

        // 4.3 Lưu Refresh Token vào HttpOnly Cookie
        $cookie = Cookie::make(
        'refresh_token',
        $refreshToken,
        60 * 24 * 7, // 7 ngày
        '/',
        null,
        false, // localhost
        true,  // HttpOnly
        false,
        'Strict'
    );

        // 5. Trả Access Token về React
        return response()->json([
            'message' => 'Đăng nhập thành công',
            'access_token' => $accessToken,
            'expires_in' => 15 * 60,
            'user' => $user,
        ], 200)->cookie($cookie);
    }

    public function refresh(Request $request)
    {
        $refreshToken = $request->cookie('refresh_token');
        if (!$refreshToken) {
            return response()->json([
                'message' => 'Không có refresh token'
            ], 401);
        }
        try {
            $payload = JWTAuth::setToken($refreshToken)->getPayload();

            if ($payload->get('type') !== 'refresh') {
                return response()->json([
                    'message' => 'Refresh token không hợp lệ'
                ], 401);
            }
            $user = User::find($payload->get('sub'));
            if (!$user) {
                return response()->json([
                    'message' => 'Người dùng không tồn tại'
                ], 401);
            }
            $newAccessToken = JWTAuth::claims([
                'type' => 'access',
                'exp' => now()->addMinutes(15)->timestamp,
            ])->fromUser($user);
            return response()->json([
                'access_token' => $newAccessToken,
                'expires_in' => 15 * 60,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Refresh token hết hạn hoặc không hợp lệ'
            ], 401);
        }
    }
    //hàm logout sẽ invalidate access token, xóa refresh token cookie.
    public function logout(Request $request)
    {
        try {
            $token = $request->bearerToken();
            if ($token) {
                JWTAuth::setToken($token)->invalidate(true);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Đăng xuất thất bại'
            ], 500);
        }
        $cookie = cookie()->forget('refresh_token');
        return response()->json([
            'message' => 'Đăng xuất thành công!'
        ], 200)->cookie($cookie);
    }
    public function profile(Request $request)
    {
        return response()->json(JWTAuth::parseToken()->authenticate());
    }

    public function updateProfile(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validated = $request->validate([
            'full_name' => 'sometimes|string|max:100',
            'phone' => 'nullable|string|max:20|unique:users,phone,' . $user->user_id . ',user_id',
            'gender' => 'nullable|in:male,female,other',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ], [
            'full_name.max' => 'Họ và tên không được quá 100 ký tự.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            'gender.in' => 'Giới tính không hợp lệ.',
            'date_of_birth.date' => 'Ngày sinh không đúng định dạng.',
            'address.max' => 'Địa chỉ không được quá 255 ký tự.',
        ]);

        $user->fill($validated);
        $user->save();

        return response()->json([
            'message' => 'Cập nhật thông tin thành công',
            'user' => $user->fresh(),
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'new_password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return response()->json([
                'message' => 'Mật khẩu hiện tại không đúng',
            ], 422);
        }

        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return response()->json([
            'message' => 'Đổi mật khẩu thành công',
        ]);
    }
}
