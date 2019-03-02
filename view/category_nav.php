
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($types as $type) : ?>
                <li>
                    <a href="?category_id=<?php 
                              echo $type['typeID']; ?>">
                        <?php echo $type['typeName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

