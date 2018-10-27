# php-iris
Implementasi kNN pada dataset Iris dengan menggunakan PHP

Mini Docs
---
### Class
```php
Klasifikasi
```
### Function

#### _construct($dataset)

- **Tipe : Constructor**

| Parameter   | Tipe Data  | Keterangan |
| :-------------: |:-------------:| :-------------:|
| `dataset` | `array`| Dataset Iris berupa array |

#### slice($percentage)

- **Tipe : Public Function**

| Parameter   | Tipe Data  | Keterangan |
| :-------------: |:-------------:| :-------------:|
| `percentage` | `numeric`| Persentase data yang diambil dari dataset untuk dijadikan data latih |


#### knearest($datatest, $k ,$class_index)

- **Tipe : Public Function**

| Parameter   | Tipe Data  | Keterangan |
| :-------------: |:-------------:| :-------------:|
| `datatest` | `array` | Data yang akan diprediksi kelasnya |
| `k` | `numeric`| Jumlah data terdekat yang akan diambil |
| `class_index` | numeric`| Indeks atau lokasi kelas pada array |


#### normalize($data, $class_index = FALSE)

- **Tipe : Public Function**

| Parameter   | Tipe Data  | Keterangan |
| :-------------: |:-------------:| :-------------:|
| `data` | `array` | Data yang akan dinormalisasi |
| `class_index` | `numeric`| `(opsional)` Indeks atau lokasi kelas pada array |


#### mode_of_class($dataset)


- **Tipe : Public Function**

| Parameter   | Tipe Data  | Keterangan |
| :-------------: |:-------------:| :-------------:|
| `dataset` | `array` | Mencari kelas modus yang terdapat pada dataset |


#### shuffle_data($dataset)


- **Tipe : Public Function**

| Parameter   | Tipe Data  | Keterangan |
| :-------------: |:-------------:| :-------------:|
| `dataset` | `array` | Dataset yang akan diacak |
