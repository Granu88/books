<?php


class Books
{
  private $id;
  private $title;
  private $authorId;
  private $language;
  private $year;
  private $country;
  private $pages;


  public function setId($id)
  {
    $this->id = $id;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function setAuthorId($authorId)
  {
    $this->authorId = $authorId;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function setYear($year)
  {
    $this->year = $year;
  }
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function setPages($pages)
  {
    if ($pages < 5) {
      throw new Exception('david/20');
    }
    $this->pages = $pages;
  }
  public function getId()
  {
    return $this->id;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function getAuthorId()
  {
    return $this->authorId;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function getYear()
  {
    return $this->year;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function getPages()
  {
    return $this->pages;

  }

}

  function dbConnect ()
  {
    return new PDO('mysql:host=localhost;dbname=books', 'root');
  }
  $db = dbConnect();
  $stmt = $db->prepare('SELECT * FROM books');
  $stmt->execute();
  $books = $stmt->fetch(PDO::FETCH_ASSOC);

  $bookModel = new Books;

  $bookModel->setId($books['id']);
  $bookModel->setTitle($books['title']);
  $bookModel->setAuthorId($books['author_id']);
  $bookModel->setLanguage($books['language']);
  $bookModel->setYear($books['year']);
  $bookModel->setCountry($books['country']);
  $bookModel->setPages($books['pages']);
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Pages</th>
      </tr>
      <tr>
        <td><?php echo $bookModel->getId(); ?></td>
        <td><?php echo $bookModel->getTitle(); ?></td>
        <td><?php echo $bookModel->getPages(); ?></td>
      </tr>
    </table>
  </body>
</html>
