<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"content="width=device-width">
	<link rel="stylesheet" type="text/css" href="styleofheaerandfooter.css">
    <link rel="stylesheet" type= "text/css" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>  منتجاتنا </title>
</head>
<script type="text/javascript">
	
	function changeText(obj,text) {
	obj.innerText=text;
	}

</script>

<body>
	<?php

$link=mysqli_connect("localhost", "root", "","MYuserinfordb");

if($link===false){
	die("Error: could not connect.".mysqli_connect_error());
}

if (isset($_GET['query'])) {
	$search = $_GET['query'];
	$data = "select * from products where p_name like '%$search%'";
}else{
	$data = 'select * from products';
}
$result = $link->query($data);

?>
	



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
            <i class="fas fa-search" id = search-btn></i>
            <a href="project3.html"><i class="fas fa-bag-shopping" id="shopping-btn"></i></a>
            <a href="project4.html"><i class="fa-solid fa-user" id="user-btn"></i></a>  
         </div>
         <!--label of search bar (seach here...)-->
         <form action="" method="GET" class="search-btn-container">
            <input type="search" id="search-bar" name="query"  placeholder="search here.....">
            	<!-- <input type="submit" value="Search" /> -->
           <label for="search-bar" class="fas fa-search"></label>
         </form>
      </header>
      <!------------------ end of header -------------------->

    <div class = "heading">
	  <h1>منتجاتنا </h1>
    </div>
    	<?php if (isset($_GET['query'])) { ?>

<a href="/project_app" class="boxy-btn" >Reset</a>

    	<?php } ?>
    <div class="containery">

    	<!-- product1-->
	<?php 
	if ($result->num_rows > 0) {

	
foreach ($result as  $value) {
?>
	  <div class="boxy" >



			<img src="img/<?php echo $value["prud_img"]; ?>" alt="البخنق" class="boxy-img" >
			<div class="boxy-body">
				<h1 class="boxy-title"><?php echo $value["p_name"]; ?></h1>
				
					
				<span><?php echo $value["p_price"]; ?></span>
				
				<a href="productdetails.html" class="boxy-btn">عرض</a>
				<a href="#" class="boxy-btn"><?php echo $value["p_description"] ?></a>
				
			</div>

		</div>
<?php
}
}else{
  echo 'No result';
}



	?>


</div>

	  <!------------------------------>

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
      <!-- js-->
      <script type="text/javascript" src="style.js"></script>

</body>

</html>

<?php

$link=mysqli_connect("localhost", "root", "","MYuserinfordb");

if($link===false){
	die("Error: could not connect.".mysqli_connect_error());
}

$data = 'select * from products';
$result = $link->query($data);

?>