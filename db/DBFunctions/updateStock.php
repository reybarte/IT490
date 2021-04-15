<?php
function updateStock() {
    $stmt = getDB()->prepare("UPDATE Products SET quantity = 5 WHERE out_of_stock = 1");
    $stmt->execute();

    }
