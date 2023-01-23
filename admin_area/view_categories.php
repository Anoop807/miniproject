<h3 class="text-center text-dark">All Categories</h3>
<table class="table table-border mt-5">
    <thead class="bg-dark">
        <tr class="text-light text-center">
            <th>Slno</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat = "Select * from `categories`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $categorie_id = $row['categorie_id'];
            $categorie_name = $row['categorie_name'];
            $number++;

        ?>

            <tr class="text-center">
                <td><?php echo $number;?></td>
                <td><?php echo $categorie_name;?></td>
                <td><a href='index.php?edit_category=<?php echo $categorie_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>

            </tr>
        <?php
        } ?>

    </tbody>
</table>