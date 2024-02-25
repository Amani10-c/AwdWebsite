<?php 
$link = mysqli_connect("localhost", "root", "", "MYuserinfordb");

if ($link === false){
    die("ERROR: could not connect." . mysqli_connect_error());
}


// إذا تم الضغط على زر "ارسال" في النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استخراج البيانات من النموذج
    $item_name = $_POST["prodectName"];
    $category = $_POST["prodectTybe"];
    $seller_name = $_POST["fullName"];
    $email = $_POST["useremail"];
    $phone = $_POST["num"];
    $address = $_POST["addres"];
    
    // إدراج البيانات في قاعدة البيانات
    $sql = "INSERT INTO items (prodectName, prodectTybe, fullName, useremail, num, addres) 
            VALUES ('$item_name', '$category', '$seller_name', '$email', '$phone', '$address')";

    if ($link->query($sql) === TRUE) {
        echo "تم حفظ البيانات بنجاح";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <!--name of page-->
      <title>sellProdectPage page</title> 
      <!--css -->
      <link rel="stylesheet" type="text/css" href="styleofheaerandfooter.css">
      <link rel="stylesheet" type="text/css" href="stylesell.css">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <title>نموذج معلومات البضاعة</title>
   </head>
<body>
     <!------------------ start of header -------------------->
     <header>
         <!--list/menu-->
         <div id="menu-bar" class="fas fa-bars"></div>
         <!--name of our project-->
         <a href="projectmain.html" class="logo">عتيق</a>
         <!--address/page name in header,Move to another page -->
         <nav class="navbar">
            <a href="projectmain.html">الصفحة الرئيسية</a>
            <a href="project.php">القطع التراثية</a>
            <a href="sellProdectPage.php">بيع قطعة</a>
            <a href="projectmain.html #review">اراء العملاء</a> 
         </nav>
         <!--icons shopping and search -->
         <div class="icons">
             <a href="project3.html"><i class="fas fa-bag-shopping" id="shopping-btn"></i></a> 
         </div>
      </header>
      <!------------------ end of header -------------------->

<section class="home">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
<fieldset class="field_set">
            <legend>معلومات البضاعة </legend>
        <label for="item_name">اسم البضاعة:</label><br>
        <input type="text" id="item_name" name="prodectName" maxlength="30" required><br><br>
        
        <label for="category">صنف البضاعة:</label><br>
        <select id="category" name="prodectTybe" required>
            <option value="اجهزة قديمة">اجهزة قديمة</option>
        </select><br><br>
        
        <label for="image">ارفق صورة واضحة للبضاعة:</label><br>
        <input type="file" id="image" name="myFile" required><br><br>
        
        <label for="reason">سبب البيع (حد أقصى 30 حرفًا):</label><br>
        <textarea id="reason" name="comment" rows="4" cols="50" maxlength="30" required></textarea><br><br>
    </fieldset>
    
    <fieldset class="field_set">
        <legend>معلومات البائع</legend>
        <label for="seller_name">الاسم الكامل:</label><br>
        <input type="text" id="seller_name" name="fullName" required><br><br>
        
        <label for="email">البريد الإلكتروني:</label><br>
        <input type="email" id="email" name="useremail" required><br><br>
        
        <label for="phone">رقم الهاتف:</label><br>
        <input type="text" id="phone" name="num" required><br><br>
        
        <label for="contact_method">وسيلة التواصل المفضلة:</label><br>
        <input type="checkbox" id="email_contact" name="fav[]" value="البريد الإلكتروني"> البريد الإلكترو
        <input type="checkbox" id="phone_contact" name="fav[]" value="رقم الهاتف"> رقم الهاتف<br><br>
        
        <label for="address">العنوان:</label><br>
        <textarea id="address" name="addres" rows="4" cols="50" required></textarea><br><br>
    </fieldset>
    
    <input type="submit" value="ارسال">
</form>
</section>
 <!------------------ start of footer -------------------->
 <section class="footer">
         <div class="box-container">
            <div class="box">
               <h3>من نحن ؟</h3>
               <p>عتيق. متجر لبيع و شراء القطع التراثية القديمة و النادرة </p>
               <p>عتيق .لقاء الماضي بالحاضر</p>
            </div>
            <div class="box">
               <h3>الوصل السريع </h3>
               <a href="projectmain.html">الصفحة الرئيسية </a>
               <a href="project.php">القطع التراثية </a>
               <a href="sellProdectPage.php">بيع قطعة </a>
               <a href="#review">اراء العملاء </a> 
               <a href="commonquestionpage.html">الاسئلة الشائعة </a>
            </div>
            <div class="box">
               <h3>تواصل معنا  </h3>
               <a href="mailto:ourproject@gamil.com">الايميل </a>
               <a href="tel:0509876432">رقم الهاتف </a>
               <a href="https://maroof.sa/">وزارة التجارة -معروف</a>
            </div>
         </div>
         <h1 class="credit">created by<span>فريق عتيق </span>| 
            <small>&copy;all rights reserved</small></h1>
      </section>
      <!------------------ end of footer -------------------->
</body>
</html>
 
   
    
