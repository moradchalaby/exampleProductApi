# Kurulum

---


# ExampleProductApi

## Kurulum

- [Gerekli Bağımlılıklar](#section-1.1)
- [Depoyu Klonla](#section-1.2)
- [Composer ile Bağımlılıkları Yükle](#section-1.3)
- [Ortam Dosyasını Ayarla](#section-1.4)
- [Veritabanını Oluştur](#section-1.5)
- [Veritabanı Örnek Verileri Oluştur](#section-1.6)
- [Sunucuyu Çalıştır](#section-1.7)
- [Dökümantasyon sayfası](#section-1.8)

API'yi kullanabilmek için aşağıdaki adımları izleyin:

<a name="section-1.1"></a>
1. **Gerekli Bağımlılıklar:**
    - PHP 7.3 veya daha üstü.
    - [Composer](https://getcomposer.org/) yüklü olmalı.

<a name="section-1.2"></a>
2. **Depoyu Klonla:**
   ```bash
   git clone https://github.com/kullaniciadi/my-api.git

<a name="section-1.3"></a>
3. **Composer ile Bağımlılıkları Yükle:**
   ```bash
   composer install

<a name="section-1.4"></a>
4. **Ortam Dosyasını Ayarla:**


-  ``.env.example`` dosyasını ``.env`` olarak kopyalayın ve gerekli bilgileri doldurun.

<a name="section-1.5"></a>
5. **Veritabanını Oluştur:**
   ```bash
   php artisan migrate

<a name="section-1.6"></a>
6. **Veritabanı Örnek Verileri Oluştur:**
   ```bash
    php artisan db:seed

<a name="section-1.7"></a>
7. **Sunucuyu Çalıştır:**
    ```bash
    php artisan serve

<a name="section-1.8"></a>
8. **Dökümantasyon sayfası:**
    ```bash
    http://localhost:8000
