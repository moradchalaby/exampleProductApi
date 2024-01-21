# Authentication

---
- [Register](#section-2)
- [Login](#section-1)


<a name="section-1"></a>
## Login

```http
POST /api/login
```
Eğer kullanıcı adı ve şifre doğru ise, kullanıcıya bir token verilir.

| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `email`      | `string` | **Gerekli**. Kullanıcı adı |
| `password`      | `string` | **Gerekli**. Kullanıcı şifresi |

#### Örnek İstek

```http
POST /api/login
Content-Type: application/json

{
  "email": "test@example.com",
    "password": "password"
}
```
#### Örnek Cevap
```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9"
}
```

## Register

```http
POST /api/login
```
Eğer ``name`` parametresi dolu ise Yeni bir kullanıcı oluşturur.

| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `name`      | `string` | **Gerekli**. Kullanıcı adı |
| `email`      | `string` | **Gerekli**. Kullanıcı emaili |
| `password`      | `string` | **Gerekli**. Kullanıcı şifresi |

#### Örnek İstek

```http
POST /api/login
Content-Type: application/json

{
  "name": "Another Test User",
  "email": "another_test@example.com"
    "password": "password"
}
```

#### Örnek Cevap

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9",
}
```
