## Dynamic menu builder

dynamic menu builder is a way to create you'r menu fast and easy. i'm always wanted a way to generate a menu
without recreating every thing from the basic .

installing the package

## Usage

### step 1: install it through composer
```
composer require mkdesignn/menubuilder
```

### Step 2: Add the Service Provider
    Mkdesignn\MenuBuilder\MenuProvider::class

### Step 2: Add Facade class
   'Menu'      => Mkdesignn\MenuBuilder\Facade::class

### step 3: publish the vendor files
    ```
        php artisan vendor:publish
    ```

## Examples

## Create simple menu

    ```
        echo Menu::render('vertical', new \App\Tag(), "vertical-menu");
    ```
this way we can build simple menu

