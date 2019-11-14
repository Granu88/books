<?php
class Books {
  public function getBooks()
  {
    $limit =20;
    $page = isset($_get['page']) ? (int) $_GET['page'] : 1;
    $count = $this->countBooks();
    $offset = ($page - 1) * $limit;


    $db = $this->dbConnect();
    $stmt = $db->prepare('SELECT
      books.*,
      authors.name AS author
      FROM books
      LEFT JOIN authors
      ON books.author_id = authors.id
      LIMIT :offset, :limit

    ');
      $stmt->bindParam(':offset',$offset, PDO::PARAM_INT);
      $stmt->bindParam(':limit',$limit, PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function countBooks()
  {
    $db = $this->dbConnect();
    $stmt = $db->prepare('SELECT COUNT(*) FROM books');
    $stmt->execute();
    return $stmt->fetchColumn();
  }

  public function getBook($id)
  {
    $db = $this->dbConnect();
    $stmt = $db->prepare('SELECT
      books.*,
      authors.name AS author
      FROM books
      LEFT JOIN authors
      ON books.author_id = authors.id
      WHERE books.id = :id
    ');
    $stmt->bindParam('id',$id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
  }

  private function dbConnect ()
  {
    return new PDO('mysql:host=localhost;dbname=books', 'root');
  }
}


 ?>
