# Genel Bakış

---


# ExampleProductApi

## Genel BAkış

ExampleProductApi, kullanıcıların ürün bilgilerini yönetmelerine olanak tanıyan bir RESTful API'dir.

## Özellikler

- **Ürün Listeleme:** Kullanıcılar, tüm ürünleri listeleyebilirler.
- **Ürün Detayları:** Her ürünün detaylı bilgilerini görüntüleyebilirler.
- **Ürün Ekleme:** Yeni ürünler ekleyebilirler.
- **Ürün Güncelleme:** Var olan ürünleri güncelleyebilirler.
- **Ürün Silme:** Ürünleri silebilirler.

## Kimlik Doğrulama

API, Login yapıldıktan sonra verilen token ile kimlik doğrulanır. Her isteğin, `Authorization` başlığı ile doğrulanması gerekmektedir.

Örnek:


```http
GET /api/products
Authorization: Bearer your-access-token //Varsayılan Token Test User için: your-access-token
```
