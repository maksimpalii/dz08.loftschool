<?php

namespace App;

class Api extends MainController
{
    public function books()
    {
        $requestmethod = empty($_POST['_method']) ? strtoupper($_SERVER['REQUEST_METHOD']) : $_POST['_method'];
        switch ($requestmethod) {
            case 'GET':
            default:
                $this->responseGet();
                break;
            case 'POST':
                $this->responsePost();
                break;
            case 'DELETE':
                $this->responseDelete();
                break;
            case "PUT":
            case "PATCH":
                $this->responseUpdate();
        }
    }

    public function routes()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        return $routes[3];
    }

    public function responseUpdate()
    {

        $_REQUEST['id'] = $this->routes();
        if (!empty($_REQUEST['id'])) {
            $book = Book::find($_REQUEST['id']);
            if (empty($book)) {
                http_response_code(404);
                echo "Failed to update: 404 not found";
            } else {
                if (!empty($_REQUEST['name']) && !empty($_REQUEST['description']) && !empty($_REQUEST['category_id'])) {
                    $book->name = strip_tags($_REQUEST['name']);
                    $book->description = strip_tags($_REQUEST['description']);
                    $book->category_id = strip_tags($_REQUEST['category_id']);
                    $book->save();
                    echo "user updated";
                } else {
                    http_response_code(422);
                    echo "Field 'name' required";
                }
            }
        } else {
            http_response_code(422);
            echo "Field 'id' required";
        }
    }

    public function responseDelete()
    {
        $_REQUEST['id'] = $this->routes();
        if (!empty($_REQUEST['id'])) {
            $book = Book::find($_REQUEST['id']);
            if (empty($book)) {
                http_response_code(404);
                echo "Failed to delete: 404 not found";
            } else {
                $book->delete();
                echo "User deleted";
            }
        } else {
            http_response_code(422);
            echo "Field 'id' required";
//            $book = new Book();
//            $book::truncate();
//            echo "All User deleted";
        }
    }

    public function responsePost()
    {
        if (empty($_POST['name']) && empty($_POST['description']) && empty($_POST['category_id'])) {
            http_response_code(422);
            echo "Field 'name' required";
        } else {
            $book = new Book();
            $book->name = $_POST['name'];
            $book->description = $_POST['description'];
            $book->category_id = $_POST['category_id'];
            $book->save();
            echo json_encode($book);
        }
    }

    public function responseGet()
    {
        $_GET['id'] = $this->routes();
        if (!empty($_GET['id'])) {
            $book = Book::find($_GET['id']);
            if (empty($book)) {
                http_response_code(404);
                echo "404 not found";
            } else {
                echo json_encode($book);
            }
        } else {
            echo json_encode(Book::all());
        }
    }
}
