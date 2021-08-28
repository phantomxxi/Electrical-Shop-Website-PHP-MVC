<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
    $brand = new brand();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $brandName = $_POST['brandName'];
        //  Check thong tin dang nhap xem dung khong
        $insertBrand = $brand->insert_brand($brandName);
    }
?>
    ?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Thêm thương hiệu</h2>
            <div class="block copyblock">
                <?php
                    if(isset($insertCat)){
                        echo $insertCat;
                    }
                ?>
                <form action="brandadd.php" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Làm ơn thêm thương hiệu sản phẩm..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>