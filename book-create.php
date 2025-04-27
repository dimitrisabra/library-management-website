<?php   
$pdo = new PDO('mysql:host=sql208.infinityfree.com;dbname=if0_38847636_blog', 'if0_38847636', 'X0LkFpkIaGQy8Om');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$title = $author = $isbn = $publication_year = $borrower = $due_date = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['book_title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $publication_year = $_POST['publication_year'];
    $borrower = $_POST['borrower'];
    $due_date = $_POST['due_date'];

    if (!$title) $errors[] = "Book title is required";
    if (!$author) $errors[] = "Book author is required";
    if (!$isbn) $errors[] = "ISBN is required";
    if (!$publication_year) $errors[] = "Publication year is required";
    if ($due_date && !preg_match("/\d{4}-\d{2}-\d{2}/", $due_date)) $errors[] = "Due date must be in YYYY-MM-DD format";

    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO books (book_title, author, isbn, publication_year, borrower, due_date) 
                                    VALUES (:book_title, :author, :isbn, :publication_year, :borrower, :due_date)");
        $statement->bindValue(':book_title', $title);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':isbn', $isbn);
        $statement->bindValue(':publication_year', $publication_year);
        $statement->bindValue(':borrower', $borrower);
        $statement->bindValue(':due_date', $due_date);
        $statement->execute();

        header('Location: books.php');
        exit;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Create New Book</title>
</head>
<body>
<div class="container mt-5">
    <h1>Create New Book</h1>

    <?php if ($errors): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div><?php echo $error; ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Book Title</label>
            <input type="text" name="book_title" class="form-control" value="<?php echo $title; ?>">
        </div>
        <div class="mb-3">
            <label>Book Author</label>
            <input type="text" name="author" class="form-control" value="<?php echo $author; ?>">
        </div>
        <div class="mb-3">
            <label>ISBN</label>
            <input type="number" name="isbn" class="form-control" value="<?php echo $isbn; ?>" >
        </div>
        <div class="mb-3">
            <label>Publication Year</label>
            <input type="number" name="publication_year" class="form-control" value="<?php echo $publication_year; ?>" >
        </div>
        <div class="mb-3">
            <label>Borrower (Optional)</label>
            <input type="text" name="borrower" class="form-control" value="<?php echo $borrower; ?>" 
                   placeholder="Leave blank if not borrowed">
        </div>
        <div class="mb-3">
            <label>Due Date (Optional)</label>
            <input type="date" name="due_date" class="form-control" value="<?php echo $due_date; ?>">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save Book</button>
        </div>
    </form>
</div>
</body>
</html>