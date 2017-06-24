## Dynamic menu builder

dynamic menu builder is a way to create your menu in a quick and easy manner. I'v always wanted a way to generate a menu
without recreating everything from the basic.

installing the package

## Usage

### Step 1: install it through composer
```
composer require mkdesignn/menubuilder
```

### Step 2: Add the Service Provider
```
Mkdesignn\MenuBuilder\MenuProvider::class
```

### Step 2: Add Facade class
```
'Menu'      => Mkdesignn\MenuBuilder\Facade::class
```

### Step 3: publish the vendor files
```
PHP artisan vendor: publish
```
above command will publish menu folder which this folder contains two files, index.js and style.css which both of them should be included and also this command
also, will publish menu.php config file.
## Examples

## Create simple menu

```
echo Menu::render('vertical', new \App\Tag(), "vertical-menu");
```
this way we can build simple menu, as you can see render method takes 3 arguments which I describe each of them in the below.

### first argument
the first argument Is the type of the menu which wants to be created. it could be vertical or horizontal.

### second argument
the second argument is the table which we need to use it as a source.

**The class that pass to the render method should be extended model abstract class**

the table tag that has been passed to the render method has the below structure

| id  | parent_id | name | slug | bg_color | bg_hover_color | text_color | text_hover_color |
| --- | ---       | ---  | ---  | ---      | ---            | ---        | ---              |
|  1  |     0     | Php  | Php  |          |                |            |                  |
|  2  |     0     |  Javascript | Javascript |              |            |                  |                  |
|  3  |     2     | JQuery |  JQuery |     |                |            |                  |
|  4  |     2     | Vue.js | Vue.js |      |                |            |                  |
|  5  |     2     | Node.js|Node.js |      |                |            |                  |
|  5  |     1     | Laravel|Laravel |      |                |            |                  |
|  5  |     1     | Symphony|Symphony |    |                |            |                  |
|  5  |     5     | Npm|Npm           |    |                |            |                  |
|  5  |     4     | Vuex|Vuex         |    |                |            |                  |

as you can see in the above grid there are a bunch of fields but there are some that are not necessary to use
like the bg_color, bg_hover_color, text_color, text_hover_color, but you can use each of them.
this way the menu look likes much more dynamically. the field parent_id should remain **parent_id** .

### third argument
The third argument passed to the render method, it's a class selector which we can use it to add some CSS style to the menu. If no class passed then
mk_menu will be using as the default class.

### fourth argument
we have the fourth argument which we can use it as configuration, the fourth argument should be an array and it'll be using for the configuration.

## some of the examples

```
echo Menu::render('vertical', new \App\Tag(), "test");
```

![Captchas examples](http://codedesign.ir/uploads/menu_2017-06-24_22-45-45.png)

