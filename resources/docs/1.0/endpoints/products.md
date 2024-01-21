# Products

---

- [Ürün Ekleme](#section-1)
- [Ürün Listeleme](#section-2)
- [Ürün Detayları](#section-3)
- [Ürün Güncelleme](#section-4)
- [Ürün Silme](#section-5)

<a name="section-1"></a>

## Ürün Ekleme

```http
POST /api/products
```

Yeni bir ürün ekler. Ve Yapılan işlemle Alakalı kullanıcıya bir mail gönderir.
Yapılan işlemi loglar.

| Parametre  | Tip                        | Açıklama                 |
|:-----------|:---------------------------|:-------------------------|
| `name`     | `string`                   | **Gerekli**. Ürün adı    |
| `price`    | `number`                   | **Gerekli**. Ürün fiyatı |
| `type`     | `enum['goods','services']` | **Gerekli**. Ürün türü   |
| ``status`` | `enum[1,0]`                | **Gerekli**. Ürün durumu |

#### Örnek İstek

```http
POST /api/products
Content-Type: application/json
Authorization: Bearer your-access-token

{
    "name":"Product Name",
    "price":99.90,
    "status":1,
    "type":"goods"
}
```
#### Örnek Cevap
```json
{
    "message": "Products retrieved successfully!",
    "status": "success",
    "data": {
        "name": "Product Name",
        "price": 99.9,
        "status": 1,
        "type": "goods",
        "user": "Test User | test@example.com",
        "detail": {
            "href": "http://localhost:8000/api/products/22",
            "method": "GET"
        }
    }
}
```

<a name="section-2"></a>

## Ürün Listeleme

```http
GET /api/products
```

Tüm ürünleri listeler.

| Parametre     | Tip      | Açıklama                                                       |
|:--------------|:---------|:---------------------------------------------------------------|
| `per_page`    | `number` | **Opsiyonel**. Sayfa başına ürün sayısı, **Varsayılan**:10     |
| `page`        | `number` | **Opsiyonel**. Sayfa numarası                                  |
| `name`        | `string` | **Opsiyonel**. Ürün adına göre filtreleme                      |
| `user_name`   | `string` | **Opsiyonel**. Ürün sahibinin adına göre filtreleme            |
| `user_email`  | `string` | **Opsiyonel**. Ürün sahibinin emailine göre filtreleme         |
| `status`      | `enum[1,0]` | **Opsiyonel**. Ürün durumuna göre filtreleme, **Varsayılan**:1 |
#### Örnek İstek

```http
GET /api/products
Content-Type: application/json
Authorization: Bearer yout-access-token
{
"per_page": 15,
"page": 1,
"name": "test",
"user_name": "test",
"user_email": "test",
"status": 1
}
```
#### Örnek Cevap
```json
{
    "message": "Products retrieved successfully!",
    "status": "success",
    "data": [
        {
            "name": "Test Product",
            "price": "10.99",
            "status": 1,
            "type": "goods",
            "user": "Test User | test@example.com",
            "details": {
                "href": "http://localhost:8000/api/products/1",
                "method": "GET"
            }
        },
        {
            "name": "Ms. Mathilde Nicolas V",
            "price": "82.93",
            "status": 1,
            "type": "goods",
            "user": "Tanya Grady | ferry.alessia@example.com",
            "details": {
                "href": "http://localhost:8000/api/products/2",
                "method": "GET"
            }
        },
        {
            "name": "Wayne Konopelski",
            "price": "134.27",
            "status": 1,
            "type": "goods",
            "user": "Abraham O'Keefe | rasheed68@example.net",
            "details": {
                "href": "http://localhost:8000/api/products/3",
                "method": "GET"
            }
        },
        {
            "name": "Roberta Cruickshank",
            "price": "125.65",
            "status": 1,
            "type": "goods",
            "user": "Reyes Reichel | oprosacco@example.com",
            "details": {
                "href": "http://localhost:8000/api/products/4",
                "method": "GET"
            }
        },
        {
            "name": "Benjamin Bashirian",
            "price": "95.81",
            "status": 1,
            "type": "services",
            "user": "Miss Luna Hermiston MD | leslie65@example.net",
            "details": {
                "href": "http://localhost:8000/api/products/5",
                "method": "GET"
            }
        },
        {
            "name": "Kayden McKenzie",
            "price": "34.10",
            "status": 1,
            "type": "goods",
            "user": "Jaren Bernhard | ignatius14@example.net",
            "details": {
                "href": "http://localhost:8000/api/products/6",
                "method": "GET"
            }
        },
        {
            "name": "Prof. Claudine Dooley V",
            "price": "80.98",
            "status": 1,
            "type": "goods",
            "user": "Dr. Watson Senger | erdman.bridie@example.com",
            "details": {
                "href": "http://localhost:8000/api/products/7",
                "method": "GET"
            }
        },
        {
            "name": "Shaina Thiel",
            "price": "133.03",
            "status": 1,
            "type": "goods",
            "user": "Jordane Hamill | cgaylord@example.net",
            "details": {
                "href": "http://localhost:8000/api/products/9",
                "method": "GET"
            }
        },
        {
            "name": "Junius Bayer Sr.",
            "price": "19.43",
            "status": 1,
            "type": "services",
            "user": "Reyes Reichel | oprosacco@example.com",
            "details": {
                "href": "http://localhost:8000/api/products/13",
                "method": "GET"
            }
        },
        {
            "name": "Deangelo Erdman MD",
            "price": "97.44",
            "status": 1,
            "type": "goods",
            "user": "Miss Billie Kilback | hipolito49@example.net",
            "details": {
                "href": "http://localhost:8000/api/products/15",
                "method": "GET"
            }
        }
    ],
    "meta": {
        "pagination": {
            "total": 15,
            "count": 10,
            "per_page": 10,
            "current_page": 1,
            "total_pages": 2,
            "links": {
                "next": "http://localhost:8000/api/products?page=2",
                "previous": null
            }
        }
    }
}
```

<a name="section-3"></a>
## Ürün Detayları

```http
GET /api/products/{id}
```

Ürün detaylarını gösterir.

#### Örnek İstek

```http
GET /api/products/1
Content-Type: application/json
Authorization: Bearer your-access-token
```
#### Örnek Cevap
```json
{
    "message": "Product retrieved successfully!",
    "status": "success",
    "data": {
        "product_id": 1,
        "name": "Test Product",
        "price": "10.99",
        "status": 1,
        "type": "goods",
        "user": {
            "name": "Test User",
            "email": "test@example.com",
            "id": 1
        },
        "created_at": "2024-01-21T00:13:56.000000Z",
        "updated_at": "2024-01-21T00:13:56.000000Z",
        "logs": [
            {
                "id": 1,
                "data": {
                    "id": 1,
                    "name": "Test Product",
                    "type": "goods",
                    "price": "10.99",
                    "status": 1,
                    "user_id": 1,
                    "created_at": "2024-01-21T00:13:56.000000Z",
                    "deleted_at": null,
                    "updated_at": "2024-01-21T00:13:56.000000Z"
                },
                "user": "Test User | test@example.com",
                "action": "created",
                "created_at": "2024-01-21T00:14:05.000000Z",
                "updated_at": "2024-01-21T00:14:05.000000Z"
            }
        ]
    },
    "links": {
        "self": "http://localhost:8000/api/products/1"
    }
}
```

<a name="section-4"></a>
## Ürün Güncelleme

```http
PUT /api/products/{id}
```
veya
```http
PATCH /api/products/{id}
```

Ürün bilgilerini günceller. Yapılan işlemi loglar.

| Parametre  | Tip                        | Açıklama                 |
|:-----------|:---------------------------|:-------------------------|
| `name`     | `string`                   | **Opsiyonel**. Ürün adı    |
| `price`    | `number`                   | **Opsiyonel**. Ürün fiyatı |
| `type`     | `enum['goods','services']` | **Opsiyonel**. Ürün türü   |
| ``status`` | `enum[1,0]`                | **Opsiyonel**. Ürün durumu |

#### Örnek İstek

```http
PUT /api/products/1
Content-Type: application/json
Authorization: Bearer your-access-token

{
"name":"Product Name Changed",
"price":45.67,
"status":0,
"type":"services"
}
```
#### Örnek Cevap
```json
{
    "message": "Product retrieved successfully!",
    "status": "success",
    "data": {
        "product_id": 12,
        "name": "Product Name Changed",
        "price": 45.67,
        "status": 0,
        "type": "services",
        "user": {
            "name": "Jaren Bernhard",
            "email": "ignatius14@example.net",
            "id": 2
        },
        "created_at": "2024-01-21T00:14:01.000000Z",
        "updated_at": "2024-01-21T00:40:00.000000Z",
        "logs": [
            {
                "id": 29,
                "data": {
                    "id": 12,
                    "name": "Dr. Jamey Batz",
                    "type": "services",
                    "price": 45.67,
                    "status": 0,
                    "user_id": 2,
                    "created_at": "2024-01-21T00:14:01.000000Z",
                    "deleted_at": null,
                    "updated_at": "2024-01-21T00:40:00.000000Z"
                },
                "user": "Test User | test@example.com",
                "action": "updated",
                "created_at": "2024-01-21T00:40:00.000000Z",
                "updated_at": "2024-01-21T00:40:00.000000Z"
            },
            {
                "id": 30,
                "data": {
                    "id": 12,
                    "name": "Dr. Jamey Batz",
                    "type": "services",
                    "price": 45.67,
                    "status": 0,
                    "user_id": 2,
                    "created_at": "2024-01-21T00:14:01.000000Z",
                    "deleted_at": null,
                    "updated_at": "2024-01-21T00:40:00.000000Z"
                },
                "user": "Test User | test@example.com",
                "action": "updated",
                "created_at": "2024-01-21T00:40:06.000000Z",
                "updated_at": "2024-01-21T00:40:06.000000Z"
            },
            {
                "id": 32,
                "data": {
                    "id": 12,
                    "name": "Product Name Changed",
                    "type": "services",
                    "price": 45.67,
                    "status": 0,
                    "user_id": 2,
                    "created_at": "2024-01-21T00:14:01.000000Z",
                    "deleted_at": null,
                    "updated_at": "2024-01-21T00:40:00.000000Z"
                },
                "user": "Test User | test@example.com",
                "action": "updated",
                "created_at": "2024-01-21T00:54:34.000000Z",
                "updated_at": "2024-01-21T00:54:34.000000Z"
            }
        ]
    },
    "links": {
        "self": "http://localhost:8000/api/products/12"
    }
}
```

<a name="section-5"></a>
## Ürün Silme

```http
DELETE /api/products/{id}
```

Ürünü siler.

#### Örnek İstek

```http
DELETE /api/products/1
Content-Type: application/json
Authorization: Bearer your-access-token
```
#### Örnek Cevap
```json
{
    "message": "Product deleted!",
    "status": "success"
}
```



    
