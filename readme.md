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
this way we can build simple menu, as you can see render method takes 3 argument which I describe each of them in the below.

### first argument
first argument Is the type of the menu which wants to be created

### second argument
second argument is the table which we need to use it as a source
The class that pass to the render method should be extends model abstract class
the table tag that has been passed to the render method has the below structure

| id  | parent_id | name | slug | description | bg_color | bg_hover_color | text_color | text_hover_color
| ------------- | ------------- |
| 1  | 0  |  Php  |  Php |   |   |   |   |   |
| 2  | 0  |  Javascript  | Javascript  |   |   |   |   |   |
| 3  | 2 |  Jquery  |   |   |   |   |   |   |
| 4  | 2  | Vue.js  |   |   |   |   |   |   |
| 5  | 2  | node.js  |   |   |   |   |   |   |
| 6  | 1  | laravel  |   |   |   |   |   |   |
| 7  | 1  | symphony  |   |   |   |   |   |   |
| 8  | 5  | npm  |   |   |   |   |   |   |
| 9  | 4  | vuex  |   |   |   |   |   |   |


third argument is the class that we use it as a ul.selector to add some css attribute to it .

