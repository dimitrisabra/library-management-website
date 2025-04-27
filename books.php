<?php
$pdo = new PDO('mysql:host=sql208.infinityfree.com;dbname=if0_38847636_blog', 'if0_38847636', 'X0LkFpkIaGQy8Om');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT id, book_title, author, isbn, publication_year, borrower, due_date FROM books"; 

$statement = $pdo->query($query);
$books = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Library Management System</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Library Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="books.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Book List
                            <a href="book-create.php" class="btn btn-primary float-end">Add Book</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>ISBN</th>
                                    <th>Publication Year</th>
                                    <th>Borrower</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $rowNumber = 1;
    foreach ($books as $book) :
    ?>
        <tr>
            <td><?php echo $rowNumber++; ?></td>
            <td><?php echo $book['book_title']; ?></td>
            <td><?php echo $book['author']; ?></td>
            <td><?php echo $book['isbn']; ?></td>
            <td><?php echo $book['publication_year']; ?></td>
            <td>
                <?php echo $book['borrower'] ? $book['borrower'] : 'Not Borrowed'; ?>
            </td>
            <td>
                <?php echo $book['due_date'] ? $book['due_date'] : 'N/A'; ?>
            </td>
            <td>
                <a href="book-view.php?id=<?php echo $book['id']; ?>" class="btn btn-info btn-sm">View</a>
                <a href="book-edit.php?id=<?php echo $book['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                <a href="delete.php?id=<?php echo $book['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>

    <?php if (empty($books)) : ?>
        <tr>
            <td colspan="8" class="text-center">No books found</td>
        </tr>
    <?php endif; ?>
</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>