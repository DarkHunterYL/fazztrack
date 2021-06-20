<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>formDemo.html</title>
    <meta charset = "UTF-8" />
  </head>
  <style>
    table {
        margin-left: 20px;
        margin-top: 25px; 
        border-spacing: 0;
        border-collapse: collapse;
        border-color: blue;
    }

    tr{
        border-bottom: 2px solid #dedede
    }
    
    tr:first-child { border-top: 2px solid #b9b9b9 }
    tr:last-child {border-bottom: none}

    td {
        padding: 10px;
        min-width: 150px;
    }
  </style>

<?php 
include "koneksi.php";


$type = 'save';
$id="";
$nama_produk="";
$keterangan="";
$harga="";
$jumlah="";

if(isset($_GET['type'])){
  $type=$_GET['type'];
}

if(isset($_GET['id'])){
  $id=$_GET['id'];

  $query = mysqli_query($con, "select * from produk where id=$id");
  $result = mysqli_fetch_array($query);

  $nama_produk=$result[1];
  $keterangan=$result[2];
  $harga=$result[3];
  $jumlah=$result[4];
}

?>
  <body>
    <h1>Website Fazztrack CRUD</h1>
    <form method="post" action="submit.php?type=<?php echo $type ?>">
      <fieldset>
        <legend>Crud Fazztrack</legend>

        <input type="hidden" name="id" value="<?php echo $id ?>" />

        <p>
          <label>Nama Produk : </label>
          <input type = "text"
                 name = "nama_produk"
                 value = "<?php echo $nama_produk ?>" />
        </p>

        <p>
          <label>keterangan : </label>
          <textarea name="keterangan"><?php echo $keterangan ?></textarea>
        </p>
        <p>
          <label>harga</label>
          <input type = "number"
                  name = "harga"
                  value="<?php echo $harga ?>" />
        </p>
        <p>
          <label>Jumlah</label>
          <input type = "number"
                  name = "jumlah"
                  value="<?php echo $jumlah ?>" />
        </p>

        
        <input type = "submit" />
      </fieldset>
    </form>
<p>
  Status=<font color="green">"Terkoneksi"</font>
   <a href="submit.php?type=reset&id=<?=$result[0]?>">
                      <button>Reset</button>
                  </a>

</p>
    <table style="color:blue; margin: 0;">
        <tr>
            <td>id</td>
            <td>nama_produk</td>
            <td>keterangan</td>
            <td>harga</td>
            <td>jumlah</td>
            <td>Action</td>
        </tr>

<?php
    include "koneksi.php";

    $query = mysqli_query($con, "select * from produk");

    while($result = mysqli_fetch_array($query)) {

      ?>

      <tr>
        <td><?php echo $result[0]?></td>
        <td><?php echo $result[1]?></td>
        <td><?php echo $result[2]?></td>
        <td><?php echo $result[3]?></td>
        <td><?php echo $result[4]?></td>
      <td>
        <a href="index.php?type=update&id=<?=$result[0]?>">
                      <button>Update</button>
                  </a>

                  <a href="submit.php?type=delete&id=<?=$result[0]?>">
                      <button>delete</button>
        </a>
      </td>
    </tr>
    <?php
  }
  ?>
    </table>

  </body>
</html>