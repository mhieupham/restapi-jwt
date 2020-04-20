# restapi-jwt
Use php laravel

```
"tymon/jwt-auth": "dev-develop"
```
### config/app
```
'providers' => [...
            Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
            ];
'aliases' => [...
        'JWTAuth' => Tymon\JWTAuth\Facades\JWTAuth::class,
        'JWTFactory' => Tymon\JWTAuth\Facades\JWTFactory::class,
  ],
  ```
  ### Kernel
  ```
  protected $routeMiddleware = [
   'jwt.auth' => \App\Http\Middleware\VerifyJWTToken::class,
    ];
  ```
  ### Middleware/VerifyJWTToken
  ```
  public function handle($request, Closure $next)
    {
        try{
            $user = JWTAuth::toUser($request->input('token'));
        }catch(JWTException $e){
            return response()->json(['error'],$e->getMessage());
        }
        return $next($request);
    }
  ```
