
Laravel7 Passport OAuth GrantType Authorize_code

Server > localhost:8886 | Client > localhost:9988 (จัดการในไฟล์ vhost ของapache)

สร้างฐานข้อมูลชื่อ pp

step #1 cd ไปที่path passport-oauth-server
 
 npm install
 
 composer update
 
 php artisan migrate
 
 php artisan passport:install
 
 php artisan passport:client
 	
	user_id: 1
	name: test
	email: test@mail.com
	password: 12345678



step #2 cd ไปที่path passport-oauth-client

 composer update
 
 copyจากตาราง oauth_clients คอลัมน์ secret ไปใส่ใน ไฟล์ callback.php  'client_secret'=>'secret'


step #3  เปิด Chrome รัน localhost:8886 ถ้าขึ้นหน้า Login แสดงว่าถูกต้อง  ใส่ Email Pass ตาม Step 1
