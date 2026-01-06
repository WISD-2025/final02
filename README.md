# 期末系統說明

## 📌 系統簡介
**系統名稱**：歡樂頌  
**主要作用**：歡樂頌是一家可頌訂購平台。顧客藉由預先訂購，降低排隊等待的時間。
- 訪客（未登入）：透過官網查看菜單介紹。
- 會員（已登入）：進行可頌訂購以及查看購買紀錄。

---

## 🖥️ 系統主要畫面

### 1️⃣ 首頁：可瀏覽並訂購商品，以及會員登入或註冊。
<img width="1298" height="857" alt="螢幕擷取畫面 2026-01-07 044156" src="https://github.com/user-attachments/assets/9f7000e9-8e24-40f0-9ed4-374fc22333cc" />
<img width="1280" height="843" alt="螢幕擷取畫面 2026-01-07 044635" src="https://github.com/user-attachments/assets/66051cea-942a-4696-8112-1fa882f51939" />
<img width="1309" height="748" alt="螢幕擷取畫面 2026-01-07 044653" src="https://github.com/user-attachments/assets/4e823c11-483f-4652-98b4-68b966c1d86a" />

### 2️⃣ 商品頁面：需登入後才可以訂購可頌，可選擇購買數量，加入購物車。
<img width="1218" height="844" alt="螢幕擷取畫面 2026-01-07 044814" src="https://github.com/user-attachments/assets/4210a7b9-6d2f-4b35-84ef-8566c0350dfc" />
<img width="1267" height="857" alt="螢幕擷取畫面 2026-01-07 044849" src="https://github.com/user-attachments/assets/cf1d3e92-d10f-4a1c-abb3-34959d2771ba" />

### 3️⃣ 購物車：可查看或移除先前選擇的商品，填寫送貨及付款方式，確認後即送出訂單。
<img width="1253" height="856" alt="螢幕擷取畫面 2026-01-07 045158" src="https://github.com/user-attachments/assets/02bd9dcd-7994-4ffd-a925-ce0e970aaa82" />
<img width="533" height="181" alt="螢幕擷取畫面 2026-01-07 045508" src="https://github.com/user-attachments/assets/dcffca9f-e86a-4d1a-92b0-88b78241206f" />
<img width="258" height="158" alt="螢幕擷取畫面 2026-01-07 045530" src="https://github.com/user-attachments/assets/7260bc99-6b71-4b12-8a13-218e9effb975" />

### 4️⃣ 購買紀錄：顯示會員先前所有購買紀錄。
<img width="1262" height="444" alt="螢幕擷取畫面 2026-01-07 045600" src="https://github.com/user-attachments/assets/6a5f9d4e-8efe-4375-b7a6-5f8610df1f2a" />

### 5️⃣ 更改個資：會員可更改個人資料。
<img width="1187" height="854" alt="螢幕擷取畫面 2026-01-07 045855" src="https://github.com/user-attachments/assets/6a892d15-f3a2-4443-8733-4623a448c862" />
<img width="1221" height="845" alt="螢幕擷取畫面 2026-01-07 050000" src="https://github.com/user-attachments/assets/2c25d301-bdfb-4e4b-b260-f63ce26acf29" />

---

## ⚙️ 系統功能與負責同學

| 功能 | 負責同學 | 完整 Route |
|---|---|---|
| 首頁 | 3B232060 鄧捷予 | `Route::get('/', function () { return view('welcome'); })->name('home');` |
| 購買紀錄 | 3B232060 鄧捷予 | `Route::resource('orders', OrderController::class);` |
| 我要訂購 | 3B232060 鄧捷予 | `Route::resource('orders', OrderController::class);` |
| 購物車 | 3B232073 魏埼存 | `Route::delete('/cart_items/{cartItem}', [CartItemController::class, 'destroy'])`<br>`->middleware('auth')`<br>`->name('cart_items.destroy');` |
| 更改個資 | 3B232073 魏埼存 | `Route::get('/change', [ChangeController::class, 'index'])`<br>`->middleware('auth')`<br>`->name('change.index');` |

---

## 🧩 ERD
![5C5604FA-E5D6-43D6-A644-AED2D61F6AA7](https://github.com/user-attachments/assets/d7cc01ff-d0d8-41eb-bfa8-fa22b6339b5f)

---

## 🧩 關聯式綱要圖
<img width="865" height="588" alt="image" src="https://github.com/user-attachments/assets/e4d02a11-e1a1-4bce-90a9-fed0ec8a75fd" />

---

## 🗄️ 資料表欄位設計
### 1️⃣ 使用者（users）
<img width="923" height="344" alt="image" src="https://github.com/user-attachments/assets/5647d7a3-fe6a-40a9-b4fb-8e4efd1f24f9" />

---

### 2️⃣ 產品（products）
<img width="920" height="381" alt="image" src="https://github.com/user-attachments/assets/e7888c66-8e29-4e89-841a-92bf68ac1318" />

---

### 3️⃣ 購物車(支付方式)（orders）
<img width="927" height="271" alt="image" src="https://github.com/user-attachments/assets/18a5a371-a0b2-45e2-9f85-a5b223fd2895" />

---

### 4️⃣ 購物車(訂購明細)（order_items）
<img width="930" height="314" alt="image" src="https://github.com/user-attachments/assets/63ddfe12-ee70-43a6-80b1-7ba939c93b34" />

---

## 📦 額外使用套件 / 樣板
- **[Shop Homepage](https://startbootstrap.com/template/shop-homepage#google_vignette)**
- 用途：商品列表頁，作為電商網站商品總覽首頁樣板

---

## 📂 系統測試資料存放位置
final02 / public / SQL

---

## 🔐 測試帳號
- 帳號：`test@test.com`
- 密碼：`123456789`

---

## 👨‍💻 系統開發人員及工作分配
### 3B232060 鄧捷予
- 首頁
- 我要訂購
- 購買紀錄
- README 撰寫
- 資料表欄位設計

### 3B232073 魏埼存
- 購物車
- 更改個資
- ERD
- 關聯式綱要圖
