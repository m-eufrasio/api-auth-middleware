<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;

class GateAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $post = new Post;
        $currentRoute = $request->route()->getName();
        $response = [
            'index' => Gate::inspect('index-post', $post),
            'show' => Gate::inspect('show-post', $post),
            'store' => Gate::inspect('store-post', $post),
            'update' => Gate::inspect('update-post', $post),
            'delete' => Gate::inspect('delete-post', $post),
        ];

        switch ($currentRoute) {
            case 'post.index':
                if (! $response['index']->allowed()) {
                    abort(404, 'Resource not found');
                }
                break;

            case 'post.show':
                if (! $response['show']->allowed()) {
                    abort($response['show']->status(), $response['show']->message());
                }
                break;

            case 'post.store':
                if (! $response['store']->allowed()) {
                    abort($response['store']->status(), $response['store']->message());
                }
                break;

            case 'post.update':
                if (! $response['update']->allowed()) {
                    abort($response['update']->status(), $response['update']->message());
                }
                break;

            case 'post.delete':
                if (! $response['delete']->allowed()) {
                    abort($response['delete']->status(), $response['delete']->message());
                }
                break;
            
            default:
                redirect()->route('home');
                break;
        }

        return $next($request);
    }
}
