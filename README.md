# Laravel
this is a repository when you want to learn laravel from beginner to advanced

### Requirements
- PHP >= 8.0 [Link](https://www.php.net)
- Composer https://getcomposer.org
- Visual Studio Code https://code.visualstudio.com

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
- [PHP IntelliSense](https://marketplace.visualstudio.com/items?itemName=zobo.php-intellisense) => Damjan Cvetko
- [JavaScript (ES6) code snippets](https://marketplace.visualstudio.com/items?itemName=xabikos.JavaScriptSnippets) => charalampos karypidis

### HTTP Response in Routing
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
### Named Routes
### Views
### Compiling Assets (CSS & JS)
### Databases & Migration
### Factory Model
### Query Builder
### Introduction to Eloquent
### Eloquent Serialization
### Eloquent One to Many
### Eloquent HasMany & HasOne
### Eloquent Many to Many
### Accessing to Request
### Validation
### From Request
### Image Upload
### Basic Artisan Commands
### Authentication & Authorization
