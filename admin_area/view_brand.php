<h3 class="text-center text-dark">All Brands</h3>
<table class="table table-border mt-5">
    <thead class="bg-dark">
        <tr class="text-light text-center">
            <th>Slno</th>
            <th>Brand Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_bra = "Select * from `brands`";
        $result = mysqli_query($con, $select_bra);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_name = $row['brand_name'];
            $number++;

        ?>

            <tr class="text-center">
                <td><?php echo $number;?></td>
                <td><?php echo $brand_name;?></td>
                <td><a href='index.php?edit_brands=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>

            </tr>
        <?php
        } ?>

    </tbody>
</table>