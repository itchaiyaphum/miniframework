# แข่งขันทักษาการพัฒนาเว็บไซด์สั่งอาหารออนไลน์ พัฒนาโดย แผนกเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคชัยภูมิ

เครื่องมือในการพัฒนา

- Visual Studio Code
- MAMP (สำหรับ Mac) | Wamp ( สำหรับ Windows)

System Requirements

- Apache 2.4+
- PHP 5.6/7.2
- MySQL 5.5+

วิธีตั้งค่า VirtualHost สำหรับเข้าใช้งานโดเมน

- WORKSPACE PATH คือ path ที่เราเอาไฟล์เว็บไซด์วางไว้เช่น /Users/wannapong/workspace/miniframework

```
<VirtualHost *:80>
    ServerAdmin itchaiyaphum@gmail.com
    DocumentRoot "WORKSPACE PATH"
    ServerName dev.miniframework.itchaiyaphum.com
    ErrorLog "logs/dev.miniframework.itchaiyaphum.com.com-error_log"
    CustomLog "logs/dev.miniframework.itchaiyaphum.com-access_log" common
    <Directory "WORKSPACE PATH">
        Options FollowSymLinks
        AllowOverride None
    </Directory>
    <Directory "WORKSPACE PATH">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        allow from all
    </Directory>
</VirtualHost>
```

Clone repo จาก github โดยเอาไฟล์ไปไว้ที่ WORKSPACE PATH

- https://github.com/itchaiyaphum/miniframework

1.วิธีการตั้งค่าให้้รันได้บนเครื่อง localhost
1.1.ตั้งค่าไฟล์ hosts

- สำหรับ Windows (C:\Windows\System32\drivers\etc\hosts)
- สำหรับ Mac (/etc/hosts)
- ให้เพิ่มบันทัดนี้ "127.0.0.1 dev.miniframework.itchaiyaphum.com"

  1.2.สร้างฐานข้อมูลใน localhost

- สร้างฐานข้อมูลผ่าน phpmyadmin โดยดูชื่อ database, username, password ได้จากไฟล์ application/config/database.php

  1.3.สร้างฐานข้อมูล

- import ฐานข้อมูลโดยใช้ไฟล์ sql/database.sql ผ่าน phpmyadmin

  1.4.รันทดสอบระบบ

- เปิด Web Browser และรัน url (http://dev.miniframework.itchaiyaphum.com)
- login โดยใช้ demo user / password ดังนี้
- admin@demo.com / mini123456
- staff@demo.com / mini123456
- rider@demo.com / mini123456
- customer@demo.com / mini123456

2.วิธีการ deploy to production

- เข้าไปที่ url: http://deploy.itchaiyaphum.com
- username, password สอบถามได้ที่อาจารย์อลงกรณ์
- กด build ที่ Job: "miniframework.itchaiyaphum.com - deploy"
- เข้า Browser ไปที่ url (http://miniframework.itchaiyaphum.com)