<?php
if ($admin_id == $row['admin_id']) {
                        ?>
                        <div class="actions">
                            <!-- Edit Form -->
                            <form action="" method="POST">
                                <input type="hidden" name="admin_id" value="<?php echo $row['admin_id']; ?>">
                                <button type="submit" name="edit">Edit</button>
                            </form>

                            <!-- Delete Form -->
                            <form action="" method="POST">
                                <input type="hidden" name="admin_id" value="<?php echo $row['admin_id']; ?>">
                                <button type="submit" name="delete" class = "btn btn-primary text-light">Delete</button>
                            </form>
                        </div>
                        <?php
                    } else {
                        echo "<h6 class='text-primary'>You do not have privileges to edit or delete this post!</h6>";
                    }