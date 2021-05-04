<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/83460330?v=4" width="150" alt="Logo da cosmic">
    </a>
</p>

<p align="center">
    <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

## About Cosmic API

"Cosmic API" is a REST API, built on Laravel 8 and developed by **Cosmic Core Team**, a group of API experts from ***Cosmic Space™***.

Built to meet the requirements of any type of platform. Able to perform the 4 operations of the **REST** protocol: GET, POST, PUT and DELETE.

Field | Description
------|------------
**id** | Access key for the registered product.
name | The name of product.
description | A brief description of the registered product.
price | The price of product.
color | The product color.
image | Product display image.
quantity | The quantity of products remaining.
line | The product line.
pass | Administrator password to delete database records.


## 1. Get Product (GET)

- #### Specific product
```url
    https://api-cosmic.herokuapp.com/api/products?id={id}
```

```JSON
// https://api-cosmic.herokuapp.com/api/products?id=123
{ 
    "id": 123,
    "name": "Mouse Gamer",
    "description": "Degign e conforto para suas jogatinas.",
    "price": 39.9,
    "color": "Preto",
    "quantity": 50,
    "line": "Messier",
    "image": "/img/upload/1122/image.jpg",
    "created_at": "2021-03-25T15:13:05.000000Z",
    "updated_at": "2021-03-25T18:09:41.000000Z"
}
```

- #### All products
```url
    https://api-cosmic.herokuapp.com/api/products
```

```JSON
[
    {
        "id": 123,
        "name": "Mouse gamer",
        "description": "Design e conforto para suas jogatinas",
        "price": 39.9,
        "color": "Preto",
        "quantity": 25,
        "line": "Nebulosa",
        "image": "/img/upload/1122/image.jpg",
        "created_at": "2021-03-25T15:13:05.000000Z",
        "updated_at": "2021-03-25T18:09:41.000000Z"
    },
    {
        "id": 123456,
        "name": "Teclado gamer",
        "description": "Design e conforto para suas jogatinas",
        "price": 45.9,
        "color": "Branco",
        "quantity": 20,
        "line": "Delta",
        "image": "/img/upload/1123/image.jpg",
        "created_at": "2021-03-25T15:13:05.000000Z",
        "updated_at": "2021-03-25T18:09:41.000000Z"
    }
]

```

## 2. New Product (POST)


```URL
    https://api-cosmic.herokuapp.com/api/products
```

**To include an image in the product and send it to the database, it is necessary to send it as Post multipart / form-data.**

- #### Example with [Ion](https://github.com/koush/ion) (Android)
```JAVASCRIPT
    Ion.with(getContext())
        .load("https://api-cosmic.herokuapp.com/api/products")
        .setMultipartParameter("id", "123")
        .setMultipartParameter("name", "Mouse Gamer")
        .setMultipartParameter("description", "Design e conforto para suas jogatinas.")
        .setMultipartParameter("price", 39.9)
        .setMultipartParameter("color", "Preto")
        .setMultipartParameter("quantity", 25)
        .setMultipartParameter("line", "Andromeda")
        .setMultipartFile("image", "image/jpeg", new File("/sdcard/filename.jpeg"))
        .asJsonObject()
        .setCallback(...)
```

- #### Example with [AsyncHttpClient](https://loopj.com/android-async-http/) (Android)

```JAVASCRIPT
    RequestParams params = new RequestParams();
        params.put("id", "123");
        params.put("name", "Mouse gamer");
        params.put("description", "Design e conforto para suas jogatinas.");
        params.put("price", 39.9);
        params.put("color", "Preto");
        params.put("quantity", 25);
        params.put("line", "Andromeda");
        params.put("image", new FileInputStream(new File("/sdcard/filename.jpeg")), "filename.jpg");
        
        new AsyncHttpClient()
            .post("https://api-cosmic.herokuapp.com/api/products", 
                params, 
                new JsonHttpResponseHandler(){
                @Override
                public void onSuccess(int statusCode, Header[] headers, JSONObject response) {
                    try {
                        Toast.makeText(mContext, response.getString("result"), Toast.LENGTH_LONG).show();
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }
        });
```


```JSON
{ // SUCCESS
    "result" : "REGISTRO INSERIDO",
    "code" : 200
}
```

## 3. Update Product (POST)

```URL
    https://api-cosmic.herokuapp.com/api/products
```
**The API is able to check the data provided and update the database, only what is necessary.**
<br>

- #### Example with [Ion](https://github.com/koush/ion) (Android)
```JAVASCRIPT
    Ion.with(getContext())
        .load("https://api-cosmic.herokuapp.com/api/products")
        .setMultipartParameter("id", "123")
        .setMultipartParameter("name", "Mouse gamer")
        .setMultipartParameter("description", "Design e conforto para suas jogatinas.")
        .setMultipartParameter("price", 4.25)
        .setMultipartParameter("color", "Preto")
        .setMultipartParameter("quantity", 10)
        .setMultipartParameter("line", "Andromeda")
        .setMultipartParameter("update", "true")
        .setMultipartFile("image", "image/jpeg", new File("/sdcard/filename.jpeg"))
        .asJsonObject()
        .setCallback(...)
```

- #### Example with [AsyncHttpClient](https://loopj.com/android-async-http/) (Android)

```PHP
    RequestParams params = new RequestParams();
        params.put("id", "123");
        params.put("name", "Mouse gamer");
        params.put("description", "Design e conforto para suas jogatinas.");
        params.put("price", 4.25);
        params.put("color", "Preto");
        params.put("quantity", 10);
        params.put("line", "Andromeda");
        params.put("update", "true");
        params.put("image", new FileInputStream(new File("/sdcard/filename.jpeg")), "filename.jpg");
        
        new AsyncHttpClient()
            .post("https://api-cosmic.herokuapp.com/api/products", 
                params, 
                new JsonHttpResponseHandler(){
                @Override
                public void onSuccess(int statusCode, Header[] headers, JSONObject response) {
                    try {
                        Toast.makeText(mContext, response.getString("result"), Toast.LENGTH_LONG).show();
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }
        });
```
```JSON
{ // SUCCESS
    "result" : "REGISTRO ATUALIZADO",
    "code" : 200
}
```

## 4. Delete Product (GET)

- #### Especific Product

```url
    https://api-cosmic.herokuapp.com/api/products?id={id}&pass={pass}
```

```JSON
// https://api-cosmic.herokuapp.com/api/products?id=123&pass=#####
{ 
    "result" : "REGISTRO DELETADO",
    "code" : 200
}
```
```JSON
// https://api-cosmic.herokuapp.com/api/products?id=123&pass=123
{ 
    "result" : "ACESSO NAO PERMITIDO",
    "code": 400
}
```

## 5. Support

Any questions or suggestions, send an email to: ***fenascimentodev@gmail.com***
