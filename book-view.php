<?php
$pdo = new PDO('mysql:host=sql208.infinityfree.com;dbname=if0_38847636_blog', 'if0_38847636', 'X0LkFpkIaGQy8Om');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    $query = "
        SELECT books.id, books.book_title, books.author, books.isbn, books.publication_year,
               books.borrower, books.due_date
        FROM books
        WHERE books.id = :id
    ";

    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $book_id);
    $statement->execute();
    
    $book = $statement->fetch(PDO::FETCH_ASSOC);
} else {
    echo "<h4>No book ID provided.</h4>";
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Book View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Book View Details 
                            <a href="books.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php if ($book): ?>
                            <div class="mb-3">
                                <label>Book Title</label>
                                <p class="form-control"><?php echo $book['book_title']; ?></p>
                            </div>
                            <div class="mb-3">
                                <label>Author</label>
                                <p class="form-control"><?php echo $book['author']; ?></p>
                            </div>
                            <div class="mb-3">
                                <label>ISBN</label>
                                <p class="form-control"><?php echo $book['isbn']; ?></p>
                            </div>
                            <div class="mb-3">
                                <label>Publication Year</label>
                                <p class="form-control"><?php echo $book['publication_year']; ?></p>
                            </div>
                            <div class="mb-3">
                                <label>Borrower</label>
                                <p class="form-control"><?php echo $book['borrower'] ? $book['borrower'] : 'No borrower available.'; ?></p>
                            </div>
                            <div class="mb-3">
                                <label>Due Date</label>
                                <p class="form-control"><?php echo $book['due_date'] ? $book['due_date'] : 'No due date available.'; ?></p>
                            </div>

                        <?php else: ?>
                            <h4>No book found with this ID.</h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>