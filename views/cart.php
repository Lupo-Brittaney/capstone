
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">
              id
            </th>
            <th scope="col">
              Name
            </th>

            <th scope="col">
              Price
            </th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($_SESSION['cart'] as $id):
              $product= get_product($id);
              $subtotal += $product['price'];

                ?>
            <tr>
              <td scope="row"><?php echo $id; ?></td>
              <td><?php echo $product['name']; ?></td>
              <td><?php echo $product['price']; ?></td>
              <td><a href="?delete=<?php echo($id); ?>">Delete from cart</a></td>



            </tr>

          <?php endforeach; ?>
             <tr>
                <td></td>
                <th>Subtotal</th>
                <td id ='subtotal'><?php echo $subtotal; ?></td>
            </tr>
        </tbody>
    </table>
