## 4. Soal Git

Anda sedang bekerja di cabang feature-xyz. Tim lain telah menyelesaikan update besar di cabang master. Sebelum Anda menggabungkan cabang feature-xyz dengan master, tim meminta Anda untuk melakukan rebase terhadap cabang Anda agar bisa digabungkan tanpa konflik. Jelaskan langkah-langkah yang harus Anda lakukan.

## Jawaban:

Berikut adalah langkah-langkah untuk melakukan rebase terhadap branch feature-xyz:

- 1. Pastikan bahwa branch master yang ada pada lokal terupdate dengan perubahan terbaru dari branch master yang ada pada remote repository, dengan melakukan perintah `git checkout master` untuk berpindah pada branch master lokal, kemudian melakukan update dengan perintah `git pull origin master`. 
- 2. Pindah ke branch feature-xyz, dengan melakukan perintah `git checkout feature-xyz`
- 3. Mulai melakukan rebase branch feature-xyz terhadap master dengan perintah `git rebase master`.  
- 4. Menyelesaikan konflik jika ada: Git akan berhenti sementara proses rebase jika ada konflik, Akan ditampilkan file mana saja yang terjadi konflik. Membuka file file yang terjadi konflik kemudian melakukan pencarian notasi <<<<<<<, =======, >>>>>>> pada file tersebut, melakukan perubahan yang benar kemudian melakukan saving atau menyimpan file yang sudah di edit dengan perubahan yang benar. Pastikan setelah itu (menyimpan file) untuk menjalankan perintah `git add <nama-file-konflik>`, ini dilakukan untuk setiap file yang di dilakukan perubahan. Kemudian setelah semua file ditambahan atau bisa dilakukan dengan perintah `git add .` untuk menambahkan semua file sekaligus, proses rebase dilanjutkan dengan menjalankan perintah `git rebase --continue`.
- 5. Setelah rebase dilakukan dan selesai, langkah selanjutnya adalah push ke remote repository dengan perintah `git push origin feature-xyz --force-with-lease`. Dikarenakan rebase mengubah history, maka force push digunakan. Menggunakan `--force-with-lease` lebih aman dibandingkan dengan `--force` saja, karena hal itu dapat mengecek bahwa tidak ada orang lain yang sedang melakukan push pada saat bersamaan.
- 6. Pada titik ini, branch feature-xyz sudah terupdate dengan update-an terbaru dari branch master dan sudah dapat dilakukan merge dengan clean dan tanpa konflik. berikutnya dapat dilakukan Merge Request

