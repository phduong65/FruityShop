<?php

namespace App\Http\Middleware;

use App\Models\CategoryPost;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCategoryPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validCategories = CategoryPost::pluck('id')->all();
        $validStatuses = ['publish', 'expected'];

        $categories = $request->input('categories', []);
        $postStatus = $request->input('post_status');

        $errors = [];
        $infor = [];

        $infor[] = 'Các id category hợp lệ là: ' . implode(",", $validCategories);
        $infor[] = 'Các trạng thái bài viết hợp lệ là: ' .  implode(",", $validStatuses);

        foreach ($categories as $category) {
            if (!in_array((int)$category, $validCategories)) {
                $errors[] = 'ID category không hợp lệ: ' . (int)$category;
            }
        }
        if ($postStatus != null) {
            if (!in_array($request->input('post_status'), $validStatuses)) {
                $errors[] = 'Trạng thái bài viết không hợp lệ: ' . $request->input('post_status');
            }
        }
        if (!empty($errors)) {
            return response()->json(['infor' => $infor, 'errors' => $errors], 422);
        }
        // dd($errors);
        return $next($request);
    }
}
