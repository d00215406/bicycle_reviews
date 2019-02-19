
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php 
                              echo $category['typeID']; ?>">
                        <?php echo $category['typeName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

