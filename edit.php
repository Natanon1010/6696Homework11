<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            margin-left: 100px;
            margin-top: 50px;
        }

        h1 {
            /* อันนี้กำหนดส่วนย่อหน้าด้านซ้าย */
   
            /* อันนี้กำหนดส่วนย่อหน้าด้านบน */
            margin-top: 50px;
        }
    </style>
    

    <title>เเก้ไขข้อมูลplaystation</title>
</head>

<?php
if(isset($_GET['action_even'])=='edit'){
    $id=$_GET['id'];
    $sql="SELECT * FROM playstationgames WHERE id=$id";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
    }else{
        echo"ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
    }
    //$conn->close();
}
?>
<h1>แก้ไขข้อมูลplaystation</h1>


<form action="edit_1.php" method="POST">
    <input type="hidden"name="id" value="<?php echo$row['id']; ?>">
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> รหัส </label>
        <div class="col-sm-2">
        <label class="col-sm-1 col-form-label"><?php echo$row['id']; ?></label>
        </div>
    </div>
   
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ชื่อเกม </label>
        <div class="col-sm-2">
        <input type="text" name="game_name" class="form-control" maxlength="50" value=<?php echo$row['game_name']; ?> required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label">  ประเภท </label>
        <div class="col-sm-2">
        <select class="form-select" name="genre" aria-label="Default select example">
                <option >กรุณาระบุประเภทเกมส์</option>
                <option value="Action" <?php if ($row['genre']=='Action'){ echo "selected";} ?>>Action</option>
                <option value="Action RPG" <?php if ($row['genre']=='Action RPG'){ echo "selected";} ?>>Action RPG</option>
                <option value="Adventure"<?php if ($row['genre']=='Adventure'){ echo "selected";} ?>>Adventure</option>
                <option value="Fighting"<?php if ($row['genre']=='Fighting'){ echo "selected";} ?>>Fighting</option>
                <option value="FPS"<?php if ($row['genre']=='FPS'){ echo "selected";} ?>>FPS</option>
                <option value="Horror"<?php if ($row['genre']=='Horror'){ echo "selected";} ?>>Horror</option>
                <option value="Metroidvania"<?php if ($row['genre']=='Metroidvania'){ echo "selected";} ?>>Metroidvania</option>
                <option value="Racing"<?php if ($row['genre']=='Racing'){ echo "selected";} ?>>Racing</option>
                <option value="Roguelike"<?php if ($row['genre']=='Roguelike'){ echo "selected";} ?>>Roguelike</option>

            </select>      
        </div>
    </div>

    
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ปีที่วางจำหน่าย </label>
        <div class="col-sm-2">
        <input type="text" name="release_year" class="form-control" maxlength="50" value=<?php echo$row['release_year']; ?> required>
        </div>
    </div>


    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> นักพัฒนา </label>
        <div class="col-sm-2">
            <input type="text" name="developer" class="form-control" maxlength="50" value=<?php echo$row['developer']; ?> required>
        </div>
    </div>


    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> สำนักพิมพ์ </label>
        <div class="col-sm-2">
            <input type="text" name="publisher" class="form-control" maxlength="50" value=<?php echo$row['publisher']; ?> required>
        </div>
    </div>


    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> แพลตฟอร์ม </label>
        <div class="col-sm-2">
            <input type="text" name="platform" class="form-control" maxlength="50" value=<?php echo$row['platform']; ?> required>
        </div>
    </div>


    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ราคา </label>
        <div class="col-sm-2">
            <input type="text" name="price" class="form-control" maxlength="50" value=<?php echo$row['price']; ?> required>
        </div>
    </div>


    </div>
    <button type="submit" class="btn btn-primary"> บันทึกข้อมูล</button>
    <button type="reset" class="btn btn-danger"> ยกเลิก</button>
 
</form>
<br> พัฒนาโดย 664485015 นายณฐนนท์ ชุมเพ็ญ <br>
</head>

</html>