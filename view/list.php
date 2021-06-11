<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Kho hàng
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>QuantiTy</th>
                        <th>Date Created</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $key => $product): ?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $product->name ?></td>
                            <td><?php echo $product->category ?></td>
                            <td><?php echo $product->price ?></td>
                            <td><?php echo $product->quantity ?></td>
                            <td><?php echo $product->datecreated ?></td>
                            <td><?php echo $product->description ?></td>
                            <td><a href="./index.php?page=delete&id=<?php echo $product->id ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>