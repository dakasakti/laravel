# Laravel
this is a repository when you want to learn laravel from beginner to advanced

### Requirements
- PHP >= 8.0 [Link](https://www.php.net)
- Composer [Link](https://getcomposer.org)
- Visual Studio Code [Link](https://code.visualstudio.com)

### Installation
- Composer
    ```
    composer create-project laravel/laravel example-app
    ```

- Laravel Installer
    ```
    composer global require laravel/installer
    
    laravel new example-app
    ```

### Extension VS Code (Opsional)
- [Laravel Artisan](https://marketplace.visualstudio.com/items?itemName=ryannaddy.laravel-artisan) => Ryan Naddy
- [Laravel Blade Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade) => Winnie Lin
- [Laravel Blade Spacer](https://marketplace.visualstudio.com/items?itemName=austenc.laravel-blade-spacer) => Austen Cameron
- [Laravel Extra Intellisense](https://marketplace.visualstudio.com/items?itemName=amiralizadeh9480.laravel-extra-intellisense) => amir
- [Laravel goto view](https://marketplace.visualstudio.com/items?itemName=codingyu.laravel-goto-view) => codingyu
- [Laravel Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel5-snippets) => Winnie Lin
- [Getter and Setter Generator](https://marketplace.visualstudio.com/items?itemName=afmicc.GetterAndSetterGenerator) => Agustin Martinez Ibarra
- [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client) => Ben Mewburn
- [PHP IntelliSense](https://marketplace.visualstudio.com/items?itemName=zobo.php-intellisense) => Damjan Cvetko
- [JavaScript (ES6) code snippets](https://marketplace.visualstudio.com/items?itemName=xabikos.JavaScriptSnippets) => charalampos karypidis
- [Database Client](https://marketplace.visualstudio.com/items?itemName=cweijan.vscode-database-client2) => Weijan Chen
- [Community Material Theme](https://marketplace.visualstudio.com/items?itemName=Equinusocio.vsc-community-material-theme) => Equinusocio

### Laravel Debugbar
```
composer require barryvdh/laravel-debugbar --dev

// add in config->app.php => providers
Barryvdh\Debugbar\ServiceProvider::class,

// use
Debugbar::info("message is info");
Debugbar::error("message is error");
```
### HTTP Response in Routing
[Link](https://laravel.com/docs/9.x/routing)

- Send view
    ```
    Route::get('/', function () {
        return view('welcome');
    });
    ```

- Send string
    ```
    Route::get('/string', function () {
        return "Hello World";
    });
    ```

- Send array (JSON)
    ```
    Route::get('/array', function () {
        return ["PHP", "Laravel"];
    });
    ```

- Send JSON (Object)
    ```
    Route::get('/json', function () {
        return response()->json([
            "username" => "dakasakti",
        ]);
    });
    ```

- Send function
    ```
    Route::get('/function', function () {
        return redirect("/);
    });
    ```

### Controllers
How to make
- Terminal
    ```
    php artisan make:controller -help
    ```
- Extenstion VS Code
    ```
    CTRL + Shift + P (Windows) => artisan make controller
    ```
Controller type
- Basic (without method)
- Invoke (one method)
- Resource (complete)
    
### Passing Data to the Views
- Compact method
    ```
    public function index() {
        $title = "This is title";

        return view("index", compact("title"));
    }
    ```

- With method
    ```
    public function index2() {
        $data = "Data title";

        return view("index")->with("data", $data);
    }
    ```

- Directly
    ```
    public function index3() {
        $description = "Data description";

        return view("index", [
            "description" => $description,
        ]);
    }
    ```

### Route Parameters
```
Route::get("/products/{id}", [ProductController::class, "show"]);

public function show($id) {
    return view("index", [
        "id" => $id,
    ]);
}
```

Pattern parameter
```
Route::get("/products/{id}", [ProductController::class, "show"])->where("id", "[0-9]+");
```
### Named Routes
```
Route::get("/products", [ProductController::class, 'index'])->name("products");

<h4>Link : <a href="{{ route("products") }}">Click in Here</a></h4>
```

### Views
- Layouts
    ```
    @yield('content') => opsional

    extends('layouts.app')
    @section('content')
        <h1>This is main page</h1>
    @endsection
    ```
    ```
    @stack('scripts') => opsional

    extends('layouts.app')
    @push('scripts')
        <script src="app.js"></script>
    @endpush
    ```
    ```
    @include('layouts.header') => required
    ```
- Images
    ```
    php artisan storage:link

    <img src="{{ asset("storage/banner.jpg") }}" alt="image">
    ```

- Statement
    ```
    @if (5 < 10)
        <img src="{{ asset("storage/banner.jpg") }}" alt="image">
    @endif
    ```
    ```
    public function index() {
        return view("portfolio.index")->with("name", "dakasakti");
    }

    @unless (empty($name))
        <h2>{{ $name }}</h2>
    @endunless
    ```
    ```
    @empty($name)
        <h2>Name is empty</h2>
    @endempty
    ```
    ```
    @isset($name)
        <h2>Name has been set</h2>
    @endisset
    ```
    ```
    @switch($name)
        @case("dakasakti")
            <h2>Welcome, {{ $name }}</h2>
            @break
        @default
            <h2>Welcome, Admin!</h2>
    @endswitch
    ```
    ```
    <div class="row">
        @for ($i = 1; $i <= 5; $i++)
            <div class="col">Column {{ $i }}</div>
        @endfor
    </div>
    ```
    ```
    public function index() {
        $names = ["david", "michelle", "kaila"];
        return view("portfolio.index", compact("names"))->with("name", "dakasakti");
    }

    <ul>
        @foreach ($names as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
    ```
    ```
    <ul>
       @forelse ($names as $item)
            <li>{{ $item }}</li>
       @empty
            <li>There are no names!</li>
       @endforelse
    </ul>
    ```

### Compiling Assets (CSS & JS)
[Check in Here](https://tailwindcss.com/docs/guides/laravel#vite)

### Databases & Migration
```
php artisan make:controller PostController
php artisan make:model Post -m

Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->foreignId("user_id");
    $table->string("title");
    $table->string("slug")->unique();
    $table->text("body");
    $table->timestamps();
    $table->timestamp("published_at")->nullable();
});

php artisan migrate
```

### Factory Model
```
php artisan make:factory PostFactory

// PostFactory
public function definition()
{
    $title = fake()->sentence(2);

    return [
        'title' => rtrim($title, '.'),
        'slug' => Str::slug($title, '-'),
        'body' => fake()->paragraph(),
        'user_id' => rand(1,5),
    ];
}

// Database Seeder
\App\Models\User::factory(10)->create();
\App\Models\Post::factory(10)->create();

php artisan db:seed
```

### Query Builder
```
use Illuminate\Support\Facades\DB;

// get all post
$posts = DB::table('posts')->get();

// get by id
$posts = DB::table('posts')->where("id", "=", 8)->get();
$posts = DB::table('posts')->where(["id" => 8])->get();

// insert
$posts = DB::table('posts')->insert([
    "title" => "Ini Post Terbaru",
    "slug" => "ini-post-terbaru",
    "body" => "ini deskripsi yang akan ditampilkan",
    "user_id" => 3,
]);

// update
$posts = DB::table('posts')->where(["id" => 11])->update([
    "body" => "mencoba update"
]);

// delete
$posts = DB::table('posts')->where(["id" => 11])->delete();
$posts = DB::table('posts')->delete(11);
```
### Introduction to Eloquent
```
use App\Models\Blog;

// get all
$blogs = Blog::all();

// get by id
$blog = Blog::find($id)->first();

// insert version_1
$blog = new Blog;
$blog->title = $request->input("title");
$blog->slug = $request->input("slug");
$blog->body = $request->input("body");
$blog->user_id = 1;
$blog->save();

// insert version_2
Blog::create([
    "title" => $request->input("title"),
    "slug" => $request->input("slug"),
    "body" => $request->input("body"),
    "user_id" => 1,
]);

// update
public function update(UpdateBlogRequest $request, Blog $blog)
{
    $blog->update([
        "title" => $request->input("title"),
        "slug" => $request->input("slug"),
        "body" => $request->input("body"),
        "user_id" => 1,
    ]);

    return redirect(route("blog.index"));
}

// delete
public function destroy(Blog $blog)
{
    $blog->delete();
    return redirect(route("blog.index"));
}
```
### Eloquent Serialization
- toArray
```
$blogs = Blog::all()->toArray();
```

- toJSON
```
$blogs = Blog::all()->toJson();
```
### Eloquent Relationship
- Eloquent One to Many
- Eloquent HasMany & HasOne
- Eloquent Many to Many
### Accessing to Request (Validation)
[Link](https://laravel.com/docs/9.x/validation#error-message-indexes-and-positions)
    
```
public function rules()
{
    return [
        "title" => "required",
        "slug" => "required",
        "body" => "required"
    ];
}

<!-- /resources/views/blogs/create.blade.php -->
    
<h1>Create Post</h1>
    
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
// errors directive
<!-- Create Post Form -->

<!-- /resources/views/blogs/create.blade.php -->
    
<label for="title">Post Title</label>
    
<input id="title"
    type="text"
    name="title"
    class="@error('title') is-invalid @enderror">
    
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
```

### Image Upload
[Link](https://laravel.com/docs/9.x/filesystem#introduction)
```
in form => enctype="multipart/form-data"
```
```
Method we can use on $request
// guessExtension() => get extension file
// getMimeType() => get type file
// getSize() => get size file
// getError() => get error file
// isValid() => get valid file

// guessClientExtension() => get extension file from client
// getClientOriginalName() => get original name file from client
// getClientMimeType() => get type file from client

// move()
// store()
// storeAs()
// storePublicly()
```
### Basic Artisan Commands
```
php artisan --version
php artisan help
php artisan list
php artisan down
php artisan up
php artisan optimize
php artisan cache:clear
php artisan auth:clear-resets
php artisan key:generate
php artisan session:table
php artisan view:Clear
```
### Authentication & Authorization
[Link](https://laravel.com/docs/9.x/authentication)

```
php artisan ui tailwindcss --auth
```
