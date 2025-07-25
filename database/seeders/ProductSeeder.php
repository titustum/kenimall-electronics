<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [ 
           // Smartphones (10)
            ['name'=>'Samsung Galaxy S9','model'=>'SM-G960F','price'=>749.00,'sale_price'=>699.00,'stock'=>25,'is_featured'=>true,'category'=>'Smartphones','brand'=>'Samsung','condition'=>'New','specifications'=>['screen'=>'5.8" QHD+','battery'=>'3000 mAh','camera'=>'12 MP','storage'=>'64 GB','ram'=>'4 GB'],'features'=>['4G LTE','Wireless Charging','Water Resistant'],'color'=>'Midnight Black'],
            ['name'=>'Apple iPhone 12','model'=>'A2172','price'=>1149.00,'sale_price'=>1049.00,'stock'=>30,'is_featured'=>true,'category'=>'Smartphones','brand'=>'Apple','condition'=>'New','specifications'=>['screen'=>'6.1" Super Retina XDR','battery'=>'2815 mAh','camera'=>'12 MP Dual','storage'=>'128 GB','ram'=>'4 GB'],'features'=>['5G','Face ID','MagSafe'],'color'=>'Blue'],
            ['name'=>'Google Pixel 5','model'=>'GD1YQ','price'=>899.00,'sale_price'=>849.00,'stock'=>20,'is_featured'=>false,'category'=>'Smartphones','brand'=>'Google','condition'=>'New','specifications'=>['screen'=>'6.0" OLED','battery'=>'4080 mAh','camera'=>'12.2 MP','storage'=>'128 GB','ram'=>'8 GB'],'features'=>['5G','Wireless Charging','Water Resistant'],'color'=>'Just Black'],
            ['name'=>'OnePlus 8T','model'=>'KB2001','price'=>749.00,'sale_price'=>699.00,'stock'=>15,'is_featured'=>false,'category'=>'Smartphones','brand'=>'OnePlus','condition'=>'New','specifications'=>['screen'=>'6.55" AMOLED','battery'=>'4500 mAh','camera'=>'48 MP','storage'=>'128 GB','ram'=>'12 GB'],'features'=>['5G','Fast Charging'],'color'=>'Aquamarine Green'],
            ['name'=>'Samsung Galaxy Note 20','model'=>'SM-N980F','price'=>1249.00,'sale_price'=>1149.00,'stock'=>18,'is_featured'=>true,'category'=>'Smartphones','brand'=>'Samsung','condition'=>'New','specifications'=>['screen'=>'6.7" AMOLED','battery'=>'4300 mAh','camera'=>'64 MP','storage'=>'256 GB','ram'=>'8 GB'],'features'=>['5G','S Pen','Wireless Charging'],'color'=>'Mystic Bronze'],
            ['name'=>'Apple iPhone SE (2020)','model'=>'A2296','price'=>599.00,'sale_price'=>549.00,'stock'=>22,'is_featured'=>false,'category'=>'Smartphones','brand'=>'Apple','condition'=>'New','specifications'=>['screen'=>'4.7" Retina','battery'=>'1821 mAh','camera'=>'12 MP','storage'=>'64 GB','ram'=>'3 GB'],'features'=>['Touch ID','Wireless Charging'],'color'=>'White'],
            ['name'=>'Google Pixel 4a','model'=>'GA01499','price'=>499.00,'sale_price'=>459.00,'stock'=>25,'is_featured'=>false,'category'=>'Smartphones','brand'=>'Google','condition'=>'New','specifications'=>['screen'=>'5.81" OLED','battery'=>'3140 mAh','camera'=>'12.2 MP','storage'=>'128 GB','ram'=>'6 GB'],'features'=>['Wireless Charging'],'color'=>'Just Black'],
            ['name'=>'Samsung Galaxy A51','model'=>'SM-A515F','price'=>399.00,'sale_price'=>359.00,'stock'=>35,'is_featured'=>false,'category'=>'Smartphones','brand'=>'Samsung','condition'=>'New','specifications'=>['screen'=>'6.5" Super AMOLED','battery'=>'4000 mAh','camera'=>'48 MP','storage'=>'128 GB','ram'=>'4 GB'],'features'=>['4G LTE','Face Recognition'],'color'=>'Prism Crush Blue'],
            ['name'=>'OnePlus Nord','model'=>'AC2001','price'=>699.00,'sale_price'=>649.00,'stock'=>20,'is_featured'=>true,'category'=>'Smartphones','brand'=>'OnePlus','condition'=>'New','specifications'=>['screen'=>'6.44" Fluid AMOLED','battery'=>'4115 mAh','camera'=>'48 MP','storage'=>'128 GB','ram'=>'8 GB'],'features'=>['5G','Fast Charging'],'color'=>'Blue Marble'],
            ['name'=>'Apple iPhone 11','model'=>'A2221','price'=>899.00,'sale_price'=>849.00,'stock'=>28,'is_featured'=>true,'category'=>'Smartphones','brand'=>'Apple','condition'=>'New','specifications'=>['screen'=>'6.1" Liquid Retina','battery'=>'3110 mAh','camera'=>'12 MP Dual','storage'=>'128 GB','ram'=>'4 GB'],'features'=>['Face ID','Wireless Charging'],'color'=>'Black'],

            // Laptops (10)
            ['name'=>'Dell XPS 13','model'=>'7390','price'=>1699.00,'sale_price'=>1599.00,'stock'=>12,'is_featured'=>true,'category'=>'Laptops','brand'=>'Dell','condition'=>'New','specifications'=>['cpu'=>'Intel Core i7-10710U','ram'=>'16 GB','storage'=>'512 GB SSD','screen'=>'13.3″ FHD+'],'features'=>['Backlit Keyboard','Touchscreen'],'color'=>'Silver'],
            ['name'=>'Apple MacBook Air M1','model'=>'MGN63XA/A','price'=>1599.00,'sale_price'=>1499.00,'stock'=>18,'is_featured'=>true,'category'=>'Laptops','brand'=>'Apple','condition'=>'New','specifications'=>['cpu'=>'Apple M1','ram'=>'8 GB','storage'=>'256 GB SSD','screen'=>'13.3″ Retina'],'features'=>['Fanless','Touch ID'],'color'=>'Space Gray'],
            ['name'=>'Lenovo ThinkPad X1 Carbon','model'=>'20KH','price'=>2499.00,'sale_price'=>2299.00,'stock'=>10,'is_featured'=>false,'category'=>'Laptops','brand'=>'Lenovo','condition'=>'New','specifications'=>['cpu'=>'Intel Core i7-1165G7','ram'=>'16 GB','storage'=>'1 TB SSD','screen'=>'14″ FHD'],'features'=>['Fingerprint Reader','Lightweight'],'color'=>'Black'],
            ['name'=>'HP Spectre x360','model'=>'13-aw2000','price'=>1799.00,'sale_price'=>1699.00,'stock'=>14,'is_featured'=>true,'category'=>'Laptops','brand'=>'HP','condition'=>'New','specifications'=>['cpu'=>'Intel Core i7-1165G7','ram'=>'16 GB','storage'=>'512 GB SSD','screen'=>'13.3″ 4K OLED'],'features'=>['Touchscreen','Convertible'],'color'=>'Nightfall Black'],
            ['name'=>'ASUS ZenBook 14','model'=>'UX425EA','price'=>1399.00,'sale_price'=>1299.00,'stock'=>16,'is_featured'=>false,'category'=>'Laptops','brand'=>'ASUS','condition'=>'New','specifications'=>['cpu'=>'Intel Core i5-1135G7','ram'=>'8 GB','storage'=>'512 GB SSD','screen'=>'14″ FHD'],'features'=>['Lightweight','Backlit Keyboard'],'color'=>'Pine Grey'],
            ['name'=>'Acer Swift 3','model'=>'SF314-42','price'=>999.00,'sale_price'=>949.00,'stock'=>20,'is_featured'=>false,'category'=>'Laptops','brand'=>'Acer','condition'=>'New','specifications'=>['cpu'=>'AMD Ryzen 7 4700U','ram'=>'8 GB','storage'=>'512 GB SSD','screen'=>'14″ FHD'],'features'=>['Lightweight','Backlit Keyboard'],'color'=>'Silver'],
            ['name'=>'Microsoft Surface Laptop 4','model'=>'5DT-00001','price'=>1799.00,'sale_price'=>1699.00,'stock'=>13,'is_featured'=>true,'category'=>'Laptops','brand'=>'Microsoft','condition'=>'New','specifications'=>['cpu'=>'AMD Ryzen 5','ram'=>'8 GB','storage'=>'512 GB SSD','screen'=>'13.5″ PixelSense'],'features'=>['Touchscreen','Lightweight'],'color'=>'Platinum'],
            ['name'=>'Dell G5 15 Gaming','model'=>'G5-5590','price'=>1199.00,'sale_price'=>1099.00,'stock'=>9,'is_featured'=>false,'category'=>'Laptops','brand'=>'Dell','condition'=>'New','specifications'=>['cpu'=>'Intel Core i7-9750H','ram'=>'16 GB','storage'=>'1 TB SSD','screen'=>'15.6″ FHD'],'features'=>['Backlit Keyboard','Gaming'],'color'=>'Black'],
            ['name'=>'Lenovo IdeaPad 3','model'=>'81WE00J6US','price'=>549.00,'sale_price'=>499.00,'stock'=>22,'is_featured'=>false,'category'=>'Laptops','brand'=>'Lenovo','condition'=>'New','specifications'=>['cpu'=>'AMD Ryzen 5 3500U','ram'=>'8 GB','storage'=>'256 GB SSD','screen'=>'15.6″ FHD'],'features'=>['Backlit Keyboard'],'color'=>'Platinum Grey'],
            ['name'=>'HP Envy 13','model'=>'13-ba1013dx','price'=>1299.00,'sale_price'=>1199.00,'stock'=>15,'is_featured'=>true,'category'=>'Laptops','brand'=>'HP','condition'=>'New','specifications'=>['cpu'=>'Intel Core i7-1165G7','ram'=>'16 GB','storage'=>'512 GB SSD','screen'=>'13.3″ FHD'],'features'=>['Fingerprint Reader','Backlit Keyboard'],'color'=>'Natural Silver'],

            // Tablets (10)
            ['name'=>'Apple iPad Pro 12.9','model'=>'MY252LL/A','price'=>1099.00,'sale_price'=>999.00,'stock'=>20,'is_featured'=>true,'category'=>'Tablets','brand'=>'Apple','condition'=>'New','specifications'=>['screen'=>'12.9" Liquid Retina','storage'=>'128 GB','ram'=>'6 GB','battery'=>'9720 mAh'],'features'=>['Face ID','Apple Pencil Support'],'color'=>'Silver'],
            ['name'=>'Samsung Galaxy Tab S7','model'=>'SM-T870','price'=>649.00,'sale_price'=>599.00,'stock'=>25,'is_featured'=>true,'category'=>'Tablets','brand'=>'Samsung','condition'=>'New','specifications'=>['screen'=>'11" LTPS LCD','storage'=>'128 GB','ram'=>'6 GB','battery'=>'8000 mAh'],'features'=>['S Pen','120Hz Refresh Rate'],'color'=>'Mystic Black'],
            ['name'=>'Amazon Fire HD 10','model'=>'GA01311','price'=>149.00,'sale_price'=>129.00,'stock'=>50,'is_featured'=>false,'category'=>'Tablets','brand'=>'Amazon','condition'=>'New','specifications'=>['screen'=>'10.1" IPS LCD','storage'=>'32 GB','ram'=>'2 GB','battery'=>'6300 mAh'],'features'=>['Alexa Integration'],'color'=>'Black'],
            ['name'=>'Microsoft Surface Pro 7','model'=>'VNX-00001','price'=>899.00,'sale_price'=>849.00,'stock'=>18,'is_featured'=>true,'category'=>'Tablets','brand'=>'Microsoft','condition'=>'New','specifications'=>['screen'=>'12.3" PixelSense','storage'=>'128 GB','ram'=>'8 GB','battery'=>'5702 mAh'],'features'=>['Touchscreen','Detachable Keyboard'],'color'=>'Platinum'],
            ['name'=>'Lenovo Tab P11','model'=>'ZA7R0004US','price'=>259.00,'sale_price'=>229.00,'stock'=>35,'is_featured'=>false,'category'=>'Tablets','brand'=>'Lenovo','condition'=>'New','specifications'=>['screen'=>'11" IPS','storage'=>'64 GB','ram'=>'4 GB','battery'=>'7500 mAh'],'features'=>['Kids Mode'],'color'=>'Slate Grey'],
            ['name'=>'Apple iPad Mini','model'=>'A2133','price'=>399.00,'sale_price'=>379.00,'stock'=>22,'is_featured'=>true,'category'=>'Tablets','brand'=>'Apple','condition'=>'New','specifications'=>['screen'=>'7.9" Retina','storage'=>'64 GB','ram'=>'3 GB','battery'=>'5124 mAh'],'features'=>['Touch ID'],'color'=>'Space Gray'],
            ['name'=>'Samsung Galaxy Tab A7','model'=>'SM-T500','price'=>229.00,'sale_price'=>199.00,'stock'=>40,'is_featured'=>false,'category'=>'Tablets','brand'=>'Samsung','condition'=>'New','specifications'=>['screen'=>'10.4" TFT','storage'=>'32 GB','ram'=>'3 GB','battery'=>'7040 mAh'],'features'=>['Dolby Atmos'],'color'=>'Gray'],
            ['name'=>'Amazon Fire 7','model'=>'B07FKTZ7T2','price'=>49.99,'sale_price'=>39.99,'stock'=>70,'is_featured'=>false,'category'=>'Tablets','brand'=>'Amazon','condition'=>'New','specifications'=>['screen'=>'7" IPS','storage'=>'16 GB','ram'=>'1 GB','battery'=>'2940 mAh'],'features'=>['Alexa Integration'],'color'=>'Black'],
            ['name'=>'Microsoft Surface Go 2','model'=>'QVG-00001','price'=>399.00,'sale_price'=>379.00,'stock'=>19,'is_featured'=>false,'category'=>'Tablets','brand'=>'Microsoft','condition'=>'New','specifications'=>['screen'=>'10.5" PixelSense','storage'=>'64 GB','ram'=>'8 GB','battery'=>'4420 mAh'],'features'=>['Touchscreen'],'color'=>'Platinum'],
            ['name'=>'Lenovo Yoga Smart Tab','model'=>'ZA3V0123US','price'=>299.00,'sale_price'=>279.00,'stock'=>24,'is_featured'=>false,'category'=>'Tablets','brand'=>'Lenovo','condition'=>'New','specifications'=>['screen'=>'10.1" IPS','storage'=>'64 GB','ram'=>'4 GB','battery'=>'7000 mAh'],'features'=>['Google Assistant'],'color'=>'Iron Grey'],
            ['name'=>'Apple iPad Pro 11"','model'=>'A2377','price'=>799.00,'sale_price'=>749.00,'stock'=>30,'is_featured'=>true,'category'=>'Tablets','brand'=>'Apple','condition'=>'New','specifications'=>['screen_size'=>'11"','storage'=>'128GB'],'features'=>['Liquid Retina','Apple Pencil Support'],'color'=>'Silver'],
            ['name'=>'Samsung Galaxy Tab S7','model'=>'SM-T870','price'=>649.99,'sale_price'=>599.99,'stock'=>25,'is_featured'=>true,'category'=>'Tablets','brand'=>'Samsung','condition'=>'New','specifications'=>['screen_size'=>'11"','storage'=>'128GB'],'features'=>['120Hz Display','S Pen'],'color'=>'Black'],
          
            // Headphones
            ['name'=>'Sony WH-1000XM4','model'=>'WH1000XM4/B','price'=>349.99,'sale_price'=>299.99,'stock'=>30,'is_featured'=>true,'category'=>'Headphones','brand'=>'Sony','condition'=>'New','specifications'=>['type'=>'Over-Ear','battery_life'=>'30 hours'],'features'=>['Noise Cancelling','Bluetooth'],'color'=>'Black'],
            ['name'=>'Bose QuietComfort 35 II','model'=>'QC35II','price'=>299.99,'sale_price'=>279.99,'stock'=>25,'is_featured'=>true,'category'=>'Headphones','brand'=>'Bose','condition'=>'New','specifications'=>['type'=>'Over-Ear','battery_life'=>'20 hours'],'features'=>['Noise Cancelling','Voice Assistant'],'color'=>'Silver'],
            ['name'=>'Apple AirPods Pro','model'=>'A2084','price'=>249.00,'sale_price'=>219.00,'stock'=>40,'is_featured'=>true,'category'=>'Headphones','brand'=>'Apple','condition'=>'New','specifications'=>['type'=>'In-Ear','battery_life'=>'4.5 hours'],'features'=>['Noise Cancelling','Wireless Charging'],'color'=>'White'],
            ['name'=>'Sennheiser HD 450BT','model'=>'HD450BT','price'=>199.95,'sale_price'=>179.95,'stock'=>20,'is_featured'=>false,'category'=>'Headphones','brand'=>'Sennheiser','condition'=>'New','specifications'=>['type'=>'Over-Ear','battery_life'=>'30 hours'],'features'=>['Noise Cancelling','Bluetooth'],'color'=>'Black'],
            ['name'=>'JBL Tune 750BTNC','model'=>'TUNE750BTNC','price'=>149.95,'sale_price'=>129.95,'stock'=>18,'is_featured'=>false,'category'=>'Headphones','brand'=>'JBL','condition'=>'New','specifications'=>['type'=>'Over-Ear','battery_life'=>'15 hours'],'features'=>['Noise Cancelling','Bluetooth'],'color'=>'Black'],
            ['name'=>'Beats Solo Pro','model'=>'MYJQ2LL/A','price'=>299.95,'sale_price'=>279.95,'stock'=>22,'is_featured'=>true,'category'=>'Headphones','brand'=>'Beats','condition'=>'New','specifications'=>['type'=>'On-Ear','battery_life'=>'22 hours'],'features'=>['Active Noise Cancelling','Fast Fuel'],'color'=>'Black'],
            ['name'=>'Anker Soundcore Life Q20','model'=>'A3023','price'=>89.99,'sale_price'=>79.99,'stock'=>50,'is_featured'=>false,'category'=>'Headphones','brand'=>'Anker','condition'=>'New','specifications'=>['type'=>'Over-Ear','battery_life'=>'40 hours'],'features'=>['Hybrid Active Noise Cancelling','Bluetooth'],'color'=>'Black'],
            ['name'=>'Bose SoundSport Free','model'=>'774373-0010','price'=>199.95,'sale_price'=>179.95,'stock'=>30,'is_featured'=>true,'category'=>'Headphones','brand'=>'Bose','condition'=>'New','specifications'=>['type'=>'In-Ear','battery_life'=>'5 hours'],'features'=>['Sweat and Weather Resistant','Bluetooth'],'color'=>'Navy'],
            ['name'=>'Sony WF-1000XM3','model'=>'WF1000XM3/B','price'=>229.99,'sale_price'=>199.99,'stock'=>35,'is_featured'=>true,'category'=>'Headphones','brand'=>'Sony','condition'=>'New','specifications'=>['type'=>'In-Ear','battery_life'=>'6 hours'],'features'=>['Noise Cancelling','Touch Controls'],'color'=>'Black'],
            ['name'=>'Jabra Elite 75t','model'=>'100-99090000-02','price'=>179.99,'sale_price'=>159.99,'stock'=>28,'is_featured'=>false,'category'=>'Headphones','brand'=>'Jabra','condition'=>'New','specifications'=>['type'=>'In-Ear','battery_life'=>'7.5 hours'],'features'=>['Active Noise Cancelling','Customizable Sound'],'color'=>'Titanium Black'],

            // Televisions
            ['name'=>'Samsung QLED Q90T','model'=>'QN65Q90TAFXZA','price'=>1799.99,'sale_price'=>1599.99,'stock'=>15,'is_featured'=>true,'category'=>'Televisions','brand'=>'Samsung','condition'=>'New','specifications'=>['screen_size'=>'65"','resolution'=>'4K UHD'],'features'=>['Smart TV','HDR10+'],'color'=>'Black'],
            ['name'=>'LG CX OLED','model'=>'OLED65CXPUA','price'=>1999.99,'sale_price'=>1899.99,'stock'=>10,'is_featured'=>true,'category'=>'Televisions','brand'=>'LG','condition'=>'New','specifications'=>['screen_size'=>'65"','resolution'=>'4K UHD'],'features'=>['Smart TV','Dolby Vision'],'color'=>'Black'],
            ['name'=>'Sony X900H','model'=>'XBR65X900H','price'=>1299.99,'sale_price'=>1199.99,'stock'=>20,'is_featured'=>false,'category'=>'Televisions','brand'=>'Sony','condition'=>'New','specifications'=>['screen_size'=>'65"','resolution'=>'4K UHD'],'features'=>['Smart TV','HDR'],'color'=>'Black'],
            ['name'=>'TCL 6-Series','model'=>'R635','price'=>949.99,'sale_price'=>899.99,'stock'=>30,'is_featured'=>false,'category'=>'Televisions','brand'=>'TCL','condition'=>'New','specifications'=>['screen_size'=>'65"','resolution'=>'4K UHD'],'features'=>['Smart TV','Dolby Vision'],'color'=>'Black'],
            ['name'=>'Vizio M-Series Quantum','model'=>'M65Q7-J01','price'=>799.99,'sale_price'=>749.99,'stock'=>25,'is_featured'=>false,'category'=>'Televisions','brand'=>'Vizio','condition'=>'New','specifications'=>['screen_size'=>'65"','resolution'=>'4K UHD'],'features'=>['Smart TV','Quantum Color'],'color'=>'Black'],
            ['name'=>'Hisense H8G','model'=>'65H8G','price'=>699.99,'sale_price'=>649.99,'stock'=>18,'is_featured'=>false,'category'=>'Televisions','brand'=>'Hisense','condition'=>'New','specifications'=>['screen_size'=>'65"','resolution'=>'4K UHD'],'features'=>['Smart TV','Dolby Vision'],'color'=>'Black'],
            ['name'=>'Philips 8000 Series','model'=>'65OLED803/12','price'=>1499.99,'sale_price'=>1399.99,'stock'=>12,'is_featured'=>true,'category'=>'Televisions','brand'=>'Philips','condition'=>'New','specifications'=>['screen_size'=>'65"','resolution'=>'4K UHD'],'features'=>['Smart TV','Ambilight'],'color'=>'Black'],
            ['name'=>'Panasonic TX-65HX800B','model'=>'TX-65HX800B','price'=>1299.99,'sale_price'=>1199.99,'stock'=>15,'is_featured'=>false,'category'=>'Televisions','brand'=>'Panasonic','condition'=>'New','specifications'=>['screen_size'=>'65"','resolution'=>'4K UHD'],'features'=>['Smart TV','HDR10+'],'color'=>'Black'],
            ['name'=>'Sharp Aquos 4K UHD','model'=>'LC-65N7000U','price'=>899.99,'sale_price'=>849.99,'stock'=>20,'is_featured'=>false,'category'=>'Televisions','brand'=>'Sharp','condition'=>'New','specifications'=>['screen_size'=>'65"','resolution'=>'4K UHD'],'features'=>['Smart TV'],'color'=>'Black'],

            // Gaming Consoles
            ['name'=>'Sony PlayStation 5','model'=>'CFI-1015A','price'=>499.99,'sale_price'=>499.99,'stock'=>12,'is_featured'=>true,'category'=>'Gaming Consoles','brand'=>'Sony','condition'=>'New','specifications'=>['storage'=>'825GB SSD','cpu'=>'AMD Ryzen Zen 2'],'features'=>['4K Gaming','Ray Tracing'],'color'=>'White'],
            ['name'=>'Microsoft Xbox Series X','model'=>'RRT-00010','price'=>499.99,'sale_price'=>499.99,'stock'=>15,'is_featured'=>true,'category'=>'Gaming Consoles','brand'=>'Microsoft','condition'=>'New','specifications'=>['storage'=>'1TB SSD','cpu'=>'AMD Ryzen Zen 2'],'features'=>['4K Gaming','Quick Resume'],'color'=>'Black'],
            ['name'=>'Nintendo Switch','model'=>'HAC-001','price'=>299.99,'sale_price'=>299.99,'stock'=>20,'is_featured'=>true,'category'=>'Gaming Consoles','brand'=>'Nintendo','condition'=>'New','specifications'=>['storage'=>'32GB','cpu'=>'NVIDIA Custom Tegra'],'features'=>['Handheld','Docked Mode'],'color'=>'Red/Blue'],
            ['name'=>'Sony PlayStation 4 Pro','model'=>'CUH-7215B','price'=>399.99,'sale_price'=>349.99,'stock'=>25,'is_featured'=>false,'category'=>'Gaming Consoles','brand'=>'Sony','condition'=>'Used','specifications'=>['storage'=>'1TB','cpu'=>'AMD Jaguar'],'features'=>['4K Upscaling'],'color'=>'Black'],
            ['name'=>'Microsoft Xbox One X','model'=>'RRT-00002','price'=>349.99,'sale_price'=>299.99,'stock'=>10,'is_featured'=>false,'category'=>'Gaming Consoles','brand'=>'Microsoft','condition'=>'Used','specifications'=>['storage'=>'1TB','cpu'=>'AMD Jaguar'],'features'=>['4K Upscaling'],'color'=>'Black'],
            
            // Smartwatches
            ['name'=>'Apple Watch Series 6','model'=>'A2291','price'=>399.00,'sale_price'=>379.00,'stock'=>30,'is_featured'=>true,'category'=>'Smartwatches','brand'=>'Apple','condition'=>'New','specifications'=>['screen'=>'1.78" OLED','battery_life'=>'18 hours'],'features'=>['ECG','GPS'],'color'=>'Space Gray'],
            ['name'=>'Samsung Galaxy Watch 3','model'=>'SM-R840','price'=>399.99,'sale_price'=>379.99,'stock'=>25,'is_featured'=>true,'category'=>'Smartwatches','brand'=>'Samsung','condition'=>'New','specifications'=>['screen'=>'1.4" AMOLED','battery_life'=>'56 hours'],'features'=>['ECG','Bluetooth'],'color'=>'Mystic Bronze'],
            ['name'=>'Garmin Forerunner 945','model'=>'010-02063-00','price'=>599.99,'sale_price'=>579.99,'stock'=>15,'is_featured'=>false,'category'=>'Smartwatches','brand'=>'Garmin','condition'=>'New','specifications'=>['screen'=>'1.2" LCD','battery_life'=>'2 weeks'],'features'=>['GPS','Heart Rate Monitor'],'color'=>'Black'],
            ['name'=>'Fitbit Versa 3','model'=>'FB511','price'=>229.95,'sale_price'=>199.95,'stock'=>40,'is_featured'=>false,'category'=>'Smartwatches','brand'=>'Fitbit','condition'=>'New','specifications'=>['screen'=>'1.58" AMOLED','battery_life'=>'6 days'],'features'=>['Heart Rate','Sleep Tracking'],'color'=>'Black'],
            ['name'=>'Fossil Gen 5','model'=>'FTW4024','price'=>295.00,'sale_price'=>275.00,'stock'=>20,'is_featured'=>false,'category'=>'Smartwatches','brand'=>'Fossil','condition'=>'New','specifications'=>['screen'=>'1.28" AMOLED','battery_life'=>'24 hours'],'features'=>['Google Assistant','GPS'],'color'=>'Smoke Stainless Steel'],
            ['name'=>'Huawei Watch GT 2e','model'=>'55024324','price'=>199.99,'sale_price'=>179.99,'stock'=>18,'is_featured'=>false,'category'=>'Smartwatches','brand'=>'Huawei','condition'=>'New','specifications'=>['screen'=>'1.39" AMOLED','battery_life'=>'14 days'],'features'=>['Heart Rate Monitor','GPS'],'color'=>'Graphite Black'],
         
            // Bluetooth Speakers
            ['name'=>'JBL Flip 5','model'=>'FLIP5','price'=>119.95,'sale_price'=>99.95,'stock'=>50,'is_featured'=>true,'category'=>'Bluetooth Speakers','brand'=>'JBL','condition'=>'New','specifications'=>['battery_life'=>'12 hours','waterproof'=>'IPX7'],'features'=>['Bluetooth 4.2','PartyBoost'],'color'=>'Black'],
            ['name'=>'Bose SoundLink Revolve','model'=>'739552-1110','price'=>199.00,'sale_price'=>179.00,'stock'=>30,'is_featured'=>true,'category'=>'Bluetooth Speakers','brand'=>'Bose','condition'=>'New','specifications'=>['battery_life'=>'12 hours','waterproof'=>'IPX4'],'features'=>['360 Degree Sound','Bluetooth'],'color'=>'Triple Black'],
            ['name'=>'Ultimate Ears Boom 3','model'=>'UEBOOM3','price'=>149.99,'sale_price'=>129.99,'stock'=>40,'is_featured'=>false,'category'=>'Bluetooth Speakers','brand'=>'UE','condition'=>'New','specifications'=>['battery_life'=>'15 hours','waterproof'=>'IP67'],'features'=>['Bluetooth 4.2','PartyUp'],'color'=>'Blue'],
            ['name'=>'Sony SRS-XB43','model'=>'SRSXB43','price'=>249.99,'sale_price'=>229.99,'stock'=>20,'is_featured'=>false,'category'=>'Bluetooth Speakers','brand'=>'Sony','condition'=>'New','specifications'=>['battery_life'=>'24 hours','waterproof'=>'IP67'],'features'=>['Extra Bass','Bluetooth 5.0'],'color'=>'Black'],
            ['name'=>'Anker Soundcore Flare 2','model'=>'A3163','price'=>79.99,'sale_price'=>69.99,'stock'=>60,'is_featured'=>false,'category'=>'Bluetooth Speakers','brand'=>'Anker','condition'=>'New','specifications'=>['battery_life'=>'12 hours','waterproof'=>'IPX7'],'features'=>['360 Degree Sound','BassUp'],'color'=>'Black'],
            ['name'=>'Bang & Olufsen Beoplay P6','model'=>'BEO-1000001','price'=>349.00,'sale_price'=>329.00,'stock'=>15,'is_featured'=>true,'category'=>'Bluetooth Speakers','brand'=>'B&O','condition'=>'New','specifications'=>['battery_life'=>'16 hours','waterproof'=>'IP54'],'features'=>['Premium Sound','Bluetooth 4.2'],'color'=>'Natural'],
      
            // Digital Cameras
            ['name'=>'Canon EOS Rebel T7','model'=>'EOS 2000D','price'=>449.00,'sale_price'=>399.00,'stock'=>20,'is_featured'=>true,'category'=>'Digital Cameras','brand'=>'Canon','condition'=>'New','specifications'=>['resolution'=>'24.1 MP','sensor'=>'APS-C'],'features'=>['Wi-Fi','Full HD Video'],'color'=>'Black'],
            ['name'=>'Nikon D3500','model'=>'D3500','price'=>499.99,'sale_price'=>459.99,'stock'=>15,'is_featured'=>true,'category'=>'Digital Cameras','brand'=>'Nikon','condition'=>'New','specifications'=>['resolution'=>'24.2 MP','sensor'=>'APS-C'],'features'=>['Bluetooth','Full HD Video'],'color'=>'Black'],
            ['name'=>'Sony Alpha a6000','model'=>'ILCE-6000','price'=>648.00,'sale_price'=>599.00,'stock'=>10,'is_featured'=>true,'category'=>'Digital Cameras','brand'=>'Sony','condition'=>'New','specifications'=>['resolution'=>'24.3 MP','sensor'=>'APS-C'],'features'=>['Wi-Fi','Full HD Video'],'color'=>'Black'],
            ['name'=>'Fujifilm X-T200','model'=>'16553568','price'=>699.00,'sale_price'=>649.00,'stock'=>12,'is_featured'=>false,'category'=>'Digital Cameras','brand'=>'Fujifilm','condition'=>'New','specifications'=>['resolution'=>'24.2 MP','sensor'=>'APS-C'],'features'=>['Touchscreen','4K Video'],'color'=>'Silver'],
            ['name'=>'Panasonic Lumix G85','model'=>'DMC-G85KS','price'=>797.99,'sale_price'=>749.99,'stock'=>8,'is_featured'=>false,'category'=>'Digital Cameras','brand'=>'Panasonic','condition'=>'New','specifications'=>['resolution'=>'16 MP','sensor'=>'Micro Four Thirds'],'features'=>['4K Video','Image Stabilization'],'color'=>'Black'],
            ['name'=>'Olympus OM-D E-M10 Mark III','model'=>'V207050BU000','price'=>699.00,'sale_price'=>649.00,'stock'=>14,'is_featured'=>false,'category'=>'Digital Cameras','brand'=>'Olympus','condition'=>'New','specifications'=>['resolution'=>'16 MP','sensor'=>'Micro Four Thirds'],'features'=>['4K Video','Image Stabilization'],'color'=>'Silver'],
       
            // Computer Accessories
            ['name'=>'Logitech MX Master 3','model'=>'910-005647','price'=>99.99,'sale_price'=>89.99,'stock'=>50,'is_featured'=>true,'category'=>'Computer Accessories','brand'=>'Logitech','condition'=>'New','specifications'=>['type'=>'Wireless Mouse','connectivity'=>'Bluetooth/USB'],'features'=>['Ergonomic Design','Fast Scrolling'],'color'=>'Graphite'],
            ['name'=>'Corsair K95 RGB Platinum','model'=>'CH-9127014-NA','price'=>199.99,'sale_price'=>179.99,'stock'=>30,'is_featured'=>true,'category'=>'Computer Accessories','brand'=>'Corsair','condition'=>'New','specifications'=>['type'=>'Mechanical Keyboard','switches'=>'Cherry MX Speed'],'features'=>['RGB Lighting','Dedicated Macro Keys'],'color'=>'Black'],
            ['name'=>'Anker USB-C Hub','model'=>'A83360A2','price'=>59.99,'sale_price'=>49.99,'stock'=>40,'is_featured'=>false,'category'=>'Computer Accessories','brand'=>'Anker','condition'=>'New','specifications'=>['ports'=>'HDMI, USB, SD Card Reader'],'features'=>['Plug and Play','Compact Design'],'color'=>'Space Gray'],
            ['name'=>'Razer DeathAdder V2','model'=>'RZ01-03210100-R3U1','price'=>69.99,'sale_price'=>59.99,'stock'=>35,'is_featured'=>false,'category'=>'Computer Accessories','brand'=>'Razer','condition'=>'New','specifications'=>['type'=>'Wired Gaming Mouse','dpi'=>'20000'],'features'=>['RGB Lighting','Ergonomic Shape'],'color'=>'Black'],
            ['name'=>'Seagate Backup Plus Slim 2TB','model'=>'STHN2000400','price'=>69.99,'sale_price'=>64.99,'stock'=>60,'is_featured'=>false,'category'=>'Computer Accessories','brand'=>'Seagate','condition'=>'New','specifications'=>['type'=>'External Hard Drive','capacity'=>'2TB'],'features'=>['USB 3.0','Portable'],'color'=>'Black'],
            ['name'=>'Apple Magic Keyboard','model'=>'MLA22LL/A','price'=>129.00,'sale_price'=>119.00,'stock'=>25,'is_featured'=>true,'category'=>'Computer Accessories','brand'=>'Apple','condition'=>'New','specifications'=>['type'=>'Wireless Keyboard','connectivity'=>'Bluetooth'],'features'=>['Rechargeable Battery','Sleek Design'],'color'=>'Silver'],
            ['name'=>'Dell UltraSharp Monitor Stand','model'=>'MSP24','price'=>89.99,'sale_price'=>79.99,'stock'=>20,'is_featured'=>false,'category'=>'Computer Accessories','brand'=>'Dell','condition'=>'New','specifications'=>['type'=>'Monitor Stand','adjustability'=>'Height & Tilt'],'features'=>['Cable Management','Sturdy Build'],'color'=>'Black'],
            ['name'=>'Logitech C920 HD Pro Webcam','model'=>'960-001055','price'=>79.99,'sale_price'=>69.99,'stock'=>45,'is_featured'=>true,'category'=>'Computer Accessories','brand'=>'Logitech','condition'=>'New','specifications'=>['resolution'=>'1080p Full HD','field_of_view'=>'78°'],'features'=>['Autofocus','Stereo Audio'],'color'=>'Black'],
            ['name'=>'SanDisk Extreme Pro SDXC 128GB','model'=>'SDSDXXY-128G-GN4IN','price'=>59.99,'sale_price'=>54.99,'stock'=>70,'is_featured'=>false,'category'=>'Computer Accessories','brand'=>'SanDisk','condition'=>'New','specifications'=>['type'=>'SD Card','capacity'=>'128GB','speed'=>'170MB/s'],'features'=>['Waterproof','Shockproof'],'color'=>'Black/Red'],
            ['name'=>'Microsoft Surface Precision Mouse','model'=>'HDQ-00001','price'=>99.99,'sale_price'=>89.99,'stock'=>30,'is_featured'=>true,'category'=>'Computer Accessories','brand'=>'Microsoft','condition'=>'New','specifications'=>['type'=>'Wireless Mouse','connectivity'=>'Bluetooth/USB'],'features'=>['Ergonomic Design','Smooth Tracking'],'color'=>'Matte Black'],
        ];

        $imageCount = [];

        foreach ($products as $idx => $data) {
            $category = Category::where('name', $data['category'])->first();
            $brand = Brand::where('name', $data['brand'])->first();

            if (!$category || !$brand) continue;

            $slugged = Str::slug($data['name'] . '-' . $idx);

            $catSlug = $category->slug;
            $imageCount[$catSlug] = ($imageCount[$catSlug] ?? 0) + 1;
            $imageFile = "{$catSlug}-{$imageCount[$catSlug]}.jpg";

            Product::create([
                'name' => $data['name'],
                'description' => $data['name'] . ' — high-quality ' . strtolower($data['category']) . '.',
                'model' => $data['model'],
                'price' => $data['price'], // AUD
                'sale_price' => $data['sale_price'],
                'stock' => $data['stock'],
                'is_featured' => $data['is_featured'],
                'added_by' => 1,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'condition' => $data['condition'],
                'specifications' => json_encode($data['specifications']),
                'features' => json_encode($data['features']),
                'color' => $data['color'],
                'image_path' => "products/{$imageFile}",
                'slug' => $slugged,
            ]);
        }
    }
}
