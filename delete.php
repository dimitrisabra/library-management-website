<?php
$pdo = new PDO('mysql:host=sql208.infinityfree.com;dbname=if0_38847636_blog', 'if0_38847636', 'X0LkFpkIaGQy8Om');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    $query = "DELETE FROM books WHERE id = :book_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: books.php?success=Book deleted successfully");
        exit(0);
    } else {
        header("Location: books.php?error=Failed to delete book");
        exit(0);
    }
} else {
    header("Location: books.php?error=Invalid request");
    exit(0);
}
?>