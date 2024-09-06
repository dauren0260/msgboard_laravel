### 啟動專案

**Step 0.** 電腦安裝Node (有安裝可略過) <br>
[Node][1] <br>
到官網下載，選擇v20.17.0(LTS)的版本，依執行檔安裝完，開啟終端機命令行輸入 ` node -v ` 確認是否安裝成功，npm也會一同安裝好<br>
[1]: https://nodejs.org/zh-tw/download/prebuilt-installer

若出現`'node'不是內部或外部...之類的訊息`，編輯電腦的環境變數，確認nodejs有無在path裡面<br>

**Step 1.** 切換至 feature/upload 分支  <br>

**Step 2.** ` composer install ` <br>

**Step 3.** `npm install` <br>
 
**Step 4.** `cp .env.example .env` <br>
修改 database
```
...
DB_DATABASE=YourDatabase
DB_USERNAME=YourUserName
DB_PASSWORD=YourPassword
...
```

**Step 5.** `php artisan key:generate`  <br>

**Step 6.**. 執行命令 ` php artisan migrate:fresh --seed ` <br>
可在資料庫快速產生所需資料表+假資料

**Step 7.** `php artisan serve`  <br>
 
確認樣式有無正常，沒有的話另開一個終端機跑 `npm run dev`  <br>