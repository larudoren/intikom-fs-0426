## 3. Soal Database (MySQL)

Tulis query SQL untuk menghitung total nilai pesanan (total_price) dari tabel orders yang memiliki kolom order_id, customer_id, dan total_price, dimana Anda ingin mengetahui total nilai pesanan yang dilakukan oleh setiap pelanggan (customer_id), pada tahun 2025.

## Jawaban:

Diasumsikan bahwa tabel orders memiliki kolom order_date atau sejenis nya untuk dilakukan filter tahun. dan berikut adalah hasil query SQL sebagai jawabannya.

`SELECT customer_id, SUM(total_price) as total_order_value FROM orders WHERE EXTRACT(YEAR FROM order_date) = 2025 GROUP BY customer_id ORDER BY customer_id;`
