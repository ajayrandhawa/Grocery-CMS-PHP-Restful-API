# Healthy Kitchen CMS PHP Restful API

Healthy Kitchen CMS PHP Restful API is an online grocery shop. The project is developed by using PHP/MySQL/Slim Restful API. The project has powerful backend CMS to manage grocery shop online. it has features like add items, remove items, update price, manage orders etc. Restful API ready to embed in Application using JSON data.

### Features

- Powerful Dashboard
- Add , Manage Items
- Add , Manage Category
- Update Price
- View Orders (Confirmed, Preparing, On Way, Dilivered)
- Generate Bills
- Notifications
- Check Order Status
- Search Products
- Manage Customers
- App Token Authentication

| Screenshot | Screenshot |
| --------------------- | -------------------- |
| <img src="/sc/1.PNG"> | <img src="/sc/2.PNG"> |
| <img src="/sc/3.PNG">| <img src="/sc/4.PNG"> |

### Config

- Config Admin CMS. admin\includes\config.php and set your database server configurations.

```
<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','healthykitchen');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
```

- Config App API. app\config.php and set your database server configurations.

```
/* DATABASE CONFIGURATION */
define('DB_SERVER', 'fdb16.yourhost.com');
define('DB_USERNAME', 'healthy');
define('DB_PASSWORD', 'abcdef');
define('DB_DATABASE', '0783_healthy');
define("BASE_URL", "http://yoursite.com/app/");
define("SITE_KEY", 'yourSecretKey');
```

- Database file included in Repo. (healthykitchendb.sql)

### App API Requests

#### Get Homepage Products :  
Link : yoursite.com/app/homepage 

```
Request Body : 
{ 
 "token":"app963" 
} 
Response 
{
    "HomeData": [
        {
            "id": "10",
            "name": "Strawberry",
            "category": "Fruits",
            "description": "The garden strawberry is a widely grown hybrid species of the genus Fragaria,",
            "price": "99",
            "quantity": "1",
            "quantitytype": "Kg",
            "image": "strwberry.png",
            "homepage": "YES"
        },
        {
            "id": "9",
            "name": "Pineapple",
            "category": "Fruits",
            "description": "The pineapple is a tropical plant with an edible multiple fruit consisting of coalesced berries",
            "price": "30",
            "quantity": "1",
            "quantitytype": "Unit",
            "image": "pineapple.png",
            "homepage": "YES"
        },
        {
            "id": "8",
            "name": "Grapes",
            "category": "Fruits",
            "description": "A grape is a fruit, botanically a berry, of the deciduous woody vines of the flowering plant genus Vitis.",
            "price": "60",
            "quantity": "1",
            "quantitytype": "Kg",
            "image": "grapes.png",
            "homepage": "YES"
        },
        {
            "id": "7",
            "name": "Orange",
            "category": "Fruits",
            "description": "The orange is the fruit of the citrus species Citrus × sinensis in the family Rutaceae.",
            "price": "45",
            "quantity": "1",
            "quantitytype": "Kg",
            "image": "orange.png",
            "homepage": "YES"
        },
        {
            "id": "6",
            "name": "Kivy",
            "category": "Fruits",
            "description": "Martha Stewart is of the view that the fruit can be consumed in its entirety.",
            "price": "220",
            "quantity": "1",
            "quantitytype": "Kg",
            "image": "kivy.png",
            "homepage": "YES"
        },
        {
            "id": "5",
            "name": "Bananas",
            "category": "Fruits",
            "description": "A wide variety of health benefits are associated with the curvy yellow fruit.",
            "price": "65",
            "quantity": "1",
            "quantitytype": "Dozon",
            "image": "bananas.png",
            "homepage": "YES"
        },
        {
            "id": "4",
            "name": "Apple",
            "category": "Fruits",
            "description": "Apples are loaded with vitamin C.",
            "price": "100",
            "quantity": "1",
            "quantitytype": "Kg",
            "image": "apple.png",
            "homepage": "YES"
        }
    ],
    "CateData": [
        {
            "id": "9",
            "categry": "Fruits",
            "cateimg": "fruits.png"
        },
        {
            "id": "10",
            "categry": "Juice",
            "cateimg": "juice.png"
        },
        {
            "id": "11",
            "categry": "Vegetables",
            "cateimg": "vegetables.png"
        },
        {
            "id": "12",
            "categry": "Oils",
            "cateimg": "oils.png"
        }
    ]
}} 
```
#### Get Items Click on Category :  

Link : yoursite.com/app/getlist  

```
Request Body : 
{ 
 "token":"app963", 
 "categoryname":"Fruits" 
}  

Response 
{ 
    "feedData": [ 
        { 
            "id": "2", 
            "name": "Kiwi", 
            "category": "Fruits", 
            "description": "no des", 
            "price": "630", 
            "image": "3.png", 
            "homepage": "YES" 
        }, 
        { 
            "id": "3", 
            "name": "Apple", 
            "category": "Fruits", 
            "description": "No Des", 
            "price": "110", 
            "image": "2.png", 
            "homepage": "YES" 
        } 
    ] 
} 

```

#### Place Order :  
Link : yoursite.com/app/placeorder 

```
Request Body : 
{
	"lname": "Randhawa",
	"mobile": "7696355852",
	"token": "app963",
	"address": "Near FCI Godown, Batth Road, Opp.Kotak Mahindra Bnak, Pandori Gola",
	"area": "Aman Nagar",
	"fname": "Ajaypal",
	"items" : 
	[
		{
			"itemid": "6",
			"itemname": "Kivy",
			"itemprice": "220",
			"itemquantity": "1",
			"itemquantitytype": "Kg",
			"itemtotal": "30"
		}
	]
}
 
Response 
{ 
    "success": { 
        "text": "Order Placed Sucessfully" 
    } 
} 
```

#### Search Product :  
Link : yoursite.com/app/searchproduct 

```
Request Body : 
{
	"token":"app963",
	"searchquery":"Apple"
}

Response 
{
    "SearchData": [
        {
            "id": "4",
            "name": "Apple",
            "category": "Fruits",
            "description": "lorem",
            "price": "100",
            "quantity": "1",
            "quantitytype": "Kg",
            "image": "apple.png",
            "homepage": "YES"
        },
        {
            "id": "9",
            "name": "Pineapple",
            "category": "Fruits",
            "description": "Lorem",
            "price": "30",
            "quantity": "1",
            "quantitytype": "Unit",
            "image": "pineapple.png",
            "homepage": "YES"
        }
    ]
}
```

#### Notification :  
Link : yoursite.com/app/searchproduct 

```
Request Body : 
{
	"token":"app963"
}

Response 
{
    "NotiData": [
        {
            "id": "2",
            "title": "10% off on Flat",
            "description": "10% off on Flat Price of Masala"
        }
    ]
}
```

#### Check Order Status :  
Link : yoursite.com/app/fetchorder 

```
Request Body : 
{
	"token":"app963",
	"mobileno":"7307258973"
}

Response 
{
    "OrderData": [
        {
            "orderid": "20",
            "fname": "Ramesh",
            "lname": "Kumar",
            "mobile": "7307258973",
            "area": "Mushrooms",
            "address": "Pandori",
            "status": "Received",
            "ordertime": "2018-11-18 21:58:45"
        }
    ]
}
```

### Happy Coding...
### Happy Open Source..
